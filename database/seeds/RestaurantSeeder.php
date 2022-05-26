<?php

use App\Restaurant;
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $users = User::all();
        $user_ids = $users->pluck('id')->all();
        
        $restaurants = [
            [
                "name" => "McDonald's",
                "image" => ""
            ],
            [
                "name" => " KFC ",
                "image" => ""
            ],
            [
                "name" => " Burger King ",
                "image" => ""
            ],
            [
                "name" => " Road House ",
                "image" => ""
            ],
            [
                "name" => " Ostrica Ubriaca ",
                "image" => ""
            ],
            [
                "name" => " MOE's ",
                "image" => ""
            ],
            [
                "name" => " Panucci Pizza ",
                "image" => ""
            ],
            [
                "name" => " Los Pollos Hermanos ",
                "image" => ""
            ],
            [
                "name" => " Krusty Burger's ",
                "image" => ""
            ],
            [
                "name" => " Krusty Krab ",
                "image" => ""
            ],
            [
                "name" => " Lobster ",
                "image" => ""
            ],        
            [
                "name" => " Maclaren's Pub ",
                "image" => ""
            ],        
            [
                "name" => " Central Perk ",
                "image" => ""
            ],        
            [
                "name" => " Kame House ",
                "image" => ""
            ],   
            
        ];

        $counter = 0; 

        foreach ($restaurants as $res) {

            $restaurant = new Restaurant();
            
            $restaurant->user_id = $user_ids[$counter];

            $restaurant->name = $res['name'];
            $restaurant->slug = Str::slug($restaurant->name);
            $restaurant->address = $faker->streetName;
            $restaurant->cap = $faker->randomNumber(5, true);
            $restaurant->city = $faker->city;
            $restaurant->image = $res['image'];

            $restaurant->save();
            

            $counter++;
        }
        
        // $faker->randomElements($restaurants);
    }
}
