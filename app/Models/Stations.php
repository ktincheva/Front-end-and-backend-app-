<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stations extends Model
{
    public function city() {
        return $this->hasOne('App\Models\Cities', 'id', 'cityid');
    }
}
