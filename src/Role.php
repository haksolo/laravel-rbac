<?php

namespace RBAC;

use Khronos\MongoDB\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
        'rules'
    ];

    // public function subjects();

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_bindings', 'role', 'subjects.user', 'name');
    }

    public function bindings()
    {
        return $this->hasMany(RoleBinding::class, 'roles', 'name');
    }

    /*
    public static function hierarchy()
    {
        return static::aggregate()
            ->match([
                'name' => 'hr-manager',
                // 'rules.resources' => 'employee',
                'rules' => function ($query) {
                    return $query->elemMatch([
                        'resources' => 'employee',
                        'verbs' => 'index'
                    ]);
                },
            ])
            ->graphLookup('roles', function ($query) {
                return $query->select('rules.roles')
                    ->reduce(function ($carry, $item) {
                        return $item->setUnion($carry);
                    });
            }, 'rules.roles', 'name', 'aggregated')
            ->project([
                'name' => 1,
                // 'rule.name' => '$name',
                'rules' => function ($query) {
                    return $query->select('aggregated.rules')
                        ->reduce(function ($carry, $rule) {
                            return $rule->setUnion($carry);
                        })
                        ->setUnion($query->select('rules'))
                        ->filter(function ($rule) {
                            return $rule->roles->isArray()->not();
                        });
                }
            ])
            // ->dd('project') // ->dump()
            ->get();
    }
    */
}
