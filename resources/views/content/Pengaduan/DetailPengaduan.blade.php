@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Detail Pengaduan</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('/kelola-pengaduan/notvalid')}}">Pengaduan Not Valid</a></li>
        <li class="breadcrumb-item active">Detail Pengaduan</li>
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
                                <input type="text" class="form-control mt-1" value="{{date('l, d F Y', strtotime($detail['tgl_pengaduan']))}}" placeholder="Masukkan Nama" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mt-3">
                            <div class="form-group">
                                <label style="font-weight: bold;">Isi Laporan :</label>
                                <textarea class="form-control mt-1" rows="3" readonly>{{$detail['isi_laporan']}}</textarea>
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
                                <input type="text" class="form-control mt-1" value="{{$detail['nik']}}" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label style="font-weight: bold;">Nama Pengadu :</label>
                                <input class="form-control mt-1" value="{{$detail['nama']}}" readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mt-2">
                            <div class="form-group">
                                <label style="font-weight: bold">Telephone :</label>
                                <input type="text" class="form-control mt-1" value="{{$detail['telp']}}" readonly/>
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
                                <img class="rounded-circle author-box-picture" border="1" alt="image" width="180px" height="180px" src="{{asset('assets/img/'.$detail['foto'])}}"/>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div style="float:right">
                        <a class="btn btn-success text-white" style="font-weight: bold;" href="{{url('/kelola-pengaduan/proses-validasi/'.$detail['id_pengaduan'])}}"><i class="fa fa-check-circle"></i>&nbsp; Validasi Pengaduan</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div style="float: left;">
                        <a class="btn btn-danger" style="font-weight: bold;" href="{{url('/kelola-pengaduan/tolak/'.$detail['id_pengaduan'])}}"><i class="fa fa-times-circle"></i> Tolak Pengaduan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop