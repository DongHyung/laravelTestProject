<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model 
{
	
	/*
	 * 테이블 명
	 * */
	protected $table = 'member';
	
	/*
	 * column user_id
	 * @var string
	 * */
	private $user_id;
	
	/*
	 * column user_name
	 * @var string
	 * */
	private $user_name;
	
	/*
	 * column password
	 * @var string
	 * */
	private $password;
	
	/*
	 * column role
	 * @var string
	 * */
	private $role;
	
	/*
	 * column scope
	 * @var array
	 * */
	private $scope;
	
	/*
	 * 등록 날짜, 업데이트 날짜 컬럼 지정
	 * @var date
	 * */
	const CREATE_AT = 'reg_dt';
	const UPDATE_AT = 'upt_dt';
}