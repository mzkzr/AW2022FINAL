<?php

namespace App\Http\Requests\Admin\Productor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateProductor extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.productor.edit', $this->productor);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre' => ['sometimes', 'string'],
            'cuit' => ['sometimes', Rule::unique('productor', 'cuit')->ignore($this->productor->getKey(), $this->productor->getKeyName()), 'string'],
            'domicilio' => ['sometimes', 'string'],
            'provincia_id' => ['sometimes', 'string'],
            'localidad_id' => ['sometimes', 'string']
        ];
    }
}
