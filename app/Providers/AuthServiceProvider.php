<?php

namespace App\Providers;

use App\Core\Models\Food;
use App\Core\Policies\FoodPolicy;
use App\Http\Guards\TokenGuard;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        Food::class => FoodPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Auth::extend('token', function($app, $name, array $config) {
            return new TokenGuard(Auth::createUserProvider($config['provider']), $app['request']);
        });
        /*$this->app['auth']->viaRequest('api', function($request) {
            if($request->header('api_token')) {
                return User::where('api_token', $request->header('api_token'))->first();
            }
        });*/
    }
}
