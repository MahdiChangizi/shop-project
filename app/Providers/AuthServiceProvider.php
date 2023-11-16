<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;

use App\Models\Admin\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
//        foreach (Permission::all() as $permission)
//        {
//
//            Gate::define($permission->name, function ($user) use ($permission) {
//                return $user->hasPermission($permission);
//            });
//
//        }
    }
}
