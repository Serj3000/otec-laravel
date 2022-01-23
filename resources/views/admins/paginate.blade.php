<div class="paginate-products">
    @if($products->currentPage()!=$products->lastPage())
    <div class="paginate-button">
        <p><a href="{{$products->nextPageUrl()}}"><i> Наступна </i></a></p>
    </div>
    @endif
    <div class="alert-paginate-products">
            Сторінок <span><i> {{$products->lastPage()}}</i></span>
        | Сторінка <span><i> {{$products->currentPage()}}</i></span>
    </div>
    @if($products->currentPage()!=1)
    <div class="paginate-button">
        <p><a href="{{$products->previousPageUrl()}}"><i> Попередня </i></a></p>
    </div>
    @endif
</div>
