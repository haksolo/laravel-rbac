<?php

namespace RBAC;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Facade extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'rbac';
    }

    /**
     * Register the typical authentication routes for an application.
     *
     * @param  array  $options
     * @return void
     */
    public static function routes(array $options = [])
    {
        $router = static::$app->make('router');

        $router->resource('/roles', '\RBAC\Controllers\RoleController');
        // $router->resource('/roles', \RBAC\Controllers\RoleController::class);

        // $router->resource('/users', '\App\Http\Controllers\UserController');
        // $router->resource('/roles', '\App\Http\Controllers\RoleController');
    }
}
