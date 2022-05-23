<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
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
            "name" => "required|min:3",
            "desc" => "required|min:50",
            "price" => "required|numeric|min:1",
            "category" => "required|exists:categories,id",
            "image" => "required|image|mimes:jpg,jpeg,png,svg,gif,webp|max:2048"
        ];
    }
}
