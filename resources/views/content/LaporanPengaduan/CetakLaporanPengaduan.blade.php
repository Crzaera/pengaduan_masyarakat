<!DOCTYPE html>
<html>
<head>
	<style>
	    p, span, table { font-size: 12px;}
	    table { width: 100%; border: 1px solid #dee2e6; }
	    table#tb-item tr th, table#tb-item tr td {
	    	font-weight: lighter;
	        border:1px solid #000
	    }
	</style>
	<title> Laporan Pengaduan</title>
</head>
<body onload="window.print();">
	<table width="100%">
	<tr>
		<th style="text-align: left;"><label style="text-align:left;">R E P O R T</label><h3 style="text-align: center;"> LAPORAN PENGADUAN MASYARAKAT</h3></th>
	</tr>
	<tr>
		<th><h3 style="text-align: center;">- DESA JATEN -</h3></th>
	</tr>
	<br/>
	<tr>
		<th width="100%"><h6 style="text-align: right;font-weight: bold;">- PENGADUAN MASYARAKAT -</h6></th>
	</tr>
</table>
<br>
<br>
@if($tgl_awal == '' && $tgl_akhir == '')
	<p>Berikut Paparan Keseluruhan Laporan Pengaduan Masyarakat Desa Kaling yang Telah Kami Tampung : </p>
@else
	<p>Berikut Paparan Laporan Pengaduan Masyarakat Desa Kaling dari Tanggal {{date('d F Y', strtotime($tgl_awal))}} s.d. {{date('d F Y', strtotime($tgl_akhir))}} : </p>
@endif
<table id="tb-item" cellpadding="4" width="100%" border="1">
	<thead>
		<tr style="background-color: black;">
			<th height="30" width="8%" style="text-align: center; font-weight: bold;"><font color="white">#</font></th>
			<th height="30" width="15%" style="text-align: center; font-weight: bold;"><font color="white">Tgl. Pengaduan</font></th>
			<th height="30" width="20%" style="text-align: center; font-weight: bold;"><font color="white">NIK</font></th>
			<th height="30" width="32%" style="text-align: center; font-weight: bold;"><font color="white">Isi Laporan</font></th>
			<th height="30" width="15%" style="text-align: center; font-weight: bold;"><font color="white">Foto</font></th>
			<th height="30" width="10%" style="text-align: center; font-weight: bold;"><font color="white">Status</font></th>
		</tr>
	</thead>
	<tbody>
		@foreach($result as $r)
		<tr>
			<td width="8%" style="text-align: center;">{{$loop->iteration}}</td>
			<td width="15%">{{date('d F Y', strtotime($r['tgl_pengaduan']))}}</td>
			<td width="20%">{{$r['nik']}}</td>
			<td width="32%">{{$r['isi_laporan']}}</td>
			<td width="15%" style="text-align: center;"><img width="100px" border="1" height="70px" src="{{ asset('assets/img/'.$r->foto)}}"></td>
			<td width="10%" style="text-align: center;">
				@if($r['status'] == null)
                    Belum Valid
                @elseif($r['status'] == 0)
                    Valid
                @elseif($r['status'] == 'proses')
                    Proses
                @else
                    Selesai
                @endif
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
<p>Keterangan : </p>

</body>
</html>