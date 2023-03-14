@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Pengaduan Result</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Pengaduan Selesai</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Pengaduan Selesai
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th width="12%" style="text-align: center;">Tgl. Pengaduan</th>
                        <th width="10%" style="text-align: center;">NIK</th>
                        <th width="15%" style="text-align: center;">Nama Penanggap</th>
                        <th width="8%" style="text-align: center;">Status</th>
                        <th width="8%" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($selesai as $p)
                    <tr valign="middle">
                        <td>{{date('d F Y',strtotime($p['tgl_pengaduan']))}}</td>
                        <td>{{$p['nik']}}</td>
                        <td>{{$p['nama']}}</td>
                        <td style="text-align: center;"> 
                            @if($p['status'] == 'selesai')
                                Selesai
                            @endif
                        </td>
                        <td style="text-align: center;">
                            <a class="text-primary" title="Detail" href="{{url('/lihat-tanggapan/'.$p->id_pengaduan)}}"><i class="fa-sharp fa-solid fa-info"></i> </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                {{$selesai->links()}}
            </div>
        </div>
    </div>
</div>

@stop