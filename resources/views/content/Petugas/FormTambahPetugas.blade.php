@extends('page.templates')

@section('content')
<div class="container-fluid px-4">
    <font face="brush script mt"><h1 class="mt-4" style="font-weight: bold;">Tambah Data Petugas</h1></font>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{url('/dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{url('/petugas')}}">Data Petugas</a></li>
        <li class="breadcrumb-item active">Tambah Petugas</li>
    </ol>

    @if(session('msg'))
        <div class="alert alert-primary" id="alert" role="alert">
            {{session('msg')}}
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
                Form Tambah Petugas
                <div style="float:right;">
                    <a class="btn btn-dark btn-sm" href="{{url('/petugas')}}"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div>
        </div>
        <form method="post" action="{{route('proses.tambah.petugas')}}">
            @csrf
            <div class="card-body">
                <div class="row form-group">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold">Nama Petugas :</label>
                            <input type="text" class="form-control mt-1" name="nama_petugas" value="" placeholder="Masukkan Nama" required/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label style="font-weight: bold">Username :</label>
                            <input type="text" class="form-control mt-1" name="username" placeholder="Masukkan Username" required/>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label style="font-weight: bold;">Password :</label>
                            <input type="password" class="form-control mt-1" name="password" placeholder="Masukkan Password" required/>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label style="font-weight: bold;">Telephone :</label>
                            <input type="text" class="form-control mt-1" name="telp" placeholder="Masukkan No. Telephone" required/>
                        </div>
                    </div>
                    <div class="col-md-6 mt-3 mb-3">
                        <div class="form-group">
                            <label style="font-weight: bold">Level :</label>
                            <select class="form-select mt-1" name="level" required>
                                <option value="admin"> Admin </option>
                                <option value="petugas"> Petugas </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 mt-4 mb-3">
                        <div class="form-group">
                            <button type="reset" name="Reset" class="btn btn-dark btn-sm mt-4"><i class="fa fa-times"></i> Reset</button>
                            <button type="submit" class="btn btn-dark btn-sm mt-4"><i class="fa fa-paper-plane"></i> Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@stop