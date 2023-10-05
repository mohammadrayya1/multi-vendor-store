


<div class="col-lg-3 col-md-6 col-12">
    <!-- Start Single Product -->
    <div class="single-product">
        <div class="product-image">

{{--            <img src="{{asset('uploads/'.$product->product_image)}}" alt="#">--}}
            <img src="{{$product->ImageUrl}}" alt="#">
            @if(!$product->SalePercent)
                    <span class="sale-tag">{{$product->SalePercent}}%</span>
            @endif
            <div class="button">
                <a href="" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
            </div>
        </div>
        <div class="product-info">
            <span class="category">{{$product->category->name}}</span>
            <h4 class="title">
                <a href="{{route('home.products.show',$product->slug)}}">{{$product->product_name}}</a>
            </h4>
            <ul class="review">
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star-filled"></i></li>
                <li><i class="lni lni-star"></i></li>
                <li><span>4.0 Review(s)</span></li>
            </ul>
            <div class="price">
                <span>{{Currancy::format($product->price)}}</span>
                <span class="discount-price">@if($product->price_compare){{Currancy::format($product->compare_price)}}@endif</span>
            </div>
        </div>
    </div>
    <!-- End Single Product -->
</div>
