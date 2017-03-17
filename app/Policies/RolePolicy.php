<?php

namespace App\Policies;

use App\User;
use App\Model\Member;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

	public function before($member, $ability) 
	{
		if ($this->administrator($member)) {
			return true;
		}
	}
    /**
     * Determine whether the user can view the member.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Member  $member
     * @return mixed
     */
    public function administrator(Member $member)
    {    	
        return $member->isAdministrator();
    }

    /**
     * Determine whether the user can create members.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function manager(Member $member)
    {
    	if ($member->getAttribute('role') == "manager") {
    		return true;
    	}
    	
        return false;
    }

    /**
     * Determine whether the user can update the member.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Member  $member
     * @return mixed
     */
    public function user(Member $member)
    {
        if ($member->getAttribute('role') == 'user') {
    		return true;
    	}
    		
        return false;
    }

    protected function isPermission($role, $type, $scope) {
    	$campaignScope = config('auth.roles.{$role}.{$type}');
    	print_r($campaignScope);
    	if (in_array($scope, $campaignScope)) {
    		return true;
    	}
    	 
    	return false;
    }
}
