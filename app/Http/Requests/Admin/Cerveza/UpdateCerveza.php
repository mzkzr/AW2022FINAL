<?php

namespace App\Http\Requests\Admin\Cerveza;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateCerveza extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.cerveza.edit', $this->cerveza);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'abv' => ['required', 'numeric'],
            'descripcion' => ['nullable', 'string'],
            'ibu' => ['required', 'integer'],
            'nombre' => ['required', 'string'],
            'og' => ['nullable', 'integer'],
            'productor' => ['required'],
            'srm' => ['nullable', 'integer'],
            
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

    public function getProductorId(){
        if ($this->has('productor')){
            return $this->get('productor')['id'];
        }
        return null;
    }
}
