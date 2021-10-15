
@extends('layouts.site')
@section('content')

    <body>
        <div class="section">
            <div class="container">
                <div class="row">
                    <h3 >
                       <p  style="color: red; font-size: inherit;">Tin tức </p>
                    </h3>
                    <div class="col-md-12">
                        <table class="table table-shopping">
                            <thead>
                                <tr>
                                    <th class="text-center"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $news)

                                <tr>
                                    <td>
                                        <div class="img-container" style="height: 150px;">
                                            <img src="{{ asset('images/' . $news->image) }}" width="265px">
                                        </div>
                                    </td>
                                    <td class="td-product" style=" vertical-align: middle;">
                                        <a href="/news-details/{{ $news->id }}" style="color: black; font-size: x-large; font-weight: 700;">
                                            {{ $news->title }}
                                        </a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
