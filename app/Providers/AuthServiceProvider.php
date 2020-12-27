<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Review;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
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


        Gate::before(function ($user,$permission){
            return $user->permissions()->contains($permission);
        });

        Gate::define('updateReview', function (User $user, Review $review){
            return true;
            //dd($review -> user -> is($user));
            //return $review -> user -> is($user);
        });


    }
}
