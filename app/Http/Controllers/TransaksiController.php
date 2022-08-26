<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::get();

        return view('pages.transaksi.index', ['transaksis' => $transaksis]);
    }

    public function create()
    {
        $nasabahs = Nasabah::get();

        return view('pages.transaksi.create', ['nasabahs' => $nasabahs]);
    }

    public function store(Request $request)
    {
        $messages = [
            'nasabah_id.required' => 'Nasabah harus diisi',
            'mutasi.required' => 'Mutasi harus diisi',
            'nominal.required' => 'Nominal harus diisi'
        ];

        $validator = Validator::make($request->all(), [
            'nasabah_id' => 'required',
            'mutasi' => 'required',
            'nominal' => 'required'
        ], $messages)->validate();

        $nominal = str_replace(".", "", $request->nominal);

        // data nasabah
        $nasabah = Nasabah::find($request->nasabah_id);

        // cek jika mutasi keluar lebih dari saldo
        if ($request->mutasi == "keluar" && $nominal > $nasabah->saldo) {
            throw ValidationException::withMessages(['nominal' => 'Nominal lebih besar dari saldo']);
        }

        // nasabah update saldo
        if ($request->mutasi == "keluar") {
            $nasabah->saldo = $nasabah->saldo - $nominal;
        } else {
            $nasabah->saldo = $nasabah->saldo + $nominal;
        }
        $nasabah->save();

        // simpan transaksi
        $transaksi = new Transaksi;
        $transaksi->nasabah_id = $request->nasabah_id;

        if ($request->mutasi == "keluar") {
            $transaksi->sandi = 2;
            $transaksi->keluar = $nominal;
        } else {
            $transaksi->sandi = 1;
            $transaksi->masuk = $nominal;
        }

        $transaksi->saldo = $nasabah->saldo;
        $transaksi->save();

        return redirect()->route('transaksi')->with('sukses', 'Data berhasil ditambah');
    }

    public function show($id)
    {

    }

    public function delete(Request $request)
    {
        $transaksi = Transaksi::find($request->delete_id);

        $nasabah = Nasabah::find($request->nasabah_id);
        if ($transaksi->sandi == 2) {
            $nasabah->saldo = $nasabah->saldo + $transaksi->keluar;
        } else {
            $nasabah->saldo = $nasabah->saldo - $transaksi->masuk;
        }
        $nasabah->save();

        $transaksi->delete();

        return redirect()->route('transaksi')->with('sukses', 'Data berhasil dihapus');
    }
}
