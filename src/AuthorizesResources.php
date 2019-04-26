<?php

namespace RBAC;

trait AuthorizesResources
{
    public function __construct()
    {
        $this->authorizeResource($this->resource);
    }

    protected function resourceAbilityMap()
    {
        return [
            'index' => 'list',
            'show' => 'get',
            'create' => 'create',
            'store' => 'create',
            'edit' => 'update',
            'update' => 'update',
            'destroy' => 'delete',
        ];
    }
}
