@extends('front.admins.layouts.master')
@section('admin-container')

    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <!-- Account -->
                    <hr class="my-0"/>
                    <div class="card-body">

                        <form id="formAccountSettings" method="POST" action="{{route('slide.edit', $slide->id)}}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="d-flex align-items-start align-items-sm-center gap-4">
                                    <img src="{{ asset('storage/img/uptoload.jpg')}}" alt="user-avatar"
                                         class="d-block rounded img_edit" height="100" width="100" id="fileUpload"/>
                                    <div class="button-wrapper">

                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">Upload new photo</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input required type="file" id="upload" name="avatar" class="account-file-input"
                                                   hidden accept="image/png, image/jpeg, image/jpg"/>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">                                   
                                        <img src="{{ asset('images/slide/'.$slide->name)}}" alt="user-avatar"
                                         class="d-block rounded img_edit" height="100" width="100" id="fileUpload"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label class="form-label">Url
                                        </label>
                                        <input class="form-control" type="text" id="Url" name="url"
                                            placeholder="url" value="{{ $slide->url }}" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset
                                </button>
                                <a href="{{route('admin_slide')}}">
                                    <button type="button" class="btn btn-outline-danger"
                                    >Close
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-outline-success me-2">Save
                                </button>

                            </div>
                        </form>

                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
    <!-- / Content -->
    <script>
        CKEDITOR.replace('content', {

        });
    </script>

@endsection
