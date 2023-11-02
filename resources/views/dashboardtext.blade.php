<!DOCTYPE html>
<html>

<head>
    <title>loginLaravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
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

                    @endguest


                </ul>
            </div>
        </div>
    </nav>
    <table style="width:100%; text-align: center">

        <tr align="center">
            <td>Name</td>
            <td>Mail</td>
            <td>Phone</td>
            <td>Action</td>

            @foreach ($users as $user)
        </tr>
        <td>{{ $user->name }}</a></td>
        <td>
            <p>{{ $user->email }}</p>
        </td>
        <td>{{ $user->numberPhone }}</td>
        <td><a class="nav-link" href="{{ route('show', ['id' => $user->id]) }}">View</td>

        @endforeach
    </table>
    
    <div style="display: flex;
   justify-content: flex-end;
   margin-top: 20px;"> {!! $users->render('pagination::bootstrap-4') !!}
    </div>

    @yield('content')
</body>

</html>