<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index()
    {
        $petugas = User::where('data_state',0)->where('level','petugas')->paginate(5);

        return view('content.Petugas.Petugas', compact('petugas'));
    }

    public function tambah()
    {
        return view('content.Petugas.FormTambahPetugas');
    }

    public function prosesTambah(Request $request)
    {
        User::create([
            'name'         => $request->nama_petugas,
            'username'     => $request->username,
            'password'     => Hash::make($request->password),
            'telp'         => $request->telp,
            'level'        => $request->level
        ]);

        $msg = 'Data Petugas Berhasil Ditambahkan!';
        return redirect('/petugas')->with('msg', $msg);
    }

    public function edit($id)
    {
        $data = User::where('id',$id)->first();

        return view('content.Petugas.FormEditPetugas', compact('data'));
    }

    public function hapus($id)
    {
        $hapus = User::findOrFail($id);

        if ($hapus->delete()) {
            $msg = 'Hapus Data Petugas Berhasil!';
            return redirect('/petugas')->with('msg', $msg);
        }
    }
}
