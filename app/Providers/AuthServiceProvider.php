<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Passport::tokensCan([
            'users' => 'users',
            'admins' => 'admins',
            'manages' => 'manages',
        ]);

        Passport::setDefaultScope([
            'users',
            'admins',
            'manages'
        ]);

        Passport::routes();

        Passport::tokensExpireIn(now()->addDays(10980));

        Passport::refreshTokensExpireIn(now()->addDays(10980));

        Passport::personalAccessTokensExpireIn(now()->addDays(10980));
    }
}
