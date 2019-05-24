<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cursos = factory(App\Curso::class, 5)->create();
        $asignaturas = factory(App\Asignatura::class, 20)->create();
        
        $asignaturas->each(function(App\Asignatura $asignatura) use ($cursos){
            $asignatura->cursos()->attach(
                $cursos->random(random_int(1,5))
            );        
        });
    }
}