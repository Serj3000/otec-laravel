@extends('admins.layout-product')

@section('content-product')

    <div class="content-product">
        <h3>Товар:</h3>
        <p>id: {{$product->id}}</p>
        <p>name: {{$product->name}}</p>
        <p>description: {{$product->description}}</p>
        <hr>
            <h4>Підкатегорія товару</h4>
            <p>id: {{$product->subCategory->id}}</p>
            <p>id: {{$product->subCategory->name}}</p>
        <hr>
                <h4>Категорія товару</h4>
                    <p>id: {{$product->subCategory->category->id}}</p>
                    <p>id: {{$product->subCategory->category->name}}</p>
        <hr>

    </div>

@endsection
