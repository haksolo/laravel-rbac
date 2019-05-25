<?php

namespace Extended\RBAC\Foundation\Repositories;

use Extended\RBAC\Models\Role;
use Extended\Domain\Contracts\Repository\Repository;

class RoleRepository implements Repository
{
    public function query()
    {
        return Role::query();
    }
}
