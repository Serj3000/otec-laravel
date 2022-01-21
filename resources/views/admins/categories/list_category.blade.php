@extends('admins.layout-product')

@section('content-product')
    <div class="content-categories">
        <h2>Редактор категорій</h2>
        <br>

        <table width="100%" class="table-category">
        <?php $n=0 ?>
            @foreach ($categories as $category)
            <?php $i=1 ?>
                <tr class="table-category-row">
                    <td width="6%" class="table-category-col">{{++$n}}</td>
                    <td class="table-category-col">
                        <h3><b>{{ $category->name }} ++</b></h3>
                    </td>
                    <td width="10%" class="table-category-col">{{$category->slug}}</td>
                    <td width="30%" class="table-category-col">
                        <a href="{{route('categories.show')}}">Read</a>
                        <a href="{{route('categories.edit')}}">Edit</a>
                        <a href="{{route('categories.destroy')}}">Delete</a>
                    </td>
                </tr>
                @foreach ($category->subCategories as $cat)
                    <tr class="table-category-row">
                        <td width="6%" class="table-category-col">{{$n}}.{{$i++}}</td>
                        <td>{{$cat->name}}</td>
                        <td width="10%" class="table-category-col">{{$cat->slug}}</td>
                        <td width="30%" class="table-category-col">
                            <a href="{{route('categories.show')}}">Read</a>
                            <a href="{{route('categories.edit')}}">Edit</a>
                            <a href="{{route('categories.destroy')}}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </div>
@endsection
