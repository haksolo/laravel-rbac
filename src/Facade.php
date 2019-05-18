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
        static::$app->make('router')->resource('/role-bindings', '\RBAC\Controllers\RoleBindingController');

        static::$app->make('router')->resource('/role-bindings/{role_binding}/subjects', '\RBAC\Controllers\RoleBindingSubjectController');

        static::$app->make('router')->resource('/roles', '\RBAC\Controllers\RoleController');

        static::$app->make('router')->resource('/roles/{role}/rules', '\RBAC\Controllers\RoleRuleController');

        // static::$app->make('router')->resource('/roles/{role}/bindings', '\RBAC\Controllers\BindingController');
    }
}
