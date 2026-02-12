<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_menu';

    protected $fillable = [
        'id_menu',
        'gambar',
        'nama_menu',
        'deskripsi',
        'kalori',
        'protein',
        'lemak',
        'rasa_dominan',
        'id_preferensi_rasa'
    ];

    public function rekomendasis()
    {
        return $this->hasMany(Rekomendasi::class, 'menu_id');
    }

    public function preferensiRasa()
    {
        return $this->belongsTo(PreferensiRasa::class, 'id_preferensi_rasa', 'id_preferensi_rasa');
    }

    public function scopeTodayActive($query)
    {
        return $query->where('is_today', true)
            ->where('is_today_set_at', '>=', now()->subHours(24));
    }
}
