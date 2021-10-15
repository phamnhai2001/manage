@extends('layouts.site')
@section('content')

    <div class="wrapper">
        <div class="section section-contact-form">
            <div class="container">

            </div>
        </div>
    </div>

    <div class="section">

        <div class="text-area">
            <div class="container">

                <div class="row">
                    <h3>
                        Chuyên khoa: {{ $doctor->specialist->name_specialist }}
                    </h3>
                    <div class="col-md-4">
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

                        <div class="title-area">

                            <img src="{{ asset('images/' . $doctor->image) }}">
                            {{ $doctor->full_name }}
                            <p>
                                {!! $doctor->introduce !!}
                            </p>
                        </div>

                    </div>
                    <div class="col-md-7 col-md-offset-1">
                        <div class="description">

                            <form action="/process" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <h3>ĐĂNG KÝ LỊCH HẸN</h3>
                                <label for="">Họ và tên:</label>
                                <input type="text" name="name_customer" class="form-control">
                                @error('name_customer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="">SĐT :</label>
                                <input type="text" name="phone_customer" class="form-control">
                                @error('phone_customer')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <br>
                                <label for="">Bác sĩ :</label>
                                <select name="id_doctor" class="form-control">

                                    <option value="{{ $doctor->id_doctor }}">
                                        {{ $doctor->full_name }}
                                    </option>

                                </select>

                                <br>
                                <label for="">Ngày khám :</label>
                                <input type="date" required name="date" class="form-control" value="{{ $today }}"
                                    readonly>
                                <br>
                                <label for="">Lịch khám : </label>
                                <select name="id_time" class="form-control">
                                    @foreach ($empty_time_id as $time)
                                        <option value="{{ $time->id_time }}">
                                            {{ $time->start_time . '-' . $time->end_time }}
                                        </option>
                                    @endforeach
                                </select>
                                <br>
                                <button>Đăng ký</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
