@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Lihat Tanggapan</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Lihat Tanggapan</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-5">
            <div class="card mb-4">
                <div class="card-header" style="font-weight: bold;">
                    <i class="fas fa-book"></i>
                        Detail Pengaduan
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-weight: bold">Tanggal Pengaduan :</label>
                                <input type="text" class="form-control mt-1" value="{{$data['tgl_pengaduan']}}" placeholder="Masukkan Nama" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Isi Laporan :</label>
                                <textarea class="form-control mt-1" rows="3" readonly>{{$data['isi_laporan']}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header" style="font-weight: bold;">
                    <i class="fas fa-users me-1"></i>
                        Detail Pengadu
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label style="font-weight: bold">NIK :</label>
                                <input type="text" class="form-control mt-1" value="{{$data['nik']}}" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label style="font-weight: bold;">Nama Pengadu :</label>
                                <input class="form-control mt-1" value="{{$data['nama']}}" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label style="font-weight: bold">Telephone :</label>
                                <input type="text" class="form-control mt-1" value="{{$data['telp']}}" readonly/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mb-4">
                <div class="card-header" style="font-weight: bold; text-align: center;">
                    <i class="fa fa-image"></i>
                        Foto Penunjang
                </div>
                <div class="card-body">
                    <div class="row form-group">
                        <div class="form-group mt-3 mb-3">
                            <center>
                                <img class="rounded-circle author-box-picture" border="1" alt="image" width="180px" height="180px" src="{{asset('assets/img/'.$data['foto'])}}"/>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card mb-4">
            <div class="card-header" style="font-weight: bold;">
                <i class="fas fa-book"></i>
                    Detail Tanggapan
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="8%" style="text-align:center; font-weight: bold;">No.</th>
                            <th width="12%" style="text-align: center; font-weight: bold;">Tgl. Tanggapan</th>
                            <th width="20%" style="text-align: center; font-weight: bold;">Nama Penanggap</th>
                            <th width="25%" style="text-align: center; font-weight: bold;">Isi Tanggapan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datatanggapan as $dt)
                        <tr>
                            <td style="text-align: center;">{{$loop->iteration}}</td>
                            <td style="text-align: center;">{{ date('d F Y', strtotime($dt->tgl_tanggapan)) }}</td>
                            <td style="text-align: center;">{{$dt->name}}</td>
                            <td>{{$dt->tanggapan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float: right;">
                    {{$datatanggapan->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@stop