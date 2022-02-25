<?php

namespace App\Models;

use Illuminate\Support\Str;

class Url extends TemplateModel
{
    protected static function boot() {
        parent::boot();

        static::creating(function($model) {
            if (empty($model->url_key)) {
                $keyLen = 7;
                $iter = 0;

                do {
                    if ($iter >= 100) {
                        $keyLen++;
                        $iter = 0;
                    }

                    $randomStr = Str::random();
                    $url_key = substr(hash('sha256', $randomStr), 0, $keyLen);

                    $getUrl = Url::where('url_key', $url_key)->first();

                    $iter++;
                } while ($getUrl);

                $model->url_key = $url_key;
            }
        });
    }

    public function hit() {
        $hit = UrlHit::create(['url_id' => $this->id]);
    }

    public function getNumHitsAttribute() {
        $hits = UrlHit::where('url_id', $this->id)->count();

        return $hits;
    }
}
