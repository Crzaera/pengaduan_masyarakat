@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Kelola Pengaduan</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengaduan Not Valid</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Pengaduan Belum Valid
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th width="8%" style="text-align: center;">No.</th>
                        <th width="12%" style="text-align: center;">Tgl. Pengaduan</th>
                        <th width="15%" style="text-align: center;">NIK</th>
                        <th width="15%" style="text-align: center;">Nama Pengadu</th>
                        <th width="8%" style="text-align: center;">Status</th>
                        <th width="10%" style="text-align: center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notvalid as $nv)
                    <tr valign="middle">
                        <td style="text-align: center;">{{$loop->iteration}}</td>
                        <td>{{date('d F Y',strtotime($nv['tgl_pengaduan']))}}</td>
                        <td>{{$nv['nik']}}</td>
                        <td>{{$nv['nama']}}</td>
                        <td style="text-align: center;">
                            @if($nv['status'] == null)
                                Belum Valid
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <a class="text-primary" title="Detail Pengaduan" href="{{url('/detail-pengaduan/'.$nv['id_pengaduan'])}}"><i class="fa-sharp fa-solid fa-info"></i> </a>
                            {{-- <a class="btn btn-primary btn-sm" href="{{url('/kelola-pengaduan/proses-validasi/'.$nv['id_pengaduan'])}}"><i class="fa fa-check-circle"></i>&nbsp; Validasi</a>
                            <a class="btn btn-danger btn-sm" href="{{url('/kelola-pengaduan/tolak/'.$nv['id_pengaduan'])}}"><i class="fa fa-times-circle"></i> Tolak</a> --}}

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                {{$notvalid->links()}}
            </div>
        </div>
    </div>
</div>
@stop