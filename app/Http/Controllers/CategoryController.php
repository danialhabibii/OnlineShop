<?php

namespace App\Http\Controllers;

use App\Action\Category\CreateCategoryAction;
use App\Action\Category\DestroyCategoryAction;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return $this->ok(
            CategoryResource::make($categories),
        );
    }

    public function create(CreateCategoryRequest $request, CreateCategoryAction $createCategoryAction)
    {
        $createCategoryAction->execute($request->validated());
        return $this->created();
    }

    public function destroy(Category $category, DestroyCategoryAction $destroyCategoryAction)
    {
        $destroyCategoryAction->execute($category);
        return $this->ok();
    }

    public function update(Category $category, Request $request)
    {
        $category->update($request->only(['title']));
        return $this->ok();
    }
}
