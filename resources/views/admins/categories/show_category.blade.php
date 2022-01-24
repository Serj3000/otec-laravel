@extends('admins.layout-product')

@section('content-product')
<div class="content-product">
    <h3>Категорія товарів:</h3>
    <p>id: {{$category->id}}</p>
    <p>name: {{$category->name}}</p>
    <hr>
    <h4>Підкатегорія товарів:</h4>
    @foreach($category->subCategories as $subcategory)
        <p>id: {{$subcategory->id}}</p>
        <p>name: {{$subcategory->name}}</p>
            <!-- <h4>Товари:</h4>
            @foreach($subcategory->products as $product)
                <p>id: {{$product->id}}</p>
                <p>name: {{$product->name}}</p>
            @endforeach -->
    @endforeach

</div>
@endsection
