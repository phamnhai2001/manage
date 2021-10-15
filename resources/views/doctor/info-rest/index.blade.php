@extends('layouts.doctor')
@section('content')
<h4 class="card-title">Lịch nghỉ </h4>
<form action="" method="get" style="float: right">
    <input type="text" name="search" value="{{ $search }}">
    <button>Tìm kiếm</button>
</form>
<a href="{{ route('info-rest.create')}}" style="font-size: 20px;text-transform: uppercase;">Thêm mới</a>
<div class="card-content table-responsive table-full-width">
<table width="100%" class="table">
<thead>
    <tr>
        <th>STT</th>
        <th>Ngày nghỉ</th>
        <th>Thời gian</th>
        <th>Họ tên bác sĩ</th>

    </tr>
</thead>
<tbody>
    <?php $i = 0; ?>
    @foreach ($listRest as $rest)
    <?php $i++; ?>
    <tr>
        <td>{{ $i }}</td>
        <td>{{ $rest->date }}</td>
        <td>{{ ($rest->time->start_time)."-".($rest->time->end_time) }}</td>
        <td>{{ $rest->doctor->full_name }}</td>

    </tr>
    @endforeach
</tbody>
</table>
</div>
{{ $listRest->appends([
    'search' =>$search,
])-> links() }}

@endsection
