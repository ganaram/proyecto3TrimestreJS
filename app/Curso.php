<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['numero'];

    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class);
    }

}