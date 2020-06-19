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
        //Per chiamare tutti i seeders contemporaneamente. Il comando è php artisan db:seed
        $this->call([
            CommunicationsTableSeeder::class,
            RefereesTableSeeder::class
        ]);
    }
}