<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



 /*Route::resource('/','ProductController@index');*/

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/admin', function(){
	return view('admin.index');
})->middleware('auth');


Route::group(['middleware' => ['web','auth','ckeckrole']], function () {
    //
    Route::resource('admin/users','AdminUsersController@index');

});



Route::group(['middleware'=>'web'], function(){

    Route::resource('/basketcart','ProductController');
    Route::get('/cart/{id}',['uses'=>'ProductController@show','as' =>'cart']);
   



});


Route::get('/',[
    'uses'=>'ProductController@index',
    'as'=>'checkout.done'

]);


Route::get('shop-cart-check',[
    'uses'=>'ProductController@getCart',
    'as'=>'shop.cart'

]);
Route::get('checkout',[
    'uses'=>'ProductController@getCheckout',
    'as'=>'checkout'

]);
Route::post('pay',[
    'uses'=>'ProductController@postCheckout',
    'as'=>'pay'

]);