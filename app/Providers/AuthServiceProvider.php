<?php

namespace Jbb\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Jbb\Article;
use Jbb\Policies\ArticlePolicy;
use Jbb\Policies\UserPolicy;
use Jbb\User;

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
        User::class    => UserPolicy::class, //политика безопастности для модели Article
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
            return $user->canDo('VIEW_ADMIN', false); // canDo возврвщает истину если у пользоветеля есть соответствующее право
        }); //true/false - все правила либо одно из заданых правил
        Gate::define('VIEW_ADMIN_ARTICLES', function ($user) {
            return $user->canDo('VIEW_ADMIN_ARTICLES', false);
        });
        Gate::define('EDIT_USERS', function ($user) {
            return $user->canDo('EDIT_USERS', false);
        });
        Gate::define('VIEW_ADMIN_MENU', function ($user) {
            return $user->canDo('VIEW_ADMIN_MENU', false);
        });
        Gate::define('VIEW_ADMIN_SERVICES', function ($user) {
            return $user->canDo('VIEW_ADMIN_SERVICES', false);
        });

        Gate::define('VIEW_ADMIN_INFORMATION', function ($user) {
            return $user->canDo('VIEW_ADMIN_INFORMATION', false);
        });
    }
}
