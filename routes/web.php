<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;

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
    $categories=\App\Models\Category::all();
    return view('admins.categories.list_category', [
        'categories'=>$categories
    ]);
})->name('categories.list');

Route::get('/old', function () {
    $categories=\App\Models\Category::all();
    return view('admins.categories.old_list_category', [
        'categories'=>$categories
    ]);
})->name('old.categories.list');
//
//
// Route::get('/{id_sub_cat?}', function ($id_sub_cat=null) {
//     $categories=\App\Models\Category::all();
//     $subCategories=\App\Models\SubCategory::all();
//     $products=\App\Models\Product::all();

//     return view('admins.categories.list_category', [
//         'categories'=>$categories,
//         'subCategories'=>$subCategories,
//         'products'=>$products,
//         'id_sub_cat'=>$id_sub_cat
//     ]);
// })->name('categories.list');
//
/*
*==============================================================================
*/
//Общий перечень объектов для Product
Route::get('/products/{id_sub_cat?}', [ProductController::class, 'index'])->name('products.index');
//Создание
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
//Сохранение
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
//Просмотр
Route::get('/products/{product?}', [ProductController::class, 'show'])->name('products.show');
//Редактирование
Route::get('/products/{product?}/edit', [ProductController::class, 'edit'])->name('products.edit');
//Обновление
Route::put('/products/{product?}', [ProductController::class, 'update'])->name('products.update');
//Уничтожение
Route::delete('/products/{product?}', [ProductController::class, 'destroy'])->name('products.destroy');
/*
*==============================================================================
*/
//Общий перечень объектов для Category
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
//Создание
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
//Сохранение
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
//Просмотр
Route::get('/categories/{category?}', [CategoryController::class, 'show'])->name('categories.show');
//Редактирование
Route::get('/categories/{category?}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
//Обновление
Route::put('/categories/{category?}', [CategoryController::class, 'update'])->name('categories.update');
//Уничтожение
Route::delete('/categories/{category?}', [CategoryController::class, 'destroy'])->name('categories.destroy');
/*
*==============================================================================
*/
//Общий перечень объектов для Category
Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('sub-categories.index');
//Создание
Route::get('/sub-categories/create/{category?}', [SubCategoryController::class, 'create'])->name('sub-categories.create');
//Сохранение
Route::post('/sub-categories/{category?}', [SubCategoryController::class, 'store'])->name('sub-categories.store');
//Просмотр
Route::get('/sub-categories/{subcategory?}', [SubCategoryController::class, 'show'])->name('sub-categories.show');
//Редактирование
Route::get('/sub-categories/{subcategory?}/edit', [SubCategoryController::class, 'edit'])->name('sub-categories.edit');
//Обновление
Route::put('/sub-categories/{subcategory?}', [SubCategoryController::class, 'update'])->name('sub-categories.update');
//Уничтожение
Route::delete('/sub-categories/{subcategory?}', [SubCategoryController::class, 'destroy'])->name('sub-categories.destroy');
//==============================================================================
