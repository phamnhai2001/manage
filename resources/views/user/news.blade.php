@extends('layouts.site')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <h3 >
                    <a href="/list-news" style="color: red; text-decoration: underline;">Tin tức</a>
                </h3>
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
                <h2>{{ $news->title }}</h2>
                <img src="{{ asset('images/' . $news->image) }}">
                <p>
                    {!! $news->content !!}
                </p>
            </div>
        </div>
    </div>
@endsection
