@extends('layouts.admin')
@section('content')
<h4 class="card-title">Thông tin bệnh nhân</h4>
@if ($message = Session::get('error'))
        <div class="alert alert-warning">
            <div>
                <div class="alert-icon">
                    <i class="material-icons">check</i>
                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true"><i class="material-icons">clear</i></span>
                </button>
                <h3>{{ $message }}</h3>
            </div>
        </div>
    @endif
<div class="card-content table-responsive table-full-width">
<table class="table" width="100%">
<thead>
    <tr>
        <th>Mã</th>
        <th>Họ tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>SĐT</th>
        <th>Giới tính</th>
        <th>Email</th>
    </tr>
</thead>
<tbody>
    <tr>
        <td>{{$customer->id_customer}}</td>
        <td>{{$customer->full_name}}</td>
        <td>{{$customer->date_birth}}</td>
        <td>{{$customer->address}}</td>
        <td>{{$customer->phone}}</td>
        <td>{{ $customer->gender==1? "Nam":"Nữ" }}</td>
        <td>{{$customer->email}}</td>
    </tr>
</tbody>
</table>
</div>
@endsection
