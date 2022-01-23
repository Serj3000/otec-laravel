<div class="content-product">

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
        <p>Sub Category name:</p>

            @if($errors->has("name-sub-category"))
                <div class="alert alert-danger">
                    @foreach ($errors->get("name-sub-category") as $error)
                        {{$error}}
                    @endforeach
                </div>
            @endif

        <input type="text" name="name-sub-category" value="{{old('name-sub-category')}}" @if($errors->has("name-sub-category")) style="border-color: red" @endif>
        <br>
        <p>Category slug:</p>

            @if($errors->has("slug-sub-category"))
                <div class="alert alert-danger">
                    @foreach ($errors->get("slug-sub-category") as $error)
                        {{$error}}
                    @endforeach
                </div>
            @endif

        <input type="text" name="slug-sub-category" value="{{old('sub-category-slug')}}" @if($errors->has("slug-sub-category")) style="border-color: red" @endif>
        <br><br>
        <input type="submit" name="create-sub-category" value="Create">
        <br>

        @csrf
    </form>
</div>
