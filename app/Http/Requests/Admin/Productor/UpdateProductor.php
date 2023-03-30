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
            'domicilio' => ['sometimes', 'string'],
            'email' => ['nullable', 'email', 'string'],
            'localidad_id' => ['sometimes', 'integer'],
            'nombre' => ['sometimes', 'string'],
            'telefono' => ['nullable', 'string']
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
