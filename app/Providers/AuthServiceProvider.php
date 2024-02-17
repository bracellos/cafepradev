<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Articles;
use App\Models\User;
use App\Policies\ArticlePolicy;
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
        Articles::class => ArticlePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //registrar polices
        $this->registerPolicies();

        Gate::define("deleta-artigo", function(User $user, $permission){
            return $user->permission === $permission;
        });
    }
}
