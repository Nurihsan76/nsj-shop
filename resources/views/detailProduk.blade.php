@extends('layouts/main')

@section('title')
    <title>Toko {{ $user->name }}</title>
@endsection
@section('mini_title')


    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Produk</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="ni ni-cart"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Produk</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">
                        {{-- <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#largeModal">New
                            Produk</a> --}}
                        {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('mini_title')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Produk</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Produk</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">

    @endsection --}}

@section('content')
    {{-- <div class="row"> --}}
    {{-- @foreach ($produk as $item) --}}
    {{-- <div class="row row-cols-1 row-cols-md-12"> --}}
    <div class="col-md-12">
        <div class="card">
            <img src="{{ $produk['foto'] }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h1 class="card-title"> <b> {{ $produk['nama'] }} -
                        {{ $produk['descripsi_singkat'] }} </b> </h1>
                <h2 style="color: red">Rp. {{ number_format($produk['harga'], 0, ',', '.') }}
                </h2>
                <hr>
                <div class="row ml-1">
                    <h2 style="margin-right: 1ch;"> <b> Kategori: </b> </h2>
                    <h2> {{ $produk->kategoris['kategori'] }} </h2>
                </div>
                <div class="row ml-1">
                    <h2 style="margin-right: 1ch;"> <b> Merek: </b> </h2>
                    <h2> {{ $produk['merek'] }} </h2>
                </div>
                <div class="row ml-1">
                    <h2 style="margin-right: 1ch;"> <b> descripsi: </b> </h2>
                    <h3> {{ $produk['descripsi_lengkap'] }} </h3>
                </div>
                <div class="row mt-3 mb-3 ml-1">
                    <a href="https://wa.me/{{ $user->nomor }}?text={{ url($user->nomor . '/toko/' . $produk['id']) }}"
                        class="btn btn-primary btn-sm"> Hubungi Penjual </a>
                    <a href="{{ url($user->nomor . '/toko') }}" class="btn btn-success btn-sm"> Kembali </a>
                </div>
                <div class="top-right links">
                    @auth
                        <!-- ShareThis BEGIN -->
                        <div class="sharethis-inline-share-buttons"></div><!-- ShareThis END -->
                    @endauth
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
    {{-- @endforeach --}}

    {{-- </div> --}}
@endsection
