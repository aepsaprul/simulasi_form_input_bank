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
                    <h5 class="text-uppercase">Ubah Data Nasabah</h5>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('nasabah') }}" class="btn bg-gradient-danger btn-sm btn-flat"><i class="fas fa-arrow-left"></i> Kembali</a>
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
                            <form id="form_edit" action="{{ route('nasabah.update') }}" method="post">
                                @csrf

                                {{-- nasabah id --}}
                                <input type="hidden" name="nasabah_id" id="nasabah_id" value="{{ $nasabah->id }}">

                                <div class="row">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control rounded-0" maxlength="30" required oninput="this.value = this.value.toUpperCase()" value="{{ $nasabah->nama_lengkap }}"></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat & Tanggal Lahir</td>
                                            <td>:</td>
                                            <td><input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control rounded-0" maxlength="30" required oninput="this.value = this.value.toUpperCase()" value="{{ $nasabah->tempat_lahir }}"></td>
                                            <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control rounded-0" value="{{ $nasabah->tanggal_lahir }}" required></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-6 col-6">
                                                        <span>Identitas Diri</span>
                                                    </div>
                                                    <div class="co-sm-6 col-6">
                                                        <select name="identitas" id="identitas" class="form-control rounded-0" required>
                                                            <option value="KTP" @if ($nasabah->identitas == "KTP") selected @endif>KTP</option>
                                                            <option value="SIM" @if ($nasabah->identitas == "SIM") selected @endif>SIM</option>
                                                            <option value="Lainnya" @if ($nasabah->identitas == "Lainnya") selected @endif>Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="nomor_identitas" id="nomor_identitas" class="form-control rounded-0" value="{{ $nasabah->nomor_identitas }}" maxlength="20" required></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="pekerjaan" id="pekerjaan" class="form-control rounded-0" value="{{ $nasabah->pekerjaan }}" maxlength="30" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="alamat" id="alamat" class="form-control rounded-0" value="{{ $nasabah->alamat }}" maxlength="100" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>RT / RW</td>
                                            <td>:</td>
                                            <td><input type="text" name="rt" id="rt" class="form-control rounded-0" value="{{ $nasabah->rt }}" maxlength="5" required></td>
                                            <td><input type="text" name="rw" id="rw" class="form-control rounded-0" value="{{ $nasabah->rw }}" maxlength="5" required></td>
                                        </tr>
                                        <tr>
                                            <td>Desa / Kelurahan</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="kelurahan" id="kelurahan" class="form-control rounded-0" value="{{ $nasabah->kelurahan }}" maxlength="20" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="kecamatan" id="kecamatan" class="form-control rounded-0" value="{{ $nasabah->kecamatan }}" maxlength="20" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten / Kota</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="kota" id="kota" class="form-control rounded-0" value="{{ $nasabah->kota }}" maxlength="20" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Telepon Rumah</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control rounded-0" value="{{ $nasabah->nomor_telepon }}" maxlength="15" required></td>
                                        </tr>
                                        <tr>
                                            <td>Telepon Selular</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="nomor_hp" id="nomor_hp" class="form-control rounded-0" value="{{ $nasabah->nomor_hp }}" maxlength="15" required></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="email" name="email" id="email" class="form-control rounded-0" value="{{ $nasabah->email }}"maxlength="50" required></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td colspan="2">
                                                <select name="agama" id="agama" class="form-control rounded-0" required>
                                                    <option value="islam" @if ($nasabah->agama == "islam") selected @endif>ISLAM</option>
                                                    <option value="hindu" @if ($nasabah->agama == "hindu") selected @endif>HINDU</option>
                                                    <option value="protestan" @if ($nasabah->agama == "protestan") selected @endif>PROTESTAS</option>
                                                    <option value="budha" @if ($nasabah->agama == "budha") selected @endif>BUDHA</option>
                                                    <option value="katolik" @if ($nasabah->agama == "katolik") selected @endif>KATOLIK</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan Terakhir</td>
                                            <td>:</td>
                                            <td colspan="2">
                                                <select name="pendidikan" id="pendidikan" class="form-control rounded-0" required>
                                                    <option value="">--PILIH PENDIDKAN--</option>
                                                    <option value="SD" @if ($nasabah->pendidikan == "SD") selected @endif>SD</option>
                                                    <option value="SLTP" @if ($nasabah->pendidikan == "SLTP") selected @endif>SLTP</option>
                                                    <option value="SLTA" @if ($nasabah->pendidikan == "SLTA") selected @endif>SLTA</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status Pernikahan</td>
                                            <td>:</td>
                                            <td colspan="2">
                                                <select name="status_pernikahan" id="status_pernikahan" class="form-control rounded-0" required>
                                                    <option value="">--PILIH STATUS--</option>
                                                    <option value="single" @if ($nasabah->status_pernikahan == "single") selected @endif>SINGLE</option>
                                                    <option value="menikah" @if ($nasabah->status_pernikahan == "menikah") selected @endif>MENIKAH</option>
                                                    <option value="duda" @if ($nasabah->status_pernikahan == "duda") selected @endif>DUDA</option>
                                                    <option value="janda" @if ($nasabah->status_pernikahan == "janda") selected @endif>JANDA</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Ibu Kandung</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="nama_ibu" id="nama_ibu" class="form-control rounded-0" value="{{ $nasabah->nama_ibu }}" maxlength="30" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Sumber Dana</td>
                                            <td>:</td>
                                            <td colspan="2">
                                                <select name="penghasilan" id="penghasilan" class="form-control rounded-0" required>
                                                    <option value="">--PILIH SUMBER DANA--</option>
                                                    <option value="tabungan pribadi" @if ($nasabah->penghasilan == "tabungan pribadi") selected @endif>TABUNGAN PRIBADI</option>
                                                    <option value="bisnis" @if ($nasabah->penghasilan == "bisnis") selected @endif>BISNIS</option>
                                                    <option value="penghasilan/gaji" @if ($nasabah->penghasilan == "penghasilan/gaji") selected @endif>PENGHASILAN/GAJI</option>
                                                    <option value="penjualan investasi" @if ($nasabah->penghasilan == "penjualan investasi") selected @endif>PENJUALAN INVESTASI</option>
                                                    <option value="lainnya" @if ($nasabah->penghasilan == "lainnya") selected @endif>LAINNYA</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-edit-spinner d-none btn-flat" disabled style="width: 130px;">
                                            <span class="spinner-grow spinner-grow-sm"></span>
                                            Loading...
                                        </button>
                                        <button type="submit" class="btn bg-gradient-primary btn-edit-submit btn-flat" style="width: 130px;"><i class="fas fa-save"></i> Perbaharui</button>
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
        $(document).on('submit', '#form_edit', function (e) {
            $('.btn-edit-spinner').removeClass('d-none');
            $('.btn-edit-submit').addClass('d-none');
        })
    });
</script>

@endsection
