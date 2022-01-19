<?php

use Illuminate\Support\Facades\Route;

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
    $subCategories=\App\Models\SubCategory::all();
    $products=\App\Models\Product::all();

    return view('admin.categories.list_category', [
        'categories'=>$categories,
        'subCategories'=>$subCategories,
        'products'=>$products
    ]);
});

//Общий перечень объектов
Route::get('/categories', 'CategoryController@index')->name('categories.index');
//Создание
Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
//Сохранение
Route::post('/categories', 'CategoryController@store')->name('categories.store');
//Просмотр
Route::get('/categories/{category?}', 'CategoryController@show')->name('categories.show');
//Редактирование
Route::get('/categories/{category?}/edit', 'CategoryController@edit')->name('categories.edit');
//Обновление
Route::put('/categories/{category?}', 'CategoryController@update')->name('categories.update');
//Уничтожение
Route::delete('/categories/{category?}', 'CategoryController@destroy')->name('categories.destroy');
