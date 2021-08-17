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
            <h3>Data Order</h3>
        </div>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <a href="/order/create_order" class="btn btn-outline-primary m-2">Create Order</a>
            <thead>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @elseif(session('edit'))
                <div class="alert alert-success">
                    {{ session('edit') }}
                </div>
            @elseif(session('delete'))
                <div class="alert alert-danger">
                    {{ session('delete') }}
                </div>
            @endif
            <tr>
                <th>No</th>
                <th>Driver Name</th>
                <th>Driver License</th>
                <th>Driver Number</th>
                <th>Vehicle Name</th>
                <th>Vehicle Type</th>
                <th>Vehicle Description</th>
                <th>Rent Company</th>
                <th>Approval Status</th>
                <th>Action</th>
            </tr>
            </thead>
            @foreach($order as $o)
                <tbody>
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$o->driver_name}}</td>
                    <td>{{$o->driver_license}}</td>
                    <td>{{$o->driver_number}}</td>
                    <td>{{$o->vehicle_name}}</td>
                    <td>{{$o->vehicle_type}}</td>
                    <td>{{$o->vehicle_description}}</td>
                    <td>{{$o->rent_company}}</td>
                    <td>{{$o->approval}}</td>
                    <td>
                        <div class="d-flex d-inline">
                            <a href="{{url('/order',$o->id)}}/edit" class="btn btn-success m-2">Edit</a>
                            <a href="{{url('/order/delete_order',$o->id)}}" class="btn btn-danger m-2">Delete</a>
                        </div>
                    </td>
                </tr>
                </tbody>
            @endforeach
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    </body>
@endsection
