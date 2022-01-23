<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function create($category)
    {
        return view('admins.subcategories.create_subcategory', ['category'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, \App\Models\Category $category)
    {
        //Валидация методом validate()
        $validatedData = $request->validate([
            'name' => 'required|unique:sub_categories,name|min:2|max:25',
            // 'slug' => 'required|unique:sub_categories,slug|min:2|max:25',
        ]);

        $subcategory=new \App\Models\SubCategory();
        $subcategory->name=$validatedData['name'];
        // $subcategory->slug=$validatedData['slug'];
        $subcategory->cat_id=$category->id;
        $subcategory->save();

        return redirect()->route('sub-categories.index')->with('success', "Category: $subcategory->name was created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Models\SubCategory $subcategory)
    {
        // return view('admins.subcategories.show_subcategory', ['subcategory'=>$subcategory]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Models\SubCategory $subcategory)
    {
        return view('admins.subcategories.update_subcategory', ['subcategory'=>$subcategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\Models\SubCategory $subcategory)
    {
        //Валидация методом validate()
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:25|unique:sub_categories,name,'.$subcategory->id,
            // 'slug' => 'required|min:2|max:25|unique:sub_categories,slug,'.$subcategory->id,
            ]);

            $subcategory->name=$validatedData['name'];
            // $subcategory->slug=$validatedData['slug'];
            $subcategory->cat_id=$subcategory->category->id;
            $subcategory->save();

            return redirect()->route('sub-categories.index')->with('success', "Category: $subcategory->name was updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(\App\Models\SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('sub-categories.index')->with('success', "Category: $subcategory->name was deleted.");
    }
}
