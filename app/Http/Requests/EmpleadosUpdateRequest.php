<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpleadosUpdateRequest extends FormRequest
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
      
        $rules = [
            
            'nombre'            => 'required|',
            'email'             => 'required|email|max:255',
            'sexo'              => 'required',
            'area_id'           => 'required',
            'description'       => 'required',
            'role'               => 'required',
          
        ];
        // if($this->get('file'))
           
        //     $rules = array_merge($rules, ['file' => 'mimes: jpg,jpeg,png']);
        return $rules;
    }

    public function messages(){
       
        $info =  [
            
            'nombre.required'               => 'El Nombre es requerido',           
            'email.required'                => 'El Correo electronico es requerido',
            'sexo.required'                 => 'El Sexo es requerido',
            'area_id.required'              => 'El Area es Requerido',
            'description.required'          => 'La Descripcion es requerido',
            'role.required'                 => 'Debes de seleccionar un Rol',
                       
         
        ];
        return $info;
    }

   
}
