<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Cause;
use App\CauseDonor;
use App\deposit;
use App\emailtemplate;
use App\Event;
use App\FacebookApp;
use App\generalsetting;
use App\HeadingSection;
use App\logoicon;
use App\OurHistory;
use App\Sponsor;
use App\Subscriberr;
use App\getway;
use App\menuManagement;
use App\testimonial;
use App\AboutUs;
use App\Volunteer;
use App\WhoWe;
use Image;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Session;
use App\Lib\BlockIo;
use App\Lib\coinPayments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{
    public function frontPage()
    {
        $testimonials = testimonial::all();
        $about = AboutUs::first();
        $sponsors = Sponsor::all();
        $who = AboutUs::first();
        $causes = Cause::orderBy('created_at', 'DESC')->take(4)->get();
        $events = Event::orderBy('created_at', 'DESC')->take(2)->get();
        $blogs = Blog::orderBy('created_at', 'DESC')->take(2)->get();
        $volunteers = Volunteer::where('status', 1)->get();
        $whowe = WhoWe::inRandomOrder()->take(3)->get();
        $section = HeadingSection::first();
        $don = deposit::where('status', 1)->count('id');
        $vol = Volunteer::count('id');
        $pro = Event::count('id');
        $gif = CauseDonor::where('status', 1)->count('id');
        return view('frontend.user.index', compact('services', 'testimonials', 'payments', 'about', 'causes', 'events', 'blogs', 'sponsors', 'who', 'whowe', 'volunteers', 'section', 'don', 'vol', 'pro', 'gif'));
    }

    public function about()
    {
        $about = AboutUs::first();
        $histories = OurHistory::all();
        return view('frontend.user.about', compact('about', 'histories'));
    }

    public function page($id)
    {
        $item = menuManagement::find($id);
        return view('frontend.user.page', compact('item'));
    }

    public function cause()
    {
        $causes = Cause::orderBy('id', 'DESC')->paginate(10);
        $section = HeadingSection::first();
        return view('frontend.user.cause', compact('causes', 'section'));
    }

    public function singleCause($id)
    {
        $item = Cause::find($id);
        $causes = Cause::where('id', '!=', $id)->orderBy('id', 'DESC')->take(10)->get();
        $methods = getway::where('status', 1)->get();
        $general = generalsetting::first();
        $btc = file_get_contents('https://blockchain.info/ticker');
        $usd = json_decode($btc);
        $btcrate = $general->conversion_rate * $usd->USD->last;
        $donors = CauseDonor::where('status', 1)->where('cause_id', '=', $id)->paginate(2);
        return view('frontend.user.singlecuase', compact('item', 'causes', 'methods', 'btcrate', 'donors'));
    }

    public function event()
    {
        $events = Event::orderBy('id', 'DESC')->paginate(10);
        $section = HeadingSection::first();
        return view('frontend.user.event', compact('events', 'section'));
    }

    public function singleEvent($id)
    {
        $item = Event::find($id);
        $events = Event::where('id', '!=', $id)->orderBy('id', 'DESC')->take(10)->get();
        return view('frontend.user.singleevent', compact('item', 'events'));
    }

    public function blog()
    {
        $blogs = Blog::orderBy('id', 'DESC')->paginate(10);
        $section = HeadingSection::first();
        return view('frontend.user.blog', compact('blogs', 'section'));
    }

    public function post(Request $request, $id)
    {

        $post = Blog::find($id);
        $posts = Blog::where('id', '!=', $id)->orderBy('id', 'DESC')->take(10)->get();
        $appid = FacebookApp::first();
        return view('frontend.user.singlepost', compact('post', 'posts', 'appid'));
    }

    public function contactEmail(Request $request)
    {
        $email = emailtemplate::first();
        $msg = 'Email from ' . $request->fname . ' ' . $request->lname . '<br/> Email: ' . $request->email . '<br/> Subject: ' . $request->subject . '<br/> Message: ' . $request->message;
        send_email($email->sender, 'Contact Email', $request->subject, $msg);

        session()->flash('message', 'Message Sent Successfully');
        return redirect()->back();

    }

    public function subscription(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:subscriberrs',
        ],
            [
                'email.unique' => 'You are already subscribed into our site',
            ]);
        $excep = Input::except('_token');
        Subscriberr::create($excep);
        $status = 0;
        return $status;
    }

    public function volunteer(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required',
            'lname' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,bmp,|max:2048',
            'email' => 'required|string|email|max:255|unique:volunteers',
            'phone' => 'required',
            'profession' => 'required',
            'description' => 'required',
        ],
            [
                'fname.required' => 'First Name is Required',
                'lname.required' => 'Last Name is Required',
                'email.unique' => 'Your Email id already registerd',
            ]);
        $excep = Input::except('_token', 'image');
        if ($request->hasFile('image')) {
            $image = $request->image->hashName();
            Image::make($request->file('image')->getRealPath())->resize(300, 250)->save("assets/frontend/upload/images/volunteer/" . $image);
            Volunteer::create($excep + ['image' => $image]);
            $status = 0;
        }
        return $status;
    }

    public function forgotPass(Request $request)
    {
        $this->validate($request,
            [
                'email' => 'required',
            ]);
        $user = User::where('email', $request->email)->first();

        if ($user == null) {
            return back()->with('alert', 'Invalid Email Address');
        } else {
            $to = $user->email;
            $name = $user->name;
            $subject = 'Password Reset';
            $code = str_random(30);
            $message = 'Use This Link to Reset Password: ' . url('/') . '/reset/' . $code;

            DB::table('password_resets')->insert(
                ['email' => $to, 'token' => $code, 'created_at' => date("Y-m-d h:i:s")]
            );

            send_email($to, $name, $subject, $message);

            return back()->with('success', 'Password Reset Email Sent Succesfully');
        }

    }


    public function depoAnno(Request $request)
    {
        $item = new deposit();
        $gate = getway::find($request->gatewayid);
        $gset = generalsetting::first();
        $this->validate($request, [
            'amount' => 'required',
        ]);
        if ($request->amount != '') {
            $key = str_random(16);
            $item->gateway_id = $request->gatewayid;
            $item->amount = $request->amount;
            $item->currency_text = $gset->currency_text;
            $item->unique_key = $key;
            session()->put('Track', $key);
            $item->status = 0;
            $item->save();

            $status = 0;
            $gatewayData = getway::where('id', $request->gatewayid)->first();
            $track = Session::get('Track');
            $depo = deposit::where('unique_key', $track)->orderBy('id', 'DESC')->first();
            if ($request->gatewayid == 1) {
                if ($depo->status != 0) {
                    $status = 1;
                    return $status;
                    exit();
                } else {
                    $paypal['amount'] = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);
                    $paypal['sendto'] = $gatewayData->val1;
                    $paypal['track'] = $track;
                    Session()->put('Paypal', $paypal);
                    return $status;
                }
            } elseif ($request->gatewayid == 2) {
                if ($depo->status != 0) {
                    $status = 1;
                    return $status;
                    exit();
                } else {
                    $perfect['amount'] = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);
                    $perfect['value1'] = $gatewayData->val1;
                    $perfect['value2'] = $gatewayData->val2;
                    $perfect['track'] = $track;
                    Session()->put('Perfect', $perfect);
                    return $status;
                }
            } elseif ($request->gatewayid == 3) {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcrate = $res->USD->last;
                $amount = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);
                $am = floatval($depo->amount);
                $btcamount = $amount / $btcrate;
                $btc = round($btcamount, 8);

                if ($depo->bcam == 0) {
                    $blockchain_root = "https://blockchain.info/";
                    $blockchain_receive_root = "https://api.blockchain.info/";
                    $mysite_root = url('/');
                    $secret = "ABIR";
                    $my_xpub = $gatewayData->val2;
                    $my_api_key = $gatewayData->val1;

                    $invoice_id = $track;
                    $callback_url = $mysite_root . "/ipnbtc?invoice_id=" . $invoice_id . "&secret=" . $secret;


                    $resp = @file_get_contents($blockchain_receive_root . "v2/receive?key=" . $my_api_key . "&callback=" . urlencode($callback_url) . "&xpub=" . $my_xpub);

                    if (!$resp) {
                        $status = 1;
//BITCOIN API HAVING ISSUE. PLEASE TRY LATER
                        return $status;
                        exit;
                    }

                    $response = json_decode($resp);
                    $sendto = $response->address;

// $sendto = "1HoPiJqnHoqwM8NthJu86hhADR5oWN8qG7";

                    $data['bcid'] = $sendto;
                    $data['bcam'] = $btc;
                    $data->save();

                }
