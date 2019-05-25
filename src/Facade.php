<?php

namespace Extended\RBAC;

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
        static::$app->make('router')->resource('/roles', '\Extended\RBAC\Controllers\RoleController');

        static::$app->make('router')->resource('/roles/{role}/rules', '\Extended\RBAC\Controllers\RoleRuleController');

        // static::$app->make('router')->resource('/roles/{role}/bindings', '\RBAC\Controllers\BindingController');

        static::$app->make('router')->resource('/role-bindings', '\Extended\RBAC\Controllers\RoleBindingController');

        static::$app->make('router')->resource('/role-bindings/{role_binding}/subjects', '\Extended\RBAC\Controllers\RoleBindingSubjectController');
    }
}
