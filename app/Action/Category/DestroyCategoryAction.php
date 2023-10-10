<?php

namespace App\Action\Category;

use App\Models\Category;

class DestroyCategoryAction
{
    public function execute(Category $category): void
    {
        $category->delete();
    }
}
