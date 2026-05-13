<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alumno_curso extends Model
{
    use HasFactory;

    public function curso()
    {
        return $this->hasMany();
    }

    public function ActaCalificaciones()
    {
        return $this->hasMany(ActaCalificaciones::class);
    }
}
