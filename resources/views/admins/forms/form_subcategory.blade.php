<p>Sub Category name:</p>

@if($errors->has("name"))
    <div class="alert alert-danger">
        @foreach ($errors->get("name") as $error)
            {{$error}}
        @endforeach
    </div>
@endif

<input type="text" name="name" value="{{$subcategory->name??''}}" @if($errors->has("name")) style="border-color: red" @endif>
<br>
<p>Category slug:</p>

@if($errors->has("slug"))
    <div class="alert alert-danger">
        @foreach ($errors->get("slug") as $error)
            {{$error}}
        @endforeach
    </div>
@endif

<input type="text" name="slug" value="{{$subcategory->slug??''}}" @if($errors->has("slug")) style="border-color: red" @endif>
<br><br>
