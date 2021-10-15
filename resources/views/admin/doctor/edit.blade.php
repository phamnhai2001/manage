@extends('layouts.admin')
@section('content')
    <h4 class="card-title">Sửa thông tin</h4>
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
    <form action="{{ route('doctor.update', $doctor->id_doctor) }}" method="post" enctype="multipart/form-data"
        class="form-horizontal">
        <div class="card-content">
            @method('PUT')
            @csrf
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Họ tên</label>
                    <div class="col-sm-10">
                        <!-- <div class="col-md-5"> -->
                        <input type="text" class="form-control" name="full_name" value="{{ $doctor->full_name }}">
                        <!-- </div> -->
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Ảnh</label>
                    <div class="col-sm-10">
                        <img src="{{ asset('images/' . $doctor->image) }}" class="img-thumbnail" width="300px"
                            height="300px">
                        <input type="file" name="image_old" class="form-control">
                        <input type="hidden" name="hidden_image" value="{{ $doctor->image }}" class="form-control">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Giới tính</label>
                    <div class="col-sm-10">
                        <input type="radio" name="gender" value="1" @if ($doctor->gender == 1) checked @endif> Nam
                        <input type="radio" name="gender" value="0" @if ($doctor->gender == 0) checked @endif> Nữ
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> SĐT</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone" value="{{ $doctor->phone }}">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Địa chỉ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address" value="{{ $doctor->address }}">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Ngày sinh</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="date_birth" value="{{ $doctor->date_birth }}">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="{{ $doctor->email }}">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Chuyên khoa</label>
                    <div class="col-sm-10">
                        <select name="id_specialist" class="form-control">
                            @foreach ($listSpecialist as $specialist)
                                <option value="{{ $specialist->id_specialist }}" @if ($doctor->id_specialist == $specialist->id_specialist) selected @endif>
                                    {{ $specialist->name_specialist }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Giới thiệu</label>
                    <div class="col-sm-10">
                        <textarea name="introduce" id="content" class="form-control" rows="5" style="resize:none"
                            required>{!! $doctor->introduce !!}</textarea>
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
