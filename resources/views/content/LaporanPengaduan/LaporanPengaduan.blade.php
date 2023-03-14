@extends('page.templates')

@section('content')

@php
    if ($tgl_awal == '' && $tgl_akhir == '') {
        $tgl_awal = '';
        $tgl_akhir = '';
    }
@endphp

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Laporan Pengaduan Masyarakat</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Laporan Pengaduan</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Filter Laporan
        </div>
        <form action="{{route('filter.laporan.pengaduan')}}" method="get">
            @csrf
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-md-1">
                        <div class="form-group"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-weight: bold;">Dari Tanggal : </label>
                            <input type="date" class="form-control" name="tgl_awal" value="{{$tgl_awal}}" />
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-weight: bold;">Sampai Tanggal :</label>
                            <input type="date" class="form-control" name="tgl_akhir" value="{{$tgl_akhir}}" />
                        </div>
                    </div>
                    <div class="col-md-2 mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-dark"><i class="fa fa-search"></i> Find</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            List Data Pengaduan
            <div style="float: right;">
                <a class="btn btn-light btn-sm" href="{{route('cetak.laporan.pengaduan')}}"><i class="fa fa-download"></i> PDF</a>
                <a class="btn btn-light btn-sm" href="{{route('reset.filter')}}"><i class="fa fa-refresh"></i> Refresh</a>
            </div>
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
                <tbody>
                    @foreach($laporan as $p)
                    <tr valign="middle">
                        <td>{{date('d M Y',strtotime($p['tgl_pengaduan']))}}</td>
                        <td>{{$p['nik']}}</td>
                        <td>{{$p['nama']}}</td>
                        <td>{{$p['isi_laporan']}}</td>
                        <td style="text-align: center;"><img border="1" width="100px" height="70px" src="{{ asset('assets/img/'.$p->foto)}}"></td>
                        <td style="text-align: center;"> 
                            @if($p['status'] == null)
                                Belum Valid
                            @elseif($p['status'] == '0')
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
            </table>
            <div style="float: right;">
                {{$laporan->links()}}
            </div>
        </div>
    </div>
</div>

@stop