
@extends('layouts.doctor')
@section('content')
<h4 class="card-title">Thông tin cá nhân</h4>
<div class="card-content table-responsive table-full-width">
<table width="100%" class="table">
<thead>
    <tr>
        <th class="text-center">Ảnh</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>SĐT</th>
        <th>Địa chỉ</th>
        <th>Ngày sinh</th>
        <th>Email</th>
        <th>Chuyên khoa</th>
        <th>Giới thiệu</th>
        <th class="text-right">Sửa</th>

    </tr>
</thead>
<tbody>
    <tr>
        <td width="10%" class="text-center">
            <img src="{{ asset('images/' . $Doctor->image) }}" width="100px">
        </td>
        <td>{{ $Doctor->full_name }}</td>
        <td>{{ $Doctor->gender == 0 ? "Nữ": "Nam" }}</td>
        <td>{{ $Doctor->phone }}</td>
        <td>{{ $Doctor->address }}</td>
        <td>{{ $Doctor->date_birth }}</td>
        <td>{{ $Doctor->email }}</td>
        <td>{{ $Doctor->specialist->name_specialist }}</td>
        <td>{!!$Doctor->introduce!!}</td>
        <td class="td-actions text-right">
            <button class="btn btn-success btn-simple btn-xs">
                <a href="{{ route('info-doctor-admin.edit', $Doctor->id_doctor) }}"> <i class="ti-pencil-alt"></i></a>
            </button>
        </td>

    </tr>
</tbody>
</table>
</div>
@endsection
