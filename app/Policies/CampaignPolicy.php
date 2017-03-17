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
    public function update(Member $member, $post = null)
    {
    	if ($this->manager($member) 
    			|| ($post->userId == $member->getAttribute('userId') 
    				&& $this->isPermission($member->role, 'campaign', 'update'))) {
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
    	if ($this->manager($member) || $post->userId == $member->getAttribute('userId')) {
    		return true;
    	}
    	
        return false;
    }
    
    /**
     *
     * @param  \App\Model\Member  $member
     * @return mixed
     */
    public function approve(Member $member)
    {
    	if ($this->manager($member)) {
    		return true;
    	}
    	
    	return false;
    }
    
}
