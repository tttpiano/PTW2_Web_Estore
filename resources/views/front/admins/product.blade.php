@extends('front.admins.layouts.master')
@section('admin-container')
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right  align-items-center" id="navbar-collapse">
        <!-- Search -->
        <form action="{{ route('searchProduct') }}" method="get">
            <div class="nav-item d-flex align-items-center" style="width: 100%;">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" name="key" class="form-control border-0 shadow-none" id="search_product"
                       placeholder="Search..."
                       aria-label="Search..." style="width: 100%;"/>
                <button class="btn btn-outline-secondary" type="submit">Tìm</button>
            </div>
        </form>
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
                PRODUCT</h5>
            <div class="add">
                <a class="btn btn-success" href="{{route('add_product')}}">Add</a>
            </div>
            <div class="table-responsive text-nowrap content1">
                <table class="table">
                    <thead>
                        <tr class="color_tr">
                            <th>STT</th>
                            <th>Name</th>
                            <th>Images</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Hiện điều hành</th>
                            <th>Hãng</th>
                            <th>Ram</th>
                            <th>Bộ nhớ trong</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php
                        $currentPage = $sDetail->currentPage();
                        $coun = ($currentPage - 1) * $sDetail->perPage() + 1;
                        ?>
                        @foreach($sDetail as $item )
                        <tr class="alldata"  data-product="{{$item->id}}">
                            <td>{{ $coun++ }}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img style="width: 100px;" src="{{$item->images[0]->url}}" alt="Image">
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($item->description, 20) }}</td>
                            <td>{{ number_format($item->price, 0, ',', '.') }} VND</td>
                            <td>{{$item->openratingSystems}}</td>

                            <td>{{ optional($item->brand)->name }}</td>
                            <td>{{ optional($item->ram)->size }}</td>
                            <td>{{ optional($item->internalMemory)->size }}</td>

                            <td>
                                <a href="{{route('edit_product',encrypt($item->id))}}" class="btn btn-outline-info"><i class="bx bx-edit-alt me-1"></i>Edit</a><br><br>

                                <form id="delete-form" action="{{ route('delete.product', $item->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
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

                    <tbody id="Content" class="searchdata">
                </table>
            </div>

        </div>
        {!! $sDetail->links('pagination::bootstrap-5',) !!}

    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-body" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset">
                <div id="detalProduct"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: 100%;">Close</button>

            </div>
        </div>
    </div>
</div>
<script src="{{asset('storage/assets/vendor/libs/jquery/jquery.js')}}"></script>
<script>
    $(document).ready(function () {

        const rows = $('tr.alldata');

        // Lặp qua từng hàng <tr>
        rows.each(function () {
            // Lấy tất cả các ô <td> trong hàng trừ <td> cuối cùng
            const tds = $(this).find('td:not(:last-child)');

            // Thêm thuộc tính data-bs-toggle và data-bs-target vào các ô <td> tương ứng
            tds.attr('data-bs-toggle', 'modal');
            tds.attr('data-bs-target', '#exampleModal');
        });
    });

    $('.alldata td').each(function () {
        // Thêm thuộc tính CSS vào các thẻ <td> này (ví dụ: thêm màu nền và màu chữ)
        $(this).css({
            'cursor': 'pointer'
        });
    });
    $('.alldata').on('click', 'td', function () {
        var productId = $(this).closest('.alldata').data('product');
        console.log('Product ID:', productId);
        $.ajax(
            {
                type: 'get',
                url: '{{route("detal.product")}}',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: productId,
                },
                success: function (data) {
                    console.log('Received data:', data);
                    $('#detalProduct').html(data);
                }
            }
        )
    });
</script>
<!-- Button trigger modal -->
<!--  -->
@endsection
