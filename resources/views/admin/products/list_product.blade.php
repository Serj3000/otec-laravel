@extends('admin.layout-product')

@section('content-product')
    <h2>Редактор товарів</h2>
    <br>
    <table class="table-category">
        @foreach ($products as $product)
        <tr class="table-category-row">
            <td>
                <h3><b>{{ $product->name }}</b></h3>
                    @foreach ($category->subCategories as $prod)
                        <tr class="table-category-subrow">
                            <td>{{$prod->name}}</td>
                        </tr>
                    @endforeach
            </td>
        </tr>
        @endforeach
    </table>
@endsection
