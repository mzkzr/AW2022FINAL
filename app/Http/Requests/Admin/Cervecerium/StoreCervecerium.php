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
            'cuit' => ['required', Rule::unique('cerveceria', 'cuit'), 'string'],
            'domicilio' => ['required', 'string'],
            'localidad_id' => ['required', 'string'],
            'nombre' => ['required', 'string'],
            'provincia_id' => ['required', 'string'],
            
        ];
    }
}
