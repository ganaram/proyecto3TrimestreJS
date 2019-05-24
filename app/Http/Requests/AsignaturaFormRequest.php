<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsignaturaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules=array();
        
        $rules['name'] = $this->validarNombre();
        $rules['curso']= $this->validarCurso();
        $rules['hours']= $this->validarHoras();
        $rules['description'] = $this->validarDesc();

        return $rules;
    }

    public function messages()
    {

        $mensajesNombre = $this->mensajesNombre();
        $mensajesCurso  = $this->mensajesCurso();
        $mensajesHoras  = $this->mensajesHoras();
        $mensajesDesc   = $this->mensajesDesc();

        $mensajes = array_merge(
            $mensajesNombre,
            $mensajesCurso,
            $mensajesHoras,
            $mensajesDesc
        );
        return $mensajes;
    }

    public function validarNombre()
    {
        return 'required|string|min:4';
    }

    public function mensajesNombre()
    {
        $mensajes=array();
        $mensajes['name.required'] = "Introduce algo, desgraciao.";
        $mensajes['name.string'] = "Introduce texto únicamente, lerdo.";
        $mensajes['name.min'] = "Introduce almenos cuatro caracteres, palurdo.";

        return $mensajes;
    }

    public function validarCurso()
    {
        return 'required';
    }

    public function mensajesCurso()
    {
        $mensajes=array();
        $mensajes['curso.required'] = "Selecciona un curso, cenutrio";

        return $mensajes;
    }

    public function validarHoras()
    {
        return 'required|numeric|min:1';
    }

    public function mensajesHoras()
    {
        $mensajes=array();
        $mensajes['hours.required'] = "Pon algo, inútil.";
        $mensajes['hours.numeric'] = "Las horas son número, desgraciao.";
        $mensajes['hours.min'] = "Y de paso, que almenos tenga una hora.";

        return $mensajes;
    }

    public function validarDesc()
    {
        return 'required|string|min:20';
    }

    public function mensajesDesc()
    {
        $mensajes=array();
        $mensajes['description.required'] = 'Sin esto no pasa.';
        $mensajes['description.string'] = 'La descripcción debe ser texto, tarugo.';
        $mensajes['description.min'] = "Por lo menos, que tenga 20 caracteres.";

        return $mensajes;
    }

    public function attributes()
    {
        return[
            'name' => 'nombre de la asignatura',
            'curso'=> 'curso al que pertenece la asignatura',
            'hours'=> 'horas que tiene la asignatura',
            'description' => 'breve resumen de la asignatura'
        ];
    }
    
}
