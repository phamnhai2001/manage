@extends('layouts.site')
@section('content')
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="fixed-section">
                        <ul>
                            @foreach ($specialist as $spec)
                                <li>
                                    <a href="/list-doctor/{{ $spec->id_specialist }}">{{ $spec->name_specialist }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-md-offset-1">
                    <h3> Danh sách bác sĩ</h3>

                    <div class="f-grid">
                        @foreach ($doctor as $doc)
                            <div class="f-grid-col">
                                <a href="/info-doctor/{{ $doc->id_doctor }}">
                                    <img src="{{ asset('images/' . $doc->image) }}">
                                    <div class="info">{{ $doc->full_name }}</div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
