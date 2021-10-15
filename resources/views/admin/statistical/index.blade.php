@extends('layouts.admin')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png">
        <link rel="icon" type="image/png" sizes="96x96" href="../../assets/img/favicon.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <title>Thống kê</title>
        <script type="text/javascript" src="http://www.chartjs.org/assets/Chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"
                integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q=="
                crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/series-label.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>
        <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    </head>

    <body>
        <h3 style="text-align: center;font-weight: 600;text-transform: uppercase;color: firebrick;">Thống kê</h3>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row" style="height: 123px">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p style="height: 22.4px;">BÁC SĨ</< /p>
                                        <h3>{{ $doctor }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row" style="height: 123px">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="ti-wallet"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>CHUYÊN KHOA</p>
                                        <h3>{{ $specialist }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row" style="height: 123px">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>BỆNH NHÂN</p>
                                        <h3>{{ $customer }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="card-content">
                            <div class="row" style="height: 123px">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-info text-center">
                                        <i class="ti-image"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>TIN TỨC</p>
                                        <h3>{{ $news }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('error'))
                <div class="section cd-section section-notifications" id="notifications">
                    <div class="alert alert-danger">
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
                </div>
            @endif
            <h3 style="text-align: center;font-weight: 600;color: cornflowerblue;">THỐNG KÊ SỐ GIỜ LÀM</h3>
            <form action="" method="get">
                Từ ngày <input type="date" name="date_from" value="{{ $date_from }}">
                Đến ngày <input type="date" name="date_to" value="{{ $date_to }}">
                <button>Đi</button>
            </form>
            <br>
            <canvas id="myChart" width="100" height="40"></canvas>
            <br>
            <div id="container" style="width:100%; height:400px;"></div>
    </body>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var data = <?php echo $dataChartJS; ?>;
        console.log(data);
        var labels = [];
        var result = [];
        for (var i in data) {
            labels.push(data[i].full_name);
            result.push(data[i].times);
        }
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'số giờ làm việc',
                    data: result,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 99, 132, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });


        var data_appointment = <?php echo $data_appointment; ?>;
        var appointment = [];
        var months = [];
        for (var j in data_appointment) {
            appointment.push(data_appointment[j].appointment);
            months.push(data_appointment[j].months);
        }
        Highcharts.chart('container', {

            title: {
                text: 'THỐNG KÊ LỊCH HẸN BỆNH NHÂN'
            },

            subtitle: {
                text: ''
            },

            yAxis: {
                title: {
                    text: 'Số giờ hẹn'
                }
            },

            xAxis: {
                data: months,
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 1
                }
            },

            series: [{
                name: 'Tổng số giờ hẹn',
                data: appointment,
            }, ],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>

    </html>
@endsection
