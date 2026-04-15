<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreferensiRasaUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('preferensi_rasa_user')->insert([

            // Admin
            ['id_user' => 1, 'id_preferensi_rasa' => 1, 'nilai_konversi' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 1, 'id_preferensi_rasa' => 3, 'nilai_konversi' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 1, 'id_preferensi_rasa' => 2, 'nilai_konversi' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Andi
            ['id_user' => 2, 'id_preferensi_rasa' => 1, 'nilai_konversi' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 2, 'id_preferensi_rasa' => 4, 'nilai_konversi' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 2, 'id_preferensi_rasa' => 5, 'nilai_konversi' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Budi
            ['id_user' => 3, 'id_preferensi_rasa' => 2, 'nilai_konversi' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 3, 'id_preferensi_rasa' => 1, 'nilai_konversi' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 3, 'id_preferensi_rasa' => 3, 'nilai_konversi' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Citra
            ['id_user' => 4, 'id_preferensi_rasa' => 5, 'nilai_konversi' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 4, 'id_preferensi_rasa' => 1, 'nilai_konversi' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 4, 'id_preferensi_rasa' => 4, 'nilai_konversi' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Dewi
            ['id_user' => 5, 'id_preferensi_rasa' => 5, 'nilai_konversi' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 5, 'id_preferensi_rasa' => 1, 'nilai_konversi' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 5, 'id_preferensi_rasa' => 2, 'nilai_konversi' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Eka
            ['id_user' => 6, 'id_preferensi_rasa' => 3, 'nilai_konversi' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 6, 'id_preferensi_rasa' => 1, 'nilai_konversi' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 6, 'id_preferensi_rasa' => 4, 'nilai_konversi' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Fajar
            ['id_user' => 7, 'id_preferensi_rasa' => 3, 'nilai_konversi' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 7, 'id_preferensi_rasa' => 2, 'nilai_konversi' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 7, 'id_preferensi_rasa' => 1, 'nilai_konversi' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Gina
            ['id_user' => 8, 'id_preferensi_rasa' => 1, 'nilai_konversi' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 8, 'id_preferensi_rasa' => 2, 'nilai_konversi' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 8, 'id_preferensi_rasa' => 5, 'nilai_konversi' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Hadi
            ['id_user' => 9, 'id_preferensi_rasa' => 4, 'nilai_konversi' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 9, 'id_preferensi_rasa' => 1, 'nilai_konversi' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 9, 'id_preferensi_rasa' => 3, 'nilai_konversi' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Intan
            ['id_user' => 10, 'id_preferensi_rasa' => 5, 'nilai_konversi' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 10, 'id_preferensi_rasa' => 2, 'nilai_konversi' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_user' => 10, 'id_preferensi_rasa' => 1, 'nilai_konversi' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
