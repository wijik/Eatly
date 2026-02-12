<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreferensiRasa extends Model
{
    use HasFactory;

    protected $table = 'preferensi_rasa';

    protected $primaryKey = 'id_preferensi_rasa';

    public $timestamps = true;

    protected $fillable = [
        'nama_rasa'
    ];

    public function users()
    {
        return $this->belongsToMany(
            \App\Models\User::class,
            'preferensi_rasa_user',
            'id_preferensi_rasa',
            'user_id'
        )->withPivot('nilai_konversi')->withTimestamps();
    }

    public function preferensiRasaUser()
    {
        return $this->hasMany(PreferensiRasaUser::class, 'id_preferensi_rasa');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_preferensi_rasa', 'id_preferensi_rasa');
    }
}
