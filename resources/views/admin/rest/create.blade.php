@extends('layouts.admin')
@section('content')
<h4 class="card-title">Thêm lịch nghỉ</h4>

<form action="{{route('rest.store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
@csrf
@if ($message = Session::get('error'))
                    <div class="section cd-section section-notifications" id="notifications">
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
                    </div>
                    @endif
<div class="card-content">
    
    <fieldset>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">Họ tên</label>
	        <div class="col-sm-10">
            <select name="id_doctor" class="form-control">
            @foreach ($listDoctor as $doctor)
                <option value="{{ $doctor->id_doctor }}">
                     {{ $doctor->full_name; }}
                     
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
	            <input type="date" class="form-control" value="{{$today}}" required name="date" min = "{{$today}}">
	        </div>
	    </div>
	</fieldset>
    <fieldset>
	    <div class="form-group">
	        <label class="col-sm-2 control-label">Thời gian</label>
	        <div class="col-sm-10">
            <select name="id_time" class="form-control">
            @foreach ($listTime as $time)
                <option value="{{ $time->id_time }}">
                     {{ ($time->start_time)."-".($time->end_time); }}
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
                    <button class="btn btn-fill btn-info">Thêm</button>
	            </div>
	        </div>
	</fieldset>
</div>
</form>
@endsection