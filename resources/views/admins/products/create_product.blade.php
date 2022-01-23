@extends('admins.layout-product');

@section('content-product')
<div class="content-product">
    <h2>====== Створити новий Product =====</h2>

    <form method="POST" action="{{route('products.store')}}">
        @include('admins.forms.form_product')
        @include('admins.forms.form_category')
        <input type="submit" name="create-product" value="Create">
        <br>
        @csrf
    </form>

</div>

@endsection
