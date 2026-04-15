<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferensiRasaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('preferensi_rasa')->insert([
            [
                'nama_rasa' => 'Gurih',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rasa' => 'Manis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rasa' => 'Pedas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rasa' => 'Asin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_rasa' => 'Segar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
