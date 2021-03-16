@extends('layouts/layout')

@section('title', 'Kategori')


@section('mini_title')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Kategori</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="ni ni-tag"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">

                        <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#largeModal">New
                            Kategori</a>
                        {{-- <a href="#" class="btn btn-sm btn-neutral">Filters</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/kategori') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="kategori"
                                class="bmd-label-floating col-md-4 col-form-label text-md-right">{{ __('Nama Kategori') }}</label>

                            <div class="col-md-6">
                                <input id="kategori" type="text"
                                    class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                    value="{{ old('kategori') }}" autocomplete="kategori" autofocus
                                    placeholder="Kategori Produk" required>

                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Kategori') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Confirm</button> --}}
                </div>
            </div>
        </div>
    </div>

    @foreach ($kategori as $data)
        
    <div class="modal fade" id="ubahModal-{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Ubah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('kategori/'.$data->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT');
                        <div class="form-group row">
                            <label for="kategori"
                                class="bmd-label-floating col-md-4 col-form-label text-md-right">{{ __('Nama Kategori') }}</label>

                            <div class="col-md-6">
                                <input id="kategori" type="text"
                                    class="form-control @error('kategori') is-invalid @enderror" name="kategori"
                                    value="{{ $data->kategori }}" autocomplete="kategori" autofocus
                                    placeholder="Kategori Produk" required>

                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ubah Kategori') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Confirm</button> --}}
                </div>
            </div>
        </div>
    </div>

    @endforeach

@endsection


{{-- @section('mini_title')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Kategori</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Kategori</a></li>
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
                        <h2 class="mb-0">Kategori</h2>
                        
                        <div class="card-body">
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
                                    <p style="margin-bottom: 0;">
                                        {{ session()->get('message') }}
                                    </p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif

                            {{-- @foreach ($kategori->chunk(4) as $kategorichunk) --}}
                            <div class="row">
                                @foreach ($kategori as $item)
                                    {{-- <div class="col"> --}}
                                    <div class="col-md-4 sm-4">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <h1 class="card-title"><b>{{ $item['kategori'] }}</b></h1>
                                                <div class="row justify-content-center">
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahModal-{{$item->id}}">Ubah</a>
                                                    <form action="{{url('kategori/'.$item->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" name="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Anda akan Menghapus Kategori Beserta Produk Dengan Kategori Tersebut, yakin?')">delete</button>
                                                    </form>

                                                </div>
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- @endforeach --}}
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
