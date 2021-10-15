@extends('layouts.admin')
@section('content')
    <h4 class="card-title">Thêm tin tức</h4>
    <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        <div class="card-content">
            @csrf
            <fieldset>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tiêu đề</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title">
                        @error('title')
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
                    <label class="col-sm-2 control-label">Nội dung</label>
                    <div class="col-sm-10">
                        <textarea name="content" id="content" class="form-control" rows="5"
                            style="resize:none"></textarea>
                        @error('content')
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
