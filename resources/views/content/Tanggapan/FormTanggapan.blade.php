@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Tanggapan Pengaduan Masyarakat</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{route('pengaduan.proses')}}">Pengaduan Proses</a></li>
        <li class="breadcrumb-item active">Tanggapan</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif

        <div class="card">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                Data Pengaduan
                <div style="float: right;">
                    <a type=button class="btn btn-dark btn-sm" href="{{route('pengaduan.proses')}}"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered" id="example">
                    <thead>
                        <tr>
                            <th width="8%" style="text-align: center;">Tgl. Pengaduan</th>
                            <th width="10%" style="text-align: center;">NIK</th>
                            <th width="15%" style="text-align: center;">Nama Pengadu</th>
                            <th width="25%" style="text-align: center;">Isi Laporan</th>
                            <th width="8%" style="text-align: center;">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr valign="middle">
                            <td>{{date('d M Y',strtotime($tanggapan['tgl_pengaduan']))}}</td>
                            <td>{{$tanggapan['nik']}}</td>
                            <td>{{$tanggapan['nama']}}</td>
                            <td>{{$tanggapan['isi_laporan']}}</td>
                            <td style="text-align:center;"><img width="100px" height="70px" border="1" src="{{ asset('assets/img/'.$tanggapan->foto)}}"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    <div class="row">
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Form Tanggapan
                </div>
                <form method="post" action="{{route('proses.tanggapan')}}">
                    @csrf
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label style="font-weight: bold">Tanggal Tanggapan :</label>
                                    <input type="hidden" name="id_pengaduan" value="{{$tanggapan['id_pengaduan']}}"/>
                                    <input type="date" class="form-control mt-1" name="tgl_tanggapan" value="{{date('Y-m-d')}}" required/>
                                </div>
                            </div>
                            <div class="col-md-12 mt-1">
                                <div class="form-group">
                                    <label style="font-weight: bold">Isi Tanggapan :</label>
                                    <textarea rows="1" class="form-control mt-1" name="tanggapan" required></textarea>
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
                </form>
            </div>
        </div>

        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Tanggapan
                </div>
                <div class="card-body mt-1">
                    <table class="table table-striped table-bordered" id="example">
                        <thead>
                            <tr>                        
                                <th width="8%" style="text-align: center;">Tanggal</th>
                                <th width="8%" style="text-align: center;">Nama</th>
                                <th width="20%" style="text-align: center;">Isi Tanggapan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tgpn as $p)
                            <tr>
                                <td>{{date('d M Y',strtotime($p['tgl_tanggapan']))}}</td>
                                <td>{{$p['name']}}</td>
                                <td>{{$p['tanggapan']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="float: right;">
                        {{$tgpn->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    

@stop