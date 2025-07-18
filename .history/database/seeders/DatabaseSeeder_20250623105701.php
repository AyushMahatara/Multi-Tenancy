<?php

namespace Database\Seeders;

use App\Models\Clinic;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (empty(User::count())) {
            User::factory(10)->create();

            User::factory()->create([
                'name' => 'Test Doctor',
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
            ]);
        }

        if (empty(Clinic::count())) {
            Clinic::create([
                'name' => 'Test Clinic 1',
                'address' => 'Test Address 1',
            ]);
        }
    }
}
