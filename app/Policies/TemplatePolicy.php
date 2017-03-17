<?php

namespace App\Policies;

use App\Model\Member;

class TemplatePolicy extends RolePolicy
{
	/**
     * 
     * @param  \App\Model\Member  $member
     * @return mixed
     */
    public function update(Member $member, $post = null)
    {
    	if ($this->manager($member) || $post->user_id == $member->getAttribute('id')) {
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
