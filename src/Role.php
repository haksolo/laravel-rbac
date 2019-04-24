<?php

namespace RBAC;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // protected $namespaced = true;

    public $timestamps = false;

    protected $attributes = [
        'namespace' => 'default'
    ];

    protected $fillable = [
        'namespace',
        'name',
        // 'rules',
        // 'bindings',
    ];

    public function rules()
    {
        return $this->hasMany(RoleRule::class);
    }

    /*public function bindings()
    {
        return $this->hasMany(RoleBinding::class, 'role_name', 'name');
    }*/

    public function getRouteKeyName()
    {
        return 'name';
    }
}
