@extends('layouts/main')
@section('title')
    <title>Toko {{ $user->name }}</title>
@endsection
<!-- Page content -->
@section('content')
    @foreach ($produk as $item)
        <div class="col-md-4 sm-4">
            <a href=" {{ url($user->nomor . '/toko/' . $item->id) }} ">
                <div class="card">
                    <img class="card-img-top" src="{{ $item->foto }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title mb-3">{{ $item->nama }} - {{ $item->descripsi_singkat }}
                            <br><br>
                            <p class="card-text" style="color: red"><b> Rp.
                                    {{ number_format($item->harga, 0, ',', '.') }}</b></p>
                            <div class="row mt-3 ml-1">
                                <a href="https://wa.me/{{ $user->nomor }}?text={{ url($user->nomor . '/toko/' . $item->id) }}"
                                    class="btn btn-primary btn-sm"> Hubungi Penjual </a>
                            </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach

@endsection
