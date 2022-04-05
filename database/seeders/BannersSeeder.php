<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class BannersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            'banner' => 'img/banners/pets-banner.jpg'
        ]);
    }
}
