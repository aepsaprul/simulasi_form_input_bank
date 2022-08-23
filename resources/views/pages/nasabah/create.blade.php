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
                    <h5 class="text-uppercase">Tambah Data Nasabah</h5>
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
                            <form id="form_create" action="{{ route('nasabah.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td>Nama Lengkap</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control rounded-0" maxlength="30" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Tempat & Tanggal Lahir</td>
                                            <td>:</td>
                                            <td><input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control rounded-0" maxlength="30" required oninput="this.value = this.value.toUpperCase()"></td>
                                            <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control rounded-0" required></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-sm-6 col-6">
                                                        <span>Identitas Diri</span>
                                                    </div>
                                                    <div class="co-sm-6 col-6">
                                                        <select name="identitas" id="identitas" class="form-control rounded-0" required>
                                                            <option value="KTP">KTP</option>
                                                            <option value="SIM">SIM</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="nomor_identitas" id="nomor_identitas" class="form-control rounded-0" maxlength="20" required></td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="pekerjaan" id="pekerjaan" class="form-control rounded-0" maxlength="30" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="alamat" id="alamat" class="form-control rounded-0" maxlength="100" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>RT / RW</td>
                                            <td>:</td>
                                            <td><input type="text" name="rt" id="rt" class="form-control rounded-0" maxlength="5" required></td>
                                            <td><input type="text" name="rw" id="rw" class="form-control rounded-0" maxlength="5" required></td>
                                        </tr>
                                        <tr>
                                            <td>Desa / Kelurahan</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="kelurahan" id="kelurahan" class="form-control rounded-0" maxlength="20" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="kecamatan" id="kecamatan" class="form-control rounded-0" maxlength="20" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten / Kota</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="kota" id="kota" class="form-control rounded-0" maxlength="20" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Telepon Rumah</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control rounded-0" maxlength="15" required></td>
                                        </tr>
                                        <tr>
                                            <td>Telepon Selular</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="nomor_hp" id="nomor_hp" class="form-control rounded-0" maxlength="15" required></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="email" name="email" id="email" class="form-control rounded-0" maxlength="50" required></td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td colspan="2">
                                                <select name="agama" id="agama" class="form-control rounded-0" required>
                                                    <option value="islam">ISLAM</option>
                                                    <option value="hindu">HINDU</option>
                                                    <option value="protestan">PROTESTAS</option>
                                                    <option value="budha">BUDHA</option>
                                                    <option value="katolik">KATOLIK</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pendidikan Terakhir</td>
                                            <td>:</td>
                                            <td colspan="2">
                                                <select name="pendidikan" id="pendidikan" class="form-control rounded-0" required>
                                                    <option value="">--PILIH PENDIDKAN--</option>
                                                    <option value="SD">SD</option>
                                                    <option value="SLTP">SLTP</option>
                                                    <option value="SLTA">SLTA</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status Pernikahan</td>
                                            <td>:</td>
                                            <td colspan="2">
                                                <select name="status_pernikahan" id="status_pernikahan" class="form-control rounded-0" required>
                                                    <option value="">--PILIH STATUS--</option>
                                                    <option value="single">SINGLE</option>
                                                    <option value="menikah">MENIKAH</option>
                                                    <option value="duda">DUDA</option>
                                                    <option value="janda">JANDA</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama Ibu Kandung</td>
                                            <td>:</td>
                                            <td colspan="2"><input type="text" name="nama_ibu" id="nama_ibu" class="form-control rounded-0" maxlength="30" required oninput="this.value = this.value.toUpperCase()"></td>
                                        </tr>
                                        <tr>
                                            <td>Sumber Dana</td>
                                            <td>:</td>
                                            <td colspan="2">
                                                <select name="penghasilan" id="penghasilan" class="form-control rounded-0" required>
                                                    <option value="">--PILIH SUMBER DANA--</option>
                                                    <option value="tabungan pribadi">TABUNGAN PRIBADI</option>
                                                    <option value="bisnis">BISNIS</option>
                                                    <option value="penghasil/gaji">PENGHASILAN/GAJI</option>
                                                    <option value="penjualan investasi">PENJUALAN INVESTASI</option>
                                                    <option value="lainnya">LAINNYA</option>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-create-spinner d-none btn-flat" disabled style="width: 130px;">
                                            <span class="spinner-grow spinner-grow-sm"></span>
                                            Loading...
                                        </button>
                                        <button type="submit" class="btn bg-gradient-primary btn-create-submit btn-flat" style="width: 130px;"><i class="fas fa-save"></i> Simpan</button>
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