/////UPDATE THE SEND TO ID

                $bitcoin['amount'] = $depo->bcam;
                $bitcoin['sendto'] = $depo->bcid;

                $var = "bitcoin:$depo->bcid?amount=$depo->bcam";
                $bitcoin['code'] = "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";
                Session()->put('bitcoin', $bitcoin);
                return $status;
            } elseif ($request->gatewayid == 5) {
                $logo = logoicon::first();

                $ipn = route('skrill.payment');
                $img = asset('assets/images/logo/' . $logo->logo);

                $gateway = getway::find(5);
                $gset = generalsetting::first();
                $amount = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);

                $sdata = '<form action="https://www.moneybookers.com/app/payment.pl" method="post" id="pament_form">

			<input name="pay_to_email" value="' . $gateway->val1 . '" type="hidden">

			<input name="transaction_id" value="' . $track . '" type="hidden">

			<input name="return_url" value="' . route('home') . '" type="hidden">

			<input name="return_url_text" value="Return ' . $gset->title . '" type="hidden">

			<input name="cancel_url" value="' . route('home') . '" type="hidden">

			<input name="status_url" value="' . $ipn . '" type="hidden">

			<input name="language" value="EN" type="hidden">

			<input name="amount" value="' . $amount . '" type="hidden">

			<input name="currency" value="USD" type="hidden">

			<input name="detail1_description" value="' . $gset->title . '" type="hidden">

			<input name="detail1_text" value="Add Fund To ' . $gset->title . '" type="hidden">

			<input name="logo_url" value="' . $img . '" type="hidden">

			</form>';

                Session()->put('Sdata', $sdata);
                return $status;
            } elseif ($request->gatewayid == 7) {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcRate = $res->USD->last;
                $amount = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);
                $am = floatval($depo->amount);
                $bcoin = round($amount / $btcRate, 8);


				$depo['bcam'] = $bcoin;
				$depo->save();

