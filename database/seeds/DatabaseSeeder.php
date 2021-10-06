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
        // $this->call(UsersTableSeeder::class);
        $this->call(DefaultSeeder::class);
        // $this->call(VehicleModelSeeder::class);

        // $this->call(VehicleModelSeeder::class);
        // $this->call(VehicleTypeSeeder::class);
    }
}
