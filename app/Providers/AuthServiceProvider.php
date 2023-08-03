<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public static array $permissions = [
        'dashboard' => ['super admin', 'admin','user'],
        'index-user' => ['super admin'],
    ];
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
        $this->registerPolicies();
        //

        foreach (self::$permissions as $action => $roles) {
            Gate::define($action, function (User $user) use ($roles){
                if (in_array($user-> role, $roles)){
                    return true;
                }
            });
        }
    }
}
