<?php
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome',['products'=> Product::paginate(5)]);
})->name('home');
Route::get('/create', [ProductController::class, 'create']);
Route::post('/store', [ProductController::class, 'createProduct'])->name('store');
Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('edit');
Route::post('/update/{id}', [ProductController::class, 'updateProduct'])->name('update');
Route::delete('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete');
Route::get('/detail/{id}', [ProductController::class, 'ProductDetail'])->name('detail');