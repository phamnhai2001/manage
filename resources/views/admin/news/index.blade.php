@extends('layouts.admin')
@section('content')
<h4 class="card-title">Tin tức</h4>
<form action="" method="get" style="float: right">
    <input type="text" name="search" value="{{ $search }}"> 
    <button>Tìm kiếm</button>
</form>
<a href="{{ route('news.create')}}" style="font-size: 20px;text-transform: uppercase;">Thêm mới</a>
<div class="card-content table-responsive table-full-width">
<table width="100%" class="table">
<thead>
    <tr>
        <th>Mã</th>
        <th>Ảnh</th>
        <th>Tiêu đề</th>
        <th>Nội dung</th>
        <th>Sửa</th>
        <th>Xóa</th>
    </tr>
</thead>
<tbody>
    @foreach ($listNews as $news)
    <tr>
        <td>{{ $news->id }}</td>
        <td width="20%">
            <img src="{{ asset('images/' . $news->image) }}" width="100px">
        </td>
        <td>{{ $news->title }}</td>
        <td>{!!$news->content!!}</td>
        <td class="td-actions">
            <button class="btn btn-success btn-simple btn-xs">
                <a href="{{ route('news.edit', $news->id) }}"><i class="ti-pencil-alt"></i></a>
            </button>
        </td>
        <td class="td-actions">
            <form action="{{ route('news.destroy', $news->id) }}" method="post">
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
{{ $listNews->appends([
    'search' =>$search,
])-> links() }}
@endsection