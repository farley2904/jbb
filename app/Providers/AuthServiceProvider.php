<?php

namespace Jbb\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Jbb\Article;
use Jbb\User;
use Jbb\Policies\ArticlePolicy;
use Jbb\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'Jbb\Model' => 'Jbb\Policies\ModelPolicy',
        Article::class => ArticlePolicy::class, //политика безопастности для модели Article
        User::class => UserPolicy::class //политика безопастности для модели Article
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('VIEW_ADMIN', function ($user) {
            return $user->canDo('VIEW_ADMIN', FALSE);// canDo возврвщает истину если у пользоветеля есть соответствующее право
        });//true/false - все правила либо одно из заданых правил 
        Gate::define('VIEW_ADMIN_ARTICLES', function ($user) {
            return $user->canDo('VIEW_ADMIN_ARTICLES', FALSE);
        });
        Gate::define('EDIT_USERS', function ($user) {
            return $user->canDo('EDIT_USERS', FALSE);
        });
        Gate::define('VIEW_ADMIN_MENU', function ($user) {
            return $user->canDo('VIEW_ADMIN_MENU', FALSE);
        });
         Gate::define('VIEW_ADMIN_SERVICES', function ($user) {
            return $user->canDo('VIEW_ADMIN_SERVICES', FALSE);
        });

        Gate::define('VIEW_ADMIN_INFORMATION', function ($user) {
            return $user->canDo('VIEW_ADMIN_INFORMATION', FALSE);
        });
    }
}
