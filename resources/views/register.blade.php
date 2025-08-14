
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

     <title>Bank Sampah Ini</title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
    <style>
      /* Menambahkan padding dan memodifikasi font */
      .button {
            width: 200px; /* Sesuaikan lebar yang diinginkan */
            margin-left: auto;
            margin-right: auto;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 50px;
            background-color: #28a745; /* Warna hijau */
            color: #fff; /* Warna teks putih */
            transition: background-color 0.3s ease; /* Efek transisi untuk perubahan warna latar belakang */
            display: block; /* Membuat tombol menjadi elemen block untuk memastikan horizontal centering */
            text-align: center; /* Memusatkan teks di dalam tombol */
            text-decoration: none; /* Menghapus garis bawah default pada tautan */
        }

        .button:hover,
        .button:active {
            background-color: #218838; /* Warna hijau gelap saat tombol dihover atau di klik */
        }


/* Menambahkan border-radius */


    </style>

</head>

<body>
<section class="form-02-main">
<section class="form-02-main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="_lk_de">
            <div class="form-03-main" style="background-color: #f0f0f0; border-radius: 15px;">
            <img src="theme-assets/images/ico/bss.png" alt="login form" class="img-fluid" style="display: block; margin: 0 auto; border-radius: 50%; width: 200px; height: 200px;">
<br>
<div class="text-center">
    <!-- <i class="fas fa-cubes fa-2x me-3" ></i> -->
    <span class="h1 fw-bold mb-0"style="letter-spacing: 4px"><b>BANK SAMPAH SYARIAH</b></span>
</div>
<div class="mb-4"></div>
<h5 class="text-center fw-normal mb-3 pb-3" style="letter-spacing: 4px;"><b>UINSA Surabaya</b></h5>
                                        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{route('actionregister')}}" method="get">
            @csrf

           

                <div class="input-group mb-3">
                                            <input type="name" class="form-control" name="name" placeholder="Nama">
                                            
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="email" class="form-control" name="email" placeholder="Email">
                                            
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="alamat" class="form-control" name="alamat" placeholder="Alamat">
                                           
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="telepon" class="form-control" name="telepon" placeholder="No. Telepon">
                                            
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                            
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="role" class="form-control" name="role" placeholder="role">
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-8">
                                                <div class="icheck-primary">

                                                </div>
                                            </div>
                                            <!-- /.col -->
                                            <div class="form-group">
                <button type="submit" class="button">Register</button>
                </div>
                                            <div>
    </div>
                                            <div>
                                            <p class="text-center">sudah punya akun silahkan <a href="{{ route('login') }}"style="color: #00f;"><i>login  Disini!</i></p>
                                            </div>

                                            <div>
                                          


</body>

</html>