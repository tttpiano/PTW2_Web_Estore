<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="#"><img src="{{assert("storage/img/logo.png")}}" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
            <li><a href=""><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
        </ul>
        <div class="header__cart__price">item: <span></span></div>
    </div>
    <div class="humberger__menu__widget">
        <div class="header__top__right__language">
            <img src="{{assert("storage/img/language.png")}}" alt="">
            <div>English</div>
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#">Spanis</a></li>
                <li><a href="#">English</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{route('home')}}">Home</a></li>
            <li><a href="{{route("shop")}}">Shop</a></li>
            <li><a href="">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="">Shop Details</a></li>
                    <li><a href="">Shoping Cart</a></li>
                    <li><a href="">Check Out</a></li>

                </ul>
            </li>
            <li><a href="">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header__top__left">
                        <ul>

                            @guest
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            @else
                                @if (Auth::check())
                                    <li><i class="fa fa-envelope"></i>{{ auth()->user()->email }} </li>
                                    <li>Free Shipping for all Order of $99</li>
                                @endif
                            @endguest
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="header__top__right">
                        <div class="header__top__right__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                            <a href="#"><i class="fa fa-pinterest-p"></i></a>
                        </div>
                        <div class="header__top__right__language">
                            <img src="{{assert("storage/img/language.png")}}" alt="">
                            <div>English</div>
                            <span class="arrow_carrot-down"></span>
                            <ul>
                                <li><a href="#">Spanis</a></li>
                                <li><a href="#">English</a></li>
                            </ul>
                        </div>
                        <div class="header__top__right__auth">
                            @guest
                                <a href="{{route("login")}}"><i class="fa fa-user"></i> Login</a>
                            @else
                                @if (Auth::check())
                                    <div style="display: flex; list-style: none">
                                        <li style="color:#1c7430; margin-right: 20px" >{{ auth()->user()->name }}</li>
                                        <li><a href="{{ route('signout') }}"><i class="fa fa-user-o" style="color:#d12e00f0 !important"></i>Logout</a></li>
                                    </div>
                                @endif
                            @endguest

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    <a href="{{route('home')}}"
                       style=" background-color: #1d2124; border-radius: 34px;padding: 0 27px;">
                        <img src="{{asset('storage/img/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{ route('shop') }}">Shop</a></li>
                        <li><a href="">Pages</a>
                            <ul class="header__menu__dropdown">
                                <li><a href="">Shop Details</a></li>
                                <li><a href="">Shoping Cart</a></li>
                                <li><a href="">Check Out</a></li>

                            </ul>
                        </li>

                        <li><a href="">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    @guest
                        <ul class="cart">
                            <li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>0đ</span></div>
                    @else
                        @if (Auth::check())
                            <ul>
                                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                                <li><a href="{{route('cart.show')}}"><i class="fa fa-shopping-bag"></i> <span>{{session('countProducts') }}</span></a></li>
                            </ul>
                            <div class="header__cart__price">item: <span>{{ number_format(session('total')) }}đ</span></div>
                        @endif
                    @endguest

                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->

<!-- Hero Section Begin -->
<section class="hero hero-normal">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    <ul>
                        @foreach($brands as $value)
                            <li>
                                <a href="/shop?brand%5B{{$value -> id}}%5D=on&sort=asc">{{$value -> name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="{{route('search')}}" method="GET">
                            <input type="text" name="key" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+84 34.897.1008</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            $('.cart').click(function () {

                alert("vui lòng đăng nhập tài khoản");

            });
        });

    </script>
</section>
