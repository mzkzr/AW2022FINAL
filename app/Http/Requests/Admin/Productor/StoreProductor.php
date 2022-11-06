<?php

namespace App\Http\Requests\Admin\Productor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreProductor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.productor.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string'],
            'cuit' => ['required', Rule::unique('productor', 'cuit'), 'string'],
            'domicilio' => ['required', 'string'],
            'provincia_id' => ['required', 'string'],
            'localidad_id' => ['required', 'string']  
        ];
    }
}
