<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategorieController;

use Fruitcake\Cors\CorsService;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/create_product', [ProductController::class, 'create'])->middleware('auth')->name('create_product');
Route::post('/create_product', [ProductController::class, 'store'])->name('store_product');



Route::get('/api/all_products', [ProductController::class, 'index'])->name('all_products');
//Route::get('/all_products', [ProductController::class, 'index'])->name('all_products')->middleware('cors');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->middleware('auth')->name('edit_product');
Route::put('/products/{id}/update', [ProductController::class, 'update'])->middleware('auth')->name('update_product');

Route::get('/products/{id}/show', [ProductController::class, 'show'])->middleware('auth')->name('show_product');

Route::get('/products/{id}/delete', [ProductController::class, 'destroy'])->middleware('auth')->name('delete_product');

Route::get('/add_categorie', [CategorieController::class, 'create'])->middleware('auth')->name('create_categorie');
Route::post('/add_categorie', [CategorieController::class, 'store'])->middleware('auth')->name('store_categorie');

Route::get('/api/all_categories', [CategorieController::class, 'index'])->middleware('auth')->name('get_categories');
Route::get('/categories/{id}/edit', [CategorieController::class, 'edit'])->middleware('auth')->name('edit_categorie');
Route::put('/categories/{id}/update', [CategorieController::class, 'update'])->middleware('auth')->name('update_categorie');

Route::get('/categories/{id}/show', [CategorieController::class, 'show'])->middleware('auth')->name('show_categorie');
Route::get('/categories/{id}/delete', [CategorieController::class, 'destroy'])->middleware('auth')->name('destroy_categorie');







