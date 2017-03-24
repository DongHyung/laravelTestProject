<?php

namespace App\Http\Controllers;

use App\Model\Campaign;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use function GuzzleHttp\json_encode;
use function GuzzleHttp\json_decode;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    	$params = $request->all();
    	$data = $this->parameterFiltered($params);
    	$campaigns = new Campaign();
    	$campaigns = $campaigns->orderBy('regDate', 'desc');
    	
    	foreach ($data as $key => $value) {
    		if ($key == "title" || $key == "mailSubject" || $key == "sendType") {
    			$campaigns = $campaigns->where($key, 'like', "%{$value}%");
    		} else {
    			$campaigns = $campaigns->where($key, $value);
    		}
    	}
    	
    	$campaigns = $campaigns->get();
    	
    	foreach ($campaigns as $campaign) {
    		$schedule = json_decode($campaign[ 'schedule' ]);
    		
    		foreach ($schedule as $key => $value) {
    			
    		}
    	}
    	
        return view('campaign.main', [ 'campaigns' => $campaigns, 'request' => $request ]);
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
    	$campaign = $campaign->join('template', 'campaign.id', '=', 'template.campaignId')->get();
    	
        return view('campaign.view', [ 'campaigns' => $campaign ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
    	return view('campaign.register');
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
