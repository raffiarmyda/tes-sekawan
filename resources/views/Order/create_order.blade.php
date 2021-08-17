@extends('main.main')
@section('container')
    <head>
        <title>Order</title>
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
            <h3>Data Order</h3>
        </div>
        <form method="post" action="{{url('order')}}">
            @csrf
            <div class="from-group">
                <label for="driver_name">Driver Name</label>
                <input type="text" name="driver_name" class="form-control @error('driver_name') is-invalid @enderror" id="driver_name"
                       placeholder="Masukkan Nama Driver" value="{{old('driver_name')}}">
                @error('driver_name')
                <div class="invalid-feedback">{{$messages='Nama Driver Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="email">Driver Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                       placeholder="Masukkan Email" value="{{old('email')}}">
                @error('email')
                <div class="invalid-feedback">{{$messages='Email Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="address">Driver Address</label>
                <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                       id="address" placeholder="Masukkan Alamat Driver" value="{{old('address')}}">
                @error('address')
                <div class="invalid-feedback">{{$messages='Alamat Driver Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="license">License</label>
                <div class="form-check">
                    <input class="form-check-input @error('license') is-invalid @enderror" type="radio" name="license" id="exampleRadios1" value="SIM A" {{old('license') == 'SIM A' ? 'checked' : ''}}>
                    <label class="form-check-label" for="license">
                        SIM A
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('license') is-invalid @enderror" type="radio" name="license" id="exampleRadios2" value="SIM B1 UMUM" {{old('license') == 'SIM B1 UMUM' ? 'checked' : ''}}>
                    <label class="form-check-label" for="license">
                        SIM B1 UMUM
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input @error('license') is-invalid @enderror" type="radio" name="license" id="exampleRadios3" value="SIM B2 UMUM" {{old('license') == 'SIM B2 UMUM' ? 'checked' : ''}}>
                    <label class="form-check-label" for="license">
                        SIM B2 UMUM
                    </label>
                    @error('license')
                    <div class="invalid-feedback">{{$messages= 'Driver Harus Memiliki SIM'}}</div>
                    @enderror
                </div>
            </div>
            <br>
            <div class="from-group">
                <label for="phone_number">Driver Phone Number</label>
                <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                       id="phone_number" placeholder="Masukkan Nomor Hp Driver" value="{{old('phone_number')}}">
                @error('phone_number')
                <div class="invalid-feedback">{{$messages='Nomor Hp Driver Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
    </div>
    </body>
@endsection
