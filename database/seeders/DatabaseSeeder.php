<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Maintenance;
use App\Models\User;
use App\Models\Vehicle;
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
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
         User::factory(10)->create();
         Vehicle::factory()->count(10)->create([
            'user_id' => 1
        ]);

        Vehicle::factory()->count(100)->create();
        Maintenance::factory()->count(3)->create(
            [
                'vehicle_id' => 1,
                'user_id' => 1,
            ]
        );
        Maintenance::factory()->count(10)->create();
    }
}
