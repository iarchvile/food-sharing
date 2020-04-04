<?php

namespace App\Providers;

use App\Enums\UserRoleEnum;
use App\Models\Cities;
use App\Models\City;
use App\Models\Foo;
use App\Models\ProductCard;
use App\Models\User;
use App\Models\Wishlist;
use App\Policies\CitiesPolicy;
use App\Policies\FooPolicy;
use App\Policies\ProductCardPolicy;
use App\Policies\UserPolicy;
use App\Policies\WishlistPolicy;
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
        ProductCard::class => ProductCardPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('is_administrator', function ($user) {
            return ($user->user_roles_id == UserRoleEnum::ADMIN || $user->user_roles_id == UserRoleEnum::MODERATOR);
        });

        Gate::define('user_role_update', function ($user) {
            return $user->user_roles_id == UserRoleEnum::ADMIN;
        });
    }
}
