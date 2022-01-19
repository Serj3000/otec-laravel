<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //Index Общий
    public function index(){
        return view('admins.categories.list_category', ['categories'=>\App\Models\Category::all()]);
    }

    //Create Создание
    public function create(){
        return view('admins.categories.create_category');
    }

    //Store Сохранение
    public function store(Request $request){
        // // Через объект Request мы можем обратится к полям нашей формы переданной из метода create() контроллера CategoryController
        //dd($request->name, $request->slug);
        // //$category=new \App\Category();
        // //$category->name=$request->name;
        // //$category->slug=$request->slug;
        // //$category->save();

        //Валидация методом validate()
        $validatedData = $request->validate([
            'name' => 'required|unique:categories,name|min:2|max:25',
            'slug' => 'required|unique:categories,slug|min:2|max:25',
        ]);

        // $category=new \App\Category();
        // $category->name=$request->name;
        // $category->slug=$request->slug;
        // $category->save();

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

    //Show Просмотр
    public function show(){

    }

    //Edit Редактирование
    public function edit(\App\Models\Category $category){
        return view('admins.categories.update_category', ['category'=>$category]);
    }

    //Update Обновление
    public function update(\App\Models\Category $category, Request $request){
        //dd($request->all());
        // //Валидация методом validate()
        $validatedData = $request->validate([
        'name' => 'required|min:2|max:25|unique:categories,name,'.$category->id,
        'slug' => 'required|min:2|max:25|unique:categories,slug,'.$category->id,
        ]);

        // $validatedData=$request->validateWithBag('blog', [
        //     'name' => ['required', 'min:2', 'max:25', 'unique:categories,name,'.$category->id],
        //     'slug' => ['required', 'min:2', 'max:25', 'unique:categories,slug,'.$category->id],
        // ]);

        // В отличае от метода store() экземпляр класса new \App\Category(); для метода update() создавать не нужно,
        // т.к. он приходит в аргаменте метода update(\App\Category $category, Request $request)
        $category->name=$validatedData['name'];
        $category->slug=$validatedData['slug'];
        //$category->updated_at=\Carbon\Carbon::now();
        $category->save();

        // Редиректы с одноразовыми переменными сессии
        // https://laravel.su/docs/6.x/responses#redirecting-named-routes
        return redirect()->route('categories.index')->with('success', "Category: $category->name was updated.");
    }

    //Delete Уничтожение
    public function destroy(\App\Models\Category $category){
    $category->delete();
    return redirect()->route('categories.index')->with('success', "Category: $category->name was deleted.");
    }
}
