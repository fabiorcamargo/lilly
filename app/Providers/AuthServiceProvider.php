<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        // Should return TRUE or FALSE
        Gate::define('student', function(User $user) {
            return $user->role == 1;
        });
        Gate::define('edit', function(User $user) {
            return $user->role == 2 || $user->role == 3 || $user->role == 4 || $user->role == 5 || $user->role == 6 || $user->role == 7 || $user->role == 8;
        });
        Gate::define('sales', function (User $user) {
            return $user->role == 2 || $user->role == 6 || $user->role == 7 || $user->role == 8;
        });
        Gate::define('e-commerce', function (User $user) {
            return $user->role == 3 || $user->role == 6 || $user->role == 7 || $user->role == 8;
        });
        Gate::define('secretary', function (User $user) {
            return $user->role == 4 || $user->role == 6 || $user->role == 7 || $user->role == 8;
        });
        Gate::define('finance', function (User $user) {
            return $user->role == 5 || $user->role == 6 || $user->role == 7 || $user->role == 8;
        });
        Gate::define('manager', function (User $user) {
            return $user->role == 6 || $user->role == 7 || $user->role == 8;
        });
        Gate::define('admin', function (User $user) {
            return $user->role == 7 || $user->role == 8;
        });
        Gate::define('api', function (User $user) {
            return $user->role == 8 ;
        });    
    }
}
