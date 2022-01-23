@extends('admins.layout-product');

@section('content-product')
<div class="content-product">
    <h2>Редагувати Product: <span style="color: blue">{{$product->name}}</span></h2>

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

    <form method="POST" action="{{route('products.update', ['product'=>$product])}}">
        @method("PUT")
        @include('admins.forms.form_product')
        <input type="submit" name="update" value="Update">
        <br>

        @csrf
    </form>

</div>

@endsection