// You need to set a callback URL if you want the IPN to work
                $callbackUrl = route('coinPay.payment');

// Create an instance of the class
                $CP = new coinPayments();

// Set the merchant ID and secret key (can be found in account settings on CoinPayments.net)
                $CP->setMerchantId($gatewayData->val1);
                $CP->setSecretKey($gatewayData->val2);

// Create a payment button with item name, currency, cost, custom variable, and the callback URL

                $ntrc = $depo->unique_key;

                $form = $CP->createPayment('Purchase Coin', 'BTC', $bcoin, $ntrc, $callbackUrl);
                Session()->put('form', $form);
                Session()->put('amount', $am);
                Session()->put('bcoin', $bcoin);
                return $status;
            } elseif ($request->gatewayid == 8) {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcRate = $res->USD->last;
                $amount = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);
                $am = floatval($depo->amount);
                $bcoin = round(($amount / $btcRate), 8);

                $apiKey = $gatewayData->val1;
                $version = 2; // API version
                $pin = $gatewayData->val2;
                $block_io = new BlockIo($apiKey, $pin, $version);
                $ad = $block_io->get_new_address();
                if ($ad->status == 'success') {
                    $data = $ad->data;
                    $sendadd = $data->address;
                    $depo['bcid'] = $sendadd;
                    $depo['bcam'] = $bcoin;
                    $depo->save();
                } else {
                    $status = 1;
                    return $status;
                }


                $sendadd = $depo->bcid;
                $bcoin = $depo->bcam;


                $varb = "bitcoin:" . $depo->bcid . "?amount=" . $depo->bcam;
                $qrurl = "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$varb&choe=UTF-8\" title='' style='width:300px;' />";

                Session()->put('bcoin', $bcoin);
                Session()->put('amount', $am);
                Session()->put('sendadd', $sendadd);
                Session()->put('qrurl', $qrurl);
                return $status;
            } else {
                return $status;
            }
        } else {
            return 'Something Went Wrong. Please try again.';
        }

    }

    public function depositBank(Request $request)
    {
        $item = new deposit();
        $gate = getway::find($request->gatewayid);
        $gset = generalsetting::first();
        $key = str_random(16);
        $this->validate($request, [
            'userprove' => 'image|mimes:jpeg,jpg,png,bmp,|max:2048',
        ],
            [
                'userprove.image' => 'You Can Upload Only Image',
                'userprove.mimes' => 'The Image must be a file of type: jpeg, jpg, png, bmp',
                'userprove.max' => 'The Image must be within 2MB']
        );
        if ($request->amount != 0) {
            $item->gateway_id = $request->gatewayid;
            $item->amount = $request->amount;
            $item->currency_text = $gset->currency_text;
            if ($request->hasFile('userprove')) {
                $item->prove = $request->userprove->hashName();
                $request->userprove->move(('assets/backend/upload/images/bank-prove'), $item->prove);
            }
            $item->note = $request->usernote;
            $item->status = 0;
            $item->unique_key = $key;
            $item->save();
            $status = 0;
            return $status;
        } else {
            return 'Something Went Worng. Please try again.';
        }
    }
    
    public function depositStore(Request $request)
    {
        $user = new CauseDonor();
        $item = new deposit();
        $gate = getway::find($request->gatewayid);
        $gset = generalsetting::first();
        $this->validate($request, [
            'amount' => 'required',
        ]);
        if ($request->amount != '') {
            $key = str_random(16);
            $item->gateway_id = $request->gatewayid;
            $item->amount = $request->amount;
            $item->currency_text = $gset->currency_text;
            $item->unique_key = $key;
            session()->put('Track', $key);
            $item->status = 0;
            $item->save();

            $user->amount = $request->amount;
            $user->currency = $gset->currency_symbol;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->description = $request->description;
            $user->track_id = $key;
            $user->cause_id = $request->causeid;
            $user->save();

            $status = 0;
            $gatewayData = getway::where('id', $request->gatewayid)->first();
            $track = Session::get('Track');
            $depo = deposit::where('unique_key', $track)->orderBy('id', 'DESC')->first();
            if ($request->gatewayid == 1) {
                if ($depo->status != 0) {
                    $status = 1;
                    return $status;
                    exit();
                } else {
                    $paypal['amount'] = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);
                    $paypal['sendto'] = $gatewayData->val1;
                    $paypal['track'] = $track;
                    Session()->put('Paypal', $paypal);
                    return $status;
                }
            } elseif ($request->gatewayid == 2) {
                if ($depo->status != 0) {
                    $status = 1;
                    return $status;
                    exit();
                } else {
                    $perfect['amount'] = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);
                    $perfect['value1'] = $gatewayData->val1;
                    $perfect['value2'] = $gatewayData->val2;
                    $perfect['track'] = $track;
                    Session()->put('Perfect', $perfect);
                    return $status;
                }
            } elseif ($request->gatewayid == 3) {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcrate = $res->USD->last;
                $amount = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);
                $am = floatval($depo->amount);
                $btcamount = $amount / $btcrate;
                $btc = round($btcamount, 8);

                if ($depo->bcam == 0) {
                    $blockchain_root = "https://blockchain.info/";
                    $blockchain_receive_root = "https://api.blockchain.info/";
                    $mysite_root = url('/');
                    $secret = "ABIR";
                    $my_xpub = $gatewayData->val2;
                    $my_api_key = $gatewayData->val1;

                    $invoice_id = $track;
                    $callback_url = $mysite_root . "/ipnbtc?invoice_id=" . $invoice_id . "&secret=" . $secret;


                    $resp = @file_get_contents($blockchain_receive_root . "v2/receive?key=" . $my_api_key . "&callback=" . urlencode($callback_url) . "&xpub=" . $my_xpub);

                    if (!$resp) {
                        $status = 1;
//BITCOIN API HAVING ISSUE. PLEASE TRY LATER
                        return $status;
                        exit;
                    }

                    $response = json_decode($resp);
                    $sendto = $response->address;

// $sendto = "1HoPiJqnHoqwM8NthJu86hhADR5oWN8qG7";

                    $data['bcid'] = $sendto;
                    $data['bcam'] = $btc;
                    $data->save();

                }
