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
                    <li class="breadcrumb-item text-sm text-light active">Chart</li>
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
                            <a class="dropdown-item" href="#"><i class="ft-check-square"></i>Edit Profil</a>
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
                <div class="col-md-12 grid-margin" style="overflow-x: auto;">

                    <div class="row">
                        <div class="col-md-12 grid-margin">
                            <div class="col-lg-12 grid-margin">
                                <div class="card" style="border-radius: 40px;">
                                    <div class="card-body">
                                        <div class="card pull-up ecom-card-1 bg-white">
                                            <div class="card-content ecom-card2 heigt 500">
                                                <div class="card-body">
                                                    <div class="container">
                                                        <div class="justify-content-center">
                                                            <div class="col-xl-6 col-lg-12">
                                                                <div
                                                                    style="border: 1px solid black; border-radius: 40px; overflow: hidden; background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover; padding: 10px;width: 835px; box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1); ">
                                                                    <br>
                                                                    <h4 class="card-title">Transaksi Anda</h4>
                                                                    <h6 class="card-subtitle text-muted">Jenis Sampah
                                                                    </h6>
                                                                    <canvas
                                                                        id="barChartPerTanggal"style="margin-top: 250px;"></canvas>

                                                                </div>
                                                            </div>

                                                        </div>
                                                        <br>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-xl-6 col-lg-12">
                                                                <div
                                                                    style="border: 1px solid black; border-radius: 40px; overflow: hidden; background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover; padding: 10px; height: 620px;">
                                                                    <br>
                                                                    <h4 class="card-title">Transaksi Anda</h4>
                                                                    <h6 class="card-subtitle text-muted">Jumlah
                                                                    </h6>
                                                                    <canvas id="chartNasabah"></canvas>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6 col-lg-12">
                                                                <div
                                                                    style="border: 1px solid black; border-radius: 40px; overflow: hidden; background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover; padding: 10px; height: 620px;">
                                                                    <br>
                                                                    <h4 class="card-title">Transaksi Anda</h4>
                                                                    <h6 class="card-subtitle text-muted">Status</h6>
                                                                    <canvas id="pieChart"></canvas>
                                                                </div>
                                                                {{-- <div
                                                                    style="border: 1px solid black; border-radius: 40px; overflow: hidden; background-image: url('theme-assets/images/backgrounds/card.png'); background-size: cover; padding: 10px; height: 620px;">
                                                                    <br>
                                                                    <h4 class="card-title">Jumlah Pengguna</h4>
                                                                    <h6 class="card-subtitle text-muted">Pengguna</h6>
                                                                    <canvas id="pieChartPengguna"></canvas>
                                                                </div> --}}
                                                            </div>

                                                        </div>

                                                    </div>




                                                </div>


                                            </div>
                                            {{-- <div
                                                class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                                                <span class="float-left">Detail</span>

                                            </div> --}}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Memasukkan library Chart.js -->
                <script>
                    var ctx = document.getElementById('chartNasabah').getContext('2d');
                    var data = {
                        labels: ['Plastik', 'Kertas', 'Lainnya'],
                        datasets: [{
                            data: [{{ $totalSampahPlastik }}, {{ $totalSampahKertas }}, {{ $totalSampahLainnya }}],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.5)',
                                'rgba(75, 192, 192, 0.5)',
                                'rgba(54, 162, 235, 0.5)'

                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    };
                    var myPieChart = new Chart(ctx, {
                        type: 'pie',
                        data: data,
                        options: {}
                    });
                </script>

                <script>
                    // Data total transaksi dari PHP
                    var data = @json($totalTransaksi);

                    // Extract nama dan total transaksi dari data
                    var nama = data.map(item => item.name);
                    var totalTransaksi = data.map(item => item.total_transaksi);

                    // Setup data untuk chart
                    var chartData = {
                        labels: nama,
                        datasets: [{
                            label: 'Total Transaksi',
                            backgroundColor: [ // Warna background data
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(0, 0, 0, 0.2)',
                                'rgba(255, 255, 255, 0.2)'
                            ],
                            borderColor: [ // Warna border data
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(201, 203, 207, 0.2)',
                                'rgba(0, 0, 0, 0.2)',
                                'rgba(255, 255, 255, 0.2)'
                            ],

                            borderWidth: 1,
                            data: totalTransaksi,
                        }]
                    };

                    // Setup options untuk chart
                    var chartOptions = {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true, // Mulai label dari nilai 0
                                    stepSize: 10, // Langkah besar nilai
                                    max: 100, // Nilai maksimum sumbu Y
                                }
                            }]
                        }
                    };

                    // Buat bar chart
                    var ctx = document.getElementById('barChart').getContext('2d');
                    var myBarChart = new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: chartOptions
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



                {{-- <script>
                    // Data jumlah pengguna berdasarkan peran dari PHP
                    var data = {
                        labels: ['Admin', 'Nasabah'],
                        datasets: [{
                            data: [{{ $totalAdmin }}, {{ $totalUser }}],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)', // Warna untuk Admin
                                'rgba(54, 162, 235, 0.7)', // Warna untuk User
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                            ],
                            borderWidth: 1
                        }]
                    };

                    // Setup options untuk chart
                    var options = {
                        responsive: true,
                        title: {
                            display: true,
                            text: 'Total Pengguna'
                        }
                    };

                    // Buat pie chart
                    var ctx = document.getElementById('pieChartPengguna').getContext('2d');
                    var myPieChart = new Chart(ctx, {
                        type: 'pie',
                        data: data,
                        options: options
                    });
                </script> --}}

                <script>
                    // Ambil data dari controller
                    var belumDisetujui = {{ $belumDisetujui }};
                    var disetujui = {{ $disetujui }};
                    var selesai = {{ $selesai }};

                    // Buat diagram lingkaran
                    var ctx = document.getElementById('pieChart').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: ['Belum Disetujui', 'Disetujui', 'Selesai'],
                            datasets: [{
                                label: 'Jumlah Sampah',
                                data: [belumDisetujui, disetujui, selesai],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.5)',
                                    'rgba(54, 162, 235, 0.5)',
                                    'rgba(75, 192, 192, 0.5)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(75, 192, 192, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
</body>

</html>



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
