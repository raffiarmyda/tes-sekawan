@extends('main.main')
@section('container')
    <head>
        <title>Vehicle</title>
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
            <h3>Data Vehicle</h3>
        </div>
        <form method="post" action="{{url('update_vehicle',$vehicle->id)}}">
            @csrf
            <div class="from-group">
                <label for="vehicle_name">Vehicle Name</label>
                <input type="text" name="vehicle_name" class="form-control @error('vehicle_name') is-invalid @enderror"
                       id="vehicle_name"
                       placeholder="Masukkan Nama Kendaraan" value="{{$vehicle->vehicle_name}}">
                @error('vehicle_name')
                <div class="invalid-feedback">{{$messages='Nama Kendaraan Tidak Boleh Kosong'}}</div>
                @enderror
            </div>
            <br>
            <div class="form-group">
                <label for="type">Jenis Kendaraan</label>
                <select name="type" class="form-select " required>
                    <option selected>- Pilih Jenis Kendaraan -</option>
                    <option value="Kendaraan Angkutan Orang" {{$vehicle->type == 'Kendaraan Angkutan Orang' ? 'selected' : ''}}>Kendaraan Angkutan Orang</option>
                    <option value="Kendaraan Angkutan Barang" {{$vehicle->type == 'Kendaraan Angkutan Barang' ? 'selected' : ''}}>Kendaraan Angkutan Barang</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Deskripsi Kendaraan</label>
                <select name="description" class="form-select " required>
                    <option selected>- Pilih Deskripsi Kendaraan -</option>
                    <option value="Kendaraan Perusahaan" {{$vehicle->description == 'Kendaraan Perusahaan' ? 'selected' : ''}}>Kendaraan Perusahaan</option>
                    <option value="Kendaraan Sewaan" {{$vehicle->description == 'Kendaraan Sewaan' ? 'selected' : ''}}>Kendaraan Sewaan</option>
                </select>
            </div>
            <div class="from-group">
                <label for="rent_company">Rent Company</label>
                <input type="text" name="rent_company" class="form-control"
                       id="rent_company" placeholder="Masukkan Perusahaan Penyewa Kendaraan"
                       value="{{$vehicle->rent_company}}">
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
    </body>
@endsection
