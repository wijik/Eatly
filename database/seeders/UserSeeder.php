<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'role' => 0,
                'foto' => 'users/default-user.png',
                'nama' => 'Admin',
                'berat_badan' => 70,
                'email' => 'admin@eatly.com',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 1,
                'foto' => 'users/default-user.png',
                'nama' => 'Andi',
                'berat_badan' => 60,
                'email' => 'andi@mail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 1,
                'foto' => 'users/default-user.png',
                'nama' => 'Budi',
                'berat_badan' => 65,
                'email' => 'budi@mail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 1,
                'foto' => 'users/default-user.png',
                'nama' => 'Citra',
                'berat_badan' => 55,
                'email' => 'citra@mail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 1,
                'foto' => 'users/default-user.png',
                'nama' => 'Dewi',
                'berat_badan' => 50,
                'email' => 'dewi@mail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 1,
                'foto' => 'users/default-user.png',
                'nama' => 'Eka',
                'berat_badan' => 68,
                'email' => 'eka@mail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 1,
                'foto' => 'users/default-user.png',
                'nama' => 'Fajar',
                'berat_badan' => 75,
                'email' => 'fajar@mail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 1,
                'foto' => 'users/default-user.png',
                'nama' => 'Gina',
                'berat_badan' => 58,
                'email' => 'gina@mail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 1,
                'foto' => 'users/default-user.png',
                'nama' => 'Hadi',
                'berat_badan' => 72,
                'email' => 'hadi@mail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 1,
                'foto' => 'users/default-user.png',
                'nama' => 'Intan',
                'berat_badan' => 52,
                'email' => 'intan@mail.com',
                'password' => Hash::make('password123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
