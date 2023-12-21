<?php

namespace Database\Seeders;

use App\Models\Register;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Register::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('adminpassword'),
            'language' => 'EN',
            'mobile' => '1234567890',
            'is_enabled' => true,
        ]);
    }
}
