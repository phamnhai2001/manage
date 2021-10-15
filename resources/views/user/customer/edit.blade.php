@extends('layouts.site')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <h2 class="card-title">Sửa thông tin</h2>
                <form action="/user/customer-update/{{ $customer->id_customer }}" method="post" class="form-horizontal">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
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
                    @elseif ($message = Session::get('error'))
                        <div class="alert alert-danger">
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
                    <div class="card-content">
                        @csrf
                        @method('POST')
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Họ và tên</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="full_name"
                                        value="{{ $customer->full_name }}">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Ngày sinh</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" required name="date_birth"
                                        value="{{ $customer->date_birth }}">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="address"
                                        value="{{ $customer->address }}">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">SĐT</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" required name="phone"
                                        value="{{ $customer->phone }}">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Giới tính</label>
                                <div class="col-sm-10">
                                    <input type="radio" name="gender" value="1" @if ($customer->gender == 1) checked @endif> Nam
                                    <input type="radio" name="gender" value="0" @if ($customer->gender == 0) checked @endif> Nữ
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" required name="email"
                                        value="{{ $customer->email }}">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> </label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-fill btn-info">Cập nhật</button>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
