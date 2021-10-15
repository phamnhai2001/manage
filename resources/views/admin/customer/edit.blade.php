@extends('layouts.admin')
@section('content')
<h4 class="card-title">Sửa thông tin</h4>
    <form action="{{ route('customer.update', $customer->id_customer) }}" method="post" class="form-horizontal">
    <div class="card-content">
        @method('PUT')
        @csrf
        <fieldset>
	        <div class="form-group">
	            <label class="col-sm-2 control-label">Họ và tên</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" required name="full_name" value="{{ $customer->full_name }}">
	            </div>
	        </div>
	    </fieldset>
        <fieldset>
	        <div class="form-group">
	            <label class="col-sm-2 control-label">Ngày sinh</label>
	            <div class="col-sm-10">
	                <input type="date" class="form-control" required name="date_birth" value="{{ $customer->date_birth }}">
	            </div>
	        </div>
	    </fieldset>
        <fieldset>
	        <div class="form-group">
	            <label class="col-sm-2 control-label">Địa chỉ</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" required name="address" value="{{ $customer->address }}">
	            </div>
	        </div>
	    </fieldset>
        <fieldset>
	        <div class="form-group">
	            <label class="col-sm-2 control-label">SĐT</label>
	            <div class="col-sm-10">
	                <input type="text" class="form-control" required name="phone" value="{{ $customer->phone }}">
	            </div>
	        </div>
	    </fieldset>
        <fieldset>
	        <div class="form-group">
	            <label class="col-sm-2 control-label"> Giới tính</label>
	            <div class="col-sm-10">
                    <input type="radio" name="gender" value="1" @if ($customer->gender == 1) checked @endif> Nam
                    <input type="radio" name="gender"  value="0" @if ($customer->gender == 0) checked @endif> Nữ
	            </div>
	        </div>
	    </fieldset>
        <fieldset>
	        <div class="form-group">
	            <label class="col-sm-2 control-label">Email</label>
	            <div class="col-sm-10">
	                <input type="email" class="form-control" required name="email" value="{{ $customer->email }}">
	            </div>
	        </div>
	    </fieldset>
        <fieldset>
	        <div class="form-group">
	            <label class="col-sm-2 control-label">Password</label>
	            <div class="col-sm-10">
	                <input type="password" class="form-control" required name="password" value="{{ $customer->password }}">
	            </div>
	        </div>
	    </fieldset>
        <fieldset>
	        <div class="form-group">
	            <label class="col-sm-2 control-label"> </label>
	            <div class="col-sm-10">
                    <button type="submit" class="btn btn-fill btn-info">Sửa</button>
	            </div>
	        </div>
	    </fieldset>
    </div>
    </form>
@endsection