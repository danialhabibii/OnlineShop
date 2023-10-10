<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'products'], function () {
    Route::get('{category:title}', [ProductController::class, 'index']);
    Route::post('new', [ProductController::class, 'create']);
    Route::put('update/{product}', [ProductController::class, 'update']);
    Route::get('search/{product}', [ProductController::class, 'search']);
    Route::delete('destroy/{product}', [ProductController::class, 'destroy']);
});
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('create', [CategoryController::class, 'create']);
    Route::delete('destroy/{category}', [CategoryController::class, 'destroy']);
    Route::put('update/{category}', [CategoryController::class, 'update']);
});
