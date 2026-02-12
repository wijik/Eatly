<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rekomendasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rekomendasi';

    protected $fillable = [
        'id_rekomendasi',
        'id_user',
        'id_menu',
        'skor',
        'tanggal'
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'id_menu');
    }
}
?>