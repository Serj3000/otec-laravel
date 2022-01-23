@extends('admins.layout-product')

@section('content-product')
<div class="content-product">
    <h2>Редагувати Підкатегорію: <span style="color: blue">{{$subcategory->name}}</span></h2>

    <form method="POST" action="{{route('sub-categories.update', ['sub_category'=>$subcategory])}}">
        @method("PUT")
        @include('admins.forms.form_subcategory')
        <input type="submit" name="create-subcatigory" value="Update">
        <br>
        @csrf
    </form>

</div>

@endsection
