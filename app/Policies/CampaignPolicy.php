<?php

namespace App\Policies;

use App\Model\Member;

class CampaignPolicy extends RolePolicy
{
	/**
	 *
	 * @param  \App\Model\Member  $member
	 * @return mixed
	 */
	public function create(Member $member) {
		return true;
	}
	
	/**
	 *
	 * @param  \App\Model\Member  $member
	 * @return mixed
	 */
	public function read(Member $member) {
		return true;
	}
	
	/**
     * 
     * @param  \App\Model\Member  $member
     * @return mixed
     */
    public function update(Member $member, $post = null)
    {
    	if ($this->manager($member)) {
    		return true;
    	}
    	
        return false;
    }

    /**
     *
     * @param  \App\Model\Member  $member
     * @return mixed
     */
    public function delete(Member $member, $post = null)
    {
    	if ($this->manager($member)) {
    		return true;
    	}
    	
        return false;
    }
    
    /**
     *
     * @param  \App\Model\Member  $member
     * @return mixed
     */
    public function approve(Member $member, $post = null)
    {
    	if ($this->manager($member)) {
    		return true;
    	}
    	
    	return false;
    }
    
}
