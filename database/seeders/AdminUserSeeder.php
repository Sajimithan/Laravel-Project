<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user if it doesn't exist
        if (!User::where('email', 'admin@healthcare.com')->exists()) {
            User::create([
                'name' => 'System Administrator',
                'email' => 'admin@healthcare.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'age' => 30,
                'gender' => 'other',
                'phone' => '+1234567890',
                'address' => '123 Healthcare St, Medical City, MC 12345',
                'emergency_contact' => '+1234567891',
                'blood_type' => 'O+',
                'allergies' => 'None known',
                'medications' => 'None',
                'height' => 175,
                'weight' => 70,
                'last_checkup_date' => now(),
                'insurance_provider' => 'HealthCare Plus',
                'insurance_number' => 'HC123456789',
            ]);
        }

        // Create a sample doctor user
        if (!User::where('email', 'doctor@healthcare.com')->exists()) {
            User::create([
                'name' => 'Dr. Sarah Johnson',
                'email' => 'doctor@healthcare.com',
                'password' => Hash::make('password'),
                'role' => 'doctor',
                'age' => 35,
                'gender' => 'female',
                'phone' => '+1234567892',
                'address' => '456 Medical Ave, Health City, HC 67890',
                'emergency_contact' => '+1234567893',
                'blood_type' => 'A+',
                'allergies' => 'None known',
                'medications' => 'None',
                'height' => 165,
                'weight' => 60,
                'last_checkup_date' => now(),
                'insurance_provider' => 'Medical Group',
                'insurance_number' => 'MG987654321',
            ]);
        }

        // Create a sample patient user
        if (!User::where('email', 'patient@healthcare.com')->exists()) {
            User::create([
                'name' => 'John Patient',
                'email' => 'patient@healthcare.com',
                'password' => Hash::make('password'),
                'role' => 'patient',
                'age' => 45,
                'gender' => 'male',
                'phone' => '+1234567894',
                'address' => '789 Patient Rd, Care City, CC 11111',
                'emergency_contact' => '+1234567895',
                'blood_type' => 'B+',
                'allergies' => 'Penicillin, Shellfish',
                'medications' => 'Blood pressure medication',
                'height' => 180,
                'weight' => 85,
                'last_checkup_date' => now()->subMonths(3),
                'insurance_provider' => 'Patient Care',
                'insurance_number' => 'PC555666777',
            ]);
        }
    }
}
