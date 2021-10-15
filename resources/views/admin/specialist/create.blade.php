@extends('layouts.admin')
<script src="{{ asset('ckeditor') }}/ckeditor.js"></script>
@section('content')
    <h4 class="card-title">Thêm chuyên khoa</h4>
    <form action="{{ route('specialist.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-content">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tên chuyên khoa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name_specialist">
                        @error('name_specialist')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ảnh</label>
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
