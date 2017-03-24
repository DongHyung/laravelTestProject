<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Member;
use function GuzzleHttp\json_decode;

class AuthController extends Controller
{
    
	use RegistersUsers;
	
	protected $validateChecker = [
    		'userId' => 'required|max:20',
    		'userName' => 'required|max:30',
    		'password' => 'required|min:8|confirmed',
    		'role' => 'required'
    ];
	
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/main';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /*
     * 계정 관리 페이지
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
	public function admin(Request $request)
    {
		$this->authorize('read', Member::class);
		
		$page = $request->get('page', 1);
		$params = $request->all();
    	$data = $this->parameterFiltered($params);
    	$member = new Member();
    	$member = $member->orderBy('regDate', 'desc');
    	
    	foreach ($data as $key => $value) {
    		if ($key == "userId" || $key == "userName") {
    			$member = $member->where($key, 'like', "%{$value}%");
    		} else {
    			$member = $member->where($key, $value);
    		}
    	}
    	
    	$members = $member->paginate(null, null, 'page', $page);
    	
    	foreach ($members as $member) {
    		$scopeString = '';
    		$scope = json_decode($member[ 'scope' ]);
   			foreach ($scope as $key => $value) {
   				if ($key == 'campaign' && count($value) > 0) {
   					$campaignString = '<p>캠페인 - '.join(', ', $value).'</p>';
   					$scopeString .= $campaignString;
   				}
   				if ($key == 'template' && count($value) > 0) {
   					$templateString = '<p>템플릿 - '.join(', ', $value).'</p>';
   					$scopeString .= $templateString;
   				}
   				if ($key == 'permission' && count($value) > 0) {
   					$permissionString = '<p>권한관리 - '.join(', ', $value).'</p>';
   					$scopeString .= $permissionString;
   				}
   			}
    		
    		$member[ 'scopeString' ] = $scopeString;
    	}    	
    	
        return view('auth.admin.main', [ 'members' => $members, 'request' => $request ]);
    }
    
    /*
     * 계정 권한 view 페이지
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function view(Request $request,Member $member)
    {
    	$this->authorize('read', Member::class);
    	
    	$member->scope = json_decode($member->scope);
    	return view('auth.admin.view', [ 'member' => $member, 'request' => $request ]);
    }
    
    /*
     * 계정 권한 수정
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function save(Request $request)
    {
    	$this->authorize('update', Member::class);
    	
    	if (empty($request->id)) {
    		return redirect()->back()->withErrors([ 'error' => '잘못된 접근입니다.\n계정 고유값이 없습니다.' ]);
    	}
    	
    	$scope = [
    			'campaign' => $request->get('campaign', []),
    			'template' => $request->get('template', []),
    			'permission' => $request->get('permission', []),
    	];
    	
    	$member = Member::where('id', $request->id)->update([ 'scope' => json_encode($scope) ]);
    	    	
    	return redirect('admin');
    }
    
    /*
     * 계정 생성 페이지
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * */
    public function showRegistrationForm(Request $request)
    {
    	$this->authorize('read', Member::class);
    	
    	return view('auth.admin.register', [ 'request' => $request ]);
    }
    
    /*
     * 계정 userId 중복 체크
     *
     * @param  \Illuminate\Http\Request  $request
     * @return boolean
     * */
    protected function isMember(Request $request) {
    	$userId = $request->userId;
    	
    	if (Member::where('userId', $userId)->exists()) {
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
    protected function validator(array $data, array $validateCheck = null)
    {
    	if (empty($validateCheck)) {
    		$validateCheck = $this->validateChecker;
    	}
    	
    	return Validator::make($data, $validateCheck);
    }
    
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function register(Request $request)
    {
    	$this->authorize('create', Member::class);
    	
    	$this->validator($request->all())->validate();
    	
    	event(new Registered($user = $this->create($request->all())));
    	
    	return redirect('admin');
    }
    
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Member
     */
    protected function create(array $data)
    {
    	$member = new Member;
    	$member->userId = $data['userId'];
    	$member->userName = $data['userName'];
    	$member->role = $data[ 'role' ];
    	$member->scope = json_encode(config('auth.roles.'.$data[ 'role' ]));
    	$member->password = bcrypt($data['password']);
    	$member->regDate = date('Y-m-d h:i:s');
    
    	$member->save();
    
    	return  $member;
    }
}
