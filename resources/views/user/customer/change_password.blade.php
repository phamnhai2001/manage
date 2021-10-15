@extends('layouts.site')
@section('content')
    <div class="wrapper">
        <div class="section section-contact-form">
            <div class="container">

            </div>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <h2 class="card-title">Đổi mật khẩu</h2>
                <form action="/user/process-change-password/{{ $id_customer }}" method="post">
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
                    @csrf
                    @method('POST')
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Mật khẩu hiện tại</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" required name="mat_khau_cu">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Mật khẩu mới</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" required name="mat_khau_moi">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label"> Nhập lại mật khẩu mới</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" required name="mat_khau_xac_nhan">
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
                </form>
            </div>
        </div>
    </div>
@endsection
