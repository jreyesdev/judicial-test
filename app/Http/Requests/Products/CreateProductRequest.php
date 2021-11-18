<?php

namespace App\Http\Requests\Products;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateProductRequest extends FormRequest
{
    /**
     * Prepara datos
     * @return void
     */
    public function prepareForValidation()
    {
        $this->merge([
            'name' => Str::title(preg_replace('/\s+/i', ' ', $this->name)),
            'price' => floatval($this->price),
            'tax' => floatval($this->tax) / 100,
        ]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:3|unique:products,name',
            'price' => 'required|numeric|min:0',
            'tax' => 'required|numeric|min:0',
        ];
    }

    /**
     * Nombre de inputs
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => 'Nombre producto',
            'price' => 'Precio',
            'tax' => 'Impuesto'
        ];
    }
}
