<?php

namespace App\Http\Requests;

use App\Http\Requests\AsignaturaFormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;

class AsignaturaAjaxFormRequest extends AsignaturaFormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        
        if($this->exists('name')){
            $rules['name'] = $this->validarNombre();
        }

        if($this->exists('curso')){
            $rules['curso'] = $this->validarCurso();
        }

        if($this->exists('hours')){
            $rules['hours'] = $this->validarHoras();
        }

        if($this->exists('description')){
            $rules['description'] = $this->validarDesc();
        }

        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        $errores = $validator->errors();
        $atributos = $this->attributes();
        $listaErroresPorCampo = [];
        
        foreach($atributos as $atributo => $texto){
            if($this->exists($atributo)){
                $listaErroresPorCampo[$atributo] = $errores->get($atributo);
            }
        }
        $response = new JsonResponse($listaErroresPorCampo);
        throw new ValidationException($validator, $response);
    }
}