/////UPDATE THE SEND TO ID

                $bitcoin['amount'] = $depo->bcam;
                $bitcoin['sendto'] = $depo->bcid;

                $var = "bitcoin:$depo->bcid?amount=$depo->bcam";
                $bitcoin['code'] = "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$var&choe=UTF-8\" title='' style='width:300px;' />";
                Session()->put('bitcoin', $bitcoin);
                return $status;
            } elseif ($request->gatewayid == 5) {
                $logo = logoicon::first();

                $ipn = route('skrill.payment');
                $img = asset('assets/images/logo/' . $logo->logo);

                $gateway = getway::find(5);
                $gset = generalsetting::first();
                $amount = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);

                $sdata = '<form action="https://www.moneybookers.com/app/payment.pl" method="post" id="pament_form">

			<input name="pay_to_email" value="' . $gateway->val1 . '" type="hidden">

			<input name="transaction_id" value="' . $track . '" type="hidden">

			<input name="return_url" value="' . route('home') . '" type="hidden">

			<input name="return_url_text" value="Return ' . $gset->title . '" type="hidden">

			<input name="cancel_url" value="' . route('home') . '" type="hidden">

			<input name="status_url" value="' . $ipn . '" type="hidden">

			<input name="language" value="EN" type="hidden">

			<input name="amount" value="' . $amount . '" type="hidden">

			<input name="currency" value="USD" type="hidden">

			<input name="detail1_description" value="' . $gset->title . '" type="hidden">

			<input name="detail1_text" value="Add Fund To ' . $gset->title . '" type="hidden">

			<input name="logo_url" value="' . $img . '" type="hidden">

			</form>';

                Session()->put('Sdata', $sdata);
                return $status;
            } elseif ($request->gatewayid == 7) {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcRate = $res->USD->last;
                $amount = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);
                $am = floatval($depo->amount);
                $bcoin = round($amount / $btcRate, 8);


                $depo['bcam'] = $bcoin;
                $depo->save();

