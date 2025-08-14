<!DOCTYPE html>

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
        .text-white {
            color: white;
        }

        .lingkaran {
            width: 400px;
            height: 400px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 50%;
            /* Membuat bentuk persegi menjadi lingkaran */
            display: flex;
            justify-content: center;
            align-items: center;
            color: rgb(0, 0, 0);
            font-weight: bold;
            font-size: 1.5em;
            /* Ubah ukuran font */
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        body {
            background-image: url('theme-assets/images/backgrounds/home.jpg');
            background-size: cover;

        }
    </style>

</head>
<html class="loading" lang="en" data-textdirection="ltr">


<body class="vertical-layout vertical-menu 2-columns" data-open="click" data-menu="vertical-menu"
    data-color="bg-chartbg" data-col="2-columns">
    @include('layout.side')
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
        navbar-scroll="true">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-light">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-light active">Dashboard</li>
                </ol>
            </nav>


            <!-- Tombol untuk membuka dropdown -->

            <div>

                @if (Auth::user()->role == 'user')

                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link"data-toggle="dropdown">
                            <span>
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
                                                    <p>- Pesanan anda <b>{{ $transaksi->jenis_sampah }}</b> dengan no.
                                                        reff <i><u><span
                                                                    style="color:blue;">{{ $transaksi->no_reff }}</span></u></i>akan
                                                        diambil hari ini <br>
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

                @endif
            </div>
            <li class="dropdown dropdown-user nav-item">

                <a class="dropdown-toggle nav-link dropdown-user-link"data-toggle="dropdown">
                    <span>
                        <b class="opacity-5 text-light">{{ Auth::user()->name }}</b>
                        <i></i>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" ">

                    <div class="arrow_box_right">
                       
                            <div style="text-align: center;">
                                <img src="{{ asset('storage/' . $user->foto_profil) }}" alt="Foto Profil" width="50"
                                    class="rounded-circle">
                            </div>
                        
                        <a class="user-name text-bold-700 ml-1" class="text-center my-2">{{ Auth::user()->name }}</a>
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#"><i class="ft-user"></i> Status :
                            {{ Auth::user()->role }}</a>
                        <!-- <a class="dropdown-item" href="#"><i class="ft-mail"></i> My Inbox</a>
                        <a class="dropdown-item" href="#"><i class="ft-check-square"></i> Task</a> -->
                        <!-- <a href="{{ route('listNasabah') }}"> -->
                          @if (Auth::user()->role == 'admin')
                    <a class="dropdown-item" href="{{ route('editProfil') }}"><i class="ft-check-square"></i>Edit
                        Profil</a>
                    @endif
                    @if (Auth::user()->role == 'user')
                        <a class="dropdown-item" href="{{ route('editProfil') }}"><i class="ft-check-square"></i>Edit
                            Profil</a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('actionlogout') }}"><i class="ft-power"></i>
                        Logout</a>
                    <a href="#" id="notification-icon">
                        <i class="fas fa-bell"></i>
                    </a>
                </div>
        </div>

        </li>

        </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div><!-- Chart -->
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="card mx-sm-2"
                    style="border-radius: 15px; background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                    <div class="card-body">
                        <div class="card-content ecom-card2 height-180">
                            <h5 class="text-muted dark position-absolute p-1">
                                <b>Selamat Datang, {{ Auth::user()->name }}<br>
                                    <b>Anda login sebagai
                                        @if (Auth::user()->role == 'user')
                                            Nasabah
                                        @else
                                            Admin
                                        @endif
                                        <br><br><br><br><br><br>
                                    </b>


                                    <small class="text-muted">
                                        <i>{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</i>
                                    </small>
                            </h5>
                        </div>
                        <div>
                            <i class="ft-user dark font-large-1 float-right p-1"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @if (Auth::user()->role == 'admin')
        <div class="row ">

            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card pull-up ecom-card-1 bg-white"
                    style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                    <div class="card-content ecom-card2 height-100">
                        <h5 class="text-muted dark position-absolute p-1">Kertas</h5>
                        <div>
                            <i class="ft-pie-chart dark font-large-1 float-right p-1"></i>
                        </div>
                        <div class="card-body float p-4">
                            <h5 class="text-muted dark position-absolute text-center w-100"
                                style="left: 0; right: 0;">Total : {{ $totalSampahKertas }}</h5>
                            <!-- Tampilkan jenis sampah lainnya -->
                        </div>
                        <!-- <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                    <div id="progress-stats-bar-chart"></div>
                    <div id="progress-stats-line-chart" class="progress-stats-shadow"></div>
                </div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card pull-up ecom-card-1 bg-white"
                    style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                    <div class="card-content ecom-card2 height-100">
                        <h5 class="text-muted dark position-absolute p-1">Plastik</h5>
                        <div>
                            <i class="ft-pie-chart dark font-large-1 float-right p-1"></i>
                        </div>
                        <div class="card-body float p-4">
                            <h5 class="text-muted dark position-absolute text-center w-100"
                                style="left: 0; right: 0;">Total : {{ $totalSampahPlastik }}</h5>
                            <!-- Tampilkan jenis sampah lainnya -->
                        </div>
                        <!-- <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                    <div id="progress-stats-bar-chart"></div>
                    <div id="progress-stats-line-chart" class="progress-stats-shadow"></div>
                </div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card pull-up ecom-card-1 bg-white">
                    <div class="card-content ecom-card2 height-100"
                        style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                        <h5 class="text-muted dark position-absolute p-1">Lainnya</h5>
                        <div>
                            <i class="ft-pie-chart dark font-large-1 float-right p-1"></i>
                        </div>
                        <div class="card-body float p-4">
                            <h5 class="text-muted dark position-absolute text-center w-100"
                                style="left: 0; right: 0;">Total : {{ $totalSampahLainnya }}</h5>
                            <!-- Tampilkan jenis sampah lainnya -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <a href="{{ route('transaksiMasukNasabah') }}" style="text-decoration: none; color: inherit;">
                    <div class="card pull-up ecom-card-1 bg-white"
                        style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                        <div class="card-content ecom-card2 height-180">
                            <h5 class="text-muted dark position-absolute p-1">Transaksi Masuk</h5>
                            <div>
                                <i class="fas fa-download dark font-large-1 float-right p-1"></i>
                            </div>
                            <div>
                                <h5 class="text-muted dark position-absolute text-center w-100"
                                    style="left: 0; right: 0; margin-top: 75px;">Total : {{ $totalSampah }}</h5>

                                <!-- Tampilkan jenis sampah lainnya -->
                            </div>
                            <!-- <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                    <div id="progress-stats-bar-chart"></div>
                    <div id="progress-stats-line-chart" class="progress-stats-shadow"></div>
                </div> -->
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <a href="{{ route('riwayatTransaksiNasabah') }}" style="text-decoration: none; color: inherit;">
                    <div class="card pull-up ecom-card-1 bg-white"
                        style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                        <div class="card-content ecom-card2 height-180">
                            <h5 class="text-muted dark position-absolute p-1">Riwayat Nasabah</h5>
                            <div>
                                <i class="ft-activity dark font-large-1 float-right p-1"></i>
                            </div>
                            <!-- <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                    <div id="progress-stats-bar-chart1"></div>
                    <div id="progress-stats-line-chart1" class="progress-stats-shadow"></div>
                </div> -->
                        </div>
                    </div>
            </div>
            <!-- <div class="col-xl-4 col-lg-12">
        <div class="card pull-up ecom-card-1 bg-white">
            <div class="card-content ecom-card2 height-180">
                <h5 class="text-muted warning position-absolute p-1">Chart</h5>
                <div>
                    <i class="ft-shopping-cart warning font-large-1 float-right p-1"></i>
                </div>
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                    <div id="progress-stats-bar-chart2"></div>
                    <div id="progress-stats-line-chart2" class="progress-stats-shadow"></div>
                </div>
            </div>
        </div>
    </div> -->
            <div class="col-xl-4 col-lg-12">
                <a href="{{ route('rewardNasabah') }}" style="text-decoration: none; color: inherit;">
                    <div class="card pull-up ecom-card-1 bg-white"
                        style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                        <div class="card-content ecom-card2 height-180">
                            <h5 class="text-muted dark position-absolute p-1">Reward Nasabah</h5>
                            <div>
                                <i class="fas fa-coin dark font-large-1 float-right p-1"></i>
                            </div>
                            <!--
                <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                    <div id="progress-stats-bar-chart2"></div>
                    <div id="progress-stats-line-chart2" class="progress-stats-shadow"></div>
                </div> -->
                        </div>
                    </div>
            </div>
        </div>
        <!--/ eCommerce statistic -->

        <!-- Statistics -->
        <div class="row match-height">
            <!-- <div class="col-xl-4 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="heading-multiple-thumbnails">Chart</h4>
                    <a class="heading-elements-toggle">
                        <i class="la la-ellipsis-v font-medium-3"></i>
                    </a>
                    
                </div>
                <div class="card-content ecom-card2 height-300">
                    <div class="card-body">
                    <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                    <div id="progress-stats-bar-chart2"></div>
                    <div id="progress-stats-line-chart2" class="progress-stats-shadow"></div>
                </div>
                    </div>
                </div>
            </div>
    </div> -->
            <div class="col-xl-4 col-lg-12">
                <a href="{{ route('chartNasabah') }}">
                    <div class="card pull-up ecom-card-1 bg-white"
                        style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                        <div class="card-content ecom-card2 heigt 500">
                            <div class="card-body">
                                <h4 class="card-title">Chart</h4>
                                <h6 class="card-subtitle text-muted">Jenis Sampah Masuk</h6><br><br>
                                <canvas id="jenisChart"></canvas>
                            </div>
                        </div>
                        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                            <span class="float-left">Detail</span>

                        </div>
                    </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <a href="{{ route('chartNasabah') }}">
                    <div class="card pull-up ecom-card-1 bg-white"
                        style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                        <div class="card-content ecom-card2 heigt 500">
                            <div class="card-body">
                                <h4 class="card-title">Total Transaksi Masuk</h4><br>
                                <h6 class="card-subtitle text-muted">Nasabah</h6>
                                <canvas id="barChartPerTanggal"style="margin-top: 200px;"></canvas>
                            </div>
                        </div>
                        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                            <span class="float-left">Detail</span>

                        </div>
                    </div>
            </div>

            <div class="col-xl-4 col-lg-12">
                <a href="{{ route('listNasabah') }}">
                    <div class="card pull-up ecom-card-1 bg-white"
                        style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                        <div class="card-content ecom-card2 heigt 500">
                            <div class="card-content">
                                <div class="card-body">
                                    <h4 class="card-title">Nasabah</h4>
                                    <h6 class="card-subtitle text-muted">List Nasabah</h6>

                                    <div class="media-list">

                                        @foreach ($Nasabah as $nasabah)
                                            <a class="media border-0">
                                                <div class="media-left pr-1">
                                                    <span class="avatar avatar-md avatar-online">

                                                        <img class="media-object rounded-circle"
                                                            src="theme-assets/images/icon/user.png"
                                                            alt="Generic placeholder image">
                                                        <i></i>
                                                    </span>
                                                </div>
                                                <div class="media-body w-100">
                                                    <span class="list-group-item-heading">
                                                        {{ $nasabah->name }}<br>
                                                    </span>
                                                    <span class="blue-grey lighten-2 font-small-3">
                                                        <i>{{ $nasabah->email }}</i>
                                                    </span>
                                                    <!-- <span class="blue-grey lighten-2 font-small-3">
                            <i>{{ $nasabah->alamat }}</i>
                            </span>
                                 -->
                                                </div>
                                            </a>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                    <span class="float-left">Detail</span>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
    @endif
    @if (Auth::user()->role == 'user')
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card pull-up ecom-card-1 bg-white"
                    style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                    <div class="card-content ecom-card2 height-100">
                        <h5 class="text-muted dark position-absolute p-1">Kertas</h5>
                        <div>
                            <i class="ft-pie-chart dark font-large-1 float-right p-1"></i>
                        </div>
                        <div class="card-body float p-4">
                            <h5 class="text-muted dark position-absolute text-center w-100"
                                style="left: 0; right: 0;">Total : {{ $totalSampahKertas }}</h5>
                            <!-- Tampilkan jenis sampah lainnya -->
                        </div>
                        <!-- <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                    <div id="progress-stats-bar-chart"></div>
                    <div id="progress-stats-line-chart" class="progress-stats-shadow"></div>
                </div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card pull-up ecom-card-1 bg-white"
                    style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                    <div class="card-content ecom-card2 height-100">
                        <h5 class="text-muted dark position-absolute p-1">Plastik</h5>
                        <div>
                            <i class="ft-pie-chart dark font-large-1 float-right p-1"></i>
                        </div>
                        <div class="card-body float p-4">
                            <h5 class="text-muted dark position-absolute text-center w-100"
                                style="left: 0; right: 0;">Total : {{ $totalSampahPlastik }}</h5>
                            <!-- Tampilkan jenis sampah lainnya -->
                        </div>
                        <!-- <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                    <div id="progress-stats-bar-chart"></div>
                    <div id="progress-stats-line-chart" class="progress-stats-shadow"></div>
                </div> -->
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card pull-up ecom-card-1 bg-white"
                    style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                    <div class="card-content ecom-card2 height-100">
                        <h5 class="text-muted dark position-absolute p-1">Lainnya</h5>
                        <div>
                            <i class="ft-pie-chart dark font-large-1 float-right p-1"></i>
                        </div>
                        <div class="card-body float p-4">
                            <h5 class="text-muted dark position-absolute text-center w-100"
                                style="left: 0; right: 0;">Total : {{ $totalSampahLainnya }}</h5>
                            <!-- Tampilkan jenis sampah lainnya -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <div class="card pull-up ecom-card-1 bg-white"
                    style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                    <div class="card-content ecom-card2 height-500">
                        <div class="card-body">
                            <h4 class="card-title">Chart</h4>
                            <h6 class="card-subtitle text-muted">Jenis Sampah</h6>
                            <canvas id="jenisChart"></canvas>
                        </div>

                    </div>
                    <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                        <span class="float-left">Detail</span>

                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12">
                <a href="{{ route('reward') }}" style="text-decoration: none; color: inherit;">
                    <div class="card pull-up ecom-card-1 bg-white"
                        style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                        <div class="card-content ecom-card2 height-500">
                            <div class="card-body">
                                <h4 class="card-title">Reward</h4>
                                <h6 class="card-subtitle text-muted">Saldo Anda</h6>
                                <div class="lingkaran">

                                    <b class="card-title">Rp. {{ number_format($totalReward, 0, ',', '.') }}</b>
                                </div>
                            </div>


                        </div>
                        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                            <span class="float-left">Detail</span>

                        </div>
                    </div>

            </div>
            <div class="col-xl-4 col-lg-12">

                <div class="card pull-up ecom-card-1 bg-white"
                    style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                    <div class="card-content ecom-card2 height-500">
                        <div class="card-body">
                            <h4 class="card-title">History</h4>
                            <h6 class="card-subtitle text-muted">Transaksi Anda</h6><br>
                            @foreach ($transaksis as $transaksi)
                                <a>
                                    <div>

                                        <h6>- Pesanan anda dengan no. reff <i><u>
                                                    <span style="color:blue;">{{ $transaksi->no_reff }}</span></u></i>
                                            akan diambil hari ini <br><br>
                                        </h6>
                                        {{-- @elseif($transaksi->lokasiPenjemputan->status == 'belum disetujui')
                                        menunggu persetujuan<br></p>
                                    @elseif($transaksi->lokasiPenjemputan->status == 'selesai')
                                        telah selesai diambil<br></p>
                            @endif --}}


                                    </div>
                                </a>
                            @endforeach
                        </div>


                    </div>
                    <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                        <span class="float-left"> </span><br>

                    </div>
                </div>

            </div>

        </div>
        </div>
        </div>

    @endif
    <!--/ Statistics -->
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Ambil referensi ke elemen canvas
        var ctx = document.getElementById('jenisChart').getContext('2d');

        // Buat data untuk pie chart
        var data = {
            labels: ['Plastik', 'Kertas', 'Lainnya'],
            datasets: [{
                data: [{{ $totalSampahPlastik }}, {{ $totalSampahKertas }}, {{ $totalSampahLainnya }}],
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        };

        // Buat instance pie chart
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {}
        });
    </script>
    <script>
        // Data total transaksi per tanggal dari PHP
        var dataPerTanggal = @json($totalTransaksiPerTanggal);

        // Extract tanggal dan total transaksi dari data
        var tanggal = dataPerTanggal.map(item => item.tanggal);
        var totalTransaksiPerTanggal = dataPerTanggal.map(item => item.total_transaksi);

        // Setup data untuk chart
        var chartDataPerTanggal = {
            labels: tanggal,
            datasets: [{
                label: 'Total Transaksi',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: totalTransaksiPerTanggal,
            }]
        };

        // Setup options untuk chart
        var chartOptionsPerTanggal = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true, // Mulai label dari nilai 0
                    }
                }]
            }
        };

        // Buat bar chart untuk total transaksi per tanggal
        var ctxPerTanggal = document.getElementById('barChartPerTanggal').getContext('2d');
        var myBarChartPerTanggal = new Chart(ctxPerTanggal, {
            type: 'line',
            data: chartDataPerTanggal,
            options: chartOptionsPerTanggal
        });
    </script>




    <!-- END PAGE LEVEL JS-->
</body>

</html>
