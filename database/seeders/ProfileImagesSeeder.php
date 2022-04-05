<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProfileImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile_images')->insert([
            'userId' => '1',
            'image' => '/img/profiles/room.jpg'
        ]);
        DB::table('profile_images')->insert([
            'userId' => '1',
            'image' => '/img/profiles/room2.jpg'
        ]);
        DB::table('profile_images')->insert([
            'userId' => '2',
            'image' => '/img/profiles/room.jpg'
        ]);
    }
}
