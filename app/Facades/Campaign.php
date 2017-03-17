<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Route;

class Campaign extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'campaign';
	}
	
	public static function routes()
	{
		Route::get('campaign', 'CampaignController@index');
		Route::get('campaign/edit/{campaign?}', 'CampaignController@edit');
		
		Route::post('campaign', 'CampaignController@store')->name('campaign');
		Route::put('campaign', 'CampaignController@update')->name('campaign');
	}
}