<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>SI - Pengaduan Masyarakat</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('css')}}/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            window.onload = function() { jam(); }
           
            function jam() {
                var e = document.getElementById('jam'),
                d = new Date(), h, m, s;
                h = d.getHours();
                m = set(d.getMinutes());
                s = set(d.getSeconds());
           
                e.innerHTML = h +' : '+ m +' : '+ s;
           
                setTimeout('jam()', 1000);
            }
           
            function set(e) {
                e = e < 10 ? '0'+ e : e;
                return e;
            }
        </script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{'/dashboard'}}" style="text-shadow: 4px 4px grey;"><i class="fa-brands fa-laravel" ></i><font color="white" face="Impact"> &nbsp;&nbsp;L&nbsp; A&nbsp; R&nbsp; A&nbsp; V&nbsp; E&nbsp; L</font></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <font color="white" face="century gothic">
                <h5 style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;{{ date('l, d F Y') }}</h5>
            </font>
            <!-- Navbar Text Berjalan-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="text-white">
                    <h5 style="font-weight: bold;text-shadow: 4px 4px grey;"><marquee>SI - LAPORAN PENGADUAN MASYARAKAT</marquee></h5>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-capitalize" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i> {{Auth::user()->name}}</a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-arrow-right-from-bracket"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        @if(Auth::user()->level == 'admin')

            <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="{{url('/dashboard')}}">
                                    <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                                    Dashboard
                                </a>
                                <div class="sb-sidenav-menu-heading">Interface</div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                    <div class="sb-nav-link-icon"><i class="fa fa-database"></i></div>&nbsp;
                                    Master Data
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{route('petugas')}}"><i class="fa fa-person-military-pointing"></i>&nbsp;Data Petugas</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fas fa-people-group"></i></div>
                                    Kelola Pengaduan
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{route('pengaduan.notvalid')}}"><i class="fa fa-file-circle-xmark"></i>&nbsp;Aduan Not Valid</a>
                                        <a class="nav-link" href="{{route('pengaduan.valid')}}"><i class="fa fa-file-circle-check"></i>&nbsp;Aduan Valid</a>
                                        <a class="nav-link" href="{{route('pengaduan.proses')}}"><i class="fa fa-file-circle-exclamation"></i>&nbsp;Aduan Proses</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTemplate" aria-expanded="false" aria-controls="collapsePages">
                                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                    Pengaduan Result
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="collapseTemplate" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{route('pengaduan.ditolak')}}"><i class="fa fa-list"></i>&nbsp;Pengaduan Ditolak</a>
                                        <a class="nav-link" href="{{route('pengaduan.selesai')}}"><i class="fa fa-list-check"></i>&nbsp;Pengaduan Selesai</a>
                                    </nav>
                                </div>
                                <div class="sb-sidenav-menu-heading">Addons</div>
                                <a class="nav-link" href="{{route('laporan.pengaduan')}}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                    Generate Laporan
                                </a>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small"><i class="fa fa-cog"></i>&nbsp;Logged in as:</div>
                            <div class="text-capitalize">&nbsp;&nbsp;&nbsp; {{Auth::user()->level}} </div>
                        </div>
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <!--Content-->
                        @yield('content')
                        <!--End Content-->
                    </main>

                    
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Hanif Nur Hidayat </div>
                                <div style="font-weight: bold;">
                                    <i class="fa fa-clock"></i>&nbsp;<font face="algeria" style="font-weight: bold;" id="jam"></font>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

        @elseif(Auth::user()->level == 'petugas')

            <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url('/dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-people-group"></i></div>
                                Kelola Pengaduan
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="{{route('pengaduan.notvalid')}}"><i class="fa fa-file-circle-xmark"></i>&nbsp;Aduan Not Valid</a>
                                        <a class="nav-link" href="{{route('pengaduan.valid')}}"><i class="fa fa-file-circle-check"></i>&nbsp;Aduan Valid</a>
                                        <a class="nav-link" href="{{route('pengaduan.proses')}}"><i class="fa fa-file-circle-exclamation"></i>&nbsp;Aduan Proses</a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small"><i class="fa fa-cog"></i>&nbsp;Logged in as:</div>
                        <div class="text-capitalize">&nbsp;&nbsp;&nbsp; {{Auth::user()->level}} </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <!--Content-->
                    @yield('content')
                    <!--End Content-->
                </main>
                <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Hanif Nur Hidayat </div>
                                <div style="text-align: center;font-weight: bold;" class="col-md-6">
                                    <marquee>PENGADUAN YANG HILANG BERARTI PENGADUAN TERSEBUT DITOLAK!!</marquee>
                                </div>
                                <div style="font-weight: bold;">
                                    <i class="fa fa-clock"></i>&nbsp;<font face="algeria" style="font-weight: bold;" id="jam"></font>
                                </div>
                            </div>
                        </div>
                </footer>
            </div>
        </div>

        @else

        <div id="layoutSidenav">
                <div id="layoutSidenav_nav">
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Core</div>
                                <a class="nav-link" href="{{url('/dashboard')}}">
                                    <div class="sb-nav-link-icon"><i class="fa fa-home"></i></div>
                                    Dashboard
                                </a>
                                <div class="sb-sidenav-menu-heading">Interface</div>
                                <a class="nav-link" href="{{route('pengaduan')}}">
                                    <i class="fa fa-file-pen"></i>&nbsp;Tulis Pengaduan
                                </a>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small"><i class="fa fa-cog"></i>&nbsp;Logged in as:</div>
                            <div class="text-capitalize">&nbsp;&nbsp;&nbsp; {{Auth::user()->level}} </div>
                        </div>
                    </nav>
                </div>
                <div id="layoutSidenav_content">
                    <main>
                        <!--Content-->
                        @yield('content')
                        <!--End Content-->
                    </main>
                    <footer class="py-4 bg-light mt-auto">
                        <div class="container-fluid px-4">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; Hanif Nur Hidayat </div>
                                <div style="text-align: center;font-weight: bold;" class="col-md-6"><marquee>PENGADUAN YANG HILANG BERARTI PENGADUAN TERSEBUT DITOLAK!!</marquee></div>
                                <div style="font-weight: bold;">
                                    <i class="fa fa-clock"></i>&nbsp;<font face="algeria" style="font-weight: bold;" id="jam"></font>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>

        @endif

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js')}}/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="{{asset('assets')}}/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('js')}}/datatables-simple-demo.js"></script>
    </body>
</html>
