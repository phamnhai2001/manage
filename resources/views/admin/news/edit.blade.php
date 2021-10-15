@extends('layouts.admin')
@section('content')
    <h4 class="card-title">Sửa tin tức</h4>
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
    <form action="{{ route('news.update', $news->id) }}" method="post" enctype="multipart/form-data"
        class="form-horizontal">
        <div class="card-content">
            @method('PUT')
            @csrf
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tiêu đề</label>
                    <div class="col-sm-10">
                        <!-- <div class="col-md-5"> -->
                        <input type="text" class="form-control" required name="title" value="{{ $news->title }}">
                        <!-- </div> -->
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Ảnh</label>
                    <div class="col-sm-10">
                        <!-- <div class="col-md-5"> -->
                        <img src="{{ asset('images/' . $news->image) }}" class="img-thumbnail" width="300px"
                            height="300px">
                        <input type="file" name="image_old" class="form-control">
                        <input type="hidden" name="hidden_image" class="form-control" value="{{ $news->image }}">
                        <!-- </div> -->
                    </div>
                </div>
            </fieldset>
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nội dung</label>
                    <div class="col-sm-10">
                        <textarea name="content" id="content" class="form-control" rows="5" style="resize:none"
                            required>{!! $news->content !!}</textarea>
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
