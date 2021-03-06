<?php
//Validator::extend('unique_fields', 'App\Extension\Validation\CustomValidator@accounts');
Validator::extend('unique_fields', function($attribute, $value, $parameters){
	// Get table name from first parameter
	$table = array_shift($parameters);
	$query = Account::where('carrier',$parameters[0])
		->where('username',$parameters[1])
		->count();

	return ($query == 0);
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/',function(){
	return Redirect::route('dashboard');
});

Route::group(['before' => 'guest'], function(){
	Route::controller('password', 'RemindersController');
	Route::get('login', ['as'=>'login','uses' => 'AuthController@login']);
	Route::post('login', array('uses' => 'AuthController@doLogin'));
});

Route::group(array('before' => 'auth'), function()
{

	Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@logout']);
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'AuthController@doChangePassword'));


});

Route::group(array('before' => 'auth|AdminOrSuperAdmin'), function()
{
	Route::get('userInfo',['as' => 'user.info','uses' => 'AuthController@userInfo']);

	Route::get('customers',['as' => 'customer.index', 'uses' => 'CustomerController@index']);
	Route::get('customer/create',['as' => 'customer.create', 'uses' => 'CustomerController@create']);
	Route::post('customer/create',['as' => 'customer.store', 'uses' => 'CustomerController@store']);
	Route::get('customer/{id}/edit',['as' => 'customer.edit', 'uses' => 'CustomerController@edit']);
	Route::delete('customers/{id}',['as' => 'customer.delete', 'uses' => 'CustomerController@destroy']);

	//Customer Update Module
	Route::put('customer/{id}',['as' => 'customer.update', 'uses' => 'CustomerController@update']);
	Route::put('customer/billing/{id}',['as' => 'customer.update.billing', 'uses' => 'CustomerController@updateBilling']);
	Route::put('customer/sales/{id}',['as' => 'customer.update.sales', 'uses' => 'CustomerController@updateSales']);


	//Customer Based Accounts
	Route::get('customer/{customer}/accounts',['as' => 'customer.accounts.index', 'uses' => 'CustomerAccountController@index']);
	Route::get('customer/{customer}/accounts/create',['as' => 'customer.accounts.create', 'uses' => 'CustomerAccountController@create']);
	Route::post('customer/{customer}/accounts/create',['as' => 'customer.accounts.store', 'uses' => 'CustomerAccountController@store']);
	Route::get('customer/{customer}/accounts/{account}/edit',['as' => 'customer.accounts.edit', 'uses' => 'CustomerAccountController@edit']);
	Route::put('customer/{customer}/accounts/{account}',['as' => 'customer.accounts.update', 'uses' => 'CustomerAccountController@update']);
	Route::delete('customer/{customer}/accounts/{account}',['as' => 'customer.accounts.delete', 'uses' => 'CustomerAccountController@destroy']);

	//Carrer Accounts
	Route::get('accounts',['as' => 'accounts.index', 'uses' => 'AccountController@index']);
	Route::get('accounts/{account}/edit',['as' => 'accounts.edit', 'uses' => 'AccountController@edit']);
	Route::put('accounts/{account}',['as' => 'accounts.update', 'uses' => 'AccountController@update']);


});

Route::get('test',function(){
//	$result = BrowserDetect::detect();
//	return $result;
	//return  Request::getClientIp();
	//$user = Auth::user();
	dd(Auth::user()->ability([Config::get('customConfig.roles.superAdmin'),Config::get('customConfig.roles.admin')], [])) ;

});