@extends('front.admins.layouts.master')
@section('admin-container')

<div class="content-wrapper">
    <!-- Content -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <!-- Account -->


                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" action="{{ route('register.custom') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        <img src="{{ asset('storage/img/uptoload.jpg')}}" alt="user-avatar" class="d-block rounded img_edit" height="100" width="100" id="fileUpload" />
                                    <div class="button-wrapper">

                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input  type="file" id="upload" name="avatar" class="account-file-input"
                                                   hidden accept="image/png, image/jpeg, image/jpg" />
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3 inputbox" style="    margin: 11px 0 !important;">
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                    required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3 inputbox" style="    margin: 11px 0 !important;">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3 inputbox" style="    margin: 11px 0 !important;">
                                <input type="number" placeholder="Phone" id="numberPhone" class="form-control"
                                    name="numberPhone" required>
                                @if ($errors->has('numberPhone'))
                                <span class="text-danger">{{ $errors->first('numberPhone') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3 inputbox" style=" margin: 11px 0 !important;">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3 inputbox" style=" margin: 11px 0 !important;">
                                <label class="form-label">Type</label>
                                <select class="form-select" name="type" id="type">

                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                <a href="">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-outline-success me-2 add_user">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>

@endsection
