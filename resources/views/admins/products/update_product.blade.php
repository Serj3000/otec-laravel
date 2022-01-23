@extends('admins.layout-product');

@section('content-product')
<div class="content-product">
    <h2>Редагувати Product: <span style="color: blue">{{$product->name}}</span></h2>

    <form method="POST" action="{{route('products.update', ['product'=>$product])}}">
        @method("PUT")
        @include('admins.forms.form_product')
        <input type="submit" name="update-pruduct" value="Update">
        @csrf
    </form>

</div>

@endsection
