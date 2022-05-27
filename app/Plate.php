<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function allergens(){
        return $this->belongsToMany(Allergen::class);
    }

    public function orders(){
        return $this->belongsToMany(Orders::class);
    }

}
