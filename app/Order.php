<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone_number',
        'address',
        'house_number',
        'city',
        'cap',
        'total_price'
    ];

    public function plates(){
        return $this->belongsToMany(Plate::class)->withPivot('quantity');
    }
}
