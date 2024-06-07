<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartilla extends Model
{
    use HasFactory;

    protected $table = 'cartillas';
    protected $fillable = ['tratamiento', 'fecha', 'proximo_control', 'peso', 'descripcion', 'mascota_id', 'user_id'];


    public function mascota()
    {
        return $this->belongsTo(Mascota::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
