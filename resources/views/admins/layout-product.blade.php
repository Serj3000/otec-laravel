<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/product.css') }}">
    <!-- <link rel="stylesheet" href="/css/product.css"> -->

    <title>Product</title>
</head>
<body>
    <div class="wrapper">
        <div class="content">

            <div class="categories">
                <div class="sidebar-list">
                    <ul class="list">
                    <?php foreach(\App\Models\Category::all() as $category): ?>
                        <li class="item">
                            <a href="/" class="link"><?=$category->name ?></a>
                                <ul class="sub-list">
                                    <?php foreach($category->subCategories as $subCategory): ?>
                                        <li class="sub-item"><a href="{{route('products.index', ['id_sub_cat'=>$subCategory->id])}}" class="sub-link"><?=$subCategory->name ?></a></li>
                                    <?php endforeach ?>
                                </ul>
                        </li>
                    <?php endforeach ?>
                    </ul>
                </div>

                <div class="sidebar-button">
                    <a class="button-create" href="{{route('categories.list')}}">Create Category</a>
                </div>
            </div>

            <div class="table-item">
                @yield('content-product')
            </div>

        </div>
    </div>
</body>
</html>
