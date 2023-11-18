@extends('front.admins.layouts.master')
@section('admin-container')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <!-- Account -->

                    <div class="card mb-4">
                        <!-- Account -->
                        <form method="post" enctype="multipart/form-data" action="{{ route('img.upload') }}">
                            @csrf
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    @if($message = Session::get('success'))
                                    <img src="{{ asset('storage/img/'.Session::get('images')) }}" alt="user-avatar"
                                        class="d-block rounded img_edit" height="100" width="100" id="fileUpload" />
                                    @else
                                    <img src="{{ asset('storage/img/'.$user->avatar)}}" alt="user-avatar"
                                        class="d-block rounded img_edit" height="100" width="100" id="fileUpload" />
                                    @endif
                                    <div class="button-wrapper">

                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input type="file" id="upload" name="fileUpload" class="account-file-input"
                                                hidden accept="image/png, image/jpeg, image/jpg" />
                                        </label>

                                        <button type="button"
                                            class="btn btn-outline-secondary account-image-reset mb-4">
                                            <i class="bx bx-reset d-block d-sm-none"></i>
                                            <span class="d-none d-sm-block">Reset</span>
                                        </button>
                                        <button
                                            class="btn btn-outline-success accougnt-image-reset mb-4 upload submitOk"
                                            data-img="{{ Session::get('images') }}">
                                            <i class="bx bx-reset d-block d-sm-none "></i>
                                            <span class="d-none d-sm-block">OK</span>
                                        </button>


                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr class="my-0" />
                        <div class="card-body">
                            <form id="formAccountSettings" method="POST" action="" onsubmit="return false">
                                @csrf
                                <div class="form-group mb-3 inputbox" style="    margin: 11px 0 !important;">
                                    <input type="text" value="{{$user->name}}" placeholder="Name" id="name"
                                        class="form-control" name="name" required autofocus>
                                    @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3 inputbox" style="    margin: 11px 0 !important;">
                                    <input value="{{$user->email}}" type="text" placeholder="Email" id="email_address"
                                        class="form-control" name="email" required autofocus>
                                    @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3 inputbox" style="    margin: 11px 0 !important;">
                                    <input value="{{$user->numberPhone}}" type="number" placeholder="Phone"
                                        id="numberPhone" class="form-control" name="numberPhone" required>
                                    @if ($errors->has('numberPhone'))
                                    <span class="text-danger">{{ $errors->first('numberPhone') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3 inputbox" style=" margin: 11px 0 !important;">
                                    <input value="{{$user->password}}" type="password" placeholder="Password"
                                        id="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="form-group mb-3 inputbox" style=" margin: 11px 0 !important;">
                                    <label class="form-label">Type</label>
                                    <select class="form-select" name="type" id="type">
                                        <option value="user" {{ $user->type == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="admin" {{ $user->type == 'admin' ? 'selected' : '' }}>Admin
                                        </option>
                                    </select>
                                </div>
                                <div class="mt-2" style="text-align: right">
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                    <a href="">
                                        <button type="button" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal">Close
                                        </button>
                                    </a>
                                    <button type="submit" class="btn btn-outline-success me-2 add_user">Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- /Account -->
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
    <!-- / Content -->
</div>
<script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script>
$(document).ready(function() {

    var fileName = "uptoload.jpg";
    $('.submitOk').click(function() {
        // Lấy danh sách các tệp tin đã chọn
        var files = $(this).prop('files');

        // Kiểm tra xem đã có tệp tin được chọn hay chưa
        if (files.length > 0) {
            // Lấy tên của tệp tin đầu tiên
            fileName = files[0].name;
            // In ra tên của tệp tin
            $('#fileUpload').attr('src', URL.createObjectURL(files[0]));
        }
    });

    var imageElement = $('.img_edit');

    // Get the "src" attribute of the image
    var imageSrc = imageElement.attr('src');

    // Split the imageSrc to get the filename
    var fileimg = imageSrc.split('/').pop();

    // Replace spaces with hyphens in the filename
    fileimg = fileimg.replace(/\s+/g, '-');

    console.log(fileimg); // This will show the modified filename with hyphens instead of spaces.


    if (fileimg !== null) {
        fileName = fileimg
    }
    console.log('Image filename:', fileName);

    $('.add_user').click(function() {

        var type = $('#type option:selected').val();
        var name = $('#name').val();
        var numberPhone = $('#numberPhone').val();
        var email = $('#email_address').val();



        console.log(name);
        $.ajax({
            type: 'POST',
            url: ,
            data: {
                _token: '{{ csrf_token() }}',
                type: type,
                name: name,
                numberPhone: numberPhone,
                email: email,
                img: fileName,

            },
            success: function(response) {
                if (response.success) {
                    swal("Thêm Thành công", "", "success");;

                }
            },
            error: function() {
                swal("Thêm không thành công.", "You clicked the button!", "warning");
            }
        });

    });
});
</script>

@endsection