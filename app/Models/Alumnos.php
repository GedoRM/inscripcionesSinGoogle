<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnos extends Model
{
    use HasFactory;

    public function programa()
    {
        return $this->hasMany(ProgramaEdicativo::class);
    }

    public function municipios()
    {
        return $this->hasMany(Municipios::class);
    }

    public function promedio()
    {
        return $this->hasMany(promedio::class);
    }

    public function User()
    {
        return $this->hasMany(User::class);
    }
}
