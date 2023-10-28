@extends('dashboard')

@section('content')

    <section style="background: url('{{asset('storage/img/background6.jpg')}}')">
        <div class="form-box">
            <div class="form-value">
                <form action="{{ route('login.custom') }}" method="POST">
                    <h2>Login</h2>
                    @csrf
                    <div class="form-group mb-3 inputbox">
                        <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                               autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3 inputbox">
                        <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <button>Log in</button>
                    <div class="register">
                        <p>Don't have a account <a href="{{ route('register-user') }}">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>


@endsection
