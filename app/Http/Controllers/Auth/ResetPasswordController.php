<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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
        $this->middleware('guest');
    }
    
    public function showResetForm(Request $request, $token = null)
    {
    	return view('auth.passwords.reset')->with(
    			['token' => $token, 'userId' => $request->userId]
    			);
    }
    
    protected function rules()
    {
    	return [
    			'token' => 'required',
    			'userId' => 'required|userId',
    			'password' => 'required|confirmed|min:6',
    	];
    }
    
    protected function credentials(Request $request)
    {
    	return $request->only(
    			'userId', 'password', 'passwordConfirmation', 'token'
    			);
    }
    
    protected function resetPassword($user, $password)
    {
    	$user->forceFill([
    			'password' => bcrypt($password),
    			'rememberToken' => Str::random(60),
    	])->save();
    
    	$this->guard()->login($user);
    }
    
    protected function sendResetFailedResponse(Request $request, $response)
    {
    	return redirect()->back()
    	->withInput($request->only('userId'))
    	->withErrors([ 'userId' => trans($response) ]);
    }
}
