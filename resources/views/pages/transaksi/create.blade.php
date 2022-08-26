@extends('layouts.app')

@section('style')

<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('themes/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('themes/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="text-uppercase">Tambah Data Transaksi</h5>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('transaksi') }}" class="btn bg-gradient-danger btn-sm btn-flat"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                            <form id="form_create" action="{{ route('transaksi.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="mb-3">
                                            <label for="nasabah_id">Nasabah</label>
                                            <select name="nasabah_id" id="nasabah_id" class="form-control select2_nasabah_id">
                                                <option value="">--PILIH NASABAH--</option>
                                                @foreach ($nasabahs as $item)
                                                    <option value="{{ $item->id }}"  {{ old('nasabah_id') == $item->id  ? 'selected' : '' }}>{{ $item->rekening }} - {{ $item->nama_lengkap }}</option>
                                                @endforeach
                                            </select>
                                            @error('nasabah_id')
                                                <small id="error_nasabah_id" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="mb-3">
                                            <label for="mutasi">Mutasi</label>
                                            <select name="mutasi" id="mutasi" class="form-control">
                                                <option value="">--PILIH MUTASI--</option>
                                                <option value="keluar"  {{ old('mutasi') == "keluar" ? 'selected' : '' }}>Keluar</option>
                                                <option value="masuk"  {{ old('mutasi') == "masuk" ? 'selected' : '' }}>Masuk</option>
                                            </select>
                                            @error('mutasi')
                                                <small id="error_mutasi" class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                                        <div class="mb-3">
                                            <label for="nominal">Nominal (Rp)</label>
                                            <input type="text" name="nominal" id="nominal" class="form-control">
                                            @error('nominal')
                                                <small id="error_nominal" class="form-text text-danger">{{ $message }}</small>
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
<!-- Select2 -->
<script src="{{ asset('themes/plugins/select2/js/select2.full.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.select2_nasabah_id').select2({
                theme: 'bootstrap4'
        });

        $(document).on('submit', '#form_create', function (e) {
            $('.btn-create-spinner').removeClass('d-none');
            $('.btn-create-submit').addClass('d-none');
        })

        var nominal = document.getElementById("nominal");
            nominal.addEventListener("keyup", function(e) {
                nominal.value = formatRupiah(this.value, "");
        });
    });
</script>

@endsection
