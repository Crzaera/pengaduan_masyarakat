<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\models\Tanggapan;

class KelolaPengaduanController extends Controller
{
    
    public function notValid()
    {
    	$notvalid = Pengaduan::join('masyarakat','masyarakat.nik','pengaduan.nik')->where('pengaduan.status',null)->orderBy('pengaduan.tgl_pengaduan','ASC')->where('pengaduan.data_state',0)->paginate(5);

    	return view('content.KelolaPengaduan.NotValidPengaduan', compact('notvalid'));
    }

    public function prosesValidasi($id_pengaduan)
    {
    	$validasi = Pengaduan::where('id_pengaduan',$id_pengaduan)->first();
    	$validasi->status = '0';

    	if ($validasi->save()) {
    		$msg = 'Validasi Berhasil!';

    		return redirect('/kelola-pengaduan/notvalid')->with('msg', $msg);
    	}
    }

    public function valid()
    {
    	$valid = Pengaduan::where('status','0')->where('data_state',0)->orderBy('tgl_pengaduan','ASC')->paginate(5);
        return view('content.KelolaPengaduan.ValidPengaduan', compact('valid'));
    }

    public function prosesVerifikasi($id_pengaduan)
    {
		$verifikasi = Pengaduan::findOrFail($id_pengaduan);
		$verifikasi->status = 'proses';

		if($verifikasi->save()){
			$msg = 'Proses Verifikasi Berhasil!';
			return redirect('/kelola-pengaduan/valid')->with('msg', $msg);
	    }
    }

    public function tolak($id_pengaduan)
    {
    	$tolak = Pengaduan::findOrFail($id_pengaduan);
    	$tolak->data_state = 2;
    	$tolak->save();

    	$msg = 'Pengaduan Ditolak!';
    	return redirect('/kelola-pengaduan/notvalid')->with('msg', $msg);
    }

    public function proses()
    {
    	$proses = Pengaduan::where('status','proses')->where('data_state',0)->orderBy('tgl_pengaduan','ASC')->paginate(5);
    	return view('content.KelolaPengaduan.ProsesPengaduan', compact('proses'));
    }

    public function prosesSelesai($id_pengaduan)
    {
    	$tanggapan = Tanggapan::where('id_pengaduan',$id_pengaduan)->count();

    	if ($tanggapan != 0) {
    		$ps = Pengaduan::findOrFail($id_pengaduan);
	    	$ps->status = 'selesai';

	    	if ($ps->save()) {
	    		$msg = 'Berhasil Diselesaikan!';
	    		return redirect('/kelola-pengaduan/proses')->with('msg',$msg);
	    	}
    	}else{
    		$msg = "Gagal! Beri Tanggapan Terlebih Dahulu.";
    		return redirect('/kelola-pengaduan/proses')->with('msg', $msg);
    	}
    }
    	
    public function selesai()
    {
    	$selesai = Pengaduan::join('masyarakat', 'masyarakat.nik', 'pengaduan.nik')->where('pengaduan.data_state',0)->where('pengaduan.status','selesai')->orderBy('pengaduan.tgl_pengaduan','ASC')->paginate(5);

    	return view('content.KelolaPengaduan.SelesaiPengaduan', compact('selesai'));
    }

    public function ditolak()
    {
        $ditolak = Pengaduan::where('data_state',2)->orderBy('tgl_pengaduan','ASC')->paginate(5);

        return view('content.KelolaPengaduan.TolakPengaduan',compact('ditolak'));
    }
}
