<?php

use App\Restaurant;
use App\Category;
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

        $categories = Category::all();
        $category_ids = $categories->pluck('id')->all();
        
        $restaurants = [
            [
                "name" => "McDonald's",
                "image" => "https://forbes.it/wp-content/uploads/2020/03/mcdonalds-fast-food-shutterstock.jpg"
            ],
            [
                "name" => " KFC ",
                "image" => "https://www.gdoweek.it/wp-content/uploads/sites/7/2021/11/KFC_esterno.jpeg"
            ],
            [
                "name" => " Burger King ",
                "image" => "https://azfranchising.com/wp-content/uploads/2019/11/burger-king-1030x684.jpg"
            ],
            [
                "name" => " Road House ",
                "image" => "https://www.roadhouse.it/Media/Images/StoreLocator/Ristorante-Roadhouse-Conegliano.jpg"
            ],
            [
                "name" => " Ostrica Ubriaca ",
                "image" => "https://images-ext-1.discordapp.net/external/W8eteklXI4opzd66qaFZejLzY4PnBFtUV-z_uwxYuoA/https/upload.wikimedia.org/wikipedia/it/thumb/a/ac/Drunken_Clam.jpg/440px-Drunken_Clam.jpg"
            ],
            [
                "name" => " MOE's",
                "image" => "https://whalebonemag.com/wp-content/uploads/2018/11/Moes_Tavern-1050x591.png"
            ],
            [
                "name" => " Panucci Pizza ",
                "image" => "http://theinfosphere.org/images/0/0b/Panucci%27s_Pizza.jpg"
            ],
            [
                "name" => " Los Pollos Hermanos ",
                "image" => "https://www.recensito.net/images/foto/foto_allievi/Lospolloshermanos2.jpg"
            ],
            [
                "name" => " Krusty Burger's ",
                "image" => "https://comicvine.gamespot.com/a/uploads/original/1/13181/1561757-krusty_burger.jpg"
            ],
            [
                "name" => " Krusty crab ",
                "image" => "https://cdn.dottorgadget.it/blog/wp-content/uploads/2021/09/krusty-krab.jpg"
            ],
            [
                "name" => " Arnold's",
                "image" => "https://routesixteesix.com/wp-content/uploads/2020/02/Arnolds-s-Restaurant.png"
            ],        
            [
                "name" => " Maclaren's Pub ",
                "image" => "https://i.pinimg.com/736x/3a/3f/7c/3a3f7cc0072247bd2f16e0e9dbff71d6.jpg"
            ],        
            [
                "name" => " Central Perk ",
                "image" => "https://cdn.gelestatic.it/kataweb/tvzap/2014/08/foto_central_perk.jpg"
            ],        
            [
                "name" => " Kame House ",
                "image" => "https://images.everyeye.it/img-notizie/dragon-ball-fan-ricostruito-kame-house-unreal-engine-4-risultato-v5-535164.jpg"
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

            // Creiamo categoria random
            $randomCategory = $faker->randomElements($category_ids, 2);

            $restaurant->save();         
            
            $restaurant->categories()->attach($randomCategory);

            $counter++;
        }
        
        // $faker->randomElements($restaurants);
    }
}
