@extends('layouts.admin')
@section('content')
    <h4 class="card-title">Thêm khung giờ</h4>
    <form action="{{ route('time.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-content">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Giờ bắt đầu</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" name="start_time">
                        @error('start_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Giờ kết thúc</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" name="end_time">
                        @error('end_time')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> </label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-fill btn-info">Thêm</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </form>


@endsection
