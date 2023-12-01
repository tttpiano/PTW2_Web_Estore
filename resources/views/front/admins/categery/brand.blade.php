@extends('front.admins.layouts.master')
@section('admin-container')
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center" style="width: 100%;">
            <div class="nav-item d-flex align-items-center" style="width: 100%;">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" id="search_product" placeholder="Search..." aria-label="Search..." style="width: 100%;" />
            </div>
        </div>
        <!-- /Search -->


    </div>
</nav>
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header" style="background-color: #696cff; border-color: #696cff; color:#fff">
                BRAND</h5>
            <div class="add">
                <a class="btn btn-success" href="{{route("add_brand")}}"">Add</a>
            </div>
            <div class=" table-responsive text-nowrap content1">
                    <table class="table">
                        <thead>
                            <tr class="color_tr">
                                <th>STT</th>

                                <th>Name</th>


                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <?php
                            $currentPage = $brand->currentPage();
                            $coun = ($currentPage - 1) * $brand->perPage() + 1;
                            ?>
                            @foreach($brand as $item)

                            <tr>
                                <td>{{ $coun++ }}</td>

                                <td>{{$item->name}}</td>


                                <td>
                                    <a href="{{route("edit_brand",$item->id)}}" class=" btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</a><br><br>
                                    <form id="delete-form" action="{{route('delete.brand', $item->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <!-- note  -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}">Xoá
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Xoa San Pham</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Bạn có muốn xoá <strong><b>{{$item->name}}</b></strong>
                                                        này?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng
                                                        </button>
                                                        <button type="submit" class="btn btn-danger">Xoá</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>


            </div>
        </div>
        {!! $brand->links('pagination::bootstrap-5',) !!}


    </div>
</div>
<!-- Button trigger modal -->
<!--  -->
@endsection
