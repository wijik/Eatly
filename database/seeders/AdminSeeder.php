<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@eatly.com'],
            [
                'nama' => 'Administrator',
                'berat_badan' => 55,
                'email' => 'admin@eatly.com',
                'password' => Hash::make('admin123'),
                'role' => 0,
                'foto' => 'default_user.png',
            ]
        );
    }
}
