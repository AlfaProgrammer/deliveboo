<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function plates(){
        return $this->belongsToMany(Plate::class)->withPivot('quantity');
    }
}
