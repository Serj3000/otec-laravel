@extends('admins.layout-product');

@section('content-product')

<div class="content-product">

    <form method="POST" action="{{route('sub-categories.store', ['category'=>$category])}}">
        @include('admins.forms.form_subcategory')
        <input type="submit" name="create-sub-category" value="Create">
        @csrf
    </form>
</div>

@endsection
