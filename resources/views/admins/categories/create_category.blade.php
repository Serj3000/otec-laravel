@extends('admins.layout-product');

@section('content-product')
<div class="content-product">
    <h2>Створимти нову Categoy</h2>
    <!-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <p>Error:</p>
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif -->

    <form method="POST" action="{{route('categories.store')}}">
        @include('admins.forms.form_category')
        <input type="submit" name="create-catigory" value="Create">
        <br>
        @csrf
    </form>

    <div>
        <h2>Створити нову Підкатегорію</h2>
        @include('admins.categories.create_subcategory')
    </div>

</div>

@endsection
