<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            /*UsersSeeder::class,
            EcoProductsCategorySeeder::class,
            AvatarsSeeder::class,
            ChatbotProgramSeeder::class,*/
            //CitiesTableSeeder::class,
            //CustomersSeeder::class,
            //EcoProductsCategorySeeder::class,
            //PaymentsSeeder::class,
            RoleSeeder::class,
            //StatesTableSeeder::class,
            TypePaymentsSeeder::class,
            

        ]);
    }
}
