<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\SubcategoriesController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});
Auth::routes();


Route::group(['middleware' => ['auth']], function () { 

    Route::get('change_password',[App\Http\Controllers\HomeController::class, 'change_password']);    
    Route::post('update_password',[App\Http\Controllers\HomeController::class, 'update']);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('add_category',[App\Http\Controllers\categoryController::class, 'index'])->name('add_category');
    Route::post('category',[App\Http\Controllers\categoryController::class, 'store'])->name('category');
    Route::get('category_edit/{id}',[App\Http\Controllers\categoryController::class, 'edit'])->name('category_edit/{id}');
    Route::get('category_update/{id}',[App\Http\Controllers\categoryController::class, 'update'])->name('category_update/{id}');
    Route::get('category_delete/{id}',[App\Http\Controllers\categoryController::class, 'destroy'])->name('category_delete/{id}');
    Route::get('subcategories', [App\Http\Controllers\SubcategoriesController::class, 'index']);
    Route::post('addSubCategory', [App\Http\Controllers\SubcategoriesController::class, 'store'])->name('addSubCategory');
    Route::get('sub_category_del/{id}', [App\Http\Controllers\SubcategoriesController::class, 'destroy'])->name('sub_category_del/{id}');
    Route::get('sub_category_edit/{id}', [App\Http\Controllers\SubcategoriesController::class, 'edit'])->name('sub_category_edit/{id}');
    Route::get('sub_category_update/{id}', [App\Http\Controllers\SubcategoriesController::class, 'update'])->name('sub_category_update/{id}');
    Route::get('product',[App\Http\Controllers\ProductController::class, 'index']);
    Route::get('product_edit/{id}',[App\Http\Controllers\ProductController::class, 'edit'])->name('product_edit/{id}');
    Route::get('product_delete/{id}',[App\Http\Controllers\ProductController::class, 'destroy'])->name('product_delete/{id}');
    Route::get('dependent',[App\Http\Controllers\ProductController::class, 'selectbox']);
    Route::post('product_store',[App\Http\Controllers\ProductController::class, 'store'])->name('product_store');
    Route::post('product_update/{id}',[App\Http\Controllers\ProductController::class, 'update'])->name('product_update/{id}');
    
});

