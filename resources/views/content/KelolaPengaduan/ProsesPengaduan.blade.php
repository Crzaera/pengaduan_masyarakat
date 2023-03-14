@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Kelola Pengaduan</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengaduan Proses</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Pengaduan Proses
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th width="11%" style="text-align: center;">Tgl. Pengaduan</th>
                        <th width="10%" style="text-align: center;">NIK</th>
                        <th width="20%" style="text-align: center;">Isi Laporan</th>
                        <th width="8%" style="text-align: center;">Foto</th>
                        <th width="7%" style="text-align: center;">Status</th>
                        <th width="15%" style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proses as $p)
                    <tr valign="middle">
                        <td>{{date('d F Y',strtotime($p['tgl_pengaduan']))}}</td>
                        <td>{{$p['nik']}}</td>
                        <td>{{$p['isi_laporan']}}</td>
                        <td style="text-align:center;"><img width="100px" border="1" height="70px" src="{{ asset('assets/img/'.$p->foto)}}"></td>
                        <td style="text-align: center;">
                            @if($p['status'] == 'proses')
                                Proses
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <a class="btn btn-info btn-sm" href="{{url('/kelola-pengaduan/proses-selesai/'.$p['id_pengaduan'])}}"><i class="fa fa-flag"></i> Finish</a>
                            <a class="btn btn-warning btn-sm" href="{{url('/tanggapan/'.$p['id_pengaduan'])}}"><i class="fa fa-pen"></i> Tanggapan</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                    {{$proses->links()}}
                </div>
        </div>
    </div>
</div>

@stop