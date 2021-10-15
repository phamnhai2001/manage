@extends('layouts.site')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <h3> Danh sách chuyên khoa</h3>

                <div class="f-grid">
                    @foreach ($specialist as $spec)
                        <div class="f-grid-col">
                            <a href="/info-specialist/{{ $spec->id_specialist }}">
                                <img src="{{ asset('images/' . $spec->image) }}">
                                <div class="info">{{ $spec->name_specialist }}</div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
