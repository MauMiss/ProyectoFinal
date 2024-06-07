<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'mascotas';
    protected $fillable = ['nombre', 'sexo', 'especie', 'raza', 'senas_particulares', 'fecha_nacimiento', 'color', 'foto', 'user_id'];

    public function cartillas()
    {
        return $this->hasMany(Cartilla::class, 'mascota_id');
    }

    public function veterinarios()
    {
        return $this->hasMany(User::class, 'user_id');
    }
}
