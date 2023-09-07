<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Foundation\Http\FormRequest;

class FormProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            "name" => ["required", "min:5"],
            "slug" => ["min:5"],
            "subtitle" => ["required", "min:5"],
            "description" => ["required", "min:5"],
            "quantity" => ["required", "integer", "min:1"], 
            "price" => ["required", "integer"],
            "image" => ["image"],
            "categories" => ["array","exists:categories,id"],
        ];
    }
    


    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
        ]);
    }
}
