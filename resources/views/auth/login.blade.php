<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login - Pengaduan Masyarakat</title>
        <link href="{{asset('css')}}/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body background="{{asset('assets')}}/img/background.jpg" class="bg-secondary">
        <nav class="navbar py-3 navbar-expand-lg navbar-light bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand text-white" style="font-weight: bold;" href="/"><i class=""></i> <font color="yellow" style="text-shadow: 1px 1px white;">APPARAT</font> &nbsp;&nbsp;&nbsp;<i class="fa fa-circle-arrow-left"></i> &nbsp;APLIKASI PENGADUAN MASYARAKAT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                    </li>
                     <li class="nav-item ms-4">
                        <a class="nav-link text-white" href="{{url('register')}}">Registrasi</a>
                    </li>
                </ul>
            </div>
          </div>
        </nav>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                @if(session('msg'))
                                    <div class="alert alert-warning mt-5" id="alert" role="alert">
                                        {{session('msg')}}
                                    </div>
                                @endif
                                <div class="card bg-secondary shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-white text-center my-4"><font face="brush script mt" style="font-weight:bold;">- Login User -</font></h3></div>
                                    <div class="card-body bg-light">
                                        <form action="{{route('proses.login')}}" method="post">
                                            @csrf
                                            <div class="form-floating mb-3">
                                                <input class="form-control bg-outline-secondary" id="inputUsername" name="username" type="username" placeholder="Username" required/>
                                                <label for="inputUsername">Username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control bg-outline-secondary" id="inputPassword" name="password" type="password" placeholder="Password" required/>
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button class="btn btn-secondary btn-block" href=>Login Account</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer bg-secondary text-center py-3">
                                        <div class="text-white small"><a class="text-white" href="{{url('/register')}}"><font face="century gothic" style="font-weight:bold;">Register!</font></a></div>
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
