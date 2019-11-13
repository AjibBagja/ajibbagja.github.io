<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application/ These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group/ Now create something great!
|
*/

Route::get('/','SiteController@index');
Route::get('i','SiteController@items');

Route::get('logout',"AccountController@logout");
Route::get('account/login',"AccountController@loginindex");
Route::post('account/login',"AccountController@login");
Route::get('account/register',"AccountController@registerindex");
Route::post('account/register',"AccountController@register");
Route::get('account/rsuccess','AccountController@rsuccess');
Route::get('account/verify','AccountController@verifPage');
Route::get('account/resetpass','AccountController@resetPassPage');
Route::post('account/resetpass','AccountController@resetPassSearch');
Route::get('account/resetpass/{code}','AccountController@resetPassInput');
Route::post('account/resetpass/{code}','AccountController@resetPassValidate');
Route::post('account/resend/{id}','AccountController@resendVerif');
Route::get('account/activation/{code}',"AccountController@activateAccount");

Route::get('i/{id}',"BuyerController@detail_item");
Route::get('cart',"BuyerController@cart");
Route::post('mutasibanknotif',"SiteController@mutasibanknotif");

Route::group(['middleware' => 'mustlogin','as'=>'transaction'],function(){
	Route::post('o',"TransaksiController@beliItem");
	Route::get('o/status','TransaksiController@statusBuyer');
	Route::get('t/{id}',"TransaksiController@detTrans");
	Route::get('t/d/{id}',"TransaksiController@deleteTrans");
	Route::get('c/add/{id}',"TransaksiController@addCart");
	Route::get('c/delete/{id}',"TransaksiController@deleteCart");
	Route::get('c/deleteall',"TransaksiController@deleteallCart");
	Route::get('checkout',"BuyerController@checkout");
	Route::post('checkout',"TransaksiController@checkoutCart");
});
Route::group(['middleware' => 'mustlogin','as'=>'seller','prefix'=>'seller'],function(){
	Route::get('', "SellerPageController@dashboard");
	
	Route::group(['as'=>'items','prefix'=>'items'],function(){
		Route::get("","ItemController@index");
		Route::post("add","ItemController@add");
		Route::get("add","ItemController@addPage");
		Route::get('delete/{id}',"ItemController@delete");
		Route::post("refresh","ItemController@refreshContent");
		Route::get("detail/{id}","ItemController@detail");
		Route::get("edit/{id}","ItemController@edit");
		Route::post("update/{id}","ItemController@update");
	});
	
	Route::group(['as'=>'orders','prefix'=>'orders'],function(){
		Route::get('',"SellerPageController@transaksi");
		Route::get('history',"TransaksiController@orderHistory");
		Route::get('{id}',"TransaksiController@detailTrans");
	});
	Route::get('porders/{id}',"TransaksiController@processOrder");

	Route::group(['as'=>'withdrawal','prefix'=>'withdrawal'],function(){
		Route::get('',"TransaksiController@withDrawalPage");
		Route::post('request',"TransaksiController@requestWithdrawal");
	});
});

Route::group(['middleware'=>'mustlogin'],function(){
	Route::get('notif',function(){return view('general/notif');});
	Route::get('notif/{id_notif}',"SiteController@redirectNotif");
	Route::get('notif/readall',"SiteController@readAllNotif");
	Route::post('sendchat',"ChatController@sendChat");
	Route::group(['prefix'=>'chat'],function(){
		Route::get('',"ChatController@index");
		Route::get('{id}',"ChatController@getConversation");
	});
});