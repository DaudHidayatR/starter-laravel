<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(10)
            ->create();
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'daud28ramadhan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
        User::factory()->create([
            'name' => 'super admin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'role' => 'super admin',
            'password' => Hash::make('password'),
        ]);
    }
}
