<p>Product name:</p>

@if($errors->has("name"))
    <div class="alert alert-danger">
        @foreach ($errors->get("name") as $error)
            {{$error}}
        @endforeach
    </div>
@endif

<input type="text" name="name" value="{{$product->name??''}}" @if($errors->has("name")) style="border-color: red" @endif>
<br>

<p>Product slug:</p>

    @if($errors->has("slug"))
        <div class="alert alert-danger">
            @foreach ($errors->get("slug") as $error)
                {{$error}}
            @endforeach
        </div>
    @endif

<input type="text" name="slug" value="{{old('slug')}}" @if($errors->has("slug")) style="border-color: red" @endif>
<br>

<p>Product description:</p>

    @if($errors->has("description"))
        <div class="alert alert-danger">
            @foreach ($errors->get("description") as $error)
                {{$error}}
            @endforeach
        </div>
    @endif

<textarea name="description" id="description" cols="30" rows="10" @if($errors->has("description")) style="border-color: red;" @endif>{{$product->description??''}}</textarea>
<br>

<p>Product price:</p>

    @if($errors->has("price"))
        <div class="alert alert-danger">
            @foreach ($errors->get("price") as $error)
                {{$error}}
            @endforeach
        </div>
    @endif

<input type="text" name="price" value="{{$product->price??''}}" @if($errors->has("price")) style="border-color: red" @endif> $
<br><br>
