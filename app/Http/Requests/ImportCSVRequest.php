<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportCSVRequest extends FormRequest
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
            
            'file'               => 'required',
           
          
        ];
        
        $rules = array_merge($rules, ['file' => 'mimes:csv,txt']);

        return $rules;
    }

     public function messages(){
       
        $info =  [
            
            'file.required'  => 'El Archivo es requerido', 
            'file.mimes'    => 'El Archivo debe de ser .CSV',          
           
                       
         
        ];
        
        return $info;

    }
}
