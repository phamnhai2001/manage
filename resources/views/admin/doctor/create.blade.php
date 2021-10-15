@extends('layouts.admin')
@section('content')
    <h4 class="card-title">Thêm bác sĩ</h4>
    <form action="{{ route('doctor.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-content">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Họ tên</label>
                    <div class="col-sm-10">
                        <!-- <div class="col-md-5"> -->
                        <input type="text" class="form-control" name="full_name">
                        @error('full_name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <!-- </div> -->
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Ảnh</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="image">
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Giới tính</label>
                    <div class="col-sm-10">
                        <input type="radio" name="gender" value="1" checked> Nam
                        <input type="radio" name="gender" value="0"> Nữ
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> SĐT</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phone">
                        @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Địa chỉ</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="address">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Ngày sinh</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="date_birth">
                        @error('date_birth')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email">
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Chuyên khoa</label>
                    <div class="col-sm-10">
                        <select name="id_specialist" class="form-control">
                            @foreach ($listSpecialist as $specialist)
                                <option value="{{ $specialist->id_specialist }}">
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
                        <textarea name="introduce" id="content" class="form-control" rows="5"
                            style="resize:none"></textarea>
                        @error('introduce')
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
