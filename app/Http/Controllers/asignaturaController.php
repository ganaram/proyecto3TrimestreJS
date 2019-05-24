<?php

namespace App\Http\Controllers;

use App\Asignatura;
use App\Curso;
use App\Http\Controllers\Controller;
use App\Http\Requests\AsignaturaFormRequest;
use App\Http\Requests\AsignaturaAjaxFormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class asignaturaController extends Controller
{
    protected function validacionUsuarioAjax(AsignaturaAjaxFormRequest $request){
        //Obtenermos todos los valores y devolvemos un array vacio
        return array();
    }

    public function index()
    {
        $asignaturas = Asignatura::paginate(10);
        

        return view('public.asignaturas.index')->withAsignaturas($asignaturas);
    }

    public function create()
    {

        $cursos = Curso::all();

        return view('public.asignaturas.create', [
            'cursos' => $cursos
        ]);

    }

    public function store(AsignaturaFormRequest $request)
    {

        sleep(2);

        $asignatura = Asignatura::create([
            'curso_id'  => request('curso'),
            'name'      => request('name'),
            'slug'      => str_slug(request('name'),"-"),
            'hours'     => request('hours'),
            'description'=>request('description')
        ]);

        

        $asignatura->cursos()->sync(request('curso'));        
    }

    public function show($id)
    {
        $asignatura = Asignatura::findOrFail($id);

        return view('public.asignaturas.show',['asignatura'=>$asignatura]);
    }
    
    public function edit($id)
    {

        $asignatura = Asignatura::findOrFail($id);

        return view('public.asignaturas.edit',['asignatura'=>$asignatura]);
    }

    
    public function update($idAsignatura)
    {
        $asignatura = Asignatura::findOrFail($idAsignatura);

        $asignatura->update([
            'name'      => request('name'),
            'slug'      => str_slug(request('name'),"-"),
            'hours'     => request('hours'),
            'description'=>request('description')
        ]);

        sleep(2);

        return("Se ha editado la asignatura correctamente.");

    }

    public function destroy($idAsignatura){
        $asignatura = Asignatura::findOrFail($idAsignatura);

        $asignatura->delete();

        return("Se ha borrado la asignatura correctamente de la BDD.");
    }

}
