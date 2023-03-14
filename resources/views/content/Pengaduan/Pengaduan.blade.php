@php
    if($nik == null){
        $nik['nik'] = '';
    }
@endphp
@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Pengaduan Masyarakat</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Pengaduan</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Form Pengaduan
        </div>
        <form method="post" action="{{route('tambah.pengaduan')}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-weight: bold">Tanggal :</label>
                            <input type="date" class="form-control mt-1" name="tgl_pengaduan" value="{{date('Y-m-d')}}" required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-weight: bold">NIK :</label>
                            <input type="text" class="form-control mt-1" name="nik" placeholder="Masukkan NIK Anda" value="{{$nik['nik']}}" readonly required/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-weight: bold;">Foto Penunjang :</label>
                            <input type="file" class="form-control mt-1" name="foto" required/>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label style="font-weight: bold">Isi Laporan :</label>
                            <textarea class="form-control mt-1" name="isi_laporan" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="text-muted">
                    <div style="float: right;" class="mt-3">
                        <button type="reset" name="Reset" class="btn btn-dark btn-sm mb-3"><i class="fa fa-times"></i> Reset</button>
                        <button type="submit" class="btn btn-dark btn-sm mb-3"><i class="fa fa-paper-plane"></i> Kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            @if(Auth::user()->level == 'masyarakat')
                Data Pengaduan Anda
            @else
                Data Pengaduan Keseluruhan
            @endif
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th width="10%" style="text-align: center;">Tgl. Pengaduan</th>
                        <th width="10%" style="text-align: center;">NIK</th>
                        <th width="14%" style="text-align: center;">Nama Pengadu</th>
                        <th width="20%" style="text-align: center;">Isi Laporan</th>
                        <th width="8%" style="text-align: center;">Foto</th>
                        <th width="8%" style="text-align: center;">Status</th>
                    </tr>
                </thead>
                @if(Auth::user()->level == 'masyarakat')
                    <tbody>
                        @foreach($pengaduan as $p)
                        <tr valign="middle">
                            <td>{{date('d M Y',strtotime($p['tgl_pengaduan']))}}</td>
                            <td>{{$p['nik']}}</td>
                            <td>{{$p['nama']}}</td>
                            <td>{{$p['isi_laporan']}}</td>
                            <td style="text-align:center;"><img width="100px" border="1" height="70px" src="{{ asset('assets/img/'.$p->foto)}}"></td>
                            <td style="text-align: center;"> 
                                @if($p['status'] == null)
                                    Belum Valid
                                @elseif($p['status'] == 0)
                                    Valid
                                @elseif($p['status'] == 'proses')
                                    Proses
                                @else
                                    Selesai
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                @else
                    <tbody>
                        @foreach($datapengaduan as $p)
                        <tr valign="middle">
                            <td>{{date('d M Y',strtotime($p['tgl_pengaduan']))}}</td>
                            <td>{{$p['nik']}}</td>
                            <td>{{$p['nama']}}</td>
                            <td>{{$p['isi_laporan']}}</td>
                            <td style="text-align:center;"><img width="100px" height="70px" border="1" src="{{ asset('assets/img/'.$p->foto)}}"></td>
                            <td style="text-align: center;"> 
                                @if($p['status'] == null)
                                    Belum Valid
                                @elseif($p['status'] == 0)
                                    Valid
                                @elseif($p['status'] == 'proses')
                                    Proses
                                @else
                                    Selesai
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
            <div style="float: right;">
                @if(Auth::user()->level != 'masyarakat')
                    {{$datapengaduan->links()}}
                @else
                    {{$pengaduan->links()}}
                @endif
            </div>
        </div>
    </div>
</div>

@stop