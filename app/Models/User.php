<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable 
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'forcePass',
        'id_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Alumnos(){
        return $this->hasMany('App\Models\Alumnos');
    }

    public function cursos()
    {
        return $this->hasMany('App\Models\Cursos', 'idDocente', 'cursos');
    }

    public function status(){
        return $this->hasMany('App\Models\Status');
    }

    public function docentes(){
        return $this->hasMany('App\Models\Docentes');

        
    }

    
    //Relacion muchos a muchos 

    public function notificacionPass(){
        return $this->belongsToMany('App\Models\Notification_pass');
    }


    public function roles(){
        return $this->belongsToMany('App\Models\Role')->withTimestamps();
    }

    public function asignarRol($role){
        $this->roles()->sync($role, false);
    }

    public function tieneRol(){
        return $this->roles->flatten()->pluck('name_rol')->unique();
    }
}