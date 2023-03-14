<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Support\Facades\Auth;

class PengaduanController extends Controller
{
    
    public function index()
    {
    	$pengaduan = Pengaduan::join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->where('pengaduan.data_state',0)->where('masyarakat.nama',Auth::user()->name)->orderBy('pengaduan.tgl_pengaduan','ASC')->paginate(5);
        $datapengaduan = Pengaduan::join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->where('pengaduan.data_state',0)->orderBy('pengaduan.tgl_pengaduan','ASC')->paginate(5);
        $nik = Masyarakat::where('nama', Auth::user()->name)->first();
    	return view('content.Pengaduan.Pengaduan', compact('pengaduan','datapengaduan','nik'));
    }

    public function tambah(Request $request)
    {
    	$request->validate([
			'tgl_pengaduan' => 'required',
			'nik'           => 'required',
			'foto'          => 'required',
			'isi_laporan'   => 'required'
    	]);

        $file = $request->file('foto');
        $nama_file = $file->getClientOriginalName();

        $tujuan_upload = 'assets/img/';
        $file->move($tujuan_upload,$nama_file);

    	Pengaduan::create([
            'tgl_pengaduan' => $request['tgl_pengaduan'],
            'nik' => $request['nik'],
            'foto' => $nama_file,
            'isi_laporan' => $request['isi_laporan'],
        ]);

    	$msg = 'Pengaduan Berhasil Diadukan!';
    	return redirect('/pengaduan')->with('msg',$msg);
    }

    public function detailPengaduan($id_pengaduan)
    {
        $detail = Pengaduan::join('masyarakat', 'masyarakat.nik', 'pengaduan.nik')->where('pengaduan.status',null)->where('pengaduan.data_state',0)->where('pengaduan.id_pengaduan', $id_pengaduan)->first();
        return view('content.Pengaduan.DetailPengaduan', compact('detail'));
    }

}
