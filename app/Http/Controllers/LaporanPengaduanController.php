<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Elibyy\TCPDF\Facades\TCPDF;

class LaporanPengaduanController extends Controller
{
    public function index()
    {
    	$tgl_awal = session()->get('session1');
    	$tgl_akhir = session()->get('session2');

    	$laporan = Pengaduan::join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->orderBy('pengaduan.tgl_pengaduan','ASC')->where('pengaduan.data_state',0)->paginate(5);

    	return view('content.LaporanPengaduan.LaporanPengaduan', compact('laporan','tgl_awal','tgl_akhir'));
    }

    public function filter(Request $request)
    {
    	$tgl_awal = $request->tgl_awal;
    	$tgl_akhir = $request->tgl_akhir;

    	session()->put('session1',$tgl_awal);
    	session()->put('session2',$tgl_akhir);

    	$awal = date('Y-m-d', strtotime($tgl_awal));
    	$akhir = date('Y-m-d', strtotime($tgl_akhir));

    	$laporan = Pengaduan::join('masyarakat', 'masyarakat.nik', '=', 'pengaduan.nik')->where('pengaduan.tgl_pengaduan','>=',$awal)->where('pengaduan.tgl_pengaduan','<=',$akhir)->where('pengaduan.data_state',0)->paginate(5);

    	return view('content.LaporanPengaduan.LaporanPengaduan', compact('laporan','tgl_awal','tgl_akhir'));
    }

    public function resetFilter()
    {
    	session()->forget('session1');
    	session()->forget('session2');

    	return redirect('/laporan-pengaduan');
    }

    public function cetakPdf()
    {
    	$data = Pengaduan::join('masyarakat','masyarakat.nik','pengaduan.nik')->where('pengaduan.data_state',0);

    	$tgl_awal = session()->get('session1');
    	$tgl_akhir = session()->get('session2');

    	$awal = date('Y-m-d', strtotime($tgl_awal));
    	$akhir = date('Y-m-d', strtotime($tgl_akhir));

    	if ($tgl_awal == '' && $tgl_akhir == '') {
    		$data;
    	}else{
    		$data->where('pengaduan.tgl_pengaduan','>=',$awal)->where('pengaduan.tgl_pengaduan','<=',$akhir);
    	}

    	$result = $data->get();

    	return view('content.LaporanPengaduan.CetakLaporanPengaduan', compact('result','tgl_awal','tgl_akhir'));

    }
}
