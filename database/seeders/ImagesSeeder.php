<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'userId' => '1',
            'image' => '/img/room.jpg'
        ]);
        DB::table('images')->insert([
            'userId' => '1',
            'image' => '/img/room2.jpg'
        ]);
        DB::table('images')->insert([
            'userId' => '2',
            'image' => '/img/room.jpg'
        ]);
    }
}
