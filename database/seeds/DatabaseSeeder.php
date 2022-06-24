<?php

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
            BranchSeeder::class,
            CategorySeeder::class,
            CenterSeeder::class,
            DistrictSeeder::class,
            UserSeeder::class,
        ]);
    }
}
