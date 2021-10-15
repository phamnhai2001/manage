@extends('layouts.admin')
@section('content')
<h4 class="card-title">Thời gian làm việc</h4>
<a href="{{ route('time.create')}}" style="font-size: 20px;text-transform: uppercase;">Thêm mới</a>
<div class="card-content table-responsive table-full-width">
<table class="table">
    <thead>
        <tr>
            <th>Mã </th>
            <th>Giờ bắt đầu</th>
            <th>Giờ kết thúc</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($listTime as $time)
        <tr>
            <td>{{  $time->id_time }}</td>
            <td>{{  $time->start_time }}</td>
            <td>{{  $time->end_time }}</td>
            <td class="td-actions">
                <button class="btn btn-success btn-simple btn-xs">
                    <a href="{{ route('time.edit', $time->id_time) }}"><i class="ti-pencil-alt"></i></a>
                </button>
            </td>
            <td class="td-actions">   
                <form action="{{ route('time.destroy', $time->id_time) }}" method="post">
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
@endsection