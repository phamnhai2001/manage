@extends('layouts.admin')
@section('content')
<h4 class="card-title">Lịch nghỉ </h4>
<form action="" method="get" style="float: right">
    <input type="text" name="search" value="{{ $search }}"> 
    <button>Tìm kiếm</button>
</form>
<a href="{{ route('rest.create')}}" style="font-size: 20px;text-transform: uppercase;">Thêm mới</a>
<div class="card-content table-responsive table-full-width">
<table width="100%" class="table">
<thead>
    <tr>
        <th>Mã</th>
        <th>Ngày nghỉ</th>
        <th>Thời gian</th>
        <th>Họ tên bác sĩ</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
</thead>
<tbody>  
    @foreach ($listRest as $rest)
    <tr>
        <td>{{ $rest->id }}</td>
        <td>{{ $rest->date }}</td>
        <td>{{ ($rest->time->start_time)."-".($rest->time->end_time) }}</td>
        <td>{{ $rest->doctor->full_name }}</td>
        <td class="td-actions">
            <button class="btn btn-success btn-simple btn-xs">
                <a href="{{ route('rest.edit', $rest->id) }}"><i class="ti-pencil-alt"></i></a>
            </button>
        </td>
        <td class="td-actions">
            <form action="{{ route('rest.destroy', $rest->id) }}" method="post">
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
{{ $listRest->appends([
    'search' =>$search,
])-> links() }}

@endsection