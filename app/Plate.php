<?php

namespace App;


use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{
    protected $fillable = [
        'name', 'image', 'description', 'price', 'available', 'slug', 'restaurant_id'
    ];


    public function restaurant(){
        return $this->belongsTo(Restaurant::class);
    }

    public function allergens(){
        return $this->belongsToMany(Allergen::class);
    }

    public function orders(){
        return $this->belongsToMany(Orders::class);
    }

    public static function getUniqueSlug($title) {

        // creazione slug 

        $slug = Str::slug($title);
        $slugBase = $slug;
        $counter = 1;

        $plate_present = Plate::where('slug', $slug)->first();

        // controllo slug esiste

        while ($plate_present) {

            $slug = $slugBase . '-' . $counter;
            $counter++;
            $plate_present = Plate::where('slug', $slug)->first();
        };

        return $slug;
    }



}
