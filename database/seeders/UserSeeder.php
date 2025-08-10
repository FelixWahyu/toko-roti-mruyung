<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'email' => 'superadmin@tokoroti.com',
            'password' => Hash::make('password'),
            'role' => 'superadmin',
            'phone_number' => '081234567890',
        ]);

        User::create([
            'name' => 'Owner',
            'username' => 'owner',
            'email' => 'owner@tokoroti.com',
            'password' => Hash::make('password'),
            'role' => 'owner',
            'phone_number' => '089876543210',
        ]);
    }
}
