<?php

namespace RBAC\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class RoleRule extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'resources',
        'verbs'
    ];

    protected $casts = [
        'resources' => 'array',
        'verbs' => 'array',
    ];

    public static function boot()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });

        parent::boot();
    }

    public function setResourcesAttribute($resources)
    {
        if (is_string($resources)) {
            $resources = array_map('trim', explode(',', $resources));
        }

        // return $this->setAttributeValue('resources', $resources);

        $this->attributes['resources'] = $this->asJson($resources);
    }

    public function setVerbsAttribute($verbs)
    {
        if (is_string($verbs)) {
            $verbs = array_map('trim', explode(',', $verbs));
        }

        $this->attributes['verbs'] = $this->asJson($verbs);
    }
}
