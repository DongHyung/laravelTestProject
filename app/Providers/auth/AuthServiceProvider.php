<?php

namespace App\Providers\Auth;

use Illuminate\Auth\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    	// 재정의한 메소드 호출
    	$this->registerAuthenticator();
    
    	/*
    	 * 상위 클래스의 메소드 호출
    	 * */
    	$this->registerUserResolver();
    
    	$this->registerAccessGate();
    
    	$this->registerRequestRebindHandler();
    }
    
    /**
     * 커스터마이징한 AuthManger 사용 위한 메소드 재정의
     *
     * @return void
     */
    protected function registerAuthenticator()
    {
    	$this->app->singleton('auth', function ($app) {
    		$app['auth.loaded'] = true;
    
    		return new AuthManager($app);
    	});
    
    	$this->app->singleton('auth.driver', function ($app) {
    		return $app['auth']->guard();
    	});
    }
    
}
