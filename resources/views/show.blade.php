<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chi Tiết USER</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .title {
        text-align: center;
        color: #12a9b0;

    }

    .content {
        text-align: center;

    }
</style>

<body>
    <nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
        <div class="container">
            <a class="navbar-brand mr-auto" href="#">NiceSnippets</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register-user') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('signout') }}">Logout</a>

                    </li>
                    <a style=" text-decoration: none; color:black;    margin-top: 8px;
    margin-left: 6px;" href="{{ route('abc')}}">List Users</a>

                    @endguest


                </ul>
            </div>
        </div>
    </nav>
    <h1 class="title">Thông tin chi tiết của {{$user->name}}</h1>
    <div class="content">
        <img style="width: 100px; height: 100px;" src="{{asset('storage/avatars/'.$user->avatar)}}" alt="{{ $user->name }}">
        <p>{{ $user->name }}</p>
        <p>{{ $user->email }}</p>
        <p>{{ $user->numberPhone }}</p>
    </div>
</body>

</html>