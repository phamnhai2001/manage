@extends('layouts.site')
@section('content')

<div class="wrapper">
    <div class="section section-contact-form">
        <div class="container">

        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            <div class="card-content table-responsive table-full-width">
                <table width="100%" class="table">
                <thead>
                    <tr>
                        <th>Nguời đặt</th>
                        <th>Tên bênh nhân</th>
                        <th>SĐT</th>
                        <th>Ngày</th>
                        <th>Tên bác sĩ</th>
                        <th>Khung giờ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($listAppointment as $app)
                    <tr>
                        <td>{{$app->customer->full_name}}</td>
                        <td>{{$app->name_customer}}</td>
                        <td>{{$app->phone_customer}}</td>
                        <td>{{$app->date}}</td>
                        <td>{{ $app->doctor->full_name }}</td>
                        <td>{{ ($app->time->start_time)."-".($app->time->end_time) }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
