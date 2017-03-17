<?php

namespace App\Http\Controllers\Auth;

use App\Model\Member;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use function GuzzleHttp\json_encode;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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

    protected function isMember(Request $request) {
    	$userId = $request->userId;
    	
    	if (Member::where('userId', $userId)) {
    		return json_encode(false);
    	}
    	
    	return json_encode(true);
    }
    
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'userId' => 'required|max:20',
            'userName' => 'required|max:30',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {	
    	$member = new Member;
    	$member->userId = $data['userId'];
    	$member->userName = $data['userName'];
    	$member->role = $data[ 'role' ];
    	$member->scope = json_encode(config('auth.roles.administrator'));
    	$member->password = bcrypt($data['password']);
    	$member->regDate = date('Y-m-d h:i:s');
    	
    	var_dump($member->exists);
    	$member->save();
    	var_dump($member->exists);
    	
        return  $member;
    }
}
