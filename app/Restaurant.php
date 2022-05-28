<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Restaurant extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function plates(){
        return $this->hasMany(Plate::class);
    }

    public static function getRestaurantId (){
        $user_id = Auth::id();

        $restaurants = Restaurant::where('user_id', $user_id)->get();

        $restaurant = $restaurants[0];
        $restaurant_id = $restaurant['id'];

        return $restaurant_id;


    }
}
