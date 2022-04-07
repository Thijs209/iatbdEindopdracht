<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pets')->insert([
            'petId' => 1,
            'petName' => 'Casper',
            'petType' => 'Hond',
            'ownerName' => 'Thijs',
            'image' => '/img/pets/casper.jpg',
            'description' => 'Dit is Casper.',
            'breed' => 'Epagnol Breton',
            'startDate' => '2022-08-02',
            'endDate' => '2022-08-09',
            'payment' => '20',
            'important' => 'Zij ogen ontsteken snel'
        ]);

        DB::table('pets')->insert([
            'petId' => 2,
            'petName' => 'Snuf',
            'petType' => 'Hond',
            'ownerName' => 'Jan',
            'image' => '/img/pets/defie.jpg',
            'description' => 'Dit si defie.',
            'breed' => 'Golden Retriever',
            'startDate' => '2022-08-02',
            'endDate' => '2022-08-09',
            'payment' => '15',
        ]);

        DB::table('pets')->insert([
            'petId' => 3,
            'petName' => 'Bo',
            'petType' => 'Konijn',
            'ownerName' => 'Henk',
            'image' => '/img/pets/bo.jpg',
            'description' => 'Dit is Bo.',
            'startDate' => '2022-08-02',
            'endDate' => '2022-08-09',
            'payment' => '6',
        ]);
    }
}
