@extends('admins.layout-product')

@section('content-product')
<div class="content-product">
    <h2>Редагувати Categoy: <span style="color: blue">{{$category->name}}</span></h2>

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

    <form method="POST" action="{{route('categories.update', ['category'=>$category])}}">
        @method("PUT")
        @include('admins.forms.form_category')
        <input type="submit" name="update-category" value="Update">
        <br>
        @csrf
    </form>

</div>

@endsection
