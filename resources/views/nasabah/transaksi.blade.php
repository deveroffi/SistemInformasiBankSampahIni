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

        .custom-modal .modal-content {
            border-radius: 15px;
            /* Anda dapat mengubah nilai sesuai keinginan */
        }

        .btn {
            border-radius: 15px;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu 2-columns" data-open="click" data-menu="vertical-menu"
    data-color="bg-chartbg" data-col="2-columns">

    @include('layout.side')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
                                <a class="dropdown-item" href="#"><i class="ft-check-square"></i>Edit
                                    Profil</a>
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
    <div><!-- Chart -->
        <div class="row">
            <div class="col-md-12 grid-margin">
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
                    <div class="col-lg-12 grid-margin">

                        <div class="card-body"
                            style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/4860404.jpg'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
                            <h4 class="card-title">Ajukan Transaksi</h4>
                            <div>
                                @if ($batasWaktu)
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#tambahTransaksiModal">
                                        <i>+ Tambah<i>
                                    </button><br>
                                @else
                                    <button disabled type="button" class="btn btn-primary">
                                        <i>Periode Belum Dibuka<i>
                                    </button><br>
                                    {{-- <button disabled>Tambah Transaksi Tidak Aktif</button> --}}
                                @endif
                                <br>
                                <h6>* Periode Transaksi Dibuka ( 05.00 - 12.00)</h6>

                                <!-- Modal Tambah Transaksi -->
                                <div class="modal fade custom-modal" id="tambahTransaksiModal" tabindex="-1"
                                    role="dialog" aria-labelledby="tambahTransaksiModal" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4><b class="modal-title" id="tambahTransaksiModalLabel">Tambah
                                                        Transaksi</b></h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Isi form atau konten tambah Transaksi di sini -->
                                                <!-- Tambah Transaksi Form -->

                                                <form method="POST"
                                                    action="{{ route('storeTransaksi') }}"enctype="multipart/form-data">

                                                    @csrf
                                                    <!-- Nama -->
                                                    <div class="form-group">
                                                        <label for="jenis_sampah"><b>Jenis Sampah</b></label>
                                                        <select class="form-control" id="jenis_sampah"
                                                            name="jenis_sampah" required>
                                                            <option value="">Pilih Jenis Sampah</option>
                                                            <option value="Bak/Emberan Fix">Bak/Emberan Fix</option>
                                                            <option value="Bak Campur (Bak Keras)">Bak Campur (Bak
                                                                Keras)</option>
                                                            <option value="Bak Hitam">Bak Hitam</option>
                                                            <option value="Botol Bensin Besar">Botol Bensin Besar
                                                            </option>
                                                            <option value="Botol Bir Bintang Besar">Botol Bir Bintang
                                                                Besar</option>
                                                            <option value="Botol/Beling Putih">Botol/Beling Putih
                                                            </option>
                                                            <option value="Botol/Beling Warna">Botol/Beling Warna
                                                            </option>
                                                            <option value="Botol Kecap/Saos Besar">Botol Kecap/Saos
                                                                Besar</option>
                                                            <option value="Botol PET Bening Bersih">Botol PET Bening
                                                                Bersih</option>
                                                            <option value="Botol PET Biru Muda Bersih">Botol PET Biru
                                                                Muda Bersih</option>
                                                            <option value="Botol PET Jelek/Minyak">Botol PET
                                                                Jelek/Minyak</option>
                                                            <option value="Botol PET Kotor">Botol PET Kotor</option>
                                                            <option value="Botol PET Warna Bersih">Botol PET Warna
                                                                Bersih</option>
                                                            <option value="Botol Sirup Bagus">Botol Sirup Bagus
                                                            </option>
                                                            <option value="Buram">Buram</option>
                                                            <option value="CD">CD</option>
                                                            <option value="Duplek">Duplek</option>
                                                            <option value="Galon Utuh (Aqua /Club /Bahan Sejenis)">
                                                                Galon Utuh (Aqua /Club /Bahan Sejenis)</option>
                                                            <option value="Gelas PI Bening Bersih">Gelas PI Bening
                                                                Bersih</option>
                                                            <option value="Gelas PI Bening Kotor">Gelas PI Bening Kotor
                                                            </option>
                                                            <option value="Gelas PI Sablon &Sedotan">Gelas PI Sablon &
                                                                Sedotan</option>
                                                            <option value="HVS">HVS</option>
                                                            <option value="Karung Kecil/Rusak">Karung Kecil/Rusak
                                                            </option>
                                                            <option value="Kardus Bagus">Kardus Bagus</option>
                                                            <option value="Kardus Jelek">Kardus Jelek</option>
                                                            <option value="Kertas">Kertas</option>
                                                            <option value="Kresek">Kresek</option>
                                                            <option value="Lembaran Campur">Lembaran Campur</option>
                                                            <option value="Majalah">Majalah</option>
                                                            <option value="Plastik Bening">Plastik Bening</option>
                                                            <option value="Sachet/Kemasan Metalis">Sachet/Kemasan
                                                                Metalis</option>
                                                            <option value="Sak Semen">Sak Semen</option>
                                                            <option value="Sablon Tebal">Sablon Tebal</option>
                                                            <option value="Sablon Tipis">Sablon Tipis</option>
                                                            <option value="Tutup Botol Minuman">Tutup Botol Minuman
                                                            </option>
                                                            <option value="Tutup Campur">Tutup Campur</option>
                                                            <option value="Tutup Galon">Tutup Galon</option>

                                                            <option value="lainnya">Lainnya</option>
                                                            <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                        </select>
                                                    </div>

                                                    <!-- Email -->
                                                    {{-- <div class="form-group">
                                                        <label for="berat_sampah"><b>Berat (kg)</b></label>
                                                        <input type="berat_sampah" class="form-control"
                                                            id="berat_sampah" name="berat_sampah" required>
                                                    </div> --}}

                                                    <div class="form-group">
                                                        <label for="berat_sampah"><b>Berat (kg)</b></label>
                                                        <input type="number" class="form-control" id="berat_sampah"
                                                            name="berat_sampah" required oninput="validateInput()">
                                                        <small id="error-message"
                                                            style="color: red; display: none;">Masukkan hanya
                                                            angka.</small>
                                                    </div>

                                                    <!-- Alamat -->
                                                    <div class="form-group">
                                                        <label for="tanggal_pengumpulan"><b>Tanggal</b></label>
                                                        <input type="date" class="form-control"
                                                            id="tanggal_pengumpulan" name="tanggal_pengumpulan"
                                                            required>
                                                    </div>
                                                    <button id="shareButton" class="btn btn-light">Buka
                                                        Maps</button><br><br>
                                                    <!-- Password -->
                                                    <div class="form-group">
                                                        <label for="lokasi_maps"><b>Lokasi</b></label>
                                                        <input type="lokasi_maps" class="form-control"
                                                            id="lokasi_maps" name="lokasi_maps" required>
                                                        <span style="font-style: italic; font-size: 14px;">* Masukkan
                                                            alamat di kolom di atas</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="foto_sampah"><b>Foto Sampah</b></label>
                                                        <input type="file" class="form-control" id="foto_sampah"
                                                            name="foto_sampah" required>
                                                    </div>
                                                    {{-- <div class="form-group">
                                                        <label for="foto_sampah">Foto Sampah</label>
                                                        <input type="file" class="form-control" id="foto_sampah" name="foto_sampah" required>
                                                    </div> --}}
                                                    {{-- <div class="form-group">
                                                        <label for="latitude">Latitude</label>
                                                        <input type="text" class="form-control" id="latitude" name="latitude" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="longitude">Longitude</label>
                                                        <input type="text" class="form-control" id="longitude" name="longitude" readonly>
                                                    </div> --}}


                                                    {{-- <div class="form-group">
                                                        <label for="latitude">Latitude</label>
                                                        <input type="latitude" class="form-control" id="latitude"
                                                            name="latitude">
                                                        <span style="font-style: italic; font-size: 14px;">* Masukkan
                                                            latitude di kolom di atas</span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="longitude">Longitude</label>
                                                        <input type="longitude" class="form-control" id="longitude"
                                                            name="longitude">
                                                        <span style="font-style: italic; font-size: 14px;">* Masukkan
                                                            longitude di kolom di atas</span>
                                                    </div> --}}
                                                    <!-- <div class="form-group">
                                                                                    <label for="latitude">Latitude</label>
                                                                                    <input type="latitude" class="form-control" id="latitude" name="latitude" readonly>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="longitude">Longitude</label>
                                                                                    <input type="longitude" class="form-control" id="longitude" name="longitude" readonly>
                                                                                </div> -->


                                                    <!-- Tombol untuk mengirimkan form -->
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                    <!-- Tombol untuk menutup modal -->
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Batal</button>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <table class="table table-striped">

                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No. Reff</th>
                                            <th>Status</th>
                                            <th>Foto</th>
                                            <th>Jenis Sampah</th>
                                            <th>Berat (kg)</th>
                                            <th>Tanggal</th>
                                            <th>Lokasi Penjemputan</th>
                                            <th>Aksi</th>
                                        </tr>
                                        @if ($Sampah->isEmpty())
                                            <tr>
                                                <td colspan="3" style="text-align: center; padding: 20px;">
                                                    <i style="display: block; margin-left: 550px;">Transaksi
                                                        kosong.</i>
                                                </td>
                                            </tr>
                                        @else
                                    </thead>

                                    <tbody>

                                        @foreach ($Sampah as $sampah)
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $sampah->no_reff }}</td>
                                            <td
                                                style="color: 
                                                @if ($sampah->lokasiPenjemputan->status == 'disetujui') green
                                                @elseif($sampah->lokasiPenjemputan->status == 'belum disetujui')
                                                    red
                                                @elseif($sampah->lokasiPenjemputan->status == 'selesai')
                                                    navy @endif; font-style: italic; font-weight: bold;">


                                                {{ $sampah->lokasiPenjemputan->status }}
                                            </td>
                                            <td>
                                                @if ($sampah->foto_sampah)
                                                    <img src="{{ asset('storage/' . $sampah->foto_sampah) }}"
                                                        alt="Foto Sampah" style="max-width: 100px; height: auto;">
                                                @else
                                                    <p><i>foto tidak tersedia</i></p>
                                                @endif
                                            </td>
                                            <td>{{ $sampah->jenis_sampah }}</td>
                                            <td>{{ $sampah->berat_sampah }}</td>
                                            <td>{{ $sampah->tanggal_pengumpulan }}</td>
                                            <td>{{ $sampah->lokasi_maps }}</td>
                                            <td>


                                                <div class="btn-group" role="group">

                                                    <button type="button" class="btn btn-warning"
                                                        data-toggle="modal"
                                                        data-target="#detailTransaksiModal-{{ $sampah->no_reff }}">
                                                        Detail
                                                    </button>
                                                    <!-- Modal Detail Transaksi -->
                                                    <div class="modal fade custom-modal" class="modal fade"
                                                        id="detailTransaksiModal-{{ $sampah->no_reff }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="detailTransaksiModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered"
                                                            role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="detailTransaksiModalLabel"><b>
                                                                            Detail
                                                                            Transaksi <b> {{ $sampah->no_reff }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Form Detail Transaksi -->
                                                                    <form>
                                                                        <div class="form-group">
                                                                            <label for="no_reff"><b>No.
                                                                                    Reff</b></label>
                                                                            <input type="no_reff" class="form-control"
                                                                                id="no_reff" name="no_reff"
                                                                                value="{{ $sampah->no_reff }}"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="berat_sampah"><b>Berat
                                                                                    (kg)
                                                                                </b>
                                                                            </label>
                                                                            <input type="berat_sampah"
                                                                                class="form-control" id="berat_sampah"
                                                                                name="berat_sampah"
                                                                                value="{{ $sampah->berat_sampah }}"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="jenis_sampah"><b>Jenis
                                                                                    Sampah</b></label>
                                                                            <input type="jenis_sampah"
                                                                                class="form-control"
                                                                                id="bjenis_sampah" name="jenis_sampah"
                                                                                value="{{ $sampah->jenis_sampah }}"
                                                                                readonly>
                                                                        </div>

                                                                        <!-- Alamat -->
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="tanggal_pengumpulant"><b>Tanggal</b></label>
                                                                            <input type="tanggal_pengumpulan"
                                                                                class="form-control"
                                                                                id="tanggal_pengumpulan"
                                                                                name="tanggal_pengumpulan"value="{{ date('Y-m-d') }}"
                                                                                readonly>
                                                                        </div>

                                                                        <!-- Password -->
                                                                        <div class="form-group">
                                                                            <label for="lokasi_maps"><b>Lokasi
                                                                                    Penjemputan</b></label>
                                                                            <input type="lokasi_maps"
                                                                                class="form-control" id="lokasi_maps"
                                                                                name="lokasi_maps"
                                                                                value="{{ $sampah->lokasi_maps }}"
                                                                                readonly>
                                                                        </div>
                                                                        <div>
                                                                            <label for="foto_sampah"><b>Foto
                                                                                    Sampah<b></label>

                                                                        </div>
                                                                        @if ($sampah->foto_sampah)
                                                                            <img src="{{ asset('storage/' . $sampah->foto_sampah) }}"
                                                                                alt="Foto Sampah"
                                                                                style="max-width: 200px; height: auto;">
                                                                        @else
                                                                            <p><i>foto tidak tersedia</i></p>
                                                                        @endif
                                                                        {{-- <div class="form-group">
                                                                            <label for="latitude">Latitude</label>
                                                                            <input type="latitude"
                                                                                class="form-control" id="latitude"
                                                                                name="latitude"
                                                                                value="{{ $sampah->latitude }}"readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="longitude">Longitude</label>
                                                                            <input type="longitude"
                                                                                class="form-control" id="longitude"
                                                                                name="longitude"
                                                                                value="{{ $sampah->longitude }}"readonly>
                                                                        </div>
                                                                        {{-- <div class="form-group"> --}}
                                                                        {{-- <label for="latitude">latitude</label>
                                                                                <input type="latitude"
                                                                                    class="form-control"
                                                                                    id="latitude"
                                                                                    name="latitude"
                                                                                    value="{{ $sampah->latitude }}"
                                                                                    readonly>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="longitude">longitude</label>
                                                                                <input type="longitude"
                                                                                    class="form-control"
                                                                                    id="longitude"
                                                                                    name="longitude"
                                                                                    value="{{ $sampah->longitude }}"
                                                                                    readonly>
                                                                            </div> --}}`
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Tutup</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($sampah->lokasiPenjemputan->status == 'belum disetujui')
                                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                                        data-target="#editTransaksiModal-{{ $sampah->no_reff }}">Edit</button>
                                                @endif
                                                {{-- <button type="button" class="btn btn-info" data-toggle="modal"
                                                    data-target="#editTransaksiModal-{{ $sampah->no_reff }}"  > Edit
                                                </button> --}}
                                                <div class="modal fade custom-modal" class="modal fade"
                                                    id="editTransaksiModal-{{ $sampah->no_reff }}" tabindex="-1"
                                                    role="dialog" aria-labelledby="detailTransaksiModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editTransaksiModalLabel">
                                                                    <b>Edit</b>
                                                                    {{ $sampah->no_reff }}
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- Form Edit Transaksi -->

                                                                <form method="POST"
                                                                    action="{{ route('updateTransaksi', ['no_reff' => $sampah->no_reff]) }}"enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="no_reff"><b>No</b></label>
                                                                        <input type="no_reff" class="form-control"
                                                                            id="no_reff" name="no_reff"
                                                                            value="{{ $sampah->no_reff }}"readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="jenis_sampah"><b>Jenis
                                                                                Sampah</b></label>
                                                                        <select class="form-control" id="jenis_sampah"
                                                                            name="jenis_sampah"
                                                                            value="{{ $sampah->jenis_sampah }}">
                                                                            <option value="Bak/Emberan Fix">Bak/Emberan
                                                                                Fix</option>
                                                                            <option value="Bak Campur (Bak Keras)">Bak
                                                                                Campur (Bak
                                                                                Keras)</option>
                                                                            <option value="Bak Hitam">Bak Hitam
                                                                            </option>
                                                                            <option value="Botol Bensin Besar">Botol
                                                                                Bensin Besar
                                                                            </option>
                                                                            <option value="Botol Bir Bintang Besar">
                                                                                Botol Bir Bintang
                                                                                Besar</option>
                                                                            <option value="Botol/Beling Putih">
                                                                                Botol/Beling Putih
                                                                            </option>
                                                                            <option value="Botol/Beling Warna">
                                                                                Botol/Beling Warna
                                                                            </option>
                                                                            <option value="Botol Kecap/Saos Besar">
                                                                                Botol Kecap/Saos
                                                                                Besar</option>
                                                                            <option value="Botol PET Bening Bersih">
                                                                                Botol PET Bening
                                                                                Bersih</option>
                                                                            <option value="Botol PET Biru Muda Bersih">
                                                                                Botol PET Biru
                                                                                Muda Bersih</option>
                                                                            <option value="Botol PET Jelek/Minyak">
                                                                                Botol PET
                                                                                Jelek/Minyak</option>
                                                                            <option value="Botol PET Kotor">Botol PET
                                                                                Kotor</option>
                                                                            <option value="Botol PET Warna Bersih">
                                                                                Botol PET Warna
                                                                                Bersih</option>
                                                                            <option value="Botol Sirup Bagus">Botol
                                                                                Sirup Bagus
                                                                            </option>
                                                                            <option value="Buram">Buram</option>
                                                                            <option value="CD">CD</option>
                                                                            <option value="Duplek">Duplek</option>
                                                                            <option
                                                                                value="Galon Utuh (Aqua /Club /Bahan Sejenis)">
                                                                                Galon Utuh (Aqua /Club /Bahan Sejenis)
                                                                            </option>
                                                                            <option value="Gelas PI Bening Bersih">
                                                                                Gelas PI Bening
                                                                                Bersih</option>
                                                                            <option value="Gelas PI Bening Kotor">Gelas
                                                                                PI Bening Kotor
                                                                            </option>
                                                                            <option value="Gelas PI Sablon &Sedotan">
                                                                                Gelas PI Sablon &
                                                                                Sedotan</option>
                                                                            <option value="HVS">HVS</option>
                                                                            <option value="Karung Kecil/Rusak">Karung
                                                                                Kecil/Rusak
                                                                            </option>
                                                                            <option value="Kardus Bagus">Kardus Bagus
                                                                            </option>
                                                                            <option value="Kardus Jelek">Kardus Jelek
                                                                            </option>
                                                                            <option value="Kertas">Kertas</option>
                                                                            <option value="Kresek">Kresek</option>
                                                                            <option value="Lembaran Campur">Lembaran
                                                                                Campur</option>
                                                                            <option value="Majalah">Majalah</option>
                                                                            <option value="Plastik Bening">Plastik
                                                                                Bening</option>
                                                                            <option value="Sachet/Kemasan Metalis">
                                                                                Sachet/Kemasan
                                                                                Metalis</option>
                                                                            <option value="Sak Semen">Sak Semen
                                                                            </option>
                                                                            <option value="Sablon Tebal">Sablon Tebal
                                                                            </option>
                                                                            <option value="Sablon Tipis">Sablon Tipis
                                                                            </option>
                                                                            <option value="Tutup Botol Minuman">Tutup
                                                                                Botol Minuman
                                                                            </option>
                                                                            <option value="Tutup Campur">Tutup Campur
                                                                            </option>
                                                                            <option value="Tutup Galon">Tutup Galon
                                                                            </option>

                                                                            <option value="lainnya">Lainnya</option>
                                                                            <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="berat_sampah"><b>Berat
                                                                                (kg)</b></label>
                                                                        <input type="berat_sampah"
                                                                            class="form-control" id="berat_sampah"
                                                                            name="berat_sampah"
                                                                            value="{{ $sampah->berat_sampah }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label
                                                                            for="tanggal_pengumpulan"><b>Tanggal</b></label>
                                                                        <input type="tanggal_pengumpulan"
                                                                            class="form-control"
                                                                            id="tanggal_pengumpulan"
                                                                            name="tanggal_pengumpulan"value="{{ date('Y-m-d') }}">
                                                                    </div>

                                                                    <!-- Password -->
                                                                    <div class="form-group">
                                                                        <label for="lokasi_maps"><b>Lokasi
                                                                                Penjemputan</b></label>
                                                                        <input type="lokasi_maps" class="form-control"
                                                                            id="lokasi_maps" name="lokasi_maps"
                                                                            value="{{ $sampah->lokasi_maps }}">
                                                                    </div>
                                                                    <div>
                                                                        <label for="foto_sampah"><b>Foto
                                                                                Sampah<b></label>

                                                                    </div>
                                                                    @if ($sampah->foto_sampah)
                                                                        <img src="{{ asset('storage/' . $sampah->foto_sampah) }}"
                                                                            alt="Foto Sampah"
                                                                            style="max-width: 200px; height: auto;">
                                                                    @else
                                                                        <p><i>foto tidak tersedia</i></p>
                                                                    @endif
                                                                    <div class="form-group">

                                                                        <input type="file" class="form-control"
                                                                            id="foto_sampah" name="foto_sampah"
                                                                            required>
                                                                    </div>

                                                                    {{-- <div class="form-group">
                                                                        <label for="latitude">Latitude</label>
                                                                        <input type="latitude" class="form-control"
                                                                            id="latitude" name="latitude"
                                                                            value="{{ $sampah->latitude }}"readonly>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="longitude">Longitude</label>
                                                                        <input type="longitude" class="form-control"
                                                                            id="longitude" name="longitude"
                                                                            value="{{ $sampah->longitude }}"readonly>
                                                                    </div> --}}

                                                                    <!-- Field lainnya sesuai dengan data Transaksi -->

                                                                    <!-- Field lainnya ... -->
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-success">Simpan</button>
                                                                    </div>
                                                                </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <a href="{{ route('deleteTransaksi', ['no_reff' => $sampah->no_reff]) }}"
                                                        class="btn btn-danger">Hapus</a>
                                                </div>
                                            </td>

                                            </tr>
                                        @endforeach

                                        @endif


                                    </tbody>
                                </table>
                                {{-- <form action="{{ route('hitung-jarak') }}" method="POST">
                                    @csrf
                                
                                    <div class="form-group">
                                        <label for="alamat_asal">Alamat Asal</label>
                                        <input type="text" class="form-control" id="alamat_asal" name="alamat_asal" required>
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="alamat_tujuan">Alamat Tujuan</label>
                                        <input type="text" class="form-control" id="alamat_tujuan" name="alamat_tujuan" required>
                                    </div>
                                
                                    <input type="text" id="jarak" name="jarak">
                                
                                    <button type="submit" class="btn btn-primary">Hitung Jarak</button>
                                </form> --}}
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
    {{-- <script>
        // Fungsi untuk mengonversi alamat menjadi koordinat
        function convertAddressToCoordinates() {
            var address = document.getElementById('lokasi_maps').value;
    
            // Buat permintaan ke Google Geocoding API
            var geocodingUrl = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + encodeURIComponent(address) + '&key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w';
            
            fetch(geocodingUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'OK' && data.results.length > 0) {
                        var latitude = data.results[0].geometry.location.lat;
                        var longitude = data.results[0].geometry.location.lng;
    
                        // Isi nilai latitude dan longitude ke dalam input masing-masing
                        document.getElementById('latitude').value = latitude;
                        document.getElementById('longitude').value = longitude;
                    } else {
                        alert('Tidak dapat menemukan koordinat untuk alamat yang diberikan.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data koordinat.');
                });
        }
    
        // Tambahkan event listener untuk input alamat
        document.getElementById('alamat').addEventListener('change', convertAddressToCoordinates);
    </script> --}}
    <script>
        // Fungsi untuk mengambil latitude dan longitude dari input dan membuka Google Maps
        function shareLocation() {
            // var latitude = document.getElementById('latitude').value;
            // var longitude = document.getElementById('longitude').value;

            // Buat tautan URL dengan latitude dan longitude
            var url = 'https://maps.google.com/maps?q=' + '&z=15&action=copy';

            // Buka tautan URL di jendela baru
            window.open(url);
        }

        // Tambahkan event listener untuk tombol bagikan lokasi
        document.getElementById('shareButton').addEventListener('click', shareLocation);
    </script>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#lokasi_maps').on('blur', function() {
            var lokasi = $(this).val();

            $.ajax({
                url: "{{ route('getLatLong') }}",
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    lokasi_maps: lokasi
                },
                success: function(response) {
                    $('#latitude').val(response.latitude);
                    $('#longitude').val(response.longitude);
                },
                error: function(response) {
                    alert('Lokasi tidak ditemukan');
                    $('#latitude').val('');
                    $('#longitude').val('');
                }
            });
        });
    });
</script>
 --}}

    {{-- <script>
        //Ambil elemen input lokasi_maps
        // const lokasiMapsInput = document.getElementById('lokasi_maps');

        // // Tambahkan event listener untuk input lokasi_maps
        // lokasiMapsInput.addEventListener('change', function() {
        //     // Ambil nilai lokasi_maps
        //     const lokasiMapsValue = this.value;

        //     // Lakukan pengolahan untuk mendapatkan latitude dan longitude
        //     // Misalnya, Anda dapat melakukan permintaan HTTP ke layanan geocoding untuk mendapatkan informasi koordinat berdasarkan alamat

        //     //     // Contoh sederhana: mengambil koordinat secara acak
        //     const latitude = Math.random() * (90 - (-90)) + (-90);
        //     const longitude = Math.random() * (180 - (-180)) + (-180);



        //     // Isi nilai latitude dan longitude ke input masing-masing
        //     document.getElementById('latitude').value = latitude.toFixed(6);
        //     document.getElementById('longitude').value = longitude.toFixed(6);
        </script> --}}
    {{-- 
          <script>
    document.getElementById('lokasi_maps').addEventListener('change', function() {
        var lokasiMapsValue = this.value;

        // Buat permintaan ke Geocoding API
        fetch('https://maps.googleapis.com/maps/api/geocode/json?address=' + encodeURIComponent(lokasiMapsValue) + '&key=YOUR_API_KEY')
            .then(response => response.json())
            .then(data => {
                if (data.status === 'OK') {
                    var latitude = data.results[0].geometry.location.lat;
                    var longitude = data.results[0].geometry.location.lng;

                    // Perbarui nilai input latitude dan longitude
                    document.getElementById('latitude').value = latitude.toFixed(6);
                    document.getElementById('longitude').value = longitude.toFixed(6);
                } else {
                    alert('Tidak dapat menemukan lokasi. Pastikan Anda memasukkan lokasi yang valid.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mengambil data lokasi.');
            });
    });
</script>

    </script> --}}
    {{-- <script>
        document.getElementById('lokasi_maps').addEventListener('change', function() {
            var lokasiMapsValue = this.value;
    
            // Buat permintaan ke Geocoding API
            fetch('https://maps.googleapis.com/maps/api/geocode/json?address=' + encodeURIComponent(lokasiMapsValue) + '&key=AIzaSyAWRsRGOFbTXRlLHDOSudkerLjUtBfElUt')
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'OK') {
                        var latitude = data.results[0].geometry.location.lat;
                        var longitude = data.results[0].geometry.location.lng;
    
                        // Perbarui nilai input latitude dan longitude
                        document.getElementById('latitude').value = latitude.toFixed(6);
                        document.getElementById('longitude').value = longitude.toFixed(6);
                    } else {
                        alert('Tidak dapat menemukan lokasi. Pastikan Anda memasukkan lokasi yang valid.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat mengambil data lokasi.');
                });
        });
    </script>
     --}}

    <!-- resources/views/form.blade.php -->
    <script>
        $(document).ready(function() {
            // Check if the alert exists and show it
            if ($('.alert').length) {
                alert($('.alert').text());
            }
        });
    </script>

    <script>
        function validateInput() {
            var beratSampahInput = document.getElementById('berat_sampah');
            var errorMessage = document.getElementById('error-message');

            // Jika nilai input bukan angka, tampilkan pesan kesalahan
            if (isNaN(beratSampahInput.value)) {
                errorMessage.style.display = 'masukkan angka';
            } else {
                errorMessage.style.display = 'none';
            }
        }
    </script>
</body>

</html>
