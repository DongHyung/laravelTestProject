<?php

use App\Facades\Campaign;

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

Route::get('/', 'HomeController@index');
Route::get('/main', 'HomeController@index');

/*
 * 인증 모듈 router
 * /login
 * /register
 * */
Auth::routes();

Campaign::routes();