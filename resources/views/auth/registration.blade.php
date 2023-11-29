@extends('dashboard')

@section('content')

    <section style="background: url('{{asset('storage/img/resgiter.jpg')}}')">

        <div class="form-box">
            <div class="form-value">
                <form action="{{ route('register.custom') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3 inputbox" style="    margin: 11px 0 !important;">
                        <input type="text" placeholder="Name" id="name" class="form-control" name="name" required
                               autofocus>
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3 inputbox" style="    margin: 11px 0 !important;">
                        <input type="text" placeholder="Email" id="email_address" class="form-control" name="email"
                               required autofocus>
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3 inputbox" style="    margin: 11px 0 !important;">
                        <input type="text" placeholder="Phone" id="numberPhone" class="form-control" name="numberPhone"
                               required>
                        @if ($errors->has('numberPhone'))
                            <span class="text-danger">{{ $errors->first('numberPhone') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3 inputbox" style="    margin: 11px 0 !important;">
                        <input type="file" placeholder="avatar" id="avatar" class="form-control" name="avatar" required>
                        @if ($errors->has('avatar'))
                            <span class="text-danger">{{ $errors->first('avatar') }}</span>
                        @endif
                    </div>
                    <div class="form-group mb-3 inputbox" style=" margin: 11px 0 !important;">
                        <input type="password" placeholder="Password" id="password" class="form-control" name="password"
                               required>
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>


                    <div class="form-group mb-3">
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Remember Me</label>
                        </div>

                    </div>
                    <div class="d-grid mx-auto">
                        <button type="submit" class="btn btn-dark btn-block">Sign up</button>
                    </div>

                    @if(session('success'))
                        <div
                            style="margin-top: 10px;color: black;font-size: 20px; background: #0def42;text-align: center;border-radius: 10px">
                            {{ session('success') }}
                        </div>
                    @endif
                    <select hidden class="form-select" name="type" id="type">
                        <option value="user">User</option>
                    </select>

                    <div class="register" style="text-align: right">
                        <p><a href="/login">Login</a></p>
                    </div>


                </form>
            </div>
        </div>
    </section>

@endsection
