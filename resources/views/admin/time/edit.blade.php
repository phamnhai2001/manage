@extends('layouts.admin')
@section('content')
    <h4 class="card-title">Sửa khung giờ</h4>
    @if ($message = Session::get('error'))
        <div class="alert alert-warning">
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
    <form action="{{ route('time.update', $time->id_time) }}" method="post" enctype="multipart/form-data"
        class="form-horizontal">
        <div class="card-content">
            @method('PUT')
            @csrf
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Giờ bắt đầu</label>
                    <div class="col-sm-10">
                        <!-- <div class="col-md-5"> -->
                        <input type="time" class="form-control" required name="start_time"
                            value="{{ $time->start_time }}">
                        <!-- </div> -->
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Giờ kết thúc</label>
                    <div class="col-sm-10">
                        <!-- <div class="col-md-5"> -->
                        <input type="time" class="form-control" required name="end_time" value="{{ $time->end_time }}">
                        <!-- </div> -->
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
