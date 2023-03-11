<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isSuper', function ($user) {
            return $user->type == 'super';
        });
        Gate::define('isAdmin', function ($user) {
            return $user->type == 'admin';
        });

        Gate::define('isAuthor', function ($user) {
            return $user->type == 'author';
        });
        Gate::define('isUser', function ($user) {
            return $user->type == 'user';
        });
    }
}
