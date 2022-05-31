<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;

class Restaurant extends Model
{

    protected $fillable = [
        'name',
        'image',
        'slug',
        'address',
        'cap',
        'city',
        'info',
    ];

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

        $restaurant = Restaurant::where('user_id', $user_id)->first();

        $restaurant_id = $restaurant->id;

        return $restaurant_id;
    }

    /* 
     * static function for unique slug in create restaurant form
    */
     
    public static function getUniqueSlug($name) {

        // creazione slug 

        $slug = Str::slug($name);
        $slugBase = $slug;
        $counter = 1;

        $restaurant_present = Restaurant::where('slug', $slug)->first();

        // controllo slug esiste

        while ($restaurant_present) {

            $slug = $slugBase . '-' . $counter;
            $counter++;
            $restaurant_present = Restaurant::where('slug', $slug)->first();
        };

        return $slug;
    }
}
