
@extends('front.admins.layouts.master')
@section('admin-container')
    <!-- Layout wrapper -->

    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">


        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- @if(Auth::check()) -->
            <a class="btn btn-outline-danger" role="button" style="margin: 10px;" href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#confirmLogoutModal">
                <i class='bx bx-log-out' style="vertical-align: text-top;"></i> Logout
            </a>
            <!-- Modal -->
            <div class="modal fade" id="confirmLogoutModal" tabindex="-1" aria-labelledby="confirmLogoutModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="modal-title" id="confirmLogoutModalLabel">Xác nhận </a>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Bạn có chắc chắn muốn đăng xuất không?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                            <a href="{{ route('signout') }}" class="btn btn-danger">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- @endif -->



        </ul>
    </div>
    </nav>

    <!-- / Navbar -->

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Chào mừng bạn đến với Estore</h5>
                                    <p class="mb-4">
                                        Hôm nay bạn đã bán được<span class="fw-bold"> 72%</span> sản phẩm
                                    </p>

                                    <a href="/" class="btn btn-sm btn-outline-primary">Xem trang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">

                                        <div class="dropdown">

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="fw-semibold d-block mb-1">Tổng sản phẩm</span>
                                    <h3 class="card-title mb-2">{{$product}} SP</h3>
                                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-6 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-start justify-content-between">

                                        <div class="dropdown">

                                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <span>Số Lượng user</span>
                                    <h3 class="card-title text-nowrap mb-1">{{$user}} User</h3>
                                    <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Total Revenue -->
                <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
                    <div class="content-wrapper">
                        <div class="container-fluid">
                            <!-- Biểu đồ -->
                            <div class="card mb-4">
                                <div class="card-header" style="color: #fff;font-size: 20px;">
                                    Biểu đồ lượt truy cập theo tháng
                                </div>
                                <div class="card-body">
                                    <div id="visitsChart" style="height: 300px;"></div>
                                </div>
                            </div>
                            <!-- Nút phân trang theo năm -->
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div>
                                        @foreach ($years as $year)
                                            <a href="{{ route('admin.visits', ['year' => $year]) }}" class="btn btn-primary @if ($selectedYear == $year) active @endif">{{ $year }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Total Revenue -->
                <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
                    <div class="row">


                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                                        <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                            <div class="card-title">
                                                <h5 class="text-nowrap mb-2">Tổng Lượt Truy Cập Web</h5>
                                                <span class="badge bg-label-warning rounded-pill">8989</span>
                                            </div>
                                            <div class="mt-sm-auto">
                                                <small class="text-success text-nowrap fw-semibold"
                                                ><i class="bx bx-chevron-up"></i>====</small
                                                >

                                            </div>
                                        </div>
                                        <div id="profileReportChart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            // Load thư viện Google Charts
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            // Vẽ biểu đồ
            function drawChart() {
                var data = google.visualization.arrayToDataTable(@json($data));

                var options = {
                    title: 'Biểu đồ lượt truy cập theo tháng',
                    legend: { position: 'bottom' },
                    chartArea: { width: '80%', height: '70%' }, // Điều chỉnh kích thước khu vực biểu đồ
                    curveType: 'function', // Sử dụng curveType để vẽ đường cong hợp lý
                    vAxis: { minValue: 1 }, // Điều chỉnh giá trị trục dọc để không bị nhấn quá lề trên
                    areaOpacity: 0.7, // Điều chỉnh độ mờ của biểu đồ miền
                    colors: ['#696cff']
                };

                var chart = new google.visualization.LineChart(document.getElementById('visitsChart')); // Sử dụng LineChart để vẽ biểu đồ parabol
                chart.draw(data, options);
            }

        </script>
@endsection

