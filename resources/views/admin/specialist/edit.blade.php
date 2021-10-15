@extends('layouts.admin')
<script src="{{ asset('ckeditor') }}/ckeditor.js"></script>
@section('content')
    <h4 class="card-title">Sửa chuyên khoa</h4>
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
    <form action="{{ route('specialist.update', $specialist->id_specialist) }}" method="post"
        enctype="multipart/form-data" class="form-horizontal">
        <div class="card-content">
            @method('PUT')
            @csrf
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tên chuyên khoa</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required name="name_specialist"
                            value="{{ $specialist->name_specialist }}">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Ảnh</label>
                    <div class="col-sm-10">
                        <img src="{{ asset('images/' . $specialist->image) }}" class="img-thumbnail" width="300px"
                            height="300px">
                        <input type="file" name="image_old" class="form-control">
                        <input type="hidden" name="hidden_image" value="{{ $specialist->image }}" class="form-control">
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Giới thiệu</label>
                    <div class="col-sm-10">
                        <textarea name="introduce" id="content" class="form-control" rows="5" style="resize:none"
                            required> {!! $specialist->introduce !!}</textarea>
                        <!-- <input type="text" class="form-control" required name="introduce" value="{{ $specialist->introduce }}"> -->
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
