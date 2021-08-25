@extends('main.main')
@section('container')
    <head>
        <link rel="stylesheet" type="text/css" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css')}}">
    </head>
    <body>
    <div class="container">
        <div class="mt-3">
            <h3>Selamat Datang {{auth()->user()->name}} !</h3>
        </div>
        <figure class="highcharts-figure">
            <div id="container"></div>
            <p class="highcharts-description">
        </figure>
    </div>
    </body>
@section('footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>Highcharts.chart('container', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Daftar Pemesanan Kendaraan'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: {!!json_encode(array_keys($data))!!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                max: {{\App\Models\Order::count()}},
                title: {
                    text: 'Total Order'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Status',
                data: {!! json_encode(array_values($data)) !!}

            }]
        });
    </script>
@endsection
@endsection
