<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer'],
            'title' => ['required', 'string','unique:products,title'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'balance' => ['required', 'integer'],
        ];
    }
}
