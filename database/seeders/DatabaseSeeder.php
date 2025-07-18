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
            User::factory()->create([
                'name' => 'Test Doctor',
                'email' => 'test@test.com',
                'password' => Hash::make('password'),
            ]);
            User::factory(10)->create();
        }

        if (empty(Clinic::count())) {
            $clinic =  Clinic::create([
                'name' => 'Test Clinic 1',
                'address' => 'Test Address 1',
                'phone' => '9801234567',
            ]);
            User::where('id', 1)->first()->clinics()->attach($clinic);
        }

        $this->call(ClinicUserSeeder::class);
    }
}
