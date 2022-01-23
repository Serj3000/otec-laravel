@extends('admins.layout-product')

@section('content-product')
    <div class="content-block">
        <h2>Редактор товарів</h2>
        <br>
        <p><b>Категорія:</b> {{ $sub_category->category->name??'' }}</p>
        <p><b>Підкатегорія:</b> {{ $sub_category->name??'' }}</p>
        <a class="button-create" href="{{route('products.create', ['id_sub_cat'=>$id_sub_cat])}}">Create Product</a>
        <div class="clear"></div>
        <table class="table-category">
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Action</th>

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
                <td width="10%" class="table-category-col">
                    <p><b>$ {{ $product->price }}</b></p>
                </td>
                <td width="18%" class="table-category-col">
                    <a href="{{route('products.show', ['product'=>$product->id])}}" class="btn-read">Read</a>
                    <a href="{{route('products.edit', ['product'=>$product->id])}}" class="btn-edit">Edit</a>
                    <form method="POST" action="{{route('products.destroy', ['product'=>$product->id])}}">
                        @method('delete')
                        <input class="btn-delete" type="submit" value="Delete">
                        @csrf
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

    <div class="content-paginate">
        @include('admins.paginate')
    </div>

@endsection
