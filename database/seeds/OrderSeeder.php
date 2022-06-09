<?php

use App\Order;
use App\Plate;
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

        $plates = Plate::all();
        $plate_ids = $plates->pluck('id')->all();

        for ($i=0; $i < 150; $i++) { 
            
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

            $randomPlate = $faker->randomElements($plate_ids, 2);
                        
            $newOrder->save();

            $newOrder->plates()->attach($randomPlate);
        }
    }
}
