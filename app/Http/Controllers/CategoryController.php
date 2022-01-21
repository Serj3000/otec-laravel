<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**Index Общий
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Index Общий
    public function index()
    {
        $categories=\App\Models\Category::all();
        return view('admins.categories.list_category', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Create Создание
    public function create()
    {
        return view('admins.categories.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // Store Сохранение
    public function store(Request $request)
    {
        //Валидация методом validate()
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name|min:2|max:25',
            'slug' => 'required|unique:categories,slug|min:2|max:25',
        ]);

        // Метод валидации validate() после успешной проверки возвращает массив,
        // который желательно использовать для внесения в БД данных из поля формы
        $category=new \App\Models\Category();
        $category->name=$validatedData['name'];
        $category->slug=$validatedData['slug'];
        //$category->created_at=\Carbon\Carbon::now();
        $category->save();

        //return redirect()->action('CategoryController@index');
        return redirect()->route('categories.index')->with('success', "Category: $category->name was created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Show Просмотр
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Edit Редактирование
    public function edit(\App\Models\Category $category)
    {
        return view('admins.categories.update_category', ['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Update Обновление
    public function update(Request $request, $id)
    {
        //Валидация методом validate()
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:25|unique:categories,name,'.$category->id,
            'slug' => 'required|min:2|max:25|unique:categories,slug,'.$category->id,
            ]);

        // В отличае от метода store() экземпляр класса new \App\Models\Category(); для метода update() создавать не нужно,
        // т.к. он приходит в аргаменте метода update(\App\Models\Category $category, Request $request)
        $category->name=$validatedData['name'];
        $category->slug=$validatedData['slug'];
        //$category->updated_at=\Carbon\Carbon::now();
        $category->save();

        // Редиректы с одноразовыми переменными сессии
        // https://laravel.su/docs/6.x/responses#redirecting-named-routes
        return redirect()->route('categories.index')->with('success', "Category: $category->name was updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Delete Уничтожение
    public function destroy(\App\Models\Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', "Category: $category->name was deleted.");
    }
}
