@extends('layouts.admin')
@section('content')
<h4 class="card-title">Danh sách bệnh nhân</h4>
<form action="" method="get" style="float: right">
    <input type="text" name="search" value="{{$search}}">
    <button>search</button>
</form>
<div class="card-content table-responsive table-full-width">
<table class="table" width="100%">
<thead>
                <tr>
                    <th> Mã </th>
                    <th> Họ và tên </th>
                    <th> Ngày sinh </th>
                    <th> Địa chỉ </th>
                    <th> SĐT </th>
                    <th> Giới tính </th>
                    <th> Email </th>
                    <th> Xóa </th>
                </tr>
</thead>
<tbody>
            @foreach($listCustomer as $customer)
                <tr>
                    <td>
                        {{$customer->id_customer}}
                    </td>
                    <td>
                        {{$customer->full_name}}
                    </td>
                    <td>
                        {{$customer->date_birth}}
                    </td>
                    <td>
                        {{$customer->address}}
                    </td>
                    <td>
                        {{$customer->phone}}
                    </td>
                    <td>
                        {{ $customer->gender==1? "Nam":"Nữ" }}
                    </td>
                    <td>
                        {{$customer->email}}
                    </td>
                    <td class="td-actions">
                            <form action="{{ route('customer.destroy', $customer->id_customer) }}" method="post">
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

{{ $listCustomer->appends([
'search' => $search,
])->links()
}}
@endsection
