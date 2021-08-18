@extends('main.main')
@section('container')
    <head>
        <title>User</title>
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
            <h3>Data User</h3>
        </div>
        <form method="post" action="{{url('user')}}">
            @csrf
            <div class="from-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                       placeholder="Masukkan Nama" value="{{old('name')}}">
                @error('name')
                <div class="invalid-feedback">{{$messages='Nama Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                       id="username" placeholder="Masukkan Username" value="{{old('username')}}">
                @error('username')
                <div class="invalid-feedback">{{$messages='Username Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       placeholder="Masukkan Email" value="{{old('email')}}">
                @error('email')
                <div class="invalid-feedback">{{$messages='Email Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" class="form-select" id="role">
                    <option selected>- Pilih Role -</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Master Admin">Master Admin</option>
                </select>
            </div>
            <br>
            <div class="from-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       id="password" placeholder="Masukkan Password" value="{{old('password')}}">
                @error('password')
                <div class="invalid-feedback">{{$messages='Password Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
    </body>
@endsection
