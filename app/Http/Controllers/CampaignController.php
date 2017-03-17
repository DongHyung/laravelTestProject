<?php

namespace App\Http\Controllers;

use App\Model\Campaign;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use function GuzzleHttp\json_encode;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('campaign.main', [ 'campaigns' => Campaign::all() ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$parameters = $request->all();
    	
    	$campaign = new Campaign();
    	
    	foreach ($parameters as $key => $value) {
    		if ($key == '_token' || $key == 'id') continue;
    		
    		if ($key == 'schedule') {
    			$campaign->{$key} = json_encode($value);
    			continue;
    		}
    		
    		$campaign->{$key} = $value;
    	}
    	
    	$campaign->regDate = date('Y-m-d h:i:s');
    	$campaign->save();    		
    	
    	return redirect('campaign');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(Campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit(Campaign $campaign)
    {
    	$pass = app('hash')->make('123');
    	return view('campaign.edit', [ 'campaign' => $campaign, 'hash' => app('hash')->make('123'), 'pass' => app('hash')->check('123', $pass) ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Campaign $campaigns)
    {
    	$parameters = $request->all();
    	
    	$campaign = new Campaign();
    	 
    	foreach ($parameters as $key => $value) {
    		if ($key == '_token' || $key == '_method') continue;
    	
    		if ($key == 'schedule') {
    			$campaign->{$key} = json_encode($value);
    			continue;
    		}
    	
    		$campaign->{$key} = $value;
    	}
    	$campaign->uptDate = date('Y-m-d h:i:s');
    	
    	Campaign::where('id', $campaign->id)->update($campaign->toArray());
    	
    	return redirect('campaign');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }
}
