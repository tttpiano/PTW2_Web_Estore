@extends('front.admins.layouts.master')
@section('admin-container')

<div class="content-wrapper">
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

                    <hr class="my-0" />
                    <div class="card-body">

                        <form action="{{route('add.rom')}}" method="POST">
                            @csrf
                            <div class="row">


                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Bộ nhớ trong</label>
                                    <input required class="form-control" type="text" id="rom" name="rom" placeholder="Bộ nhớ trong" autofocus />

                                </div>

                            </div>
                            <div class="mt-2" style="text-align: right">
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                <a href="{{route('rom_product')}}">
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