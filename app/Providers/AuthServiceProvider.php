<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Product;
use App\Models\User;
use App\Policies\AdminPolicies;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
         Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('editProduct', function (User $user, $product){
            return ($user->admin==1 || $product->user_id==$user->id);
        });

        Gate::define('viewOrders', function (User $user, $product){
            return ($user->admin==1);
        });

        Gate::define('adminActions',[AdminPolicies::class, 'adminActions']);


    }
}
