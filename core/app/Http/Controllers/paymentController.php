<?php

namespace App\Http\Controllers;

use App\CauseDonor;
use App\RegPack;
use App\Transaction;
use App\User;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Session;
use App\deposit;
use App\getway;
use App\generalsetting;
use Stripe\Stripe;
use Stripe\Token;
use Stripe\Charge;
use CoinGate\CoinGate;
use App\Lib\BlockIo;
use App\Lib\coinPayments;
class paymentController extends Controller
{
    public function paypalPayment()
    {

        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval)
        {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2)
                $myPost[$keyval[0]] = urldecode($keyval[1]);
        }


        $req = 'cmd=_notify-validate';
        if(function_exists('get_magic_quotes_gpc'))
        {
            $get_magic_quotes_exists = true;
        }
        foreach ($myPost as $key => $value)
        {
            if($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }


// $paypalURL = "https://www.sandbox.paypal.com/cgi-bin/webscr";
        $paypalURL = "https://secure.paypal.com/cgi-bin/webscr";
        $ch = curl_init($paypalURL);
        if ($ch == FALSE)
        {
            return FALSE;
        }
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSLVERSION, 6);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);

// Set TCP timeout to 30 seconds
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close', 'User-Agent: company-name'));
        $res = curl_exec($ch);
        $tokens = explode("\r\n\r\n", trim($res));
        $res = trim(end($tokens));

        if (strcmp($res, "VERIFIED") == 0 || strcasecmp($res, "VERIFIED") == 0)
        {


            $receiver_email  = $_POST['receiver_email'];
            $mc_currency  = $_POST['mc_currency'];
            $mc_gross  = $_POST['mc_gross'];
            $track = $_POST['custom'];

            $depo = deposit::where('unique_key',$track)->orderBy('id', 'DESC')->first();
            $user = CauseDonor::where('track_id',$track)->orderBy('id', 'DESC')->first();
            $gatewayData = Gateway::find(1);
            $gset = generalsetting::first();

            $amount = floatval($depo->amount)/floatval($gset->conversion_rate);

            if($receiver_email==$gatewayData->val1 && $mc_currency=="USD" && $mc_gross ==$amount && $depo->status=='0')
            {
                $user['status'] = 1;
                $user->save();

                $depo['status'] = 1;
                $depo->save();
                session()->flash('message', 'Deposited Successfully.');
                return redirect()->back();

            }
        }

    }

    public function pmPayment(){

        $gatewayData = getway::find(2);

        $passphrase=strtoupper(md5($gatewayData->val2));


        define('ALTERNATE_PHRASE_HASH',  $passphrase);
        define('PATH_TO_LOG',  '/somewhere/out/of/document_root/');
        $string=
            $_POST['PAYMENT_ID'].':'.$_POST['PAYEE_ACCOUNT'].':'.
            $_POST['PAYMENT_AMOUNT'].':'.$_POST['PAYMENT_UNITS'].':'.
            $_POST['PAYMENT_BATCH_NUM'].':'.
            $_POST['PAYER_ACCOUNT'].':'.ALTERNATE_PHRASE_HASH.':'.
            $_POST['TIMESTAMPGMT'];

        $hash=strtoupper(md5($string));
        $hash2 = $_POST['V2_HASH'];

        if($hash==$hash2){

            $amo = $_POST['PAYMENT_AMOUNT'];
            $unit = $_POST['PAYMENT_UNITS'];
            $track = $_POST['PAYMENT_ID'];

            $depo = deposit::where('unique_key',$track)->orderBy('id', 'DESC')->first();
            $user = CauseDonor::where('track_id',$track)->orderBy('id', 'DESC')->first();
            $gset = generalsetting::first();
            $amount = floatval($depo->amount)/floatval($gset->conversion_rate);

            if($_POST['PAYEE_ACCOUNT']==$gatewayData->val1 && $unit=="USD" && $amo ==$amount && $depo->status=='0'){


                $user['status'] = 1;
                $user->save();

                $depo['status'] = 1;
                $depo->save();

                session()->flash('message', 'Deposited Successfull!');
                return redirect()->route('user.deposit');

            }
        }
    }

    public function btcPayment(){
        $gatewayData = getway::find(3);

        $track = $_GET['invoice_id'];
        $secret = $_GET['secret'];
        $address = $_GET['address'];
        $value = $_GET['value'];
        $confirmations = $_GET['confirmations'];
        $value_in_btc = $_GET['value'] / 100000000;

        $trx_hash = $_GET['transaction_hash'];

        $DepositData = deposit::where('unique_key',$track)->orderBy('id', 'DESC')->first();
        $user = CauseDonor::where('track_id',$track)->orderBy('id', 'DESC')->first();

        if ($DepositData->status==0) {

            if ($DepositData->bcam==$value_in_btc && $DepositData->bcid==$address && $secret=="ABIR" && $confirmations>2){

                $user['status'] = 1;
                $user->save();

                $DepositData['status'] = 1;
                $DepositData->save();

                session()->flash('message', 'Deposited Successfully.');
                return redirect()->back();

            }

        }

    }

    public function stripePayment(Request $request)
    {    $track =   Session::get('Track');
         $gset = generalsetting::first();
        $data = deposit::where('unique_key',$track)->orderBy('id', 'DESC')->first();
        $user = CauseDonor::where('track_id',$track)->orderBy('id', 'DESC')->first();

        $this->validate($request,
            [
                'cardNumber' => 'required',
                'cardExpiry' => 'required',
                'cardCVC' => 'required',
            ]);

        $cc = $request->cardNumber;
        $exp = $request->cardExpiry;
        $cvc = $request->cardCVC;

        $exp = $pieces = explode("/", $request->cardExpiry);
        $emo = trim($exp[0]);
        $eyr = trim($exp[1]);
        $cnts = round((floatval($data->amount)/floatval($gset->conversion_rate)),2)*100;
        $gatewayData = getway::find(4);
        Stripe::setApiKey($gatewayData->val1);

        try{
            $token = Token::create(array(
                "card" => array(
                    "number" => "$cc",
                    "exp_month" => $emo,
                    "exp_year" => $eyr,
                    "cvc" => "$cvc"
                )
            ));

            try{
                $charge = Charge::create(array(
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => $cnts,
                    'description' => 'item',
                ));


                if ($charge['status'] == 'succeeded') {

                    $user['status'] = 1;
                    $user->save();

                    $data['status'] = 1;
                    $data->save();
                    session()->flash('message', 'Deposited Successfully.');
                    return redirect()->route('home');

                }

            }
            catch (Exception $e){
                session()->flash('alert', $e->getMessage());
                return redirect()->route('home');
            }

        }catch (Exception $e){
            session()->flash('alert', $e->getMessage());
            return redirect()->route('home');
        }

    }

    public function skrillPayment()
    {

        $skrill = getway::find(5);
        $concatFields = $_POST['merchant_id']
            .$_POST['transaction_id']
            .strtoupper(md5($skrill->val2))
            .$_POST['mb_amount']
            .$_POST['mb_currency']
            .$_POST['status'];

        $depo = deposit::where('unique_key', $_POST['transaction_id'])->orderBy('id', 'DESC')->first();
        $user = CauseDonor::where('track_id',$_POST['transaction_id'])->orderBy('id', 'DESC')->first();
        $gset = generalsetting::first();

        if (strtoupper(md5($concatFields)) == $_POST['md5sig'] && $_POST['status'] == 2 && $_POST['pay_to_email'] == $skrill->val1 && $depo->status='0') {

            $user['status'] = 1;
            $user->save();

            $depo['status'] = 1;
            $depo->save();
        }
    }

    public function coinGate(){
        $track = Session::get('Track');

        if (is_null($track))
        {
            return redirect()->back();
        }

        $depo = deposit::where('unique_key',$track)->first();

        $gset = generalsetting::first();
        $amount = floatval($depo->amount)/floatval($gset->conversion_rate);

        $gateway = getway::find(6);

        \CoinGate\CoinGate::config(array(
            'environment' => 'sandbox', // sandbox OR live
            'app_id'      =>  $gateway->val1,
            'api_key'     =>  $gateway->val2,
            'api_secret'  =>  $gateway->val3
        ));

        $post_params = array(
            'order_id'          => $depo->unique_key,
            'price'             => $amount,
            'currency'          => 'USD',
            'receive_currency'  => 'USD',
            'callback_url'      => route('coingate.payment'),
            'cancel_url'        => route('home'),
            'success_url'       => route('home'),
            'title'             => 'Buy ICO #'.$depo->unique_key,
            'description'       => 'Buy ICO'
        );

        $order = \CoinGate\Merchant\Order::create($post_params);

        if ($order)
        {
            return redirect($order->payment_url);
        } else {
            echo "Something Wrong with your API";
        }
    }

    public function coinGatePayment(Request $request)
    {

        $depo = deposit::where('unique_key',$request->order_id)->first();
        $user = CauseDonor::where('track_id',$track)->orderBy('id', 'DESC')->first();
        $gset = generalsetting::first();
        $amount = floatval($depo->amount)/floatval($gset->conversion_rate);

        if($request->status=='paid'&&$request->price==$amount && $depo->status=='0')
        {
            $user['status'] = 1;
            $user->save();

            $depo['status'] = 1;
            $depo->save();

            Session::flash('message', 'Payment Complete via CoinGate');
            return redirect()->back();
        }
    }

    public function coinPayPayment(Request $request)
    {  $gset = generalsetting::first();
        $track = $request->custom;
        $status = $request->status;
        $amount1 = floatval($request->amount1);
        $currency1 = $request->currency1;

        $DepositData = deposit::where('unique_key',$track)->orderBy('id', 'DESC')->first();
        $user = CauseDonor::where('track_id',$track)->orderBy('id', 'DESC')->first();
        $amount = floatval($DepositData->amount)/floatval($gset->conversion_rate);
        $bcoin = $DepositData->bcam;

        if ($currency1 == "BTC" && $amount1 >= $bcoin && $DepositData->status == '0')
        {
            if ($status>=100 || $status==2)
            {
                $user['status'] = 1;
                $user->save();

                $DepositData['status'] = 1;
                $DepositData->save();
            }
        }

    }

    public function blockio(){
        $DepositData = deposit::where('status', 0)->where('gateway_id', 8)->where('try','<=',100)->get();
        $user = CauseDonor::where('track_id',$track)->orderBy('id', 'DESC')->first();

        $method = getway::find(8);
        $apiKey = $method->val1;
        $version = 2; // API version
        $pin =  $method->val2;
        $block_io = new BlockIo($apiKey, $pin, $version);


        foreach($DepositData as $data)
        {
            $balance = $block_io->get_address_balance(array('addresses' => $data->bcid));
            $bal = $balance->data->available_balance;


            if($bal > 0 && $bal >= $data->bcam)
            {
                $user['status'] = 1;
                $user->save();

                $data['status'] = 1;
                $data['try'] = $data->try+ 1;
                $data->save();
            }
            $data['try'] = $data->try + 1;
            $data->save();
        }
    }
}
