<?php
/* Frontend Routes */
Route::get('cron','paymentController@blockio')->name('blockio.payment');
Auth::routes();
Route::get('/', 'userController@frontPage')->name('home');

Route::get('aboutUs', 'userController@about')->name('about');

Route::get('causes','userController@cause')->name('cause');
Route::get('cause/{id}','userController@singleCause')->name('single.cause');

Route::get('event','userController@event')->name('event');
Route::get('event/{id}','userController@singleEvent')->name('single.event');

Route::get('blog','userController@blog')->name('blog');
Route::get('post/{id}','userController@post')->name('post');

Route::view('contact', 'frontend.user.contact')->name('contact');
Route::post('contactEmail', 'userController@contactEmail')->name('contact.email');

Route::get('page/{page}', 'userController@page')->name('page');

Route::post('subscription','userController@subscription')->name('subscribe');
Route::post('volunteer/form','userController@volunteer')->name('join.us');

Route::post('DepositNow', 'userController@depoAnno')->name('deposit.anno');
Route::post('bankRequest', 'userController@depositBank')->name('deposit.bankreq');

Route::post('purchaseNow', 'userController@depositStore')->name('deposit.store');
Route::post('purchaseRequest', 'userController@depositBankStore')->name('deposit.bank');
Route::post('Payment','paymentController@stripePayment')->name('stripe.payment');
Route::view('paypal', 'frontend.payment.paypal')->name('front.paypal');
Route::post('Payment/paypal','paymentController@paypalPayment')->name('paypal.payment');
Route::view('PM','frontend.payment.perfect')->name('front.perfect');
Route::post('Payment/PM','paymentController@pmPayment')->name('pm.payment');
Route::view('bitcoin','frontend.payment.bitcoin')->name('front.bitcoin');
Route::get('Payment/btc','paymentController@btcPayment')->name('btc.payment');
Route::view('skrill','frontend.payment.skrill')->name('front.skrill');
Route::post('Payment/skrill','paymentController@skrillPayment')->name('skrill.payment');
Route::get('coingate', 'paymentController@coinGate')->name('coingate');
Route::post('Payment/coingate','paymentController@coinGatePayment')->name('coingate.payment');
Route::view('coinPay','frontend.payment.coinpay')->name('coinPay');
Route::post('Payment/coinPay','paymentController@coinPayPayment')->name('coinPay.payment');
Route::view('blockio','frontend.payment.blockio')->name('blockio');

