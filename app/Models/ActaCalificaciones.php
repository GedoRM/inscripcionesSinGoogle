<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActaCalificaciones extends Model
{
    use HasFactory;

    public function alumno_curso()
    {
        return $this->hasOne(alumno_curso::class);
    }
}

