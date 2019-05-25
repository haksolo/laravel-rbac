<?php

namespace Extended\RBAC;

use Illuminate\Container\Container;

class Manager
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }
}
