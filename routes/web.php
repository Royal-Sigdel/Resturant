<?php

use App\Http\Controllers\DataReader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/profile', 'UserController@profile');
    Route::post('/profile', 'UserController@update_avatar');
    Route::get('/restos','RestaurantController@index')->name('restos');
    Route::get('/restos/menu/{no}','MenuController@index')->name('restos.menu');
    Route::get('/table/orders/{no}','RestaurantOrderController@index')->name('restos.order');
    Route::get('/table/orders/{no}/add','RestaurantOrderController@add')->name('restos.order.add');
    Route::get('/requestqr','QRController@getblade')->name('qrcode');
});

