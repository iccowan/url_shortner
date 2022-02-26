<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    protected $keyType = 'string';
    public $incrementing = false;

    protected static function boot() {
        parent::boot();

        static::creating(function($model) {
            if (empty($model->id))
                $model->id = Str::uuid();
        });
    }

    public function getUrlSafeIdAttribute() {
        return urlencode($this->id);
    }
}
