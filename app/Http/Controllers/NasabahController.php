<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabahs = Nasabah::orderBy('id', 'desc')->get();

        return view('pages.nasabah.index', ['nasabahs' => $nasabahs]);
    }

    public function create()
    {
        return view('pages.nasabah.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'nama_lengkap.required' => 'Nama harus diisi',
            'nama_lengkap.max' => 'Nama maksimal 30 karakter',
            'status_pernikahan.required' => 'Status pernikahan harus diisi',
            'status_pernikahan.max' => 'Status pernikahan maksimal 10 karakter',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tempat_lahir.max' => 'Tempat lahir maksimal 30 karakter',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'identitas.required' => 'Identitas harus diisi',
            'identitas.max' => 'Identitas maksimal 20 karakter',
            'nomor_identitas.required' => 'Identitas harus diisi',
            'nomor_identitas.max' => 'Nomor identitas maksimal 20 karakter',
            'alamat.required' => 'Alamat asal harus diisi',
            'rt.required' => 'RT harus diisi',
            'rt.max' => 'RT maksimal 5 karakter',
            'rw.required' => 'RW harus diisi',
            'rw.max' => 'RW maksimal 5 karakter',
            'kelurahan.required' => 'Kelurahan harus diisi',
            'kelurahan.max' => 'Kelurahan maksimal 20 karakter',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kecamatan.max' => 'Kecamatan maksimal 20 karakter',
            'kota.required' => 'Kota harus diisi',
            'kota.max' => 'Kota maksimal 20 karakter',
            'nomor_hp.required' => 'Nomor HP harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus diisi dengan tipe email',
            'email.unique' => 'Email sudah dipakai',
            'email.max' => 'Email diisi makasimal 50 karakter',
            'agama.required' => 'Agama harus diisi',
            'agama.max' => 'Agama maksimal 10 karakter',
            'pendidikan.required' => 'Pendidikan harus diisi',
            'pendidikan.max' => 'Pendidikan maksimal 30 karakter',
            'pekerjaan.required' => 'Pekerjaan harus diisi',
            'pekerjaan.max' => 'Pekerjaan maksimal 30 karakter',
            'penghasilan.required' => 'Penghasilan harus diisi',
            'penghasilan.max' => 'Pengahasilan maksimal 100 karakter',
            'nama_ibu.required' => 'Nama ibu harus diisi',
            'nama_ibu.max' => 'Nama ibu maksimal 30 karakter'
        ];

        Validator::make($request->all(), [
            'nama_lengkap' => 'required|max:30',
            'status_pernikahan' => 'required|max:10',
            'tempat_lahir' => 'required|max:30',
            'tanggal_lahir' => 'required',
            'identitas' => 'required|max:20',
            'nomor_identitas' => 'required|max:20',
            'alamat' => 'required',
            'rt' => 'required|max:5',
            'rw' => 'required|max:5',
            'kelurahan' => 'required|max:20',
            'kecamatan' => 'required|max:20',
            'kota' => 'required|max:20',
            'nomor_hp' => 'required|max:15',
            'email' => 'required|email|unique:siswas|max:50',
            'agama' => 'required|max:10',
            'pendidikan' => 'required|max:30',
            'pekerjaan' => 'required|max:30',
            'penghasilan' => 'required|max:100',
            'nama_ibu' => 'required|max:30'
        ], $messages)->validate();

        $nasabah = new Nasabah;
        $nasabah->nama_lengkap = $request->nama_lengkap;
        $nasabah->status_pernikahan = $request->status_pernikahan;
        $nasabah->tempat_lahir = $request->tempat_lahir;
        $nasabah->tanggal_lahir = $request->tanggal_lahir;
        $nasabah->identitas = $request->identitas;
        $nasabah->nomor_identitas = $request->nomor_identitas;
        $nasabah->nomor_identitas = $request->nomor_identitas;
        $nasabah->alamat = $request->alamat;
        $nasabah->rt = $request->rt;
        $nasabah->rw = $request->rw;
        $nasabah->kelurahan = $request->kelurahan;
        $nasabah->kecamatan = $request->kecamatan;
        $nasabah->kota = $request->kota;
        $nasabah->nomor_telepon = $request->nomor_telepon;
        $nasabah->nomor_hp = $request->nomor_hp;
        $nasabah->email = $request->email;
        $nasabah->agama = $request->agama;
        $nasabah->pendidikan = $request->pendidikan;
        $nasabah->pekerjaan = $request->pekerjaan;
        $nasabah->penghasilan = $request->penghasilan;
        $nasabah->kode = $request->kode;
        $nasabah->rekening = $request->rekening;
        $nasabah->nama_ibu = $request->nama_ibu;
        $nasabah->save();

        return redirect()->route('nasabah')->with('sukses', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $nasabah = Nasabah::find($id);

        return view('pages.nasabah.edit', ['nasabah' => $nasabah]);
    }

    public function update(Request $request)
    {
        $messages = [
            'nama_lengkap.required' => 'Nama harus diisi',
            'nama_lengkap.max' => 'Nama maksimal 30 karakter',
            'status_pernikahan.required' => 'Status pernikahan harus diisi',
            'status_pernikahan.max' => 'Status pernikahan maksimal 10 karakter',
            'tempat_lahir.required' => 'Tempat lahir harus diisi',
            'tempat_lahir.max' => 'Tempat lahir maksimal 30 karakter',
            'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
            'identitas.required' => 'Identitas harus diisi',
            'identitas.max' => 'Identitas maksimal 20 karakter',
            'nomor_identitas.required' => 'Nomor identitas harus diisi',
            'nomor_identitas.max' => 'Nomor identitas maksimal 20 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'rt.required' => 'RT harus diisi',
            'rt.max' => 'RT maksimal 5 karakter',
            'rw.required' => 'RW harus diisi',
            'rw.max' => 'RW maksimal 5 karakter',
            'kelurahan.required' => 'Kelurahan harus diisi',
            'kelurahan.max' => 'Kelurahan maksimal 20 karakter',
            'kecamatan.required' => 'Kecamatan harus diisi',
            'kecamatan.max' => 'Kecamatan maksimal 20 karakter',
            'kota.required' => 'Kota harus diisi',
            'kota.max' => 'Kota maksimal 20 karakter',
            'nomor_hp.required' => 'Nomor HP harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus diisi dengan tipe email',
            'email.max' => 'Email diisi makasimal 50 karakter',
            'agama.max' => 'Agama maksimal 10 karakter',
            'pendidikan.required' => 'Pendidikan harus diisi',
            'pendidikan.required' => 'Pendidikan harus diisi',
            'pendidikan.max' => 'Pendidikan maksimal 30 karakter',
            'pekerjaan.required' => 'Pekerjaan harus diisi',
            'pekerjaan.max' => 'Pekerjaan maksimal 30 karakter',
            'penghasilan.required' => 'Penghasilan harus diisi',
            'penghasilan.max' => 'Pengahasilan maksimal 100 karakter',
            'nama_ibu.required' => 'Nama ibu harus diisi',
            'nama_ibu.max' => 'Nama ibu maksimal 30 karakter'
        ];

        Validator::make($request->all(), [
            'nama_lengkap' => 'required|max:30',
            'status_pernikahan' => 'required|max:10',
            'tempat_lahir' => 'required|max:30',
            'tanggal_lahir' => 'required',
            'identitas' => 'required|max:20',
            'nomor_identitas' => 'required|max:20',
            'alamat' => 'required',
            'rt' => 'required|max:5',
            'rw' => 'required|max:5',
            'kelurahan' => 'required|max:20',
            'kecamatan' => 'required|max:20',
            'kota' => 'required|max:20',
            'nomor_hp' => 'required|max:15',
            'email' => 'required|email|max:50',
            'agama' => 'required|max:10',
            'pendidikan' => 'required|max:30',
            'pekerjaan' => 'required|max:30',
            'penghasilan' => 'required|max:100',
            'nama_ibu' => 'required|max:30'
        ], $messages)->validate();

        $nasabah = Nasabah::find($request->nasabah_id);
        $nasabah->nama_lengkap = $request->nama_lengkap;
        $nasabah->status_pernikahan = $request->status_pernikahan;
        $nasabah->tempat_lahir = $request->tempat_lahir;
        $nasabah->tanggal_lahir = $request->tanggal_lahir;
        $nasabah->identitas = $request->identitas;
        $nasabah->nomor_identitas = $request->nomor_identitas;
        $nasabah->alamat = $request->alamat;
        $nasabah->rt = $request->rt;
        $nasabah->rw = $request->rw;
        $nasabah->kelurahan = $request->kelurahan;
        $nasabah->kecamatan = $request->kecamatan;
        $nasabah->kota = $request->kota;
        $nasabah->nomor_telepon = $request->nomor_telepon;
        $nasabah->nomor_hp = $request->nomor_hp;
        $nasabah->email = $request->email;
        $nasabah->agama = $request->agama;
        $nasabah->pendidikan = $request->pendidikan;
        $nasabah->pekerjaan = $request->pekerjaan;
        $nasabah->penghasilan = $request->penghasilan;
        $nasabah->kode = $request->kode;
        $nasabah->rekening = $request->rekening;
        $nasabah->nama_ibu = $request->nama_ibu;
        $nasabah->save();

        return redirect()->route('nasabah')->with('sukses', 'Data berhasil diperbaharui');
    }

    public function delete(Request $request)
    {
        $nasabah = Nasabah::find($request->delete_id);
        $nasabah->delete();

        return redirect()->route('nasabah')->with('sukses', 'Data berhasil dihapus');
    }
}
