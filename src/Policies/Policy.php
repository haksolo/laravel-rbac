<?php

namespace RBAC\Policies;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Container\Container;
use Illuminate\Auth\Access\HandlesAuthorization;

class Policy
{
    use HandlesAuthorization;

    // protected $container;

    // protected $resource;

    /*public function __construct(Container $container)
    {
        $this->container = $container;
    }*/

    public function before($user, $ability, $resource, ...$parameters)
    {
        $resource = Str::snake(Str::plural(class_basename($resource)), '-');

        if (! \RBAC\RoleBinding::subjectHasAccess($user, $resource, $ability)) {
            return $this->deny();
        }
    }

    /*
    public function get(User $user, User $x)
    {
        return false;
    }
    public function list()
    {
        return false;
    }
    */

    public function __call($method, $parameters)
    {
        return true; // $this->allow();
    }
}
