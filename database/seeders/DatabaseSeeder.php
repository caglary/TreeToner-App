<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Çağlar',
            'email' => 'caglar.yurdakul60@gmail.com',
            'password' => '$2y$10$a9Ru6O7U.mgG4wSPmC0Bhevv28h5WaQHXXS2gkF2tGOSpmJn9rL2i',
        ]);
    }
}
