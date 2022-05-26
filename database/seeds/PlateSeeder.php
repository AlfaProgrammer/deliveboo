<?php

use App\Plate;
use App\Allergen;
use App\Restaurant;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PlateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurants = Restaurant::all();
        $rest_ids = $restaurants->pluck('id')->all();

        $allergens = Allergen::all();
        $allergen_ids = $allergens->pluck('id')->all();
        
        $plates = [
            [
                "name" => "CheeseBurger",
                "image" => ""
            ],
            [
                "name" => "Pizza Margherita",
                "image" => ""
            ],
            [
                "name" => "Krubby Patty",
                "image" => ""
            ],
            [
                "name" => "Ravioli di Medusa",
                "image" => ""
            ],
            [
                "name" => "Gran Crispy",
                "image" => ""
            ],
            [
                "name" => "Double Chicken",
                "image" => ""
            ],
            [
                "name" => "Tagliata di manzo",
                "image" => ""
            ],
            [
                "name" => "Bistecca Fiorentina",
                "image" => ""
            ],
            [
                "name" => "Carbonara",
                "image" => ""
            ],
            [
                "name" => "Risotto alla Milanese",
                "image" => ""
            ],
            [
                "name" => "Amatriciana",
                "image" => ""
            ],
            [
                "name" => "Sushi",
                "image" => ""
            ],
            [
                "name" => "Cous Cous",
                "image" => ""
            ],
        ];
        
        

        foreach ($plates as $plate) {

            $newPlate = new Plate();

            $newPlate->restaurant_id = $faker->randomElement($rest_ids);
            
            $newPlate->name = $plate["name"];
            $newPlate->slug = Str::slug($plate["name"]);
            // $newPlate->description = $plate["name"];
            $newPlate->image = $plate["image"];
            $newPlate->price = $faker->randomFloat(2, 5, 150);
            $newPlate->available = $faker->boolean();

            $randomAllergen = $faker->randomElements($allergen_ids, 3);
            
            $newPlate->save();

            $newPlate->allergens()->attach($randomAllergen);
        }
    }
}
