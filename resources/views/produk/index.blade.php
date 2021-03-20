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
                        <a href="#" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#largeModal">New
                            Produk</a>
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
                    <h5 class="modal-title" id="largeModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ url('/produk') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nama"
                                class="bmd-label-floating col-md-4 col-form-label text-md-right">{{ __('Nama Produk') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" autocomplete="nama" autofocus required
                                    placeholder="Masukkan Nama...">

                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="merek" class="col-md-4 col-form-label text-md-right">{{ __('Merek') }}</label>

                            <div class="col-md-6">
                                <input id="merek" type="text" class="form-control @error('merek') is-invalid @enderror"
                                    name="merek" value="{{ old('merek') }}" autocomplete="merek" autofocus required
                                    placeholder="Masukkan Merek...">

                                @error('merek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>

                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror"
                                    name="harga" value="{{ old('harga') }}" autocomplete="harga" autofocus required
                                    placeholder="Masukkan Harga...">
                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripsi_singkat"
                                class="col-md-4 col-form-label text-md-right">{{ __('Descripsi Singkat') }}</label>

                            <div class="col-md-6">
                                <input id="descripsi_singkat" type="text"
                                    class="form-control @error('descripsi_singkat') is-invalid @enderror"
                                    name="descripsi_singkat" value="{{ old('descripsi_singkat') }}" autofocus required
                                    autocomplete="descripsi_singkat" placeholder="Masukkan Descripsi Singkat...">
                                @error('descripsi_singkat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="descripsi_lengkap"
                                class="col-md-4 col-form-label text-md-right">{{ __('Descripsi Lengkap') }}</label>

                            <div class="col-md-6">
                                <textarea id="descripsi_lengkap" type="text"
                                    class="form-control @error('descripsi_lengkap') is-invalid @enderror"
                                    name="descripsi_lengkap" autocomplete="new-descripsi_lengkap" autofocus required
                                    placeholder="Masukkan Descripsi Lengkap..."></textarea>

                                @error('descripsi_lengkap')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="kategori_id" name="kategori_id">
                                    <option value="  "><b> Kategori Produk </option>
                                    @foreach ($kategori as $item)
                                        <option value=" {{ $item['id'] }} "> {{ $item['kategori'] }} </option>
                                    @endforeach
                                </select>
                                <p style="color: red;">Pastikan Anda Telah Membuat Kategori</p>
                                @error('kategori_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto"
                                class="col-md-4 col-form-label text-md-right">{{ __('Foto Produk') }}</label>

                            <div class="col-md-6 input-group">
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror"
                                    name="foto" value="{{ old('foto') }}" autocomplete="foto" autofocus required>

                                @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('Tampilkan Produk Ke Publik?') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" id="sembunyikan_produk" name="sembunyikan_produk">
                                    <option value=" false "> Tampilkan </option>
                                    <option value=" true "> Sembunyikan </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Tambah Produk') }}
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    @foreach ($produk as $data)
        <div class="modal fade" id="ubahModal-{{ $data->id }}" tabindex="-1" role="dialog"
            aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">Ubah Produk</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ url('produk/' . $data->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="nama"
                                    class="bmd-label-floating col-md-4 col-form-label text-md-right">{{ __('Nama Produk') }}</label>

                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{ old('nama') ? old('nama') : $data->nama }}"
                                        autocomplete="nama" autofocus required placeholder="Nama Produk">

                                    @error('nama')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="merek"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Merek') }}</label>

                                <div class="col-md-6">
                                    <input id="merek" type="text" class="form-control @error('merek') is-invalid @enderror"
                                        name="merek" value="{{ old('merek') ? old('merek') : $data->merek }}"
                                        autocomplete="merek" autofocus required placeholder="Merek Produk">

                                    @error('merek')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="harga"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Harga') }}</label>

                                <div class="col-md-6">
                                    <input id="harga" type="number"
                                        class="form-control @error('harga') is-invalid @enderror" name="harga"
                                        value="{{ old('harga') ? old('harga') : $data->harga }}" autocomplete="harga"
                                        autofocus required placeholder="Harga Produk">
                                    @error('harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripsi_singkat"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descripsi Singkat') }}</label>

                                <div class="col-md-6">
                                    <input id="descripsi_singkat" type="text"
                                        class="form-control @error('descripsi_singkat') is-invalid @enderror"
                                        name="descripsi_singkat"
                                        value="{{ old('descripsi_singkat') ? old('descripsi_singkat') : $data->descripsi_singkat }}"
                                        autofocus required autocomplete="descripsi_singkat"
                                        placeholder="Descripsi Singkat Produk">
                                    @error('descripsi_singkat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="descripsi_lengkap"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Descripsi Lengkap') }}</label>

                                <div class="col-md-6">
                                    <textarea id="descripsi_lengkap" type="text"
                                        class="form-control @error('descripsi_lengkap') is-invalid @enderror"
                                        name="descripsi_lengkap" autocomplete="new-descripsi_lengkap" autofocus required
                                        placeholder="Descripsi Lengkap Produk">{{ old('descripsi_lengkap') ? old('descripsi_lengkap') : $data->descripsi_lengkap }}</textarea>

                                    @error('descripsi_lengkap')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kategori_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="kategori_id" name="kategori_id">
                                        <option value="  "><b> Kategori Produk </option>
                                        @foreach ($kategori as $item)
                                            <option value=" {{ $item['id'] }} "> {{ $item['kategori'] }} </option>
                                        @endforeach
                                    </select>
                                    <p style="color: red;">* Pastikan Anda Telah Membuat Kategori</p>
                                    @error('kategori_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="foto"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Foto Produk') }}</label>


                                <div class="col-md-6 input-group">
                                    <div>
                                        <input id="foto" type="file"
                                            class="form-control @error('foto') is-invalid @enderror" name="foto"
                                            value="{{ old('foto') ? old('foto') : $data->foto }}" autocomplete="foto"
                                            autofocus>
                                        @error('foto')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <p>* Kosongkan Jika Tidak Ingin Diubah</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kategori_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Tampilkan Produk Ke Publik?') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="sembunyikan_produk" name="sembunyikan_produk">
                                        <option value=" false "> Tampilkan </option>
                                        <option value=" true "> Sembunyikan </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Ubah Produk') }}
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <div class="modal-footer">
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
                        <h2 class="mb-0">Produk</h2>
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
                        <div class="row" id="card">
                            @foreach ($produk as $item)
                                <div class="col-md-4 sm-4">
                                    <a id="link" href=" {{ url("/produk/$item->id") }} ">
                                        <div class="card">
                                            <img id="foto" class="card-img-top" src="{{ $item['foto'] }}"
                                                alt="Card image cap">
                                            <div class="card-body">
                                                <h4 id="title" class="card-title mb-3">{{ $item['nama'] }} -
                                                    {{ $item['descripsi_singkat'] }}
                                                    <p id="harga" class="card-text" style="color: red"><b> Rp.
                                                            {{ number_format($item['harga'], 0, ',', '.') }}</b></p>
                                                    <div class="row mt-3 ml-1">
                                                        <a href="" class="btn btn-success btn-sm mt-1 mb-1"
                                                            data-toggle="modal"
                                                            data-target="#ubahModal-{{ $item->id }}">
                                                            Ubah
                                                        </a>
                                                        <a href="whatsapp://send?text={{ url(Auth::user()->nomor . '/toko/' . $item->id) }}"
                                                            class="btn btn-primary btn-sm mt-1 mb-1"> Shere WA Mobile</a>
                                                        <a href="https://web.whatsapp.com/send?text={{ url(Auth::user()->nomor . '/toko/' . $item->id) }}"
                                                            class="btn btn-primary btn-sm mt-1 mb-1"> Shere WA Web</a>
                                                        <form action="{{ url('produk/' . $item->id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" name="submit"
                                                                class="btn btn-danger btn-sm mt-1 mb-1"
                                                                onclick="return confirm('Yakin Ingin Menghapus Produk Ini?')">delete</button>
                                                        </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /#right-panel -->

        <!-- Right Panel -->
    @endsection
