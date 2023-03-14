<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - Pengaduan Masyarakat</title>
        <link href="{{asset('css')}}/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body background="{{asset('assets')}}/img/background.jpg" class="bg-dark">
        <nav class="navbar py-3 navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-white" style="font-weight: bold;" href="/login"><i class=""></i> <font color="yellow" style="text-shadow: 1px 1px white;">APPARAT</font> &nbsp;&nbsp;&nbsp;<i class="fa fa-circle-arrow-left"></i> &nbsp;APLIKASI PENGADUAN MASYARAKAT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link text-white" href="{{url('/login')}}">Login</a>
                    </li>
            </div>
          </div>
        </nav>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                @if(session('msg'))
                                    <div class="alert alert-warning mt-5" id="alert" role="alert">
                                        {{session('msg')}}
                                    </div>
                                @endif
                                <div class="card shadow-lg bg-secondary border-0 rounded-lg mt-5">
                                    <div class="card-header text-white"><h3 class="text-center my-4"><font face="brush script mt" style="font-weight:bold;">- Registrasi User -</font></h3>
                                    </div>
                                    <div class="card-body bg-light">
                                        <form action="{{route('proses.register')}}" method="post">
                                            @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="nama" type="text" placeholder="Enter your first name" required/>
                                                        <label for="inputFirstName">Full Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" name="telp" type="text" placeholder="Enter your number" required/>
                                                        <label for="inputLastName">Telephone</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputNik" name="nik" type="text" placeholder="Enter your NIK"/>
                                                <label for="inputNik">NIK</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputUsername" name="username" type="username" placeholder="nameexample" required/>
                                                        <label for="inputUsername">Username</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" required/>
                                                        <label for="inputPassword">Password</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-secondary btn-block">Create Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="{{url('/login')}}" class="text-white"><font face="century gothic" style="font-weight:bold;">Login!</font></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js')}}/scripts.js"></script>
    </body>
</html>
