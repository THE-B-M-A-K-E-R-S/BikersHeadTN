<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
        \App\Models\User::factory(10)->create();
        \App\Models\Bike::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'khaled battiche',
            'email' => 'khaled.battiche@esprit.tn',
            'password' => bcrypt('15010933'),
            'role' => 'admin',
        ]);
    }
}
