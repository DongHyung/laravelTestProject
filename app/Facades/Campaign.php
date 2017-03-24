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
		Route::get('campaign', 'CampaignController@index')->name('campaign');
		
		Route::get('campaign/view/{campaign}', 'CampaignController@show')->name('campaign.view');
		Route::get('campaign/register', 'CampaignController@register')->name('campaign.register');
		
		Route::post('campaign', 'CampaignController@store');
		Route::put('campaign', 'CampaignController@update');
	}
}