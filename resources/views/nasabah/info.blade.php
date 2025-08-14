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
                    <li class="breadcrumb-item text-sm text-light active">Informasi Sampah</li>
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
    <div class="col-lg-12 grid-margin">

        <div class="card-body"
            style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/4860404.jpg'); background-size: cover;box-shadow: 0 15px 15px rgba(0, 0, 0, 0.1);">
            <h4 class="card-title">Informasi Sampah </h4>
            <div>
                <!-- <div class="btn-group" role="group">
                                                                    <a href="{{ route('tambahNasabah') }}" class="btn btn-success">+ Tambah</a>
                                                                    </div> -->
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Jenis Sampah</th>
                            <th>Deskripsi</th>
                            <th>Harga (Rp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>A1</td>
                            <td>Kardus Bagus</td>
                            <td>Kardus warna coklat kering selotip sedikit, kondisi masih bagus</td>
                            <td>1.000 /kg</td>
                        </tr>
                        <tr>
                            <td>A2</td>
                            <td>Kardus Jelek</td>
                            <td>Kardus berwarna, kardus sedikit berminyak, banyak selotip, kondisi rusak</td>
                            <td>900 /kg</td>
                        </tr>
                        <tr>
                            <td>A3</td>
                            <td>Koran</td>
                            <td>Kertas koran masih dalam kondisi baik, tidak basah, tidak terlalu kusut</td>
                            <td>2.800 /kg</td>
                        </tr>
                        <tr>
                            <td>A4</td>
                            <td>HVS</td>
                            <td>Kertas putih, kertas print, bekas skripsi, lembar ujian sekolah, Buku tulis dan paket
                                (non cover)</td>
                            <td>1.600 /kg</td>
                        </tr>
                        <tr>
                            <td>A5</td>
                            <td>Buram</td>
                            <td>Kertas putih kebiruan/keabuan/kekuningan/kecoklatan, LKS, buku tulis/paket bercover, HVS
                                cacah</td>
                            <td>800 /kg</td>
                        </tr>
                        <tr>
                            <td>A6</td>
                            <td>Majalah</td>
                            <td>Majalah dan tabloid bekas</td>
                            <td>600  /kg</td>

                        </tr>
                        <tr>
                            <td>A7</td>
                            <td>Sak Semen</td>
                            <td>Kantong semen segala merek tanpa campuran plastik</td>
                            <td>800 /kg</td>
                        </tr>
                        <tr>
                            <td>A8</td>
                            <td>Duplek</td>
                            <td>Kotak produk makanan bersih (tanpa sisa makanan), kotak susu bubuk, HVS warna, kardus
                                bekas olshop, kalender, kuitansi, buku gambar, kertas full crayon, brosur, dll</td>
                            <td>200 /kg</td>
                        </tr>
                        <tr>
                            <td>B1</td>
                            <td>Botol PET Bening Bersih</td>
                            <td>Botol air minuman putih bening tanpa label tanpa tutup: pucuk, seprit baru, floridian,
                                dll. Galon air minuman sekali pakai berwarna putih bening tanpa label.</td>
                            <td>2.500 /kg</td>
                        </tr>
                        <tr>
                            <td>B2</td>
                            <td>Botol PET Biru Muda Bersih</td>
                            <td>Botol air minuman biru muda bening tanpa label tanpa tutup: akua, indomar, dll. Galon
                                air minuman sekali pakai berwarna biru muda bening tanpa label.</td>
                            <td>2.000 /kg</td>
                        </tr>
                        <tr>
                            <td>B3</td>
                            <td>Botol PET Warna Bersih</td>
                            <td>Botol air minumanberwarna (hijau, biru tua) tanpa label tanpa tutup: seprit lama,
                                mizon,dll</td>
                            <td>1.100 /kg</td>
                        </tr>
                        <tr>
                            <td>B4</td>
                            <td>Botol PET Kotor</td>
                            <td>Botol air minuman masih terdapat label dan tutup, segala warna</td>
                            <td>800 /kg</td>
                        </tr>
                        <tr>
                            <td>B6</td>
                            <td>Botol PET Jelek/Minyak</td>
                            <td>Botol produk berkode 1: bekasjamu,Handsanitizer,kecap, kosmetik, nutribust, milku, botol
                                minyak goreng,dll</td>
                            <td>50 /kg</td>
                        </tr>
                        <tr>
                            <td>C1</td>
                            <td>Tutup Botol Minuman</td>
                            <td>Tutup botol air minuman dalam kemasan (AMDK)</td>
                            <td>1.200 /kg</td>
                        </tr>
                        <tr>
                            <td>C2</td>
                            <td>Tutup Galon</td>
                            <td>Tutup galon air minum bermerk maupun isi ulang</td>
                            <td>1.900 /kg</td>
                        </tr>
                        <tr>
                            <td>C3</td>
                            <td>Tutup Campur</td>
                            <td>Tutup AMDK dan Galon bercampur</td>
                            <td>300 /kg</td>
                        </tr>
                        <tr>
                            <td>E1</td>
                            <td>Gelas PI Bening Bersih</td>
                            <td>Gelas air mineral bening (tanpa label, tanpa sablon, tanpa gelang berwarna)</td>
                            <td>3.000 /kg</td>
                        </tr>
                        <tr>
                            <td>E2</td>
                            <td>Gelas PI Bening Kotor</td>
                            <td>Gelas air mineral bening masih terdapat label ataupun gelang berwarna</td>
                            <td>1.200 /kg</td>
                        </tr>
                        <tr>
                            <td>E3</td>
                            <td>Gelas PI Sablon & Sedotan</td>
                            <td>Gelas minuman bersablon (kopi kekinian, boba, aley2, montay, dst), cincin gelas
                                berwarna, sedotan plastik</td>
                            <td>1.300 /kg</td>
                        </tr>
                        <tr>
                            <td>G1</td>
                            <td>CD</td>
                            <td>Keping CD bekas. VCD, DVD, PS, CD komputer</td>
                            <td>3.100 /kg</td>
                        </tr>
                        <tr>
                            <td>G2</td>
                            <td>Bak/Emberan Fix</td>
                            <td>Plastik bak, ember, baskom, gayung, botol shampo, jirigen, berbagai perabotan plastik,
                                dll. (atom mengambang di air). Bila kategori plastik kode C dan E tidak dipilah akan
                                dikategorikan plastik ini.</td>
                            <td>3.100 /kg</td>
                        </tr>
                        <tr>
                            <td>H1</td>
                            <td>Keras</td>
                            <td>Mainan anak, helm, cover printer, cover TV, kulit kabel, kepala charger, jas hujan, tali
                                plastik, berbagai alat dari plastik, dll (atom tenggelam di air). Bila Kode B dan F
                                tidak dipilah akan dikategorikan plastik ini.</td>
                            <td>1.400 /kg</td>
                        </tr>
                        <tr>
                            <td>H2</td>
                            <td>Bak Campur (Bak Keras)</td>
                            <td>Kategori Bak Campur yang bercampur dengan kategori Keras. Namun bila terlalu banyak
                                kerasnya akan dikategorikan keras.</td>
                            <td>400 /kg</td>
                        </tr>
                        <tr>
                            <td>H3</td>
                            <td>Bak Hitam</td>
                            <td>Bak yang berwarna hitam</td>
                            <td>300 /kg</td>
                        </tr>
                        <tr>
                            <td>H4</td>
                            <td>Plastik Bening</td>
                            <td>Plastik lembaran putih bening tanpa sablon: plastik gula, plastik es, dll</td>
                            <td>500 /kg</td>
                        </tr>
                        <tr>
                            <td>I1</td>
                            <td>Kresek</td>
                            <td>Segala kresek berbagai warna, Bubble warp (selotip sedikit)</td>
                            <td>100 /kg</td>
                        </tr>
                        <tr>
                            <td>I2</td>
                            <td>Sablon Tipis</td>
                            <td>Plastik lembaran tipis bersablon/berwarna: bungkus bening bersabon, bungkus mie instan
                                (tanpa metalis), bungkus gula bermerk, dll</td>
                            <td>100 /kg</td>
                        </tr>
                        <tr>
                            <td>I3</td>
                            <td>Sachet/Kemasan Metalis</td>
                            <td>Plastik lembaran bermetalis: kemasan ciki, permen, wafer. deterjen</td>
                            <td>50 /kg</td>
                        </tr>
                        <tr>
                            <td>I4</td>
                            <td>Karung Kecil/Rusak</td>
                            <td>Plastik karung kapasitas 5kg, 10 kg, 15 kg, 20 kg, 25 Kg, 50 K</td>
                            <td>200 /kg</td>
                        </tr>
                        <tr>
                            <td>I5</td>
                            <td>Sablon Tebal</td>
                            <td>Plastik lembaran tebal slopan: kemasan refill minyak goreng, refill sabun, refill
                                pewangi, refill sabun cuci piring</td>
                            <td>250 /kg</td>
                        </tr>
                        <tr>
                            <td>I6</td>
                            <td>Lembaran Campur</td>
                            <td>Plastik lembaran diatas yang campur-campur akan ditimbang dengan kategori ini</td>
                            <td>50 /kg</td>
                        </tr>
                        <tr>
                            <td>I7</td>
                            <td>Botol Sirup Bagus</td>
                            <td>Botol kaca sirup berbagai merk (makjan, Indofut, ABeCe)</td>
                            <td>80/buah</td>
                        </tr>
                        <tr>
                            <td>J1</td>
                            <td>Botol Kecap/Saos Besar</td>
                            <td>Botol kaca besar kemasan kecap & saos berbagai merk</td>
                            <td>200/buah</td>
                        </tr>
                        <tr>
                            <td>J2</td>
                            <td>Botol Bensin Besar</td>
                            <td>Botol kaca literan bensin</td>
                            <td>700/buah</td>
                        </tr>
                        <tr>
                            <td>J3</td>
                            <td>Botol Bir Bintang Besar</td>
                            <td>Botol kaca bir merk bintang besar</td>
                            <td>400/buah</td>
                        </tr>
                        <tr>
                            <td>J4</td>
                            <td>Botol/Beling Warna</td>
                            <td>Segala botol kaca besar kecil berwarna: kratinkdenk, botol miras, minyak kayu putih, dll
                            </td>
                            <td>50 /kg</td>
                        </tr>
                        <tr>
                            <td>J5</td>
                            <td>Botol/Beling Putih</td>
                            <td>Segala botol kaca besar kecil putih: YuSi1000, minyak tawon, toples kaca bening</td>
                            <td>80 /kg</td>
                        </tr>

                        <!-- Sisipkan baris-baris lainnya di sini -->
                    </tbody>
                </table>

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
