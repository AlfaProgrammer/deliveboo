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
            [
                "name" => "Napoli",
                "image" => ""
            ],
            [
                "name" => "Capricciosa",
                "image" => ""
            ],
            [
                "name" => "Diavola",
                "image" => ""
            ],
            [
                "name" => "Patate",
                "image" => ""
            ],
            [
                "name" => "Boscaiola",
                "image" => ""
            ],
            [
                "name" => "Pasta aglio olio peperoncino",
                "image" => ""
            ],
            [
                "name" => "Gricia",
                "image" => ""
            ],
            [
                "name" => "Pasta alla puttanesca",
                "image" => ""
            ],
            [
                "name" => "Orecchiette cime di rapa",
                "image" => ""
            ],
            [
                "name" => "Pasta al pesto",
                "image" => ""
            ],
            [
                "name" => "Pasta al ragu",
                "image" => ""
            ],
            [
                "name" => "Involtini thai",
                "image" => ""
            ],
            [
                "name" => "Involtini di gamberi",
                "image" => ""
            ],
            [
                "name" => "Ravioli alla griglia",
                "image" => ""
            ],
            [
                "name" => "Ravioli di manzo",
                "image" => ""
            ],
            [
                "name" => "Sashimi misto",
                "image" => ""
            ],
            [
                "name" => "Nigiri maguro",
                "image" => ""
            ],
            [
                "name" => "Uramaky spicy tonno",
                "image" => ""
            ],
            [
                "name" => "Tartare salmone",
                "image" => ""
            ],
            [
                "name" => "Tartare tonno",
                "image" => ""
            ],
            [
                "name" => "Hamburger bacon",
                "image" => ""
            ],
            [
                "name" => "Hamburger classico",
                "image" => ""
            ],
            [
                "name" => "Polpette al sugo",
                "image" => ""
            ],
            [
                "name" => "Vitello tonnato",
                "image" => ""
            ],
            [
                "name" => "Scaloppina al limone",
                "image" => ""
            ],
            [
                "name" => "Pollo al limone",
                "image" => ""
            ],
            [
                "name" => "BBQ wings",
                "image" => ""
            ],
            [
                "name" => "Tiramisu",
                "image" => ""
            ],
            [
                "name" => "Gelato cioccolato",
                "image" => ""
            ],
            [
                "name" => "Creme caramel",
                "image" => ""
            ],
            [
                "name" => "Panna cotta",
                "image" => ""
            ],
            [
                "name" => "Cheesecake",
                "image" => ""
            ],
            [
                "name" => "",
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
