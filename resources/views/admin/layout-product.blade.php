<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/product.css') }}">
    <!-- <link rel="stylesheet" href="/css/product.css"> -->

    <style>
        /* *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .wrapper{
            display: block;
            width: 100vw;
            margin: 0 auto;
        }

        .content{
            display: flex;
            justify-content: flex-start;
            align-items: stretch;
        }

        .categories{
            padding: 25px;
            background-color: cadetblue;
            width: 30%
        } */
    </style>

    <title>Product</title>
</head>
<body>
    <div class="wrapper">
        <div class="content">

            <div class="categories">

                <ul class="list">
                <?php foreach($categories as $category): ?>
                    <li class="item">
                        <a href="#" class="link"><?=$category->name ?></a>
                            <ul class="sub-list">
                                <?php foreach($category->subCategories as $subCategory): ?>
                                    <li class="sub-item"><a href="#" class="sub-link"><?=$subCategory->name ?></a></li>
                                <?php endforeach ?>
                            </ul>
                    </li>
                <?php endforeach ?>
                </ul>

            </div>

            <div class="table-item">
                @yield('content-product')
            </div>

        </div>
    </div>
</body>
</html>
