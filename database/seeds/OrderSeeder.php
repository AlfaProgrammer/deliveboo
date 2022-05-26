<?php

use App\Order;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
// use Illuminate\Support\Str;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 
            
            $newOrder = new Order();

            $newOrder->name = $faker->firstName();
            $newOrder->surname = $faker->lastName();
            $newOrder->email = $faker->email();
            $newOrder->phone_number = $faker->phoneNumber();
            $newOrder->address = $faker->streetName;
            $newOrder->house_number = $faker->secondaryAddress;
            $newOrder->city = $faker->city;
            $newOrder->cap = $faker->randomNumber(5, true);
            $newOrder->total_price = $faker->randomFloat(2, 5, 150);
                        
            $newOrder->save();
        }
    }
}
