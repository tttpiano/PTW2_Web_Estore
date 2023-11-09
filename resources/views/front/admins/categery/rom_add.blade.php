@extends('front.admins.layouts.master')
@section('admin-container')

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">

                <div class="card mb-4">
                    <!-- Account -->
                  
                    <hr class="my-0" />
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST">
                            <div class="row">
                              
                               
                                <div class="mb-3 col-md-12">
                                   <label class="form-label">Bộ nhớ trong</label>
                                    <select class="form-select" name="Brandll" id="Brandll">
                                        <option value="1">32 GB</option>
                                        <option value="2">64 GB</option>
                                        <option value="3">128 GB</option>
                                        
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