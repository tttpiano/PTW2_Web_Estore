<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>EStore</title>


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Css Styles -->
    <link rel="stylesheet" href=" {{ asset('storage/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('storage/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('storage/css/elegant-icons.css')}}" >
    <link rel="stylesheet" href="{{ asset('storage/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{ asset('storage/css/jquery-ui.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('storage/css/slicknav.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('storage/css/owl.carousel.min.css')}}" >
    <link rel="stylesheet" href="{{ asset('storage/css/style.css')}}" >

</head>

<body>

    <!-- header start -->
    @include('front/layouts/header')
    <!-- header end -->

    <div class="container">
        <!-- body - container -->
        @yield('main-container')
    </div>

    <!-- footer -->
    @include('front/layouts/footer')
    <!-- footer end -->
    <!-- Js Plugins -->
    <script src="{{ asset('storage/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{ asset('storage/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('storage/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{ asset('storage/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('storage/js/jquery.slicknav.js')}}"></script>
    <script src="{{ asset('storage/js/mixitup.min.js')}}"></script>
    <script src="{{ asset('storage/js/owl.carousel.min.js')}}"></script>
    <script src="{{ asset('storage/js/main.js')}}"></script>
    <script src="https://kit.fontawesome.com/f6dce9b617.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>

    <script>
        $(document).ready(function () {
            $('.add-to-cart').click(function () {

                var productId = $(this).data('product-id');
                var quantity = $('.pro-qty input').val();


                $.ajax({
                    type: 'POST',
                    url: '{{ route('cart.add') }}',
                    data: {
                        product_id: productId,
                        quantity: quantity
                    },
                    success: function (response) {
                        if (response.success) {
                            alert('Sản phẩm đã được thêm vào giỏ hàng.');
                        } else {
                            alert('Không thể thêm sản phẩm vào giỏ hàng.');
                        }
                    },
                    error: function () {
                        alert('Có lỗi xảy ra.');
                    }
                });
            });
        });

    </script>

</body>

</html>
