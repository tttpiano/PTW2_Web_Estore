@extends('front.layouts.master')
@section('main-container')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th class="shoping__product">Products</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>

                            @if($listCartItem != null)
                                @foreach($listCartItem as $value)
                            <tbody>

                                    <tr>

                                        <td class="shoping__cart__item" style="width: 600px !important;">
                                            <img style="width: 100px;" src="{{$value->product->images[0]->url}}" alt="">
                                            <h5>{{$value->product->name}}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{number_format($value->product->price)}}đ
                                        </td>
                                        <td class="shoping__cart__quantity">
                                            <div class="quantity">
                                                <div class="pro-qty abc">
                                                    <input type="text" name="quantity" id="quantity"
                                                           value="{{$value->quantity}}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                            {{ number_format($value->product->price * $value->quantity+1)}}đ
                                        </td>
                                        <td class="shoping__cart__item__close" data-product-id="{{$value->id}}">
                                            <a href="{{route('cart.delete',['id' => $value->id])}}"><span
                                                    class="icon_close"></span></a>
                                            <a href="" class="edit_cart" style="margin-left: 10px"><span><i
                                                        class="fa-regular fa-pen-to-square edit_cart1"></i></span></a>
                                        </td>
                                    </tr>

                            </tbody>
                                @endforeach

                            @endif

                            @if($listCartItem === null)
                                <p>không có sản phẩm nào ở trong giỏ hàng</p>
                            @endif

                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{route('shop')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Total <span> {{ number_format($total) }}đ</span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('storage/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('storage/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('storage/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('storage/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('storage/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('storage/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('storage/js/owl.carousel.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {
            $('.edit_cart1').click(function () {

                var row = $(this).closest('tr'); // Lấy hàng cha gần nhất (tr)
                var productId = row.find('.shoping__cart__item__close').data('product-id');
                var quantity = row.find('.pro-qty input').val();
                var url = "{{ route('cart.edit',['id' => 'productId']) }}";
                url = url.replace('productId', productId);
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {
                        quantity: quantity
                    },
                    success: function (response) {

                    },
                    error: function () {
                        alert('Có lỗi xảy ra.');
                    }
                });
            });
        });
    </script>
@endsection
