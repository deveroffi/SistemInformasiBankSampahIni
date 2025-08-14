<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords"
        content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
     <title>Bank Sampah Ini</title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700"
        rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
    <style>
        body {
          background-image: url('theme-assets/images/backgrounds/home.jpg');
          background-size: cover;

      }
  </style>
</head>

<body class="vertical-layout vertical-menu 2-columns" data-open="click" data-menu="vertical-menu"
    data-color="bg-chartbg" data-col="2-columns">
    @include('layout.side')
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-light">Page</a></li>
                    <li class="breadcrumb-item text-sm text-light active">Transaksi</li>
                </ol>
            </nav>
            <li class="dropdown dropdown-user nav-item">
                <a class="dropdown-toggle nav-link dropdown-user-link"data-toggle="dropdown">
                    <span >
                        <i class="ft-bell text-white"></i>
                    </span>
                    <span class="opacity-5 text-light"><b>Notifikasi</b></span>
                </span>

                </a>
                <div class="dropdown-menu" style="width: 450px">
                    <div>

                        <span class="user-name text-bold-700 ml-1">Notifikasi</span>
                        </span>

                        <div class="dropdown-divider"></div>
                        @foreach ($transaksis as $transaksi)
                        @if ($transaksi->lokasiPenjemputan->status == 'disetujui')
                            <a class="media border-0">
                                <div class="media-body mx-1">
                                    <span class="list-group-item-heading">
                                        <p>- Pesanan anda <b>{{$transaksi->jenis_sampah}}</b> dengan no. reff <i><u><span
                                                        style="color:blue;">{{$transaksi->no_reff}}</span></u></i>akan diambil hari ini <br>
                                        </p>
                                    </span>
                                   
                                </div>
                            </a>
                        @endif
                    @endforeach

                        <div class="dropdown-divider"></div>


                    </div>
                </div>
            </li>
            <div>
                <!-- <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Cari">
            </div>
          </div> -->
                <li class="dropdown dropdown-user nav-item">
                    <a class="dropdown-toggle nav-link dropdown-user-link"data-toggle="dropdown">
                      
                        <span>
                            <b class="opacity-5 text-light">{{ Auth::user()->name }}</b>
                            <i></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="arrow_box_right">
                            <div style="text-align: center;">
                                <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Foto Profil" width="50"
                                    class="rounded-circle">
                            </div>
                            <span class="user-name text-bold-700 ml-1">{{ Auth::user()->name }}</span>
                            </span>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="ft-user"></i> Status :
                                {{ Auth::user()->role }}</a>
                            <!-- <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                        <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a> -->
                            <!-- <a href="{{ route('listNasabah') }}"> -->
                            @if (Auth::user()->role == 'admin')
                                <a class="dropdown-item" href="#"><i class="ft-check-square"></i>Edit Profil</a>
                            @endif
                            @if (Auth::user()->role == 'user')
                                <a class="dropdown-item" href="{{ route('editProfil') }}"><i
                                        class="ft-check-square"></i>Edit Profil</a>
                            @endif
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('actionlogout') }}"><i class="ft-power"></i>
                                Logout</a>
                        </div>
                    </div>
                </li>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="col-lg-12 grid-margin">

        <div class="card-body"
            style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/4860404.jpg'); background-size: cover;">
            <h4 class="card-title">Transaksi</h4>
            <div>
                <!-- <div class="btn-group" role="group">
                                                                    <a href="{{ route('tambahNasabah') }}" class="btn btn-success">+ Tambah</a>
                                                                    </div> -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <footer class="footer footer-static footer-light navbar-border navbar-shadow">
        <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-block d-md-inline-block">bangsrop &copy; programming <a
                    class="text-bold-800 grey darken-2">2024</a></span>
        </div>
    </footer>

    <!-- BEGIN VENDOR JS-->
    <script src="theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="theme-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
</body>

</html>
