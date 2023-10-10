<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'category_id' => ['integer'],
            'title' => ['string'],
            'description' => ['string'],
            'price' => ['integer'],
        ];
    }
}
