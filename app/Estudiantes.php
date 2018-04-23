<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    //
    protected $primaryKey = 'cedula';

    protected $fillable = [
        'cedula',
        'name',
        'lastname',
        'email'
    ];
    protected $guarded = [
        'created_at',
        'updated_at'
    ];

}
