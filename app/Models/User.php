<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'id_user',
        'foto',
        'nama',
        'berat_badan',
        'email',
        'password',
        'role'
    ];

    protected $hidden = ['password'];

    public function rekomendasis()
    {
        return $this->hasMany(Rekomendasi::class, 'id_user');
    }

    public function preferensiRasaUser()
    {
        return $this->hasMany(PreferensiRasaUser::class, 'id_user');
    }

    public function preferensiRasa()
    {
        return $this->belongsToMany(PreferensiRasa::class, 'preferensi_rasa_user', 'id_user', 'id_preferensi_rasa')->withTimestamps();
    }
}
