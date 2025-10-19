<?php

namespace Database\Seeders;

use App\Models\ParkingPlace;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()
            ->admin()
            ->create([
                'name' => 'Admin',
                'email' => 'admin@spotyfind.rs',
            ]);

        User::factory()
            ->create();

        ParkingPlace::factory()
                    ->count(10)
                    ->create();
    }
}
