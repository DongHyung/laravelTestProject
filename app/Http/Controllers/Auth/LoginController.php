<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Model\Member;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
    protected function redirectTo()
    {
    	return '/main';
    }
    
    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
    	return 'userId';
    }
    
    public function checkMember(Request $request) {
    	$member = Member::where('userId', $request->userId)->first();
    	
    	if (!isset($member->userId)) {
    		return json_encode([
    				'result' => 1001,
    				'message' => '회원이 존재하지 않습니다.'
    		]);
    	}
    	
    	if (!password_verify($request->password, $member->password)) {
    		return json_encode([
    				'result' => 1002,
    				'message' => '비밀번호가 다릅니다.'
    		]);
    	}
    	
    	return json_encode([
    			'result' => 0
    	]);
    }
    
    /*
     * 로그인 성공 시 완료 처리
     * */
	public function authenticated(Request $request, $user)
    {
        $request->session()->put('member', $user);
    }
}
