<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20; $i++) { 

            $newUser = new User();

            $newUser->name = $faker->name;
            $newUser->email = $faker->email();
            $newUser->password = Hash::make('ciao123');
            $newUser->company_name =$faker->company();
            $newUser->vat_number = $faker->numerify('IT###########');
            
            $newUser->save();

        }
    }
}
