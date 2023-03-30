<?php

namespace App\Http\Requests\Admin\Localidad;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateLocalidad extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.localidad.edit', $this->localidad);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //'provincia_id' => ['required', 'integer'],
            'provincia' => ['required'],
            'nombre' => ['required', 'string']
        ];
    }

    public function getProvinciaId(){
        if ($this->has('provincia')){
            return $this->get('provincia')['id'];
        }
        return null;
    }
}
