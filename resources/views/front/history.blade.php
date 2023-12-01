@extends('front.layouts.master')
@section('main-container')
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Sản phẩm</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Voucher</th>
      <th scope="col">Tổng tiền</th>
      <th scope="col">Ngày đặt hàng</th>
    </tr>
  </thead>
  <tbody>
    @foreach($history as $historys)
    <tr>
      <th scope="row">{{$historys->id}}</th>
      <td>{{$historys->diachi}}</td>
      <td>{{$historys->sanpham}}</td>
      <td>{{$historys->gia}}</td>
      <td>{{$historys->sl}}</td>
      <td>{{$historys->voucher}}%</td>
      <td>{{$historys->total}}</td>
      <td>{{$historys->created_at}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
<p>Video tham khảo điện thoại</p>
<script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-28a6a6cf-997a-4068-abd4-2fb8b39f2f3b" data-elfsight-app-lazy></div>
@endsection