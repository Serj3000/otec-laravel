@extends('admins.layout-product');

@section('content-product')
<div class="content-product">
    <p>This is my body content. show</p>
    <p>{{$category}}</p>
    <hr>
    <?php echo __DIR__ ?>
</div>
@endsection
