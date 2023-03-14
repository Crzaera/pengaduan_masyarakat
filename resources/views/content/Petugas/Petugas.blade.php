@extends('page.templates')

@section('content')

<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Kelola Petugas</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Petugas</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Data Petugas
            <div style="float:right;">
                <a class="btn btn-dark btn-sm" href="{{route('tambah.petugas')}}"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <tr>
                        <th width="5%" style="text-align: center;">No.</th>
                        <th width="15%" style="text-align: center;">Nama Petugas</th>
                        <th width="15%" style="text-align: center;">Username</th>
                        <th width="8%" style="text-align: center;">Level</th>
                        <th width="10%" style="text-align: center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($petugas as $p)
                    <tr>
                        <td style="text-align: center;">{{$loop->iteration}}</td>
                        <td>{{$p['name']}}</td>
                        <td>{{$p['username']}}</td>
                        <td>{{$p['level']}}</td>
                        <td style="text-align: center;"> 
                            <a class="btn btn-danger btn-sm" href="{{url('/petugas/hapus/'.$p['id'])}}"><i class="fa fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                {{$petugas->links()}}
            </div>
        </div>
    </div>
</div>

@stop