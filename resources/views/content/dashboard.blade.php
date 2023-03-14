@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4">Dashboard</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-danger" role="alert">
            {{session('msg')}}
        </div>
    @endif
    
        @if(Auth::user()->level == 'admin')
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div style="font-weight: bold;" class="card-body">Pengaduan Non Valid</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-white">{{$nonvalid}} Data</div>
                            <div class="small"><a class="text-white" href="{{url('/kelola-pengaduan/notvalid')}}" title="View Detail"><i class="fas fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div style="font-weight: bold;" class="card-body">Pengaduan Valid</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-white">{{$valid}} Data</div>
                            <div class="small"><a class="text-white" href="{{url('/kelola-pengaduan/valid')}}" title="View Detail"><i class="fas fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div style="font-weight: bold;" class="card-body">Pengaduan Proses</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-white">{{$proses}} Data</div>
                            <div class="small"><a class="text-white" href="{{url('/kelola-pengaduan/proses')}}" title="View Detail"><i class="fas fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div style="font-weight: bold;" class="card-body">Pengaduan Selesai</div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <div class="small text-white">{{$selesai}} Data</div>
                            <div class="small"><a class="text-white" href="{{url('/kelola-pengaduan/selesai')}}" title="View Detail"><i class="fas fa-angle-right"></i></a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                   <b>Keseluruhan Data Masyarakat</b>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="8%" style="text-align: center;">No.</th>
                                <th width="10%" style="text-align: center;">NIK</th>
                                <th width="20%" style="text-align: center;">Nama</th>
                                <th width="10%" style="text-align: center;">Telephone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($masyarakat as $m)
                            <tr>
                                <td style="text-align: center;">{{$loop->iteration}}</td>
                                <td style="text-align: center;">{{$m['nik']}}</td>
                                <td>{{$m['nama']}}</td>
                                <td>{{$m['telp']}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="float: right;">
                        {{{$masyarakat->links()}}}
                    </div>
                </div>
            </div>
        @elseif(Auth::user()->level == 'petugas')
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 p-4">
                        <h4 style="font-weight: bold;font-style: italic; text-transform: capitalize;"> Selamat Datang {{Auth::user()->name}}</h4>
                        <div class="text-secondary">
                            <strong style="font-style: italic;"> -- Aplikasi Pengaduan Masyarakat -- </strong>
                            <br/>
                            <br/>
                            <font style="font-style: italic;">Silahkan Kelola Pengaduan Masyarakat yang Telah Masuk!</font>
                        </div>
                    </div>
                    <div class="col-lg-6 p-4">
                        <img style="float: right;" src="{{asset('assets/img/dashboard.png')}}" width="150px" alt="image"/>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark text-white mb-4">
                            <div style="font-weight: bold;" class="card-body">Pengaduan Non Valid</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$nonvalid}} Data</div>
                                <div class="small"><a class="text-white" href="{{url('/kelola-pengaduan/notvalid')}}" title="View Detail"><i class="fas fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark text-white mb-4">
                            <div style="font-weight: bold;" class="card-body">Pengaduan Valid</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$valid}} Data</div>
                                <div class="small"><a class="text-white" href="{{url('/kelola-pengaduan/valid')}}" title="View Detail"><i class="fas fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark text-white mb-4">
                            <div style="font-weight: bold;" class="card-body">Pengaduan Proses</div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <div class="small text-white">{{$proses}} Data</div>
                                <div class="small"><a class="text-white" href="{{url('/kelola-pengaduan/proses')}}" title="View Detail"><i class="fas fa-angle-right"></i></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    @else
        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6 p-4">
                        <h4 style="font-weight: bold;font-style: italic; text-transform: capitalize;"> Selamat Datang {{Auth::user()->name}}</h4>
                        <div class="text-secondary">
                            <strong style="font-style: italic;"> -- Aplikasi Pengaduan Masyarakat -- </strong>
                            <br/>
                            <br/>
                            Berikan Pengaduan Anda di <strong>Aplikasi Pengaduan Masyarakat</strong>
                        </div>
                        <a href="{{url('/pengaduan')}}" class="btn btn-dark mt-1"><i class="fa fa-file-pen"></i> Tulis Pengaduan</a>
                    </div>
                    <div class="col-lg-5 p-4">
                        <img style="float: right;" src="{{asset('assets/img/dashboard.png')}}" width="200px" alt="image"/>
                    </div>
                </div>
            </div>
        </div>

        @if(session('message'))
            <div class="alert alert-danger" role="alert">
                {{session('message')}}
            </div>
        @endif
        
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <b>Keseluruhan Data Pengaduan Masyarakat</b>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="8%" style="text-align: center;">#</th>
                            <th width="10%" style="text-align: center;">Tgl. Pengaduan</th>
                            <th width="15%" style="text-align: center;">Nama</th>
                            <th width="20%" style="text-align: center;">Isi Laporan</th>
                            <th width="10%" style="text-align: center;">Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datapengaduan as $dp)
                        <tr valign="middle">
                            <td style="text-align: center;">
                                <a class="text-primary" title="Lihat Tanggapan" href="{{url('/lihat-tanggapan/'.$dp['id_pengaduan'])}}"><i class="fa-sharp fa-solid fa-info"></i></a>
                            </td>
                            <td>{{date('d M Y',strtotime($dp['tgl_pengaduan']))}}</td>
                            <td>{{$dp['nama']}}</td>
                            <td>{{$dp['isi_laporan']}}</td>
                            <td style="text-align:center;"><img width="100px" border="1" height="70px" src="{{asset('assets/img/'.$dp->foto)}}"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div style="float: right;">
                    {{$datapengaduan->links()}}
                </div>
            </div>
        </div>

    @endif

</div>

@stop