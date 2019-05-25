<?php

namespace Extended\RBAC\Models;

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

    public static function create(array $attributes = [])
    {
        return tap(static::query()->create($attributes), function ($role) use ($attributes) {
            if (isset($attributes['rules']) && is_array($attributes['rules'])) {
                $role->rules()->createMany($attributes['rules']);
            }
        });
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
