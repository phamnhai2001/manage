
@extends('layouts.admin')
@section('content')
<h4 class="card-title">Chuyên khoa</h4>
<form action="" method="get" style="float: right">
    <input type="text" name="search" value="{{ $search }}"> 
    <button>Tìm kiếm</button>
</form>
<a href="{{ route('specialist.create')}}" style="font-size: 20px;text-transform: uppercase;">Thêm mới</a>
<div class="card-content table-responsive table-full-width">
<table width="100%" class="table">
<thead>
    <tr>
        <th>Mã khoa</th>
        <th>Tên khoa</th>
        <th>Ảnh</th>
        <th>Giới thiệu</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
</thead>
<tbody>
    @foreach ($listSpecialist as $specialist)
    <tr>
        <td>{{ $specialist->id_specialist }}</td>
        <td>{{ $specialist->name_specialist }}</td>
        <td width="10%" class="text-center">
            <img src="{{ asset('images/' . $specialist->image) }}" width="100px">
        </td>
        <td>{!!$specialist->introduce!!}</td>
        <td class="td-actions">
            <button class="btn btn-success btn-simple btn-xs">
                <a href="{{ route('specialist.edit', $specialist->id_specialist) }}"> <i class="ti-pencil-alt"></i></a>
            </button>
        </td>
        <td class="td-actions">   
            <form action="{{ route('specialist.destroy', $specialist->id_specialist) }}" method="post">
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
{{ $listSpecialist->appends([
    'search' =>$search,
])-> links() }}

@endsection