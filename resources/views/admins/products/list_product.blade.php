@extends('admins.layout-product')

@section('content-product')
    <div class="content-block">
        <h2>Редактор товарів</h2>
        <br>
        <p><b>Категорія:</b> {{ $sub_category->category->name??'' }}</p>
        <p><b>Підкатегорія:</b> {{ $sub_category->name??'' }}</p>
        <a class="button-create" href="{{route('products.create')}}">Create Product</a>
        <table width="100%" class="table-category">
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>price</th>

            @foreach ($products as $product)
            <tr class="table-category-row">
                <td width="4%" class="table-category-col">
                    <p><b>{{ $product->id }}</b></p>
                </td>
                <td width="16%" class="table-category-col">
                    <p><b>{{ $product->name }}</b></p>
                </td>
                <td class="table-category-col">
                    <p><b>{{ $product->description }}</b></p>
                </td>
                <td width="8%" class="table-category-col">
                    <p><b>$ {{ $product->price }}</b></p>
                </td>
                <td width="20%" class="table-category-col">
                    <a href="{{route('products.show')}}">Read</a>
                    <a href="{{route('products.edit')}}">Edit</a>
                    <a href="{{route('products.destroy')}}">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="content-paginate">
        @include('admins.paginate')
    </div>

@endsection
