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
    <title>Bank Sampah UINSA Surabaya</title>
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
    <!-- CSS Bootstrap 5 -->
    <!-- CSS Bootstrap 4 -->
    <!-- CSS Bootstrap 5 -->
    <!-- CSS Bootstrap 5 -->
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
                    <li class="breadcrumb-item text-sm text-light active">Transaksi Masuk</li>
                </ol>
            </nav>
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
                            <a class="dropdown-item" href="{{ route('editProfil') }}"><i
                                    class="ft-check-square"></i>Edit Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('actionlogout') }}"><i class="ft-power"></i>
                                Logout</a>
                        </div>
                    </div>
                </li>

            </div>
        </div>
    </nav>
    <div>
        <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12">
                <div class="card pull-up ecom-card-1 bg-white"
                    style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;">
                    <div class="card-content ecom-card2 height-100">
                        <h5 class="text-muted dark position-absolute p-1">Kertas</h5>
                        <div>
                            <i class="ft-pie-chart darkr font-large-1 float-right p-1"></i>
                        </div>
                        <div class="card-body float p-4">
                            <h5 class="text-muted dark position-absolute text-center w-100"
                                style="left: 0; right: 0;">
                                Total : {{ $totalSampahKertas }}</h5>
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
                    style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;">
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
                    style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover;">
                    <div class="card-content ecom-card2 height-100">
                        <h5 class="text-muted dark position-absolute p-1">Lainnya</h5>
                        <div>
                            <i class="fa fa-ravelry dark font-large-1 float-right p-1"></i>
                        </div>
                        <div class="card-body float p-4">
                            <h5 class="text-muted dark position-absolute text-center w-100"
                                style="left: 0; right: 0;">Total : {{ $totalSampahLainnya }}</h5>
                            <!-- Tampilkan jenis sampah lainnya -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Navbar -->
        <div><!-- Chart -->

            <div class="col-md-12 grid-margin" style="overflow-x: auto;" style="border-radius: 15px;">
                <div class="row">

                    <div>
                        <div class="card"
                            style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/4860404.jpg'); background-size: cover;">


                            <div class="card-body">


                                <h4 class="card-title">Transaksi Masuk</h4>

                                <div>
                                    <!-- Button untuk mengarahkan ke halaman tampilan PDF -->
                                    <a href="{{ route('cetakTransaksiMasukNasabah') }}" class="btn btn-primary">Cetak
                                    </a>
                                    <br><br>
                                </div>

                                <div class="col-sm-9">
                                    <ul class="nav nav-pills" id="statusTabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link" id="belum-disetujui-tab" data-toggle="tab"
                                                href="#belum-disetujui" role="tab"
                                                aria-controls="belum-disetujui" aria-selected="false">Belum
                                                Disetujui</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="disetujui-tab" data-toggle="tab"
                                                href="#disetujui" role="tab" aria-controls="disetujui"
                                                aria-selected="true">Disetujui</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="selesai-tab" data-toggle="tab" href="#selesai"
                                                role="tab" aria-controls="selesai"
                                                aria-selected="true">Selesai</a>
                                        </li>
                                        <a href="{{ route('ruteNasabah') }}" class="btn btn-link">
                                            Lihat Rute
                                        </a>


                                        {{-- <a href="{{ route('ruteNasabah') }}" class=button type="button" class="btn btn-link">Lihat Rute</button> --}}

                                    </ul>
                                    <br>
                                    <!-- Konten tab -->
                                    <div class="tab-content" id="statusTabsContent">
                                        <div class="tab-pane fade show active" id="disetujui" role="tabpanel"
                                            aria-labelledby="disetujui-tab">
                                            <!-- Tabel untuk data yang disetujui -->
                                            <table class="table table-striped">
                                                <!-- Tabel Header -->
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No. Reff</th>
                                                        <th>Status</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Sampah</th>
                                                        <th>Berat (kg)</th>
                                                        <th>Tanggal</th>
                                                        <th>Lokasi Penjemputan</th>
                                                        {{-- <th>Jarak (m)</th> --}}
                                                        <th>Koordinat</th>

                                                        <th>Aksi</th>
                                                    </tr>

                                                </thead>
                                                <!-- Tabel Body -->
                                                <tbody id="disetujuiTableBody">
                                                    @foreach ($Sampah as $sampah)
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="belum-disetujui" role="tabpanel"
                                            aria-labelledby="belum-disetujui-tab">
                                            <!-- Tabel untuk data yang belum disetujui -->
                                            <table class="table table-striped">
                                                <!-- Tabel Header -->
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No. Reff</th>
                                                        <th>Status</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Sampah</th>
                                                        <th>Berat (kg)</th>
                                                        <th>Tanggal</th>
                                                        <th>Lokasi Penjemputan</th>
                                                        {{-- <th>Jarak (m)</th> --}}
                                                       <th>Koordinat</th>

                                                        <th>Aksi</th>
                                                    </tr>

                                                </thead>
                                                <!-- Tabel Body -->
                                                <tbody id="belumDisetujuiTableBody">
                                                    @foreach ($Sampah as $sampah)
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="selesai" role="tabpanel"
                                            aria-labelledby="selesai-tab">
                                            <!-- Tabel untuk data yang belum disetujui -->
                                            <table class="table table-striped">
                                                <!-- Tabel Header -->
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>No. Reff</th>
                                                        <th>Status</th>
                                                        <th>Nama</th>
                                                        <th>Jenis Sampah</th>
                                                        <th>Berat (kg)</th>
                                                        <th>Tanggal</th>
                                                        <th>Lokasi Penjemputan</th>
                                                        {{-- <th>Jarak (m)</th> --}}
                                                       <th>Koordinat</th>

                                                        <th>Aksi</th>
                                                    </tr>

                                                </thead>
                                                <!-- Tabel Body -->
                                                <tbody id="selesaiTableBody">

                                                    @foreach ($Sampah as $sampah)
                                                    @endforeach

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

    <script>
        $(document).ready(function() {
            $('#btn-submit').click(function() {
                // Mengambil data dari form
                var formData = $('#updateStatusForm').serialize();

                // Kirim permintaan AJAX untuk memperbarui status
                $.ajax({
                    type: 'POST',
                    url: '/update-status', // Ganti dengan URL rute Anda
                    data: formData,
                    success: function(response) {
                        // Jika sukses, tutup modal dan lakukan hal lainnya
                        $('#detailTransaksiModal-{{ $sampah->no_reff }}').modal('hide');
                        // Misalnya, tampilkan pesan sukses atau muat ulang halaman
                        location.reload(); // Contoh: muat ulang halaman
                    },
                    error: function(xhr, status, error) {
                        // Jika terjadi kesalahan, tangani di sini
                        console.error(error);
                    }
                });
            });
        });
    </script>

    <script>
        // Pisahkan data berdasarkan status dan tampilkan di tab yang sesuai
        $(document).ready(function() {
            var disetujuiRows = '';
            var belumDisetujuiRows = '';
            var selesaiRows = '';

            @foreach ($Sampah as $sampah)
                var row = `
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $sampah->no_reff }}</td>
                                                        <td 
                                                            style="color: 
                                                @if ($sampah->status == 'disetujui') green
                                                @elseif($sampah->status == 'belum disetujui')
                                                    red
                                                @elseif($sampah->status == 'selesai')
                                                    blue @endif; font-style: italic; font-weight: bold;">
    {{ $sampah->status }}
</td>

                                                        <td>{{ $sampah->name }}</td>
                                                        <td>{{ $sampah->jenis_sampah }}</td>
                                                        <td>{{ $sampah->berat_sampah }}</td>
                                                        <td>{{ $sampah->tanggal_pengumpulan }}</td>
                                                        <td>{{ $sampah->lokasi }}</td>
                                                        <!--<td>{{ $sampah->jarak ? number_format($sampah->jarak) : '-' }}</td>--!>
                                                        <td>{{ $sampah->koordinat }}</td>  
                                                        
                                                       
    
                                                        <td>
                                                            <div class="btn-group" role="group">
    
                                                                <button type="button" class="btn btn-warning"
                                                                    data-toggle="modal"
                                                                    data-target="#detailTransaksiModal-{{ $sampah->no_reff }}">
                                                                    Detail
                                                                </button>
                                                                <!-- Modal Detail Transaksi -->
                                                                <div class="modal fade custom-modal"
                                                                    id="detailTransaksiModal-{{ $sampah->no_reff }}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="detailTransaksiModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered"
                                                                        role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title"
                                                                                    id="detailTransaksiModalLabel"><b>Detail
                                                                                    Transaksi {{ $sampah->name }} //
                                                                                    {{ $sampah->no_reff }}</b></h5>
                                                                                <button type="button" class="close"
                                                                                    data-dismiss="modal"
                                                                                    aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <!-- Form Detail Transaksi -->
                                                                                <form action="/update-status"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    <div class="form-group">
                                                                                        <label for="user_id"><b>Id
                                                                                            User</b></label>
                                                                                        <input type="user_id"
                                                                                            class="form-control"
                                                                                            id="user_id" name="user_id"
                                                                                            value="{{ $sampah->user_id }}"
                                                                                            readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="no_reff"><b>No.
                                                                                           
                                                                                            Reff</b></label>
                                                                                        <input type="no_reff"
                                                                                            class="form-control"
                                                                                            id="no_reff" name="no_reff"
                                                                                            value="{{ $sampah->no_reff }}"
                                                                                            readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="status"><b>Status</b></label>
                                                                                        <input type="status"
                                                                                            class="form-control"
                                                                                            id="status" name="status"
                                                                                            value="{{ $sampah->status }}"
                                                                                            readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="name"><b>Nama</b></label>
                                                                                        <input type="name"
                                                                                            class="form-control"
                                                                                            id="name" name="name"
                                                                                            value="{{ $sampah->name }}"
                                                                                            readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="jenis_sampah"><b>Jenis
                                                                                            Sampah</b></label>
                                                                                        <input type="jenis_sampah"
                                                                                            class="form-control"
                                                                                            id="jenis_sampah"
                                                                                            name="jenis_sampah"
                                                                                            value="{{ $sampah->jenis_sampah }}"
                                                                                            readonly>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="berat_sampah"><b>Berat
                                                                                            (kg)</b>
                                                                                        </label>
                                                                                        <input type="berat_sampah"
                                                                                            class="form-control"
                                                                                            id="berat_sampah"
                                                                                            name="berat_sampah"
                                                                                            value="{{ $sampah->berat_sampah }}"
                                                                                            readonly>
                                                                                    </div>
    
                                                                                    <!-- Alamat -->
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="tanggal_pengumpulan"><b>Tanggal</b></label>
                                                                                        <input type="tanggal_pengumpulan"
                                                                                            class="form-control"
                                                                                            id="tanggal_pengumpulan"
                                                                                            name="tanggal_pengumpulan"value="{{ date('Y-m-d') }}"
                                                                                            readonly>
                                                                                    </div>
                                                                                  
                                                                                    <!-- Password -->
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="lokasi"><b>Lokasi</b></label>
                                                                                        <input type="lokasi"
                                                                                            class="form-control"
                                                                                            id="lokasi" name="lokasi"
                                                                                            value="{{ $sampah->lokasi }}"
                                                                                            readonly>
                                                                                   
                                                                                    <!-- Tombol "ACC" -->
                                                                                        @if ($sampah->status != 'disetujui') 
                                                                                        <br>
                                                                                        <!-- Tombol untuk membuka Google Maps -->
                                                                                        <a href="{{ 'https://www.google.com/maps/search/?api=1&query=' . urlencode($sampah->lokasi) }}" target="_blank">Buka Maps</a>

                                                                                        
                                                                                        @endif
                                                                                   
                                                                                </div>
                                                                                <label for="koordinat"><b>Koordinat</b></label>
                                                                                <input type="koordinat"
                                                                                            class="form-control"
                                                                                            id="koordinat" name="koordinat"
                                                                                            value="{{ $sampah->koordinat }}"@if ($sampah->status == 'selesai' || $sampah->status == 'disetujui') readonly @endif>
                                                                                    @if ($sampah->status == 'belum disetujui')
                                                                                    <span style="font-style: italic; font-size: 14px;">* Masukkan koordinat alamat di kolom atas</span>
                                                                                    @endif
                                                                                    <div>
                                                                                        <br>
                                                                            <label for="foto_sampah"><b>Foto
                                                                                    Sampah</b></label>

                                                                        </div>
                                                                       
                                                                        @if ($sampah->foto_sampah)
                                                                            <img src="{{ asset('storage/' . $sampah->foto_sampah) }}"
                                                                                alt="Foto Sampah"
                                                                                style="max-width: 200px; height: auto;">
                                                                        @else
                                                                            <p><i>foto tidak tersedia</i></p>
                                                                        @endif
                                                                                    
                                                                                    <div class="modal-footer">
                                                                                        
                                                                                        <!-- Tombol "ACC" -->
                                                                                        @if ($sampah->status == 'belum disetujui') 
                                                                                   
                                                                                        <button class="btn btn-primary" id="btn-submit">Terima</button>
                                                                                        @endif
                                                                                    </div>
                                                                                </form>
                                                                            </div>
    
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           
    
    
                                                            <a href="{{ route('deleteTransaksi', ['no_reff' => $sampah->no_reff]) }}"
                                                                class="btn btn-danger">Hapus</a>
                                    </div>
                                    </td>
                                    </tr>
            `;
                @if ($sampah->status == 'disetujui')
                    disetujuiRows += row;

                    // Matikan tombol ACC pada konten tab disetujui
                    $('#detailTransaksiModal-{{ $sampah->no_reff }} #btn-acc').prop('disabled', true);

                    // Set elemen input latitude dan longitude menjadi readonly
                @elseif ($sampah->status == 'selesai')
                    // Tambahkan baris untuk tab "selesai"
                    selesaiRows += row;
                @else

                    // Tambahkan baris untuk tab "belum disetujui"
                    belumDisetujuiRows += row;
                @endif
            @endforeach
            // Masukkan data ke dalam tabel yang sesuai

            $('#belumDisetujuiTableBody').html(belumDisetujuiRows);
            $('#disetujuiTableBody').html(disetujuiRows);
            $('#selesaiTableBody').html(selesaiRows);

        });
    </script>




</body>

<script>
    $(document).ready(function() {
        // Check if the alert exists and show it
        if ($('.alert').length) {
            alert($('.alert').text());
        }
    });
</script>
</html>
