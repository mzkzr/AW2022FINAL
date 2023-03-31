<?php

namespace App\Http\Requests\Admin\Cervecerium;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreCervecerium extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cervecerium.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'domicilio' => ['required', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'facebook' => ['nullable', 'string'],
            'horario_atencion' => ['nullable', 'string'],
            'instagram' => ['nullable', 'string'],
            'localidad' => ['required'],
            'nombre' => ['required', 'string'],
            'productor' => ['required'],
            'provincia' => ['required'],
            'telefono' => ['nullable', 'string'],
            'youtube' => ['nullable', 'string']
        ];
    }

    /**
    * Modify input data
    *
    * @return array
    */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }

    public function getProvinciaId(){
        if ($this->has('provincia')){
            return $this->get('provincia')['id'];
        }
        return null;
    }

    public function getLocalidadId(){
        if ($this->has('localidad')){
            return $this->get('localidad')['id'];
        }
        return null;
    }

    public function getProductorId(){
        if ($this->has('productor')){
            return $this->get('productor')['id'];
        }
        return null;
    }
}
