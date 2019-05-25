<?php

namespace Extended\RBAC\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class RoleBindingSubject extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;

    protected $fillable = [
        'subject_kind',
        'subject_id',
    ];

    /*public static $morphMap = [
        'user' => \App\User::class
    ];*/

    public static function boot()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid();
        });

        parent::boot();
    }

    public function subject()
    {
        return $this->morphTo(null, 'subject_kind');
    }
}
