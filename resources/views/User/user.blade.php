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
            <h3>Data User</h3>
        </div>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <a href="/user/create_user" class="btn btn-outline-primary m-2">Tambah User</a>
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
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            </thead>
            @foreach($user as $u)
                <tbody>
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>{{$u->username}}</td>
                    <td>{{$u->role}}</td>
                    <td>
                        <div class="d-flex d-inline">
                            <a href="{{url('/user',$u->id)}}/edit" class="btn btn-success m-2">Edit</a>
                            <a href="{{url('/user/delete_user',$u->id)}}" class="btn btn-danger m-2">Delete</a>
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
