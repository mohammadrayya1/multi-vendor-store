
<div class="cart-items">
    <a href="javascript:void(0)" class="main-btn">
        <i class="lni lni-cart"></i>
        <span class="total-items">{{$items->count()}}</span>
    </a>
    <!-- Shopping Item -->
    <div class="shopping-item">
        <div class="dropdown-cart-header">
            <span>{{$items->count()}}</span>
            <a href="{{route("carts.index")}}">View Cart</a>
        </div>
        <ul class="shopping-list">
            @foreach($items as $item)
            <li>
                <a href="{{route("carts.destroy",$item->id)}}" class="remove" title="Remove this item"><i
                        class="lni lni-close"></i></a>
                <div class="cart-img-head">
                    <a class="cart-img" href="product-details.html"><img
                            src="{{$item->product->ImageUrl}}" alt="#"></a>
                </div>

                <div class="content">
                    <h4><a href="product-details.html">
                          {{$item->product->product_name}}</a></h4>
                    <p class="quantity">{{$item->quantity}} <span class="amount">{{Currancy::format($item->product->price * $item->quantity)}}</span></p>
                </div>
            </li>
            @endforeach

        </ul>
        <div class="bottom">
            <div class="total">
                <span>Total</span>
                <span class="total-amount">{{Currancy::format($total)}}</span>
            </div>
            <div class="button">
                <a href="checkout.html" class="btn animate">Checkout</a>
            </div>
        </div>
    </div>
    <!--/ End Shopping Item -->
</div>
