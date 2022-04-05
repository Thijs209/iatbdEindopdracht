<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AnimalsSeeder::class,
            PetsSeeder::class,
            UsersSeeder::class,
            ProfileImagesSeeder::class,
            BannersSeeder::class,
            PetsImagesSeeder::class,
        ]);
    }
}
