@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Kelola Pengaduan</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengaduan Valid</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Pengaduan Valid
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th width="12%" style="text-align: center;">Tgl. Pengaduan</th>
                        <th width="10%" style="text-align: center;">NIK</th>
                        <th width="20%" style="text-align: center;">Isi Laporan</th>
                        <th width="8%" style="text-align: center;">Foto</th>
                        <th width="7%" style="text-align: center;">Status</th>
                        <th width="10%" style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($valid as $v)
                    <tr valign="middle">
                        <td>{{date('d F Y',strtotime($v['tgl_pengaduan']))}}</td>
                        <td>{{$v['nik']}}</td>
                        <td>{{$v['isi_laporan']}}</td>
                        <td style="text-align: center;"><img width="100px" border="1" height="70px" src="{{ asset('assets/img/'.$v->foto)}}"></td>
                        <td style="text-align: center;">
                            @if($v['status'] == '0')
                                Valid
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <a class="btn btn-primary btn-sm" href="{{url('/kelola-pengaduan/proses-verifikasi/'.$v['id_pengaduan'])}}"><i class="fa fa-check-double"></i> Verifikasi</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                {{$valid->links()}}
            </div>
        </div>
    </div>
</div>

@stop