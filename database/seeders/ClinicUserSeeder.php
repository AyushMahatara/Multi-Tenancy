<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Clinic;

class ClinicUserSeeder extends Seeder
{
    public function run(): void
    {
        $clinics = Clinic::all();
        $users = User::all();

        // Optional: prevent duplicates
        $existing = [];

        foreach ($clinics as $clinic) {
            // Assign 3–7 random users per clinic
            $assignedUsers = $users->random(rand(3, 7));

            foreach ($assignedUsers as $user) {
                $key = $clinic->id . '-' . $user->id;
                if (!in_array($key, $existing)) {
                    DB::table('clinic_user')->insert([
                        'clinic_id' => $clinic->id,
                        'user_id' => $user->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    $existing[] = $key;
                }
            }
        }
    }
}
