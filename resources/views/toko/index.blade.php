@extends('layouts/layout')

@section('title', 'Toko')

@section('mini_title')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Toko</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Toko</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 col-5 text-right">

                        {{-- <a href="#" class="btn btn-sm btn-neutral">New</a> --}}
                        <a href="{{ url(Auth::user()->nomor . '/toko') }}" class="btn btn-sm btn-success">Ke Toko</a>
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
                <h1>Toko</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Toko</a></li>
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
                        <h2 style="solid;" class="mb-0">Toko {{ Auth::user()->name }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @if ($errors->any())
                                    <div class="message shadow-sm">
                                        <div class="alert alert-danger alert-dismissible fade show inner-message"
                                            role="alert">
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
                                        <div class="alert alert-success alert-dismissible fade show inner-message"
                                            role="alert">
                                            <p style="margin-bottom: 0;"><span class="ni ni-check-bold mr-1"></span>
                                                {{ session()->get('message') }}
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                @endif

                                <div class="card shadow-md">
                                    <div class="card-header text-center">
                                        <img src="{{ Auth::user()->foto }}" alt="" width="150px" class="rounded-circle">
                                        <hr class="my-3">
                                        <h2 class="mb-0">{{ Auth::user()->name }}</h2>
                                        <hr class="my-3">
                                        <h4 class="font-weight-normal text-left"><i class="ni ni-square-pin mr-1"></i>
                                            {{ Auth::user()->alamat }}</h4>
                                        <h4 class="font-weight-normal text-left"><i class="ni ni-mobile-button mr-1"></i>
                                            {{ Auth::user()->nomor }}</h4>
                                        <h4 class="font-weight-normal text-left"><i class="ni ni-world-2"></i>
                                            {{ url(Auth::user()->nomor . '/toko') }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="row align-items-center">
                                            <div class="col-8">
                                                <h3 class="mb-0">Edit Toko </h3>
                                            </div>
                                            <div class="col-4 text-right">
                                                <a href="#!" data-target="#changePass" data-toggle="modal"
                                                    class="btn btn-sm btn-danger">Ubah Password</a>
                                            </div>

                                            <div class="modal fade" id="changePass">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            <h2>Ubah Password</h2>

                                                            <hr class="my-2">

                                                            <form action="{{ url('/ganti') }}" method="post">
                                                                @csrf
                                                                @method('patch')
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="old_password">Old
                                                                        Password</label>
                                                                    <input type="password" name="old_password"
                                                                        id="old_password"
                                                                        class="form-control @error('old_password') is-invalid @enderror"
                                                                        placeholder="Old Password" required />
                                                                    @error('old_password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label" for="password">New
                                                                        Password</label>
                                                                    <input type="password" name="password" id="password"
                                                                        class="form-control @error('password') is-invalid @enderror"
                                                                        placeholder="Password" required />
                                                                    @error('password')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-control-label"
                                                                        for="password_confirmation">Repeat Password</label>
                                                                    <input type="password" name="password_confirmation"
                                                                        id="password_confirmation" class="form-control"
                                                                        placeholder="Password" required />
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="submit"
                                                                        class="btn btn-outline-danger btn-block">Change</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="{{ url('/toko') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <h6 class="heading-small text-muted mb-4">User information</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="name">Nama Toko</label>
                                                            <input type="text" name="name" id="name" class="form-control"
                                                                placeholder="Your Name" value="{{ Auth::user()->name }}"
                                                                required />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="email">Email</label>
                                                            <input type="email" name="email" id="email" class="form-control"
                                                                placeholder="example@example.com"
                                                                value="{{ Auth::user()->email }}" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-control-label" for="foto">Image</label>
                                                    <input type="file" class="form-control" name="foto" id="foto" />
                                                    <p>* Kosongkan Jika Tidak Ingin Diubah</p>
                                                </div>
                                            </div>
                                            <hr class="my-4" />
                                            <!-- Address -->
                                            <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                            <div class="pl-lg-4">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="nomor">Phone</label>
                                                            <input type="number" name="nomor" id="nomor"
                                                                class="form-control" placeholder="082xxxxxxxxxxxx"
                                                                value="{{ Auth::user()->nomor }}" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="form-control-label" for="alamat">Address</label>
                                                            <textarea rows="4" class="form-control"
                                                                placeholder="Input your address ..." name="alamat"
                                                                id="alamat">{{ Auth::user()->alamat }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
