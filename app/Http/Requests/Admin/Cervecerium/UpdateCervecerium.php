<?php

namespace App\Http\Requests\Admin\Cervecerium;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCervecerium extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cervecerium.edit', $this->cervecerium);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cuit' => ['sometimes', Rule::unique('cerveceria', 'cuit')->ignore($this->cervecerium->getKey(), $this->cervecerium->getKeyName()), 'integer'],
            'domicilio' => ['sometimes', 'string'],
            'localidad_id' => ['sometimes', 'integer'],
            'nombre' => ['sometimes', 'string'],
            'provincia_id' => ['sometimes', 'integer'],
            'horario_atencion'
        ];
    }
}
