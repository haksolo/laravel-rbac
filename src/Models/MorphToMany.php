<?php

namespace Extended\RBAC\Models;

use Illuminate\Database\Eloquent\Relations\MorphToMany as BaseMorphToMany;

class MorphToMany extends BaseMorphToMany
{
    public function __construct(...$parameters)
    {
        parent::__construct(...$parameters);

        $this->morphType = $parameters[2].'_kind';
    }
}
