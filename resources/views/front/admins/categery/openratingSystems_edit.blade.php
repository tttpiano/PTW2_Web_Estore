@extends('front.admins.layouts.master')
@section('admin-container')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <!-- note  -->
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="card mb-4">
                    <!-- Account -->

                    <hr class="my-0" />
                    <div class="card-body">
                        <form method="post" action="{{route("update.openratingSystems",$edit_openratingSystems->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="row">

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Name</label>
                                    <input value="{{$edit_openratingSystems->name}}" class="form-control" type="text" id="name" name="name" placeholder="Tên Hãng" autofocus />
                                </div>



                            </div>
                            <div class="mt-2" style="text-align: right">
                                <a href="{{route('openratingSystems_product')}}">
                                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close
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