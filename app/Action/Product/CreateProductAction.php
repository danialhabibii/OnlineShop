<?php

namespace App\Action\Product;

use App\Models\Product;

class CreateProductAction
{
    public function execute(array $data): Product
    {
        return Product::create([
            'category_id' => $data['category_id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'balance' => $data['balance'],
        ]);
    }
}
