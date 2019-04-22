<?php

namespace App;

trait RoleSubject
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_bindings', $this->roleSubjectKey, 'role', 'id', 'name');
    }

    public function toSubject($prefix = null)
    {
        return [join('.', array_filter([$prefix, $this->roleSubjectKey])) => $this->id];
    }
}
