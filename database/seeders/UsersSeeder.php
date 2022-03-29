<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Thijs',
            'email' => 'thijsweijers@outlook.com',
            'password' => '123',
            'image' => '/img/room.jpg',
            'description' => 'Ik ben Thijs en ben 19 jaar oud, ik woon op mezelf in Leiden.'
        ]);
    }
}
