@extends('admins.layout-product');

@section('content-product')
<div class="content-product">
    <h2>====== Створити новий Product =====</h2>

    <form method="POST" action="{{route('products.store', ['id_sub_cat'=>$id_sub_cat])}}">
        @include('admins.forms.form_product')
        <input type="submit" name="create-product" value="Create">
        @csrf
    </form>

</div>

@endsection
