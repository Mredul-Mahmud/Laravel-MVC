<?php
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome',['products'=> Product::paginate(5)]);
})->name('home');
Route::get('/create', [ProductController::class, 'create']);
Route::post('/store', [ProductController::class, 'createProduct'])->name('store');
Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('edit');
Route::post('/update/{id}', [ProductController::class, 'updateProduct'])->name('update');
Route::delete('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete');
Route::get('/detail/{id}', [ProductController::class, 'ProductDetail'])->name('detail');
Route::resource('categories', CategoryController::class);
Route::get('/categories', [CategoryController::class, 'showCategories'])->name('categories');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/edit/{id}', [CategoryController::class, 'editCategory'])->name('categories.edit');
Route::put('/categories/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/detail/{id}', [CategoryController::class, 'CategoryDetail'])->name('categories.detail');
Route::delete('/categories/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('categories.delete');