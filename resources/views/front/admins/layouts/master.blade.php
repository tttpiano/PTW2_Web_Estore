<!DOCTYPE html>

<html
    lang="en"
    class="light-style layout-menu-fixed"
    dir="ltr"
    data-theme="theme-default"
    data-assets-path="../assets/"
    data-template="vertical-menu-template-free"
>
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>admin</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" href="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
            integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('storage/assets/vendor/fonts/boxicons.css')}}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('storage/assets/vendor/css/core.css')}}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{asset('storage/assets/vendor/css/theme-default.css')}}"
          class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{asset('storage/assets/css/demo.css')}}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('storage/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}"/>

    <link rel="stylesheet" href="{{asset('storage/assets/vendor/libs/apex-charts/apex-charts.css')}}"/>

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{asset('storage/assets/vendor/js/helpers.js')}}"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script src="{{asset('storage/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('storage/ckeditor/lang/vi.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('storage/assets/js/config.js')}}"></script>
    <link rel="stylesheet" href="{{ asset('storage/css/font-awesome.min.css')}}">
</head>

<body>

@include('front/admins/layouts/header')
<!-- header end -->

<!-- body - container -->
@yield('admin-container')

<!-- footer -->
@include('front/admins/layouts/footer')


<script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{asset('storage/assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{asset('storage/assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{asset('storage/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

<script src="{{asset('storage/assets/vendor/js/menu.js')}}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{asset('storage/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

<!-- Main JS -->
<script src="{{asset('storage/assets/js/main.js')}}"></script>

<!-- Page JS -->
<script src="{{asset('storage/assets/js/dashboards-analytics.js')}}"></script>
<!-- Page JS -->
<script src="{{asset('storage/assets/js/pages-account-settings-account.js')}}"></script>

<!-- Place this tag in your head or just before your close body tag. -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->


</body>
</html>
