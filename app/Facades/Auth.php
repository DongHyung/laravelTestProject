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
        
        Route::post('checkMember', 'Auth\LoginController@checkMember');

        Route::get('admin', 'Auth\AuthController@admin')->name('admin');
        Route::get('admin/view/{member}', 'Auth\AuthController@view')->name('admin.view');
        Route::post('admin/save', 'Auth\AuthController@save')->name('admin.save');
        Route::get('admin/register', 'Auth\AuthController@showRegistrationForm')->name('register');
        Route::post('admin/register', 'Auth\AuthController@register');
        
        Route::get('isMember', 'Auth\AuthController@isMember');
        Route::post('isMember', 'Auth\AuthController@isMember');

        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
        
	}
}