// You need to set a callback URL if you want the IPN to work
                $callbackUrl = route('coinPay.payment');

// Create an instance of the class
                $CP = new coinPayments();

// Set the merchant ID and secret key (can be found in account settings on CoinPayments.net)
                $CP->setMerchantId($gatewayData->val1);
                $CP->setSecretKey($gatewayData->val2);

// Create a payment button with item name, currency, cost, custom variable, and the callback URL

                $ntrc = $depo->unique_key;

                $form = $CP->createPayment('Purchase Coin', 'BTC', $bcoin, $ntrc, $callbackUrl);
                Session()->put('form', $form);
                Session()->put('amount', $am);
                Session()->put('bcoin', $bcoin);
                return $status;
            } elseif ($request->gatewayid == 8) {
                $all = file_get_contents("https://blockchain.info/ticker");
                $res = json_decode($all);
                $btcRate = $res->USD->last;
                $amount = round((floatval($depo->amount) / floatval($gset->conversion_rate)), 2);
                $am = floatval($depo->amount);
                $bcoin = round(($amount / $btcRate), 8);

                $apiKey = $gatewayData->val1;
                $version = 2; // API version
                $pin = $gatewayData->val2;
                $block_io = new BlockIo($apiKey, $pin, $version);
                $ad = $block_io->get_new_address();
                if ($ad->status == 'success') {
                    $data = $ad->data;
                    $sendadd = $data->address;
                    $depo['bcid'] = $sendadd;
                    $depo['bcam'] = $bcoin;
                    $depo->save();
                } else {
                    $status = 1;
                    return $status;
                }


                $sendadd = $depo->bcid;
                $bcoin = $depo->bcam;


                $varb = "bitcoin:" . $depo->bcid . "?amount=" . $depo->bcam;
                $qrurl = "<img src=\"https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$varb&choe=UTF-8\" title='' style='width:300px;' />";

                Session()->put('bcoin', $bcoin);
                Session()->put('amount', $am);
                Session()->put('sendadd', $sendadd);
                Session()->put('qrurl', $qrurl);
                return $status;
            } else {
                return $status;
            }
        } else {
            return 'Something Went Wrong. Please try again.';
        }


    }

    public function depositBankStore(Request $request)
    {

        $item = new deposit();
        $user = new CauseDonor();
        $gate = getway::find($request->gatewayid);
        $gset = generalsetting::first();
        $key = str_random(16);
        $this->validate($request, [
            'userprove' => 'image|mimes:jpeg,jpg,png,bmp,|max:2048',
        ],
            [
                'userprove.image' => 'You Can Upload Only Image',
                'userprove.mimes' => 'The Image must be a file of type: jpeg, jpg, png, bmp',
                'userprove.max' => 'The Image must be within 2MB']
        );
        if ($request->amount != 0) {
            $user->amount = $request->amount;
            $user->currency = $gset->currency_symbol;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->description = $request->description;
            $user->cause_id = $request->causeid;
            $user->track_id = $key;
            $user->save();

            $item->gateway_id = $request->gatewayid;
            $item->amount = $request->amount;
            $item->currency_text = $gset->currency_text;
            if ($request->hasFile('userprove')) {
                $item->prove = $request->userprove->hashName();
                $request->userprove->move(('assets/backend/upload/images/bank-prove'), $item->prove);
            }
            $item->note = $request->usernote;
            $item->status = 0;
            $item->unique_key = $key;
            $item->save();
            $status = 0;
            return $status;
        } else {
            return 'Something Went Worng. Please try again.';
        }
    }
}
    
