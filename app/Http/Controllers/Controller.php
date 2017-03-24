<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected function parameterFiltered(array $parameter) {
    	$returnData = [];
    	 
    	foreach ($parameter as $key => $value) {
    		if (empty($value) || $key == '_token' || $key == '_method'  
    				|| $key == 'page' || $key == 'perPage') {
    			continue;
    		}
    		 
    		$returnData[ $key ] = $value;
    	}
    	
    	return $returnData;
    }
}
