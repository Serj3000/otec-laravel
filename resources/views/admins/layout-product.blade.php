<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <!-- <link rel="stylesheet" href="/css/style.css"> -->

    <title>Product</title>
</head>
<body>
    <div class="wrapper">
        <div class="content">

            <div class="sidebar">
                <div class="sidebar-list">
                    <ul class="list">
                    @foreach(\App\Models\Category::all() as $category)
                        <li class="item">
                            <a href="/" class="link">{{ $category->name }}</a>
                                <ul class="sub-list">
                                    @foreach($category->subCategories as $subCategory)
                                        <li class="sub-item"><a href="{{route('products.index', ['id_sub_cat'=>$subCategory->id])}}" class="sub-link">{{ $subCategory->name }}</a></li>
                                    @endforeach
                                </ul>
                        </li>
                    @endforeach
                    </ul>
                </div>

                <div class="sidebar-button">
                    <a class="button-create" href="{{route('categories.list')}}">Редактор Категорий</a>
                </div>
            </div>

            <div class="table-item">
                @yield('content-product')
            </div>

        </div>
    </div>
</body>
</html>
