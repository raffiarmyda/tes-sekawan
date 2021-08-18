@extends('main.main')
@section('container')
    <head>
        <link rel="stylesheet" type="text/css"
              href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css"
              href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css"
              href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css"
              href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap4.min.css">

    </head>
    <body>
    <div class="container">
        <div class="mt-3">
            <h3>Data Order</h3>
        </div>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            @if(auth()->user()->role != 'Manager')
                <a href="/order/create_order" class="btn btn-outline-primary m-2">Create Order</a>
            @endif
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
                <th>Vehicle Name</th>
                <th>Approval Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order as $o)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{\App\Models\Driver::find($o['drivers_id'])->driver_name}}</td>
                    <td>{{\App\Models\Vehicle::find($o['vehicles_id'])->vehicle_name}}</td>
                    <td>{{$o->approval}}</td>
                    <td>
                        @if(auth()->user()->role == 'Manager')
                            @if($o->approval==null)
                                <div class="d-flex d-inline">
                                    <a href="{{url('/order',$o->id)}}/accept" class="btn btn-success m-2">Accept</a>
                                    <a href="{{url('/order',$o->id)}}/decline" class="btn btn-danger m-2">Decline</a>
                                </div>
                            @endif
                        @else
                            <div class="d-flex d-inline">
                                <a href="{{url('/order',$o->id)}}/edit" class="btn btn-success m-2">Edit</a>
                                <a href="{{url('/order/delete_order',$o->id)}}" class="btn btn-danger m-2">Delete</a>
                            </div>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['excel']
            });
            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');

        });
    </script>
    </body>
@endsection
