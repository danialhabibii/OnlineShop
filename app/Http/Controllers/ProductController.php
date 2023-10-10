<?php

namespace App\Http\Controllers;

use App\Action\Product\CreateProductAction;
use App\Action\Product\DestroyProductAction;
use App\Action\Product\UpdateProductAction;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Category $category)
    {
        return $this->ok(
            ProductResource::make($category->products),
        );
    }

    public function create(CreateProductRequest $request, CreateProductAction $createProductAction)
    {
        $createProductAction->execute($request->validated());
        return $this->created();
    }

    public function search(Product $product): JsonResponse
    {
        return $this->ok(
            ProductResource::make($product),
        );
    }

    public function update(Product $product, UpdateProductRequest $request, UpdateProductAction $updateProductAction)
    {
        $updateProductAction->execute($product, $request->validated());
        return $this->ok();
    }

    public function destroy(Product $product, DestroyProductAction $destroyProductAction)
    {
        $destroyProductAction->execute($product);
        return $this->ok();
    }
}
