@extends('admins.layout-product');

@section('content-product')
<div class="content-product">
    <h2>Створимти новий Product</h2>

    <form method="POST" action="{{route('products.store')}}">
        @include('admins.forms.form_product')
        <input type="submit" name="create" value="Create">
        <br>
        @csrf
    </form>

</div>

@endsection
