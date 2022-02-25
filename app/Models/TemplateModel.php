<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TemplateModel extends Model
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
