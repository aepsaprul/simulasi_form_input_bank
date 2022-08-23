<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderBy('id', 'desc')->get();

        return view('pages.siswa.index', ['siswas' => $siswas]);
    }

    public function create()
    {
        return view('pages.siswa.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'nama.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus diisi dengan tipe email',
            'email.unique' => 'Email sudah dipakai',
            'email.max' => 'Email diisi makasimal 50 karakter'
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:siswas|max:50',
        ], $messages)->validate();

        $siswas = new Siswa;
        $siswas->nama = $request->nama;
        $siswas->email = $request->email;
        $siswas->save();

        $user = new User;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->siswa_id = $siswas->id;
        $user->password = Hash::make('12345q7');
        $user->save();

        return redirect()->route('siswa')->with('sukses', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $siswa = Siswa::find($id);

        return view('pages.siswa.edit', ['siswa' => $siswa]);
    }

    public function update(Request $request)
    {
        $messages = [
            'nama.required' => 'Nama lengkap harus diisi',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email harus diisi dengan tipe email',
            'email.unique' => 'Email sudah dipakai',
            'email.max' => 'Email diisi makasimal 50 karakter'
        ];

        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email|unique:siswas|max:50',
        ], $messages)->validate();

        $siswa = Siswa::find($request->id);
        $siswa->nama = $request->nama;
        $siswa->email = $request->email;
        $siswa->save();

        $user = User::where('siswa_id', $request->id)->first();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('siswa')->with('sukses', 'Data berhasil diperbaharui');
    }

    public function delete(Request $request)
    {
        $siswa = Siswa::find($request->delete_id);
        $siswa->delete();

        return redirect()->route('siswa')->with('sukses', 'Data berhasil dihapus');
    }
}
