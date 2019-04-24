<?php

namespace RBAC;

use Illuminate\Support\ServiceProvider;

class RBACServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'rbac');

        \Illuminate\Database\Eloquent\Relations\Relation::morphMap([
            'user' => 'App\User',
        ]);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->singleton('rbac');
    }
}
