@extends('admins.layout-product')

@section('content-product')
<div class="content-product">
    <h2>Створимти нову Categoy</h2>

    <form method="POST" action="{{route('categories.store')}}">
        @include('admins.forms.form_category')
        <input type="submit" name="create-category" value="Create">
        <br>
        @csrf
    </form>

</div>

@endsection
