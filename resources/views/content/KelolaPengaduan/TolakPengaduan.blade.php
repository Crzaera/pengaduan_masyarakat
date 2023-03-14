@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Pengaduan Result</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Pengaduan Ditolak</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Pengaduan Ditolak
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th width="8%" style="text-align: center;">Tgl. Pengaduan</th>
                        <th width="10%" style="text-align: center;">NIK</th>
                        <th width="20%" style="text-align: center;">Isi Laporan</th>
                        <th width="8%" style="text-align: center;">Foto</th>
                        <th width="8%" style="text-align: center;">#</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ditolak as $p)
                    <tr valign="middle">
                        <td>{{date('d F Y',strtotime($p['tgl_pengaduan']))}}</td>
                        <td>{{$p['nik']}}</td>
                        <td>{{$p['isi_laporan']}}</td>
                        <td style="text-align: center;"><img width="100px" border="1" height="70px" src="{{ asset('assets/img/'.$p->foto)}}"></td>
                        <td style="text-align: center;"> 
                            Ditolak
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                {{$ditolak->links()}}
            </div>
        </div>
    </div>
</div>

@stop