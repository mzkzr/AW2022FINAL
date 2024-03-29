<?php

namespace App\Http\Requests\Admin\PuntoVentum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StorePuntoVentum extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.punto-ventum.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cerveza' => ['required'],
            'cerveceria' => ['required'],
            'presentaciones' => ['nullable', 'string'],
            
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

    public function getCervezaId(){
        if ($this->has('cerveza')){
            return $this->get('cerveza')['id'];
        }
        return null;
    }

    public function getCerveceriaId(){
        if ($this->has('cerveceria')){
            return $this->get('cerveceria')['id'];
        }
        return null;
    }
}
