<?php

namespace RBAC;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Builder;

class RoleBinding extends Model
{
    // protected $namespaced = true;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'namespace',
        'role_kind',
        'role_name',
        // 'subjects',
    ];

    public function subjects()
    {
        // return $this->morphedByMany(\App\User::class, 'subject', 'role_binding_subjects');

        return $this->hasMany(RoleBindingSubject::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_name', 'name');
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    /*protected function newMorphToMany(Builder $query, Model $parent, $name, $table, $foreignPivotKey,
                                      $relatedPivotKey, $parentKey, $relatedKey,
                                      $relationName = null, $inverse = false)
    {
        return new MorphToMany($query, $parent, $name, $table, $foreignPivotKey, $relatedPivotKey, $parentKey, $relatedKey,
            $relationName, $inverse);
    }*/
}
