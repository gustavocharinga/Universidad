<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    //
    protected $primaryKey='code_course';

    protected $fillable = [
        'code_course',
        'course',
        'description',
        'creditos'
    ];

    protected $guarded = [
      'created_at',
      'updated_at'
    ];
    public function coursePrelacion(){
        return $this->belongsToMany('App\cursos', 'prelaciones',
            'code_course_in', 'code_course_pre');
    }
}
