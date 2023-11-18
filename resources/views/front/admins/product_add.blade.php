@extends('front.admins.layouts.master')
@section('admin-container')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <!-- Account -->
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" enctype="multipart/form-data" action="{{route('insert_product')}}">
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
                            <div class="row">
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Name</label>
                                    <input required class="form-control" type="text" id="name" name="name" placeholder="Name" autofocus />
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Description</label>
                                    <textarea required class="form-control" name="description" id="description" placeholder="Description"></textarea>
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Price</label>
                                    <input required class="form-control" type="number" min="0" id="price" name="price" placeholder="Price" />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Hệ điều hành</label>
                                    <input required class="form-control" type="text" id="openratingSystems" name="openratingSystems" placeholder="openratingSystems" autofocus />
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Brand</label>
                                    <select class="form-select" name="Brandll" id="Brandll">
                                        @foreach($brand as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Ram</label>
                                    <select class="form-select" name="ram" id="ram">
                                        @foreach($ram as $item)
                                            <option value="{{$item->id}}">{{$item->size}}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Bộ nhớ trong</label>
                                    <select class="form-select" name="internalMemory" id="internalMemory">
                                        @foreach($internalMemory as $item)
                                            <option value="{{$item->id}}">{{$item->size}}</option>
                                        @endforeach

                                    </select>
                                </div>


                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                <a href="">
                                    <button type="button" class="btn btn-outline-danger"
                                            data-bs-dismiss="modal">Close
                                    </button>
                                </a>
                                <button type="submit" class="btn btn-outline-success me-2 add_product">Save</button>
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
<script>
    CKEDITOR.replace('description', {

    });

</script>

@endsection

