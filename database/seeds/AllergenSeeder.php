<?php

use App\Allergen;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
// use Illuminate\Support\Str;

class AllergenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allergens = [
            'arachidi',
            'uova',
            'latticini',
            'soia',
            'molluschi',
            'cereali',
            'crostacei',
            'pesce',
            'frutta a guscio',
            'sedano',
            'senape',
            'sesamo',
            'anidride solforosa e solfiti',
            'lupini',
        ];

        foreach ($allergens as $allergen) {
            $newAllergen = new Allergen();

            $newAllergen->name = $allergen;

            $newAllergen->save();
        }
    }
}
