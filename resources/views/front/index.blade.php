@extends('front.layouts.master')
@section('main-container')
    <section class="hero">
        <div class="container">
            <div class="row">

            </div>
            <div class="col-lg-12">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" style="margin-bottom: 50px">
                    <div class="carousel-inner">
                        @foreach ($slides as $slide)
                            <a href="{{ $slide->url }}">
                                <div class="carousel-item active" data-bs-interval="2000">
                                    <img src="{{ asset('images/slide/' . $slide->name) }}" class="d-block w-100 img-fluid"
                                         alt="..." style="height: 431px; ">
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                            data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
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
                                       href="{{ route('shopId', ['id' => encrypt($products->id), 'product' => Str::slug($products->name)]) }}">{{$products->name}}</a></h5>
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

                                    @guest
                                        <li class="favouriteAdd" value="{{$sorts->id}}"><a href="#"><i class="fa fa-heart"></i></a></li>
                                    @else
                                        @if (Auth::check())
                                            <li class="favouriteAdd" value="{{$sorts->id}}"> <a
                                                @if($favorite->where('product_id', $sorts->id)->where('user_id',auth()->user()->id)->count() > 0)
                                                    style="background: #7fad39; border-color: #7fad39"
                                                @endif
                                                href=""
                                            >
                                                <i class="fa fa-heart"></i>
                                            </a>
                                            </li>
                                        @endif
                                    @endguest
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="{{ route('shopId', ['id' => encrypt($sorts->id), 'product' => Str::slug($sorts->name)]) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">

                                <h6><a href="{{ route('shopId', ['id' => encrypt($sorts->id), 'product' => Str::slug($sorts->name)]) }}">{{$sorts->name}}</a></h6>

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
                        <a href="#"><img
                                src="https://images.fpt.shop/unsafe/fit-in/800x300/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/2023/4/8/638165128219834891_F-H1_800x300.png"
                                alt=""></a>

                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <a href="#"><img
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
                                    <a href="{{ route('shopId', ['id' => encrypt($value->id), 'product' => Str::slug($value->name)]) }}" class="latest-product__item">
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
                                    <a href="{{ route('shopId', ['id' => encrypt($value->id), 'product' => Str::slug($value->name)]) }}" class="latest-product__item">
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
                                    <a href="{{ route('shopId', ['id' => encrypt($value->id), 'product' => Str::slug($value->name)]) }}" class="latest-product__item">
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
                                    <a href="{{ route('shopId', ['id' => encrypt($value->id), 'product' => Str::slug($value->name)]) }}" class="latest-product__item">
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
                                    <a href="{{ route('shopId', ['id' => encrypt($value->id), 'product' => Str::slug($value->name)]) }}" class="latest-product__item">
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
                                    <a href="{{ route('shopId', ['id' => encrypt($value->id), 'product' => Str::slug($value->name)]) }}" class="latest-product__item">
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
                                <h5><a href="{{ route('shopId', ['id' => encrypt($value->id), 'product' => Str::slug($value->name)]) }}">{{$value->name}}</a></h5>
                                <p>{{$value->description}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <style>
        .sendBtn1 {
            background-color: green;
            height: 40px;
            width: 40px;
            display: table-cell;
            align-content: center;
            border: none;
            cursor: pointer;
            float: right;
        }

        .message1 {
            display: table-cell;
            height: 40px;
            border: none;
            width: 90%;
        }

        .form-app-chat {
            position: fixed;
            right: 0;
            bottom: 0;
            border: 1px solid;
            padding: 5px;
            width: 350px;
            visibility: hidden;
        }
        .chat-persons{
            border: 1px solid;
            height: 300px;
            width: 406px;
            margin-bottom: 10px;
            overflow: scroll;
            scroll-behavior: auto;
        }
        .messageS1 {
            float: left;
        }
        .messageS2{
            float: right;
            margin-right: 40px;
            margin-top: 20px;
        }
        .fa {
            font-size: 18px;
        }
        .double-choose{
            display: flex;
        }
        .choose-delete{
            font-size: 9px;
            margin-right: 5px;
        }
        .choose-modify{
            font-size: 9px;
        }
    </style>
    <section class="mini-app-chat">
        <img alt="Chat icon" loading="lazy" decoding="async" onclick="clickChat()" data-nimg="fill" class="_1n5grcp6" style="position:fixed;height:100xp;width:100px;right:0;bottom:0;color:transparent;margin: 30px" src="https://cdn-icons-png.flaticon.com/128/566/566718.png">
        <div class="form-app-chat">
            <img src="https://cdn-icons-png.flaticon.com/128/3183/3183327.png" onclick="clickClose()" data-src="https://cdn-icons-png.flaticon.com/128/3183/3183327.png" alt="Arrow " title="Arrow " width="20" height="20" class="lzy lazyload--done" srcset="https://cdn-icons-png.flaticon.com/128/3183/3183327.png 4x">
            <div class="chat-persons" id="chat-persons">
                @if(Auth::check())
                    @foreach($chat as $chats)
                        @if($chats->user_id == auth()->user()->id && auth()->user()->type == "user")
                            <div class="messageS1" id="messageS1">You: {{ $chats->chat }}
                                <div class="double-choose">
                                    <form action="{{route('delete.chat',$chats->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="width: 50%;">Xoá</button>
                                    </form>
                                    <a href=""><div class="choose-modify">Sửa</div></a>
                                </div>
                            </div><br>
                        @endif
                        @foreach($rep as $reps)
                            @if($reps->user_id == $chats->user_id)
                                <div class="messageS2" id="messageS2">Admin: {{ $reps->chat }}</div><br>
                            @endif
                        @endforeach
                    @endforeach
                @endif
            </div>
            <form id="chatForm1" action="{{ route('add.chat') }}" method="post">
                @csrf
                @if(Auth::check())
                    <input type="hidden" name="user_id" id="user_id" value="{{Auth()->user()->id}}">
                @endif

                <script>
                    // var form1 = document.getElementById("chatForm1");
                    // var accessMsg1 = document.getElementById('message1');
                    // var displayMsg1 = document.getElementById('chat-persons');
                    // var mesValue1 = 'You: ' + accessMsg1.value;

                    // function handleForm(event) {
                    //     event.preventDefault();
                    // }
                    // form1.addEventListener('submit', handleForm);

                    // function sendMessage1() {
                    //     displayMsg1.innerHTML += '<div class="messageS1" id="messageS1"> You: ' + accessMsg1.value + "</div><br>";
                    //     scrollToBottom('messageS1');
                    //     form1.reset();
                    // }

                    // function scrollToBottom(id) {
                    //     var div = document.getElementById(id);
                    //     div.scrollTop = div.scrollHeight - div.clientHeight;
                    // }

                    function clickChat() {
                        document.querySelector('.form-app-chat').style.visibility = "visible";
                        document.querySelector('._1n5grcp6').style.visibility = "hidden";
                    }

                    function clickClose() {
                        document.querySelector('.form-app-chat').style.visibility = "hidden";
                        document.querySelector('._1n5grcp6').style.visibility = "visible";
                    }
                </script>
@endsection
