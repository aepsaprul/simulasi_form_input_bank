@extends('layouts.app')

@section('style')

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="text-uppercase">Tambah Data Siswa</h5>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('siswa') }}" class="btn bg-gradient-danger btn-sm btn-flat"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="form_create" action="{{ route('siswa.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="mb-3">
                                            <label for="nama">Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control rounded-0 @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required maxlength="30">
                                            @error('nama')
                                                <small id="error_nama" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" class="form-control rounded-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" required maxlength="30">
                                            @error('email')
                                                <small id="error_email" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-sm btn-create-spinner d-none btn-flat" disabled style="width: 130px;">
                                            <span class="spinner-grow spinner-grow-sm"></span>
                                            Loading...
                                        </button>
                                        <button type="submit" class="btn bg-gradient-primary btn-sm btn-create-submit btn-flat" style="width: 130px;"><i class="fas fa-save"></i> Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@section('script')

<script>
    $(document).ready(function () {
        $(document).on('submit', '#form_create', function (e) {
            $('.btn-create-spinner').removeClass('d-none');
            $('.btn-create-submit').addClass('d-none');
        })
    });
</script>

@endsection
