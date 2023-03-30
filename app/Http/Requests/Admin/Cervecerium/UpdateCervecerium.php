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
            'domicilio' => ['sometimes', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'horario_atencion' => ['nullable', 'string'],
            'localidad_id' => ['sometimes', 'string'],
            'nombre' => ['sometimes', 'string'],
            'productor_id' => ['nullable', 'string'],
            'telefono' => ['nullable', 'string'],
            
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
}
