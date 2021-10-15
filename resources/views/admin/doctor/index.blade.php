
@extends('layouts.admin')
@section('content')
<h4 class="card-title">Danh sách bác sĩ</h4>
<form action="" method="get" style="float: right">
    <input type="text" name="search" value="{{ $search }}"> 
    <button>Tìm kiếm</button>
</form>
<a href="{{ route('doctor.create')}}" style="font-size: 20px;text-transform: uppercase;">Thêm mới</a>
<div class="card-content table-responsive table-full-width">
<table width="100%" class="table">
<thead>
    <tr>
        <th class="text-center">Mã</th>
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
        <th class="text-right">Xóa</th>
    </tr>
</thead>
<tbody>
    @foreach ($listDoctor as $doctor)
    <tr>
        <td class="text-center">{{ $doctor->id_doctor }}</td>
        <td width="10%" class="text-center">
            <img src="{{ asset('images/' . $doctor->image) }}" width="100px">
        </td>
        <td>{{ $doctor->full_name }}</td>
        <td>{{ $doctor->gender == 0 ? "Nữ": "Nam" }}</td>
        <td>{{ $doctor->phone }}</td>
        <td>{{ $doctor->address }}</td>
        <td>{{ $doctor->date_birth }}</td>
        <td>{{ $doctor->email }}</td>
        <td>{{ $doctor->specialist->name_specialist }}</td>
        <td>{!!$doctor->introduce!!}</td>
        <td class="td-actions text-right">
            <button class="btn btn-success btn-simple btn-xs">
                <a href="{{ route('doctor.edit', $doctor->id_doctor) }}"> <i class="ti-pencil-alt"></i></a>
            </button>
        </td>
        <td class="td-actions text-right">
            <form action="{{ route('doctor.destroy', $doctor->id_doctor) }}" method="post">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-simple btn-xs"><i class="ti-close"></i></button>
             </form>

        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
{{ $listDoctor->appends([
    'search' =>$search,
])-> links() }}

@endsection