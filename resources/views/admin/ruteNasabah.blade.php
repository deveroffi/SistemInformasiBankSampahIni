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
        #legend {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            width: 200px;
        }

        .legend-item {
            margin-bottom: 5px;
            border-radius: 15px;
            display: flex;
            align-items: center;
        }

        .legend-color {
            width: 20px;
            height: 20px;
            border: 1px solid #000;
            margin-right: 5px;
        }

        .legend-label {
            font-size: 14px;
        }

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

    <!-- End Navbar -->
    <div><!-- Chart -->

        <div class="col-md-12 grid-margin" style="overflow-x: auto;" style="border-radius: 15px;">
            <div class="row">

                <div>
                    <br>
                    <div class="card"
                        style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/4860404.jpg'); background-size: cover;">
                        <div class="card-body">
                            <h4 class="card-title">Rute Penjemputan</h4>
                            <div class="legend-item">
                                <div class="legend-item">

                                    <div class="legend-label"><i>Keterangan : </i></div>&nbsp;&nbsp;

                                </div>
                                <div class="legend-item">
                                    <div class="legend-color" style="background-color: #0000FF; border-radius: 50%;">
                                    </div>
                                    <div class="legend-label"><i> Rute Awal (Biru)</i></div>
                                </div>
                                <div class="legend-item" style="margin-left: 20px;">
                                    <div class="legend-color" style="background-color: #FFFFFF; border-radius: 50%;">
                                    </div>
                                    <div class="legend-label"><i>Rute Selanjutnya (Putih)</i></div>
                                </div>
                                <div class="legend-item" style="margin-left: 20px;">
                                    <div class="legend-color" style="background-color: #FF0000; border-radius: 50%;">
                                    </div>
                                    <div class="legend-label"><i>Rute Terakhir (Merah)</i></div>
                                </div>
                            </div><br>

                            {{-- <div>
                                    <!-- Button untuk mengarahkan ke halaman tampilan PDF -->
                                    <a href="{{ route('cetakTransaksiMasukNasabah') }}" class="btn btn-primary">Cetak
                                    </a>
                                    <br><br>
                                </div> --}}
                            <table class="table table-striped">
                                <!-- Tabel Header -->
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No. Reff</th>
                                        <th>Status</th>
                                        <th>Nama</th>
                                        <th>Tanggal</th>
                                        <th>Lokasi Penjemputan</th>
                                        <th>Koordinat</th>
                                        <th>Jarak (m)</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <!-- Tabel Body -->
                                <tbody>
                                    @foreach ($route as $index => $sampah)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $sampah->no_reff }}</td>
                                            <td style="color: green; font-style: italic;">{{ $sampah->status }}</td>
                                            <td>{{ $sampah->name }}</td>
                                            <td>{{ $sampah->tanggal_pengumpulan }}</td>
                                            <td>{{ $sampah->lokasi }}</td>
                                            <td>{{ $sampah->koordinat }}</td>
                                            <td>{{ number_format(intval($sampah->jarak), 0, ',', '.') }} </td>





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
                                                                            Transaksi{{ $sampah->name }} //
                                                                            {{ $sampah->no_reff }}</b></h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Form Detail Transaksi -->
                                                                    <form action="/update-selesai" method="post">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="user_id"><b>Id
                                                                                    User</b></label>
                                                                            <input type="user_id" class="form-control"
                                                                                id="user_id" name="user_id"
                                                                                value="{{ $sampah->user_id }}"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="no_reff"><b>No.

                                                                                    Reff</b></label>
                                                                            <input type="no_reff" class="form-control"
                                                                                id="no_reff" name="no_reff"
                                                                                value="{{ $sampah->no_reff }}"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="status"><b>Status</b></label>
                                                                            <input type="status" class="form-control"
                                                                                id="status" name="status"
                                                                                value="{{ $sampah->status }}"
                                                                                readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="name"><b>Nama</b></label>
                                                                            <input type="name" class="form-control"
                                                                                id="name" name="name"
                                                                                value="{{ $sampah->name }}" readonly>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="jenis_sampah"><b>Jenis
                                                                                    Sampah</b></label>
                                                                            <input type="jenis_sampah"
                                                                                class="form-control" id="jenis_sampah"
                                                                                name="jenis_sampah"
                                                                                value="{{ $sampah->jenis_sampah }}"
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
                                                                                value="{{ $sampah->berat_sampah }}">
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
                                                                            <label for="lokasi"><b>Lokasi</b></label>
                                                                            <input type="lokasi" class="form-control"
                                                                                id="lokasi" name="lokasi"
                                                                                value="{{ $sampah->lokasi }}"
                                                                                readonly>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label
                                                                                for="koordinat"><b>Koordinat</b></label>
                                                                            <input type="koordinat"
                                                                                class="form-control" id="koordinat"
                                                                                name="koordinat"
                                                                                value="{{ $sampah->koordinat }}"
                                                                                readonly>
                                                                        </div>


                                                                        <div>
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
                                                                        <br>
                                                                        <div class="form-group">
                                                                            <label
                                                                                for="catatan"><b>Catatan</b></label>
                                                                            <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class="btn btn-primary"
                                                                                id="btn-submit">Selesai</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                        </div>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        </table>
                        <br>

                        <table class="table table-striped">
                            <!-- Tabel Header -->
                            <thead>
                            </thead>
                            <!-- Tabel Body -->
                            <tbody>
                                <div id="map" style="height: 800px; width: 100%;"></div>
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
    <!-- Di dalam view Anda -->

    <script>
        $(document).ready(function() {
            $('#btn-submit').click(function() {
                // Mengambil data dari form
                var formData = $('#updateStatusForm').serialize();

                // Kirim permintaan AJAX untuk memperbarui status
                $.ajax({
                    type: 'POST',
                    url: '/update-selesai', // Ganti dengan URL rute Anda
                    data: formData,
                    success: function(response) {
                        console.log(response);
                        // Jika sukses, tutup modal dan lakukan hal lainnya
                        $('#detailTransaksiModal-{{ $sampah->no_reff }}').modal('hide');
                        // Misalnya, tampilkan pesan sukses atau muat ulang halaman
                        // location.reload(); // Contoh: muat ulang halaman
                    },
                    error: function(xhr, status, error) {
                        // Jika terjadi kesalahan, tangani di sini
                        console.error(error);
                    }
                });
            });
        });
    </script>


    {{-- <script>
        // Inisialisasi variabel global untuk peta
        var mapInitialized = false;

        // Fungsi untuk menggambar peta
        function initMap() {
            // Periksa apakah peta sudah dibuat sebelumnya
            if (!mapInitialized) {
                // Koordinat tengah peta
                var center = {
                    lat: -7.322191655237305,
                    lng: 112.73470170620698
                };

                // Membuat objek peta baru
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 13, // Zoom level
                    center: center // Pusat peta
                });

                // Membuat array untuk koordinat Polyline
                var polylineCoordinates = [];
                var distances = [];

                // Mengisi array koordinat dari data di PHP
                @foreach ($route as $lokasi)
                    var koordinat = '{{ $lokasi->koordinat }}';
                    var koordinatArray = koordinat.split(',');

                    var latitude = parseFloat(koordinatArray[0]);
                    var longitude = parseFloat(koordinatArray[1]);

                    // Tambahkan titik pada Polyline
                    polylineCoordinates.push({
                        lat: latitude,
                        lng: longitude
                    });

                    // Tambahkan marker (titik hitam) pada setiap titik koordinat
                    var marker = new google.maps.Marker({
                        position: {
                            lat: latitude,
                            lng: longitude
                        },
                        map: map,
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: 5, // Ukuran marker
                            fillColor: '#000', // Warna marker (hitam)
                            fillOpacity: 1, // Opasitas marker (0.0 - 1.0)
                            strokeWeight: 0 // Tidak ada garis tepi
                        }
                    });

                    distances.push(parseFloat('{{ $lokasi->jarak }}'));
                @endforeach

                // Temukan jarak terkecil dan terbesar
                var minDistance = Math.min(...distances);
                var maxDistance = Math.max(...distances);

                // Tambahkan marker dengan warna yang sesuai
                @foreach ($route as $lokasi)
                    var koordinat = '{{ $lokasi->koordinat }}';
                    var koordinatArray = koordinat.split(',');

                    var latitude = parseFloat(koordinatArray[0]);
                    var longitude = parseFloat(koordinatArray[1]);
                    var distance = parseFloat('{{ $lokasi->jarak }}');


                    // var color;
                    // if ($index == 0) {
                    //     color = '#0000FF'; // Warna biru untuk titik awal
                    // } else if ($index == $Sampah.length - 1) {
                    //     color = '#FF0000'; // Warna merah untuk titik akhir
                    // } else {
                    //     color = '#FFFFFF'; // Warna putih untuk titik-titik lainnya
                    // }

                    var color;

                    if (distance === minDistance) {
                        color = '#0000FF'; // Warna biru untuk titik dengan jarak terkecil
                    } else if (distance === maxDistance) {
                        color = '#FF0000'; // Warna merah untuk titik dengan jarak terbesar
                    } else {
                        color = '#FFFFFF'; // Warna putih untuk titik-titik lainnya
                    }

                    var marker = new google.maps.Marker({
                        position: {
                            lat: latitude,
                            lng: longitude
                        },
                        map: map,
                        icon: {
                            path: google.maps.SymbolPath.CIRCLE,
                            scale: 6, // Ukuran marker
                            fillColor: color, // Warna marker sesuai kondisi
                            fillOpacity: 1, // Opasitas isi marker
                            strokeWeight: 2, // Ketebalan garis tepi marker
                            strokeColor: '#000000' // Warna garis tepi marker (hitam)
                        },
                        draggable: false, // Marker tidak bisa di-drag
                        animation: google.maps.Animation.DROP // Animasi jatuh ketika ditampilkan
                    });
                @endforeach

                // Membuat objek Polyline
                var polyline = new google.maps.Polyline({
                    path: polylineCoordinates, // Array koordinat
                    geodesic: true, // Jika true, menggunakan garis lurus yang melengkung sesuai dengan permukaan bumi
                    strokeColor: '#FF0000', // Warna garis Polyline
                    strokeOpacity: 1.0, // Opasitas garis Polyline (0.0 - 1.0)
                    strokeWeight: 2 // Ketebalan garis Polyline
                });

                // Menambahkan Polyline ke peta
                polyline.setMap(map);

                // Set variabel mapInitialized menjadi true
                mapInitialized = true;
            }
        }

        // Panggil fungsi initMap saat halaman dimuat
        window.onload = initMap;
    </script> --}}
    <script>
        // Fungsi untuk menggambar peta
        function initMap() {
            var center = {
                lat: -7.322191655237305,
                lng: 112.73470170620698
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 13,
                center: center
            });

            var polylineCoordinates = [];
            var locations = @json($route);

            locations.forEach((lokasi, index) => {
                var koordinatArray = lokasi.koordinat.split(',');
                var latitude = parseFloat(koordinatArray[0]);
                var longitude = parseFloat(koordinatArray[1]);
                polylineCoordinates.push({
                    lat: latitude,
                    lng: longitude
                });

                var color;
                if (index === 0) {
                    color = '#0000FF'; // Warna biru untuk titik pertama
                } else if (index === locations.length - 1) {
                    color = '#FF0000'; // Warna merah untuk titik terakhir
                } else {
                    color = '#FFFFFF'; // Warna putih untuk titik-titik lainnya
                }

                var marker = new google.maps.Marker({
                    position: {
                        lat: latitude,
                        lng: longitude
                    },
                    map: map,
                    icon: {
                        path: google.maps.SymbolPath.CIRCLE,
                        scale: 6,
                        fillColor: color,
                        fillOpacity: 1,
                        strokeWeight: 2,
                        strokeColor: '#000000'
                    },
                    draggable: false,
                    animation: google.maps.Animation.DROP
                });
            });

            var polyline = new google.maps.Polyline({
                path: polylineCoordinates,
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 2
            });

            polyline.setMap(map);
        }

        // Panggil fungsi initMap saat halaman dimuat
        window.onload = initMap;
    </script>

    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbXF62gVyhJOVkRiTHcVp_BkjPYDQfH5w&callback=initMap" async
        defer></script>




</body>

</html>
