<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model {

    //
    protected $fillable = [
        'name',
    ];

    public function fromCity() {
        return $this->hasOne('App\Models\Cities', 'id', 'from_city');
    }

    public function toCity() {
        return $this->hasOne('App\Models\Cities', 'id', 'to_city');
    }

}
