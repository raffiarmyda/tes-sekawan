@extends('main.main')
@section('container')
    <head>
        <title>Driver</title>
        <link rel="stylesheet" type="text/css"
              href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css')}}">
        <link rel="stylesheet" type="text/css"
              href="{{asset('https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css')}}">
    </head>
    <body>
    <div class="container">
        <div class="mt-3">
            <h3>Data Driver</h3>
        </div>
        <form method="post" action="{{ url('update_user',$users->id) }}">
            @csrf
            @method('put')
            <div class="from-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                       placeholder="Masukkan Nama" value="{{ $users->name }}">
                @error('name')
                <div class="invalid-feedback">{{$messages='Nama Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                       id="username" placeholder="Masukkan Username" value="{{($users->username)}}">
                @error('username')
                <div class="invalid-feedback">{{$messages='Username Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       placeholder="Masukkan Email" value="{{ $users->email }}">
                @error('email')
                <div class="invalid-feedback">{{$messages='Email Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="form-select" id="role">
                    <option selected>{{$users->role}}</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Ubah Data</button>
        </form>
    </div>
    </body>
@endsection
