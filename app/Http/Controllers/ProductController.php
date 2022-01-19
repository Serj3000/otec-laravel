<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Index Общий
    public function index(){
        return view('admins.products.list_product', ['products'=>\App\Models\Product::all()]);
    }

    //Create Создание
    public function create(){
        return view('admins.products.create_product');
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
            'name' => 'required|unique:products,name|min:2|max:25',
            'slug' => 'required|unique:products,slug|min:2|max:25',
        ]);

        // $category=new \App\Category();
        // $category->name=$request->name;
        // $category->slug=$request->slug;
        // $category->save();

        // Метод валидации validate() после успешной проверки возвращает массив,
        // который желательно использовать для внесения в БД данных из поля формы
        $product=new \App\Models\Product();
        $product->name=$validatedData['name'];
        $product->slug=$validatedData['slug'];
        //$category->created_at=\Carbon\Carbon::now();
        $product->save();

        //return redirect()->action('CategoryController@index');
        return redirect()->route('products.index')->with('success', "Product: $product->name was created.");
    }

    //Show Просмотр
    public function show(){

    }

    //Edit Редактирование
    public function edit(\App\Models\Product $category){
        return view('admins.products.update_product', ['product'=>$product]);
    }

    //Update Обновление
    public function update(\App\Models\Product $product, Request $request){
        //dd($request->all());
        // //Валидация методом validate()
        $validatedData = $request->validate([
        'name' => 'required|min:2|max:25|unique:products,name,'.$product->id,
        'slug' => 'required|min:2|max:25|unique:products,slug,'.$product->id,
        ]);

        // $validatedData=$request->validateWithBag('blog', [
        //     'name' => ['required', 'min:2', 'max:25', 'unique:categories,name,'.$category->id],
        //     'slug' => ['required', 'min:2', 'max:25', 'unique:categories,slug,'.$category->id],
        // ]);

        // В отличае от метода store() экземпляр класса new \App\Category(); для метода update() создавать не нужно,
        // т.к. он приходит в аргаменте метода update(\App\Category $category, Request $request)
        $product->name=$validatedData['name'];
        $product->slug=$validatedData['slug'];
        //$category->updated_at=\Carbon\Carbon::now();
        $product->save();

        // Редиректы с одноразовыми переменными сессии
        // https://laravel.su/docs/6.x/responses#redirecting-named-routes
        return redirect()->route('products.index')->with('success', "Product: $product->name was updated.");
    }

    //Delete Уничтожение
    public function destroy(\App\Models\Product $product){
    $product->delete();
    return redirect()->route('products.index')->with('success', "Product: $product->name was deleted.");
    }
}
