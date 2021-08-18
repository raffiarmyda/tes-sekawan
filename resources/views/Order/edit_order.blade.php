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
            <h3>Edit Order</h3>
        </div>
        <form method="post" action="{{url('update_order',$order->id)}}">
            @csrf
            <div class="from-group">
                <label for="drivers_id">Driver Name</label>
                <select name="drivers_id" class="form-select @error('drivers_id') is-invalid @enderror">
                    @foreach($driver as $item)
                        <option value="{{$item->id}}" {{$order->drivers_id == $item->id ? 'selected' : ''}}>{{$item->driver_name}}</option>
                    @endforeach
                </select>
                @error('drivers_id')<div class="invalid-feedback">{{$messages='Harus Memilih Driver'}}</div>
                @enderror
            </div>
            <br>
            <div class="from-group">
                <label for="vehicles_id">Vehicle Name</label>
                <select name="vehicles_id" class="form-select @error('vehicles_id') is-invalid @enderror">
                    @foreach($vehicle as $item)
                        <option value="{{$item->id}}" {{$order->vehicles_id == $item->id ? 'selected' : ''}}>{{$item->vehicle_name}}</option>
                    @endforeach
                </select>
                @error('vehicles_id')<div class="invalid-feedback">{{$messages='Harus Memilih Kendaraan'}}</div>
                @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Update Data</button>
        </form>
    </div>
    </body>
@endsection
