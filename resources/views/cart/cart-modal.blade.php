@if(!empty(session('cart')))
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Фото</th>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
                <th scope="col">Кол-во</th>
                <th><i class="fas fa-times"></i></th>
            </tr>
        </thead>
        <tbody>
            @foreach(session('cart') as $item)
            <tr>
                <td>
                    <a href="{{ route('products.show', ['slug' => $item['slug']])}}">
                        <img src="{{$item['img']}}" alt="{{$item['title']}}">
                    </a>
                </td>
                <td><a href="{{ route('products.show', ['slug' => $item['slug']])}}">{{$item['title']}}</a></td>
                <td>{{$item['price']}}</td>
                <td>@price_format($item['price']) руб</td>
                <td>{{$item['qty']}}</td>
                <td>
                    <span class="text-danger del-item" data-action="{{route('cart.del_item',['product_id' => $item['product_id']]) }}">
                        <i class="fas fa-times"></i>
                    </span>
                </td>
            </tr>
            @endforeach

            <tr>
                <td colspan="3" align="right">Итого:</td>
                <td id="modal-cart-qty">{{session('cart_qty')}}</td>
            </tr>
            <tr>
                <td colspan="3" align="right">На сумму:</td>
                <td id="modal-cart-total">@price_format(session('cart_total')) руб.</td>
            </tr>
        </tbody>
    </table>
</div>
@else
<h4>Корзина пуста</h4>
@endif