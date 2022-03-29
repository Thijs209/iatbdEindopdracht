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
            'petName' => 'Casper',
            'petType' => 'Hond',
            'ownerName' => 'Thijs',
            'image' => '/img/casper.jpg',
            'description' => 'Dit is Casper, hij is een epagnol breton en we hebben hem 8 jaar geleden geadopteerd uit het asiel.',
            'breed' => 'Epagnol Breton',
            'startDate' => '2022-08-02',
            'endDate' => '2022-08-09',
        ]);

        DB::table('pets')->insert([
            'petName' => 'Defie',
            'petType' => 'Hond',
            'ownerName' => 'Jan',
            'image' => '/img/defie.jpg',
            'description' => 'Dit si defie.',
            'breed' => 'Golden Retriever',
            'startDate' => '2022-08-02',
            'endDate' => '2022-08-09',
        ]);
    }
}
