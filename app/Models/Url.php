<?php

namespace App\Models;

class URL extends TemplateModel
{
    protected $table = 'urls';

    public function hit() {
        $hit = URLHit::create(['url_id' => $this->id]);
    }
}
