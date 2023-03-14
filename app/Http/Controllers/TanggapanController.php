<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tanggapan;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;

class TanggapanController extends Controller
{
    public function index($id_pengaduan)
    {
    	$tgpn = Tanggapan::join('users','users.id','=','tanggapan.id_petugas')->where('tanggapan.id_pengaduan',$id_pengaduan)->paginate(2);
    	$tanggapan = Pengaduan::join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->where('pengaduan.data_state',0)->where('pengaduan.status','proses')->where('pengaduan.id_pengaduan', $id_pengaduan)->first();

    	return view('content.Tanggapan.FormTanggapan', compact('tgpn','tanggapan'));
    }

    public function prosesTanggapan(Request $request)
    {
    	Tanggapan::create([
			'id_pengaduan'  => $request->id_pengaduan,
			'tgl_tanggapan' => $request->tgl_tanggapan,
			'tanggapan'     => $request->tanggapan,
            'id_petugas'    => Auth::id(),
    	]);

    	$msg = "Tanggapan telah ditambahkan!";
    	return redirect('/tanggapan'.'/'.$request->id_pengaduan)->with('msg', $msg);
    }

    public function lihatTanggapan($id_pengaduan)
    {
        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->count();

        if ($tanggapan != 0) {
            $data = Pengaduan::join('tanggapan','tanggapan.id_pengaduan','pengaduan.id_pengaduan')
                                ->join('masyarakat', 'masyarakat.nik', 'pengaduan.nik')
                                ->where('tanggapan.id_pengaduan', $id_pengaduan)
                                ->first(); 
            $datatanggapan = Tanggapan::join('users', 'users.id','tanggapan.id_petugas')->where('tanggapan.id_pengaduan', $id_pengaduan)->paginate(5);
            return view('content.Tanggapan.LihatTanggapan', compact('data', 'datatanggapan'));
        }else{
            $msg = "Tanggapan terhadap pengaduan tersebut belum diberikan!";
            return redirect()->back()->with('message', $msg);
        }
    }
}
