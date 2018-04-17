<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
//use App\Estudiantes;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        /*'name', 'email',*/ 'cedula', 'password',
    ];

    protected $nombre;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*public function Name(){
        $cedula=Auth::users()->cedula;
        $nombre = Estudiantes::where('cedula', '=', $cedula)->firstOrFail();
        return $nombre;
    }*/
    public function getEstudiante(){
        return $this->belongsTo('App\Estudiantes','cedula');
    }
}
