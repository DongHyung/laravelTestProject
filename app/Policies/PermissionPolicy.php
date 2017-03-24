<?php

namespace App\Policies;

use App\Model\Member;
use App\Policies\RolePolicy;

class PermissionPolicy extends RolePolicy
{
	protected $roleScope = 'permission';
	
	/**
	 *
	 * @param  \App\Model\Member  $member
	 * @return mixed
	 */
	public function create(Member $member, $post = null)
	{
		if ($this->isPermission($member, $this->roleScope, 'create')) {
			return true;
		}
		 
		return false;
	}
	
	/**
	 *
	 * @param  \App\Model\Member  $member
	 * @return mixed
	 */
	public function read(Member $member)
	{
		if ($this->isPermission($member, $this->roleScope, 'read')) {
			return true;
		}
		
		return false;
	}
	
	/**
     * 
     * @param  \App\Model\Member  $member
     * @return mixed
     */
    public function update(Member $member)
    {
    	if ($this->isPermission($member, $this->roleScope, 'update')) {
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
    	if ($this->isPermission($member, $this->roleScope, 'delete')) {
    		return true;
    	}
    	
        return false;
    }
    
}
