<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'gambar' => 'menus/687b647718622.jpg',
                'nama_menu' => 'Soto Ayam',
                'deskripsi' => 'Soto ayam hangat dengan kuah gurih dan suwiran ayam.',
                'is_today' => true,
                'is_today_set_at' => Carbon::now(),
                'kalori' => 320,
                'protein' => 25,
                'lemak' => 12,
                'id_preferensi_rasa' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'menus/687d96b7a0f26.jpg',
                'nama_menu' => 'Sop Ayam',
                'deskripsi' => 'Sup ayam dengan sayuran segar dan kaldu ringan.',
                'is_today' => true,
                'is_today_set_at' => Carbon::now(),
                'kalori' => 280,
                'protein' => 22,
                'lemak' => 10,
                'id_preferensi_rasa' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'menus/687d96ecbf601.jpg',
                'nama_menu' => 'Sate Ayam',
                'deskripsi' => 'Sate ayam dengan bumbu kacang khas.',
                'is_today' => true,
                'is_today_set_at' => null,
                'kalori' => 400,
                'protein' => 30,
                'lemak' => 20,
                'id_preferensi_rasa' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'menus/687d942a4bf2f.jpg',
                'nama_menu' => 'Nasi Katsu',
                'deskripsi' => 'Nasi katsu dengan telur dan sayuran.',
                'is_today' => true,
                'is_today_set_at' => null,
                'kalori' => 500,
                'protein' => 18,
                'lemak' => 22,
                'id_preferensi_rasa' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'menus/687d970431c6f.jpg',
                'nama_menu' => 'Gado-Gado',
                'deskripsi' => 'Sayuran segar dengan saus kacang.',
                'is_today' => true,
                'is_today_set_at' => null,
                'kalori' => 350,
                'protein' => 15,
                'lemak' => 18,
                'id_preferensi_rasa' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'menus/687d9775b8ad8.jpg',
                'nama_menu' => 'Bubur Ayam',
                'deskripsi' => 'Bubur ayam dengan condiment pelengkap',
                'is_today' => true,
                'is_today_set_at' => null,
                'kalori' => 330,
                'protein' => 14,
                'lemak' => 17,
                'id_preferensi_rasa' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'menus/687d972b52f6c.jpg',
                'nama_menu' => 'Rendang',
                'deskripsi' => 'Daging sapi dimasak dengan bumbu rempah khas.',
                'is_today' => true,
                'is_today_set_at' => null,
                'kalori' => 600,
                'protein' => 35,
                'lemak' => 40,
                'id_preferensi_rasa' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'menus/687d96d2a7656.jpg',
                'nama_menu' => 'Sayur Asem',
                'deskripsi' => 'Sayur asem segar dengan santan',
                'is_today' => true,
                'is_today_set_at' => null,
                'kalori' => 420,
                'protein' => 28,
                'lemak' => 25,
                'id_preferensi_rasa' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'menus/687d973f77a26.jpg',
                'nama_menu' => 'Ayam Geprek',
                'deskripsi' => 'Ayam geprek dengan tingkat kepedasan',
                'is_today' => true,
                'is_today_set_at' => null,
                'kalori' => 300,
                'protein' => 26,
                'lemak' => 12,
                'id_preferensi_rasa' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gambar' => 'menus/687d97191a5e7.jpg',
                'nama_menu' => 'Gulai Ayam',
                'deskripsi' => 'Gulai ayam yang gurih dengan santan yang terasa',
                'is_today' => true,
                'is_today_set_at' => null,
                'kalori' => 200,
                'protein' => 8,
                'lemak' => 9,
                'id_preferensi_rasa' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
