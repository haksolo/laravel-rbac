<?php

namespace Extended\RBAC\Foundation\Services;

use Extended\RBAC\Foundation\Repositories\RoleRepository;
use Extended\Domain\Service\Service;

class RoleService extends Service
{
    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
    }
}
