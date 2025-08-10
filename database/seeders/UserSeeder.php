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
        // Membuat Akun Super Admin
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@tokoroti.com',
            'password' => Hash::make('password'), // Ganti dengan password yang aman
            'role' => 'superadmin',
            'phone_number' => '081234567890',
        ]);

        // Membuat Akun Owner
        User::create([
            'name' => 'Owner',
            'username' => 'owner',
            'email' => 'owner@tokoroti.com',
            'password' => Hash::make('password'), // Ganti dengan password yang aman
            'role' => 'owner',
            'phone_number' => '089876543210',
        ]);
    }
}
