@extends('admins.layout-product')

@section('content-product')
    <div class="content-categories">
        <h2>Редактор категорій</h2>
        <br>
        <div>
            <a class="button-create" href="{{route('categories.create')}}">Create Category</a>
        </div>
        <div class="clear"></div>
        <table class="table-category">
        <?php $n=0 ?>
            @foreach ($categories as $category)
            <?php $i=1 ?>
                <tr class="table-category-row">
                    <td width="6%" class="table-category-col">{{++$n}}</td>
                    <td class="table-category-col">
                        <h3><b>{{ $category->name }}</b></h3>
                    </td>
                    <td width="10%" class="table-category-col">{{$category->slug}}</td>
                    <td width="30%" class="table-category-col">
                        <a href="{{route('categories.show', ['category'=>$category->id])}}">Read</a>
                        <a href="{{route('categories.edit', ['category'=>$category->id])}}">Edit</a>

                        <form method="POST" action="{{route('categories.destroy', ['category'=>$category->id])}}">
                            @method('delete')
                            <input class="btn btn-danger btn-sm fas fa-pencil-alt" type="submit" value="Delete">
                            @csrf
                        </form>

                    </td>
                </tr>
                @foreach ($category->subCategories as $cat)
                    <tr class="table-subcategory-row">
                        <td width="6%" class="table-subcategory-col">{{$n}}.{{$i++}}</td>


                        <td class="table-subcategory-col"><a class="sub-link" href="{{route('products.index', ['id_sub_cat'=>$cat->id])}}">{{$cat->name}}</a></td>

                        <td width="10%" class="table-subcategory-col">{{$cat->slug}}</td>

                        <td width="30%" class="table-subcategory-col">
                            <a href="{{route('sub-categories.edit', ['subcategory'=>$cat->id])}}">Edit >></a>

                            <form method="POST" action="{{route('sub-categories.destroy', ['subcategory'=>$cat->id])}}">
                            @method('delete')
                                <input class="btn btn-danger btn-sm fas fa-pencil-alt" type="submit" value="Delete">
                            @csrf
                            </form>
                        </td>

                    </tr>
                <!-- </tr> -->
                @endforeach
                    <tr>
                        <td colspan="4"><a style="float: right; padding: 5px; margin-right: 10px;" class="button-create" href="{{route('sub-categories.create', ['category'=>$category])}}">Create Sub Category</a></td>
                    </tr>
            @endforeach
        </table>
    </div>
@endsection
