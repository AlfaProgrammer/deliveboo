<?php

use App\Category;
use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;
// use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Italiano',
            'Indiano',
            'Cinese',
            'Internazionale',
            'Giapponese',
            'Pakistano',
            'Pesce',
            'Carne',
            'Vegano',
            'Dolce',
            'Vegetariano',
            'Messicano',
            'Sushi',
        ];

        foreach ($categories as $cat) {

            $category = new Category();
            
            $category->name = $cat;
            
            $category->save();
        }
    }
}
