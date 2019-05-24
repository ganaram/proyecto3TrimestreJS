<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $fillable = ['name','slug','hours','description'];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

}
