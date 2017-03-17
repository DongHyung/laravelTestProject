<?php

namespace App\Facades;

// use Illuminate\Support\Facades\Auth as FacadeAuth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;

class Auth extends Facade
{	
	protected static function getFacadeAccessor()
	{
		return 'auth';
	}
	
	public static function routes()
	{
		Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout')->name('logout');

        Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
        Route::post('isMember', 'Auth\RegisterController@isMember');
        Route::post('register', 'Auth\RegisterController@register');

        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
	}
}