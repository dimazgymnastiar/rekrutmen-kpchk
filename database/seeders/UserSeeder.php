<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Buat direktur
        User::create([
            'name' => 'Direktur CHK',
            'email' => 'direktur@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'director'
        ]);

        // Buat admin
        User::create([
            'name' => 'Admin CHK',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'role' => 'admin'
        ]);
    }
}

