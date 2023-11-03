@extends('front.layouts.master')
@section('main-container')
    <section class="hero">
        <div class="container">
            <div class="row">

            </div>
            <div class="col-lg-12">
                <a href="/shop?brand%5B1%5D=on&minamount=0%C2%A0₫&maxamount=50.000.000%C2%A0₫&sort=asc">
                    <div class="hero__item set-bg"
                         data-setbg="https://cdn.hoanghamobile.com/i/home/Uploads/2023/05/02/14prm-pc.png"
                         style="background-size: contain;">
                    </div>
                </a>
            </div>
        </div>
        </div>
    </section>
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach( $product as $products)
                        <div class="col-lg-3">
                            <div class="categories__item set-bg" data-setbg="{{$products->images[0]->url}}">
                                <h5><a style
                                       =" white-space: nowrap;overflow: hidden; text-overflow: ellipsis; background: #7fad39;color: #fff"
                                       href="{{ route('shopId', ['id' => $products->id]) }}">{{$products->name}}"
                                        ">{{$products->name}}</a></h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*"><i class="fa-regular fa-eye"></i></li>
                            {{--                            <li data-filter=".oranges">Oranges</li>--}}
                            {{--                            <li data-filter=".fresh-meat">Fresh Meat</li>--}}
                            <li data-filter=".vegetables"><i class="fa-regular fa-eye-slash"></i></li>
                            {{--                            <li data-filter=".fastfood">Fastfood</li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($sort as $sorts)
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{$sorts->images[0]->url}}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="{{ route('shopId', ['id' => $sorts->id]) }}">{{$sorts->name}}</a></h6>
                                <h5>{{number_format($sorts->price)}} đ</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="{{ route('shopId', ['id' => 9]) }}"><img
                                src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/4/8/638165128219834891_F-H1_800x300.png"
                                alt=""></a>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="{{ route('shopId', ['id' => 10]) }}"><img
                                src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/4/28/638183175738166902_F-H1_800x300.png"
                                alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($latestProducts as $value)
                                    <a href="{{ route('shopId', ['id' => $value->id]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{$value->images[0]->url}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$value->name}}</h6>
                                            <span>{{number_format($value->price)}} đ</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach($latestProducts2 as $value)
                                    <a href="{{ route('shopId', ['id' => $value->id]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{$value->images[0]->url}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$value->name}}</h6>
                                            <span>{{number_format($value->price)}} đ</span>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($top as $value)
                                    <a href="{{ route('shopId', ['id' => $value->id]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{$value->images[0]->url}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$value->name}}</h6>
                                            <span>{{number_format($value->price)}} đ</span>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach($top2 as $value)
                                    <a href="{{ route('shopId', ['id' => $value->id]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{$value->images[0]->url}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$value->name}}</h6>
                                            <span>{{number_format($value->price)}} đ</span>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($latestProducts as $value)
                                    <a href="{{ route('shopId', ['id' => $value->id]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{$value->images[0]->url}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$value->name}}</h6>
                                            <span>{{number_format($value->price)}} đ</span>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                            <div class="latest-prdouct__slider__item">
                                @foreach($latestProducts2 as $value)
                                    <a href="{{ route('shopId', ['id' => $value->id]) }}" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            <img src="{{$value->images[0]->url}}" alt="">
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{$value->name}}</h6>
                                            <span>{{number_format($value->price)}} đ</span>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>Featured product introduction</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($top as $value)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img style="width: 250px;height: 250px;" src="{{$value->images[0]->url}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
{{--                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>--}}
{{--                                <li><i class="fa fa-comment-o"></i> 5</li>--}}
                            </ul>
                            <h5><a href="{{ route('shopId', ['id' => $value->id]) }}">{{$value->name}}</a></h5>
                            <p>{{$value->description}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
