@extends('admin.layout-product')

@section('content-product')
    <h2>Редактор категорій</h2>
    <br>
    <table class="table-category">
        @foreach ($categories as $category)
        <tr class="table-category-row">
            <td>
                <h3><b>{{ $category->name }}</b></h3>
                    @foreach ($category->subCategories as $cat)
                        <tr class="table-category-subrow">
                            <td>{{$cat->name}}</td>
                        </tr>
                    @endforeach
            </td>
        </tr>
        @endforeach
    </table>
@endsection
