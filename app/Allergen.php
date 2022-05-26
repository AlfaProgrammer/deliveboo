<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    public function plates(){
        return $this->belongsToMany('App\Plate');
    }
}
