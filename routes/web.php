<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//The default welcome screen
/*Route::get('/', function () {
    return view('marketmenu');
});*/
//payment
Route::get('/payment',
['uses'=>'PaymentController@getPayment',
'as'=>'front.payment']);

//usertype
Route::prefix('usertype')->group(function(){

    Route::get('/','UserTypeController@index')->name('usertype.dashboard');
    Route::get('/create', 'UserTypeController@create')->name('usertype.create');
    Route::post('/create', 'UserTypeController@store')->name('usertype.store');
    Route::get('/show/{id}', 'UserTypeController@show')->name('usertype.show');
    Route::get('/edit/{id}', 'UserTypeController@edit')->name('usertype.edit');
    Route::put('/edit/{id}', 'UserTypeController@update')->name('usertype.update');
    Route::delete('/delete/{id}', 'UserTypeController@destroy')->name('usertype.delete');

});

//staff
Route::prefix('staff')->group(function(){
Route::get('/','StaffController@index')->name('staff.dashboard');
Route::get('/login','Auth\StaffLoginController@showLoginForm')->name('staff.login');
Route::post('/login','Auth\StaffLoginController@login')->name('staff.login.submit');
Route::get('/logout','Auth\StaffLoginController@staffLogout')->name('staff.logout');
});

//admin
Route::prefix('admin')->group(function(){
Route::get('/','AdminController@index')->name('admin.dashboard');
Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.alogout');

//Password Reset Routes
Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

});

//Organization CRUD
Route::prefix('org')->group(function(){
Route::get('/', 'OrgController@getOrganization')->name('org.dashboard');
Route::get('/create', 'OrgController@createOrganization')->name('org.create');
Route::post('/create', 'OrgController@store')->name('org.create.submit');
Route::get('/show/{id}', 'OrgController@show')->name('org.show');
Route::get('/edit/{id}', 'OrgController@edit')->name('org.edit');
Route::put('/edit/{id}', 'OrgController@update')->name('org.update');
Route::delete('/delete/{id}', 'OrgController@destroy')->name('org.delete');
//organization market
Route::get('/market','OrgMarketController@index')->name('front.orgmarket');
Route::get('/details/{id}','OrgMarketController@show')->name('front.orgdetails');
});

//Artist CRUD
Route::prefix('artist')->group(function(){
Route::get('/','ArtistController@getArtist')->name('artist.dashboard');
   Route::get('/create','ArtistController@createArtist')->name('artist.create');
   Route::post('/create','ArtistController@store')->name('artist.create.submit');
   Route::get('/show/{id}','ArtistController@show')->name('artist.show');
   Route::get('/edit/{id}','ArtistController@edit')->name('artist.edit');
   Route::put('/edit/{id}','ArtistController@update')->name('artist.update');
   Route::delete('/delete/{id}','ArtistController@destroy')->name('artist.delete');

   //Show organization of artist
   Route::get('/market','ArtistController@index')->name('front.artist');
   Route::get('/details/{id}','ArtistController@show1')->name('front.artistdetails');
});
//Handicraft CRUD
Route::prefix('handicraft')->group(function(){
   Route::get('/','HandicraftController@index')->name('hand.dashboard');
   Route::get('/create','HandicraftController@createHand')->name('hand.create');
   Route::post('/create','HandicraftController@store')->name('hand.create.submit');
   Route::get('/show/{id}','HandicraftController@show')->name('hand.show');
   Route::get('/edit/{id}','HandicraftController@edit')->name('hand.edit');
   Route::put('/edit/{id}','HandicraftController@update')->name('hand.update');
   Route::delete('/delete/{id}','HandicraftController@destroy')->name('hand.delete');
});

//Service CRUD
Route::prefix('service')->group(function(){
    Route::get('/','ServiceController@index')->name('service.dashboard');
    Route::get('/create','ServiceController@createService')->name('service.create');
    Route::post('/create','ServiceController@store')->name('service.create.submit');
    Route::get('/show/{id}','ServiceController@show')->name('service.show');
    Route::get('/edit/{id}','ServiceController@edit')->name('service.edit');
    Route::put('/edit/{id}','ServiceController@update')->name('service.update');
    Route::delete('/delete/{id}','ServiceController@destroy')->name('service.delete');
});

//Event CRUD
Route::prefix('event')->group(function(){

    Route::get('/','EventController@index')->name('event.dashboard');
    Route::get('/create','EventController@createEvent')->name('event.create');
    Route::post('/create','EventController@store')->name('event.create.submit');
    Route::get('/show/{id}','EventController@show')->name('event.show');
    Route::get('/edit/{id}','EventController@edit')->name('event.edit');
    Route::put('/edit/{id}','EventController@update')->name('event.update');
    Route::delete('/delete/{id}','EventController@destroy')->name('event.delete');

});

