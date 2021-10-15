@extends('layouts.admin')
@section('content')
    <h4 class="card-title">Sửa lịch nghỉ</h4>
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
    <form action="{{ route('rest.update', $rest->id) }}" method="post" enctype="multipart/form-data"
        class="form-horizontal">
        <div class="card-content">
            @method('PUT')
            @csrf
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Họ tên</label>
                    <div class="col-sm-10">
                        <select name="id_doctor" class="form-control">
                            @foreach ($listDoctor as $doctor)
                                <option value="{{ $doctor->id_doctor }}" @if ($doctor->id_doctor == $doctor->id_doctor) selected @endif>
                                    {{ $doctor->full_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ngày nghỉ</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" required name="date" value="{{ $rest->date }}">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Thời gian</label>
                    <div class="col-sm-10">
                        <select name="id_time" class="form-control">
                            @foreach ($listTime as $time)
                                <option value="{{ $time->id_time }}" @if ($rest->id_time == $time->id_time) selected @endif>
                                    {{ $time->start_time . '-' . $time->end_time }}
                                </option>
                            @endforeach
                        </select>
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
