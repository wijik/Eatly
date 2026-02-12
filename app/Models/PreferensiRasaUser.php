<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreferensiRasaUser extends Model
{
    use HasFactory;

    protected $table = 'preferensi_rasa_user';
    protected $primaryKey = 'id_preferensi_rasa_user';

    protected $fillable = [
        'id_preferensi_rasa_user',
        'id_user',
        'id_preferensi_rasa',
        'nilai_konversi',
        'updated_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function preferensiRasa()
    {
        return $this->belongsTo(PreferensiRasa::class, 'id_preferensi_rasa');
    }
}