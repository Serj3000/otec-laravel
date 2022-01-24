<p>Category name:</p>

    @if($errors->has("name"))
        <div class="alert alert-danger">
            @foreach ($errors->get("name") as $error)
                {{$error}}
            @endforeach
        </div>
    @endif

<input type="text" name="name" value="{{$category->name??''}}" @if($errors->has("name")) style="border-color: red" @endif>
<br><br>
