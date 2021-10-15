@extends('layouts.doctor')
@section('content')
    <h4 class="card-title">LỊCH HẸN</h4>

    <div class="card-content table-responsive table-full-width">
        <table class="table" width="100%">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Ngày tháng</th>
                    <th>Tên tài khoản</th>
                    <th>Họ tên bác sĩ</th>
                    <th>Khung giờ</th>
                    <th>Tên bệnh nhân</th>
                    <th>SĐT bệnh nhân</th>
                    <th>Xem chi tiết</th>

                </tr>
            </thead>
            <tbody>
                <?php $i = 0; ?>
                @foreach ($listAppointment as $appointment)

                <?php $i++; ?>
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->customer->full_name }}</td>
                        <td>{{ $appointment->doctor->full_name }}</td>
                        <td>{{ $appointment->time->start_time . '-' . $appointment->time->end_time }}</td>
                        <td>{{ $appointment->name_customer }}</td>
                        <td>{{ $appointment->phone_customer }}</td>
                        <td class="td-actions">
                            <button class="btn btn-info btn-simple btn-xs">
                                <a href="{{ route('info-appointment.show', $id = $appointment->id_customer) }}"><i
                                        class="ti-eye"></i></a>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
