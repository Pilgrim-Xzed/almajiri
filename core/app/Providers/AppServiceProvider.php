<?php

namespace App\Providers;

use App\AboutUs;
use App\Donate;
use App\generalsetting;
use App\getway;
use App\logoicon;
use App\contact;
use App\footer;
use App\slider;
use App\social;
use App\menuManagement;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

if (Schema::hasTable('generalsettings')) {
    $gset = generalsetting::first();
}
        $logo = logoicon::first();
        $contact = contact::first();
        $footer = footer::first();
        $socials = social::all();
        $menus = menuManagement::all();
        $sliders = slider::inRandomOrder()->take(3)->get();
        $donates = Donate::orderBy('amount', 'ASC')->get();
        $gates = getway::where('status', 1)->orderBy('id', 'ASC')->get();
        $about = AboutUs::first();
        $btc = file_get_contents('https://blockchain.info/ticker');
        $usd = json_decode($btc);
        $btcrt = $gset->conversion_rate * $usd->USD->last;
        view()->share(compact('gset', 'logo', 'contact', 'footer', 'socials', 'menus', 'sliders', 'donates', 'gates', 'about', 'btcrt'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
