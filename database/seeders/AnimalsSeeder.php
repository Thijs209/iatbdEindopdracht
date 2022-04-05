<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animals')->insert([
            'animal' => 'Hond',
        ]);

        DB::table('animals')->insert([
            'animal' => 'Kat',
        ]);

        DB::table('animals')->insert([
            'animal' => 'Konijn',
        ]);

        DB::table('animals')->insert([
            'animal' => 'Kavia',
        ]);

        DB::table('animals')->insert([
            'animal' => 'Hamster',
        ]);

        DB::table('animals')->insert([
            'animal' => 'Vogel',
        ]);

        DB::table('animals')->insert([
            'animal' => 'Vis',
        ]);

        DB::table('animals')->insert([
            'animal' => 'Rat/Muis',
        ]);

        DB::table('animals')->insert([
            'animal' => 'Anders',
        ]);
    }
}
