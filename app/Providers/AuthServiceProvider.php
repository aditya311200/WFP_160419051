<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

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

        // 1st way Gate
        // Gate::define('delete-permission', function($user){
        //     return ($user->sebagai == 'owner');
        // });


        // 2nd Gate with Policy
        Gate::define('delete-permission', 'App\Policies\SupplierPolicy@delete');
    }
}