//Feedback CRUD
Route::prefix('feedback')->group(function(){
    Route::get('/','FeedbackController@index')->name('feedback.dashboard');
    Route::get('/create','FeedbackController@createFeed')->name('feedback.create');
    Route::post('/create','FeedbackController@store')->name('feedback.create.submit');
    Route::get('/show/{id}','FeedbackController@show')->name('feedback.show');
    Route::get('/edit/{id}','FeedbackController@edit')->name('feedback.edit');
    Route::put('/edit/{id}','FeedbackController@update')->name('feedback.update');
    Route::delete('/delete/{id}','FeedbackController@destroy')->name('feedback.delete');
});

//main
Route::get('/','FrontController@index');
//Route::get('/product',
//['uses'=>'HandicraftController@getHandicraft',
//'as'=>'front.product']);

//addcart
Route::get('/add-to-cart/{id}',[
    'uses' => 'HandicraftController@getAddToCart',
    'as' => 'front.addToCart'
]);

Route::get('/shopping-cart',[
    'uses' => 'HandicraftController@getCart',
    'as' => 'front.shoppingCart'
]);

//ReduceOneItem
Route::get('/reduce/{id}',[
    'uses' => 'HandicraftController@getReduceByOne',
    'as' => 'front.reduceByOne'
]);

//RemoveAllItem
Route::get('/remove/{id}',[
    'uses' => 'HandicraftController@getRemoveItem',
    'as' => 'front.remove'
]);

//master
Route::get('/master','FrontController@master');

Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware'=>'guest'],function(){
    //register->signup
    Route::get('/signup',[
    'uses'=>'UserController@getSignup',
    'as' => 'user.signup'
    ]);

    Route::post('/signup',[
        'uses' => 'UserController@postSignup',
        'as' => 'user.signup'
    ]);

    //register->signin
    Route::get('/signin',[
        'uses'=>'UserController@getSignin',
        'as' => 'user.signin'

    ]);
    Route::post('/signin',[
        'uses' => 'UserController@postSignin',
        'as' => 'user.signin'

    ]);
});
Route::group(['middleware'=>'auth'],function(){
    //profile
    Route::get('/profile',[
    'uses'=>'UserController@getProfile',
    'as' => 'user.profile'
    ]);
  //logout
    Route::get('/logout',[
        'uses' => 'Auth\LoginController@userLogout',
        'as' => 'user.ulogout'
    ]);
    });
});


//This URL brings you to TestDB controller's index page for testing your DB connection settings.
Route::get('/testdb', 'TestDBController@index');
Auth::routes();

//resources routes
Route::resource('store','StoreController');

Route::resource('product','ProductController');

Route::resource('cartItem','CartItemController');

//Route::resource('cartItem','PaymentController');

Route::get('/store/{id?}/addnewproduct',['as'=>'store.addNewProduct', 'uses'=>'StoreController@addNewProduct']);

Route::get('/store/{id?}/addnewservice',['as'=>'store.addNewService', 'uses'=>'StoreController@addNewService']);

Route::get('/store/{id?}/addnewevent',['as'=>'store.addNewEvent', 'uses'=>'StoreController@addNewEvent']);

Route::get('/org/{id?}/addnewstore',['as' => 'organization.addNewStore','uses'=> 'OrgController@addNewStore']);

Route::post('/searchProduct','ProductController@searchProduct');

Route::put('/addtocart/{id?}',['as' => 'product.addToCart','uses'=> 'ProductController@addToCart']);



//Route to request page
Route::get('/request', function () {
    return view('payment.request');
});

//Route to response page
Route::get('/response', function () {
    return view('payment.response');
});

//Route to requery page
Route::get('/requery', function () {
    return view('payment.requery');
});

Route::get('/ipay88', function () {
    return view('payment.Ipay88');
});

Route::get('/getProductDetails', function () {
    return view('front.payment');
});

/*Route::get('/fakepaymentresponse', function () {
    return view('payment.fakepaymentresponse');
});*/

/*Route::get('/entry', function () {
    return view('https://www.mobile88.com/epayment/entry.asp');
});*/

Route::get('/fakepaymentresponse','PaymentController@getUserInput');

Route::get('/fakepaymentresponse','PaymentController@getPaymentDetails');

Route::get('/getProductDetails','PaymentController@getProductDetails');

Route::post('/response','PaymentController@getMerchantDetails');

Route::get('/fakepaymentresponse',
['uses'=>'PaymentController@getPaymentResponse',
'as'=>'front.fakepaymentresponse']);

Route::get('/fakepaymentresponse',
['uses'=>'PaymentController@getPaymentDetails',
'as'=>'front.fakepaymentresponse']);

Route::get('/getProductDetails',
['uses'=>'PaymentController@getProductDetails',
'as'=>'front.payment']);
//Route::post('/entry', 'PaymentController@postPaymentDetails');
