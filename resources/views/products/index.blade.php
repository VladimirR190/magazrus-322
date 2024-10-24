@extends ('layouts.layout')

@section('title', 'Laravel Shop :: Home')

@section('content')

<div class="product-cards mb-5">
    @foreach ($products as $product)
    <div class="product-card">
        <div class="offer">
            @if($product->hit)
            <div class="offer-hit">Hit</div>
            @endif
            @if ($product->sale)
            <div class="offer-sale">Sale</div>
            @endif
        </div>
        <div class="card-thumb">
            <a href="{{ route('products.show', ['slug' => $product->slug])}}">
                <img src="{{ asset(' assets/front/img/1.jpg') }}" alt="">
            </a>
        </div>
        <div class="card-caption">
            <div class="card-title">
                <a href="{{ route('products.show', ['slug' => $product->slug])}}">{{ $product->title}}</a>
            </div>
            <div class="card-price text-center">
                @if($product->old_price)
                <del><small>{{ $product->old_price}} руб.</small></del>
                @endif
                {{$product->price}}руб.
            </div>
            <form action="{{ route('cart.add') }}" method="post" class="addtocart">
                @csrf
                <div class="input-group">
                    <input type="text" class="form-control" name="qty" value="1">
                    <input type="hidden" name="product id" value="{{ $product->id }}">
                    <div class="input-group-append">
                        <button class="btn btn-info btn-block cart-addtocart" type="submit"><i class="fas fa-cart-arrow-down"></i> Купить
                        </button>
                    </div>
                </div>
            </form>
           
            <div class="item-status"><i class="{{ $product->status->icon}}"></i> {{$product->status->title}}</div>
        </div>
    </div><!--/product-card -->
    @endforeach
    <div>

        <nav aria-label="Page navigation example">
            {{$products->links()}}
        </nav>
    </div>
    @endsection