/* Backend Routes */
Route::group(['prefix' => 'admin'], function () {
Route::middleware(['admin'])->group(function () {
    Route::get('dashboard', 'adminController@index')->name('admin.dashboard');

    Route::get('myProfile','adminController@profile')->name('admin.profile');
    Route::post('myProfile_update','adminController@updateprofile')->name('admin.updateprofile');

    Route::get('changePass','adminController@changePass')->name('admin.changepass');
    Route::post('password_Update', 'adminController@updatepass')->name('admin.updatepass');

    Route::resource('menu','menuManagerController');
    Route::post('menu/delete', 'menuManagerController@destroy')->name('menu.delete');

    route::get('slider/index','sliderController@index')->name('slider.index');
    route::post('slider/store', 'sliderController@store')->name('slider.store');
    route::post('slider/delete','sliderController@destroy')->name('slider.delete');

    route::get('whoWe','whoweController@index')->name('whowe.index');
    Route::get('createWhoWe', 'whoweController@create')->name('create.whowe');
    Route::post('storeWhoWe', 'whoweController@store')->name('store.whowe');
    Route::get('editWhoWe/{id}', 'whoweController@edit')->name('edit.whowe');
    Route::put('updateWhoWe/{id}', 'whoweController@update')->name('update.whowe');
    Route::post('deleteWhoWe', 'whoweController@delete')->name('delete.whowe');

    route::get('aboutUs', 'aboutUsController@index')->name('about.index');
    route::post('aboutUs', 'aboutUsController@store')->name('about.store');

    Route::get('history', 'historyController@index')->name('history');
    Route::get('createHistory', 'historyController@create')->name('create.history');
    Route::post('storeHistory', 'historyController@store')->name('store.history');
    Route::get('editHistory/{id}', 'historyController@edit')->name('edit.history');
    Route::put('updateHistory/{id}', 'historyController@update')->name('update.history');
    Route::post('deleteHistory', 'historyController@delete')->name('delete.history');
    
    route::get('logoicon/index','logoIconController@index')->name('logoIcon.index');
    route::post('logoicon/update', 'logoIconController@update')->name('logoIcon.update');

    Route::get('/testimonial', 'testimonialController@index')->name('testimonial');
    Route::post('/testimonial', 'testimonialController@store')->name('testim.store');
    Route::put('/testimonial/{testim}', 'testimonialController@update')->name('testim.update');
    Route::post('/testimonialDelete', 'testimonialController@destroy')->name('testim.destroy');

    route::get('sponsor', 'sponsorController@index')->name('sponsor.list');
    route::post('sponsor/store', 'sponsorController@store')->name('sponsor.store');
    route::post('sponsor/delete', 'sponsorController@delete')->name('sponsor.delete');

    route::get('social', 'socialController@index')->name('social.index');
    route::post('social/store', 'socialController@store')->name('social.store');
    route::post('social/delete', 'socialController@destroy')->name('social.delete');
    
    Route::resource('donate','donateController');
    Route::post('donateDelete','donateController@delete')->name('donate.delete');

    Route::resource('cause','causeController');
    Route::post('causeDelete','causeController@delete')->name('cause.delete');

    Route::resource('event','eventController');
    Route::post('eventDelete','eventController@delete')->name('event.delete');

    Route::resource('blog','blogController');
    Route::post('blogDelete','blogController@delete')->name('blog.delete');
    Route::post('Facebook/AppId','blogController@appId')->name('fb.appId');

    route::get('section/index','sectionController@index')->name('section.index');
    route::post('section/store','sectionController@store')->name('section.store');

    route::get('contact', 'contactController@index')->name('contact.index');
    route::post('contact/store', 'contactController@store')->name('contact.store');

    route::get('footer/index','footerController@index')->name('footer.index');
    route::post('footer/store','footerController@store')->name('footer.store');
    
    route::get('generalsettings', 'generalSettingsController@index')->name('general.index');
    route::post('generalsettings/store', 'generalSettingsController@store')->name('general.store');

    route::get('email/template', 'emailController@index')->name('email.index');
    route::post('email/store', 'emailController@store')->name('email.store');
    
    route::get('gatewayList', 'depositController@gatewayIndex')->name('gateway.index');
    route::post('gatewayStore', 'depositController@gatewayStore')->name('gateway.store');
    route::post('gatewayListUpdate', 'depositController@gatewayUpdate')->name('gateway.update');

    route::get('depositPendingList', 'depositController@depositPendingList')->name('pendingDeposite.list');
    route::get('depositPendingListDetails/{id}', 'depositController@depositPendingListDetails')->name('pendingDeposite.details');
    route::post('depositApprove', 'depositController@depositApprove')->name('deposit.Approve');
    route::get('depositList', 'depositController@depositList')->name('deposit.list');
    
    Route::get('subscribers','subcribeController@subscription')->name('subscribers');
    Route::get('userSubscription', 'subcribeController@userSubscription')->name('user.subs');
    Route::post('subscriptionMail', 'subcribeController@subscriptionMail')->name('subs.mail');
    Route::post('unSubscribe', 'subcribeController@unSubscribe')->name('user.unsubs');

    Route::get('voluteers','volunteerController@volunteerList')->name('volunteer.list');
    Route::post('voluteerEdit','volunteerController@voluteerEdit')->name('volunteer.edit');
    Route::get('voluteerEmail','volunteerController@volunteerEmail')->name('volunteer.email');
    Route::post('voluteerSendEmail','volunteerController@volunteerEmailSend')->name('volunteer.send');
    Route::get('voluteerEmail/{id}','volunteerController@volunteerPersonalEmail')->name('volunteer.personalemail');
    Route::post('voluteerEmailSend/{id}','volunteerController@volunteerPersonalEmailSend')->name('volunteer.personalemailsend');
    Route::post('voluteerEmailSend/{id}','volunteerController@volunteerPersonalEmailSend')->name('volunteer.personalemailsend');
    Route::post('voluteerRemove','volunteerController@voluteerRemove')->name('volunteer.delete');
    Route::get('voluteersPendingList','volunteerController@volunteerPendingList')->name('voluteer.pendinglist');
    Route::get('voluteerDetails/{id}','volunteerController@volunteerPendingdetails')->name('voluteer.pendingdetails');
    Route::PUT('voluteerApprove/{id}','volunteerController@voluteerApprove')->name('voluteer.approve');
});

  Route::get('/', 'AdminAuth\LoginController@showLoginForm')->name('admin.login.form');
  Route::post('/', 'AdminAuth\LoginController@login')->name('admin.login');
  Route::get('/logout', 'AdminAuth\LoginController@logout')->name('admin.logout');

});

