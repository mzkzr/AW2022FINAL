<?php

namespace App\Http\Requests\Admin\PuntoVentum;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePuntoVentum extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.punto-ventum.edit', $this->puntoVentum);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'cerveza_id' => ['sometimes', 'string'],
            'cerveceria_id' => ['sometimes', 'string'],
            
        ];
    }
}
