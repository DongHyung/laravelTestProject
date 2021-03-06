<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Model\Campaign;
use App\Model\Template;
use App\Model\Member;
use App\Policies\CampaignPolicy;
use App\Policies\TemplatePolicy;
use App\Policies\PermissionPolicy;

class AppServiceProvider extends ServiceProvider
{
	
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
			Campaign::class => CampaignPolicy::class,
			Template::class => TemplatePolicy::class,
			Member::class => PermissionPolicy::class,
	];
	
	/**
	 * Register the application's policies.
	 *
	 * @return void
	 */
	public function registerPolicies()
	{
		foreach ($this->policies as $key => $value) {
			Gate::policy($key, $value);
		}
	}
	
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    	$this->registerPolicies();
    }
}

