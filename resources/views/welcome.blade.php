<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APPARAT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,600;1,500;1,600&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
</head>
<body>
    <nav class="navbar py-3 navbar-expand-lg navbar-light bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" style="font-weight: bold;" href="/login"><i class=""></i> <font color="yellow" style="text-shadow: 1px 1px white;">APPARAT</font> &nbsp;&nbsp;&nbsp;<i class="fa fa-circle-arrow-right"></i> &nbsp;APLIKASI PENGADUAN MASYARAKAT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item ms-4">
                    <a class="nav-link text-white" href="{{url('/login')}}">Login</a>
                </li>
                 <li class="nav-item ms-4">
                    <a class="nav-link text-white" href="{{url('register')}}">Registrasi</a>
                </li>
            </ul>
        </div>
      </div>
    </nav>

    <header class="masthead bg-warning">
        <div class="container p-2">
            <div class="row">
                <div class="col-lg-6 p-4">
                    <h6 style="font-weight: bold;font-style: italic; text-transform: capitalize;"> Hello !</h6>
                    <div class="text-white p-2" style="font-weight: bold;font-style: italic; text-transform: capitalize; font-size: 40px; text-shadow: 4px 3px black;">I'M  HANIF</div>
                    <small style="font-weight: bold;font-style: italic; text-transform: capitalize;">-- Program --</small>
                    <div class="p-2 mt-4" style="font-size: 20px;" class="text-secondary">
                        <strong style="font-style: italic;">Student Majoring In Software Engineering</strong>
                        <div style="font-size: 12px">An soft boy who likes music, games, and of course coding ! <br/>
                        Have dream to be a programmer who has a lot of money.</div>
                    </div>
                </div>
                <div class="col-lg-6 p-3">
                    <img style="float: right;" src="{{asset('assets/img/welcome.png')}}" width="300px" height="250px" alt="image"/>
                </div>
            </div>
        </div>
        <hr style="border: 2px solid black;">
    </header>

    <div class="container mt-1">
        <div class="row">
            <h6 style="text-align: center;">Bagaimana Pengaduan Tersebut Berproses ?</h6>
            <div class="col-md-3 mt-2">
                <div class="card" style="font-size: 12px;">
                    <div class="card-header bg-dark text-white"><i class="fa fa-1"></i>&nbsp; Step</div>
                    <div class="card-body" style="text-align: justify;">
                        <div style="font-weight: bold;"><i class="fa fa-file-pen"></i> Tulis Pengaduan</div>
                        &nbsp;&nbsp;&nbsp;Masyarakat menulis pengaduan ketika ada suatu kejadian yang wajib diadukan.
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2">
                <div class="card" style="font-size: 12px;">
                    <div class="card-header bg-dark text-white"><i class="fa fa-2"></i>&nbsp; Step</div>
                    <div class="card-body" style="text-align: justify;">
                        <div style="font-weight: bold;"><i class="fa fa-people-group"></i> Kelola Pengaduan</div>
                        &nbsp;&nbsp;&nbsp;&nbsp; Admin / Petugas akan mengelola setiap pengaduan masyarakat yang telah masuk pada sistem.
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2">
                <div class="card" style="font-size: 12px;">
                    <div class="card-header bg-dark text-white"><i class="fa fa-3"></i>&nbsp; Step</div>
                    <div class="card-body" style="text-align: justify;">
                        <div style="font-weight: bold;"><i class="fa fa-paper-plane"></i> Beri Tanggapan</div>
                        &nbsp;&nbsp;Pada tahap kelola pengaduan, Admin atau Petugas sekaligus akan memberi tanggapan.
                    </div>
                </div>
            </div>
            <div class="col-md-3 mt-2">
                <div class="card" style="font-size: 12px;">
                    <div class="card-header bg-dark text-white"><i class="fa fa-4"></i>&nbsp; Step</div>
                    <div class="card-body" style="text-align: justify;">
                        <div style="font-weight: bold;"><i class="fa fa-eye"></i> Cek Tanggapan</div>
                        &nbsp;Masyarakat dapat melihat tanggapan yang telah ditulis oleh Admin maupun Petugas.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer py-2 fixed-bottom bg-dark">
        <div class="container">
            <p class="text-white" style="text-align: center; font-weight: bold; font-family: Poppins, sans-serif;">Uji Kompetensi Keahlian RPL 2023 &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp; Hanif Nur Hidayat &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp; SMK N 2 Karanganyar</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
