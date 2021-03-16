@extends('layouts/layout')

@section('title', 'Produk')

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
    <div class="container-fluid mt--6">
        <div class="row justify-content-center">
            <div class=" col ">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <h2 class="mb-0">Produk Detail</h2>
                    </div>
                    <div class="card-body">
                        {{-- <div class="row icon-examples"> --}}

                        @if ($errors->any())
                            <div class="message shadow-sm">
                                <div class="alert alert-danger alert-dismissible fade show inner-message" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif

                        @if (session()->has('message'))
                            <div class="message shadow-sm">
                                <div class="alert alert-success alert-dismissible fade show inner-message" role="alert">
                                    <p style="margin-bottom: 0;"><span class="ni ni-check-bold mr-1"></span>
                                        {{ session()->get('message') }}
                                    </p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            {{-- @foreach ($produk as $item) --}}
                            <div class="row row-cols-1 row-cols-md-12">
                                <div class="col mb-4">
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
                                        </div>
                                        <a href="{{url('/produk')}}" class="btn btn-success btn-sm" >Kembali</a>
                                        {{-- </div> --}}
                                </div>
                            </div>
                            {{-- @endforeach --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
