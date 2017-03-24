<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
	use Notifiable;
	
	/*
	 * 테이블 명
	 * */
	protected $table = 'member';
		
	protected $rememberTokenName = 'rememberToken';
	
	protected $perPage = 5;
	
	public $timestamps = false;
		
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
			'password', 'rememberToken',
	];
	
	public function isAdministrator() {
		return $this->getAttribute('role') == 'administrator'; 
	}
}