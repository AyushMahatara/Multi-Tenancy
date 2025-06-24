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
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Doctor',
            'email' => 'test@test.com',
            'password' => Hash::make('password'),
        ]);

        Clinic::create([
            'name' => 'Test Clinic 1',
            'address' => 'Test Address 1',
            'user_id' => User::where('email', 'test@test.com')->first()->id
        ]);
    }
}
