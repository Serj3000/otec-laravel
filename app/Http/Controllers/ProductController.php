<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class ProductController extends Controller
{
    //Index Общий
    public function index($id_sub_cat=null){
        $products=\App\Models\Product::where('sub_cat_id', '=', $id_sub_cat)
                    ->orderBy('price', 'desc')
                    ->paginate(5);

        $sub_category=\App\Models\SubCategory::find($id_sub_cat);
        return view('admins.products.list_product',
                        ['products'=>$products,
                         'id_sub_cat'=>$id_sub_cat,
                         'sub_category'=>$sub_category]);
    }

    //Create Создание
    public function create(){
        return view('admins.products.create_product');
    }

    //Store Сохранение
    public function store(Request $request){
        // // Через объект Request мы можем обратится к полям нашей формы переданной из метода create() контроллера ProductController

        //Валидация методом validate()
        $validatedData = $request->validate([
            'name' => 'required|unique:products,name|min:2|max:255',
            'slug' => 'required|unique:products,slug|min:2|max:25',
        ]);

        // Метод валидации validate() после успешной проверки возвращает массив,
        // который желательно использовать для внесения в БД данных из поля формы
        $product=new \App\Models\Product();
        $product->name=$validatedData['name'];
        $product->slug=$validatedData['slug'];
        $product->description='dfgdfgdfgdf dgdfgdfg dfgdfg dfgd';
        $product->sub_cat_id='1';
        $product->save();

        //return redirect()->action('ProductController@index');
        return redirect()->route('products.index')->with('success', "Product: $product->name was created.");
    }

    //Show Просмотр
    public function show(\App\Models\Product $product){
        return view('admins.products.show_product', ['product'=>$product]);
    }

    //Edit Редактирование
    public function edit(\App\Models\Product $product){
        return view('admins.products.update_product', ['product'=>$product]);
    }

    //Update Обновление
    public function update(Request $request, \App\Models\Product $product){
        // //Валидация методом validate()
        $validatedData = $request->validate([
        'name' => 'required|min:2|max:25|unique:products,name,'.$product->id,
        'slug' => 'required|min:2|max:25|unique:products,slug,'.$product->id,
        ]);

        // $validatedData=$request->validateWithBag('blog', [
        //     'name' => ['required', 'min:2', 'max:25', 'unique:categories,name,'.$category->id],
        //     'slug' => ['required', 'min:2', 'max:25', 'unique:categories,slug,'.$category->id],
        // ]);

        // В отличае от метода store() экземпляр класса new \App\Models\Product(); для метода update() создавать не нужно,
        // т.к. он приходит в аргаменте метода update(\App\Models\Product $product, Request $request)
        $product=new \App\Models\Product();
        $product->name=$validatedData['name'];
        $product->slug=$validatedData['slug'];
        $product->save();

        // Редиректы с одноразовыми переменными сессии
        return redirect()->route('products.index', ['id_sub_cat'=>$product->sub_cat_id])->with('success', "Product: $product->name was updated.");
    }

    //Delete Уничтожение
    public function destroy(\App\Models\Product $product){
    $product->delete();
    return redirect()->route('products.index')->with('success', "Product: $product->name was deleted.");
    }
}
