<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PetsImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets_images')->insert([
            'petId' => '1',
            'image' => '/img/pets/casper.jpg'
        ]);

        DB::table('pets_images')->insert([
            'petId' => '1',
            'image' => '/img/pets/casper_2.jpg'
        ]);

        DB::table('pets_images')->insert([
            'petId' => '1',
            'image' => '/img/pets/casper_3.jpg'
        ]);
    }
}
