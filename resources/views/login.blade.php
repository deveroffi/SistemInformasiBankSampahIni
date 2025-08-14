<!doctype html>
<html lang="en">

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
            width: 200px;
            /* Sesuaikan lebar yang diinginkan */
            margin-left: auto;
            margin-right: auto;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 50px;
            background-color: #28a745;
            /* Warna hijau */
            color: #fff;
            /* Warna teks putih */
            transition: background-color 0.3s ease;
            /* Efek transisi untuk perubahan warna latar belakang */
            display: block;
            /* Membuat tombol menjadi elemen block untuk memastikan horizontal centering */
            text-align: center;
            /* Memusatkan teks di dalam tombol */
            text-decoration: none;
            /* Menghapus garis bawah default pada tautan */
        }

        .button:hover,
        .button:active {
            background-color: #218838;
            /* Warna hijau gelap saat tombol dihover atau di klik */
        }
    </style>
</head>

<body>
    <section class="form-02-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="_lk_de">
                        <div class="form-03-main" style="background-color: #f0f0f0b8; border-radius: 15px;">

                            <img src="theme-assets/images/ico/bss.png" alt="login form" class="img-fluid"
                                style="display: block; margin: 0 auto; border-radius: 50%; width: 200px; height: 200px;">
                            <br>
                            <div class="text-center">
                                <!-- <i class="fas fa-cubes fa-2x me-3" ></i> -->
                                <span class="h1 fw-bold mb-0"style="letter-spacing: 4px"><b>BANK SAMPAH
                                        INI</b></span>
                            </div>
                            <div class="mb-4"></div>
                            <h5 class="text-center fw-normal mb-3 pb-3" style="letter-spacing: 4px;"><b>v 0 .0 .1</b></h5>
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                            <form action="{{ route('actionlogin') }}" method="post">
                                {{ csrf_field() }}

                                <div class="form-group">
                                   <b> <label for="email">Email :</label></b>
                                    <input type="email" name="email" class="form-control _ge_de_ol" type="text"
                                        placeholder="Masukkan Email" required="" aria-required="true">
                                </div>

                                <div class="form-group">
                                    <b><label for="password">Password : </label></b>
                                    <label style="cursor: pointer; margin-left: 240px;">Show </label>
                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" ></span>
                                    
                                    <div class="input-group">

                                        <input id="password" type="password" name="password"
                                            class="form-control _ge_de_ol" placeholder="Enter Password" required
                                            aria-required="true">
                                           
                                    </div>
                                  


                                    {{-- <div class="checkbox form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="">
                                            <label class="form-check-label" for="">
                                                Remember me
                                            </label>
                                        </div>
                                        <a href="#">Forgot Password</a>
                                    </div> --}}

                                    <div class="form-group">
                                        <button type="submit" class="button">Login</button>
                                    </div>

                                    {{-- <div class="form-group nm_lk">
                                    <p>Tidak punya akun silahkan <a
                                            href="{{ route('register') }}"style="color: #00f;"><i>daftar Disini!</i></a>
                                    </p>
                                </div> --}}

                                    <!-- <div class="form-group pt-0">
                  <div class="_social_04">
                    <ol>
                      <li><i class="fa fa-facebook"></i></li>
                      <li><i class="fa fa-twitter"></i></li>
                      <li><i class="fa fa-google-plus"></i></li>
                      <li><i class="fa fa-instagram"></i></li>
                      <li><i class="fa fa-linkedin"></i></li>
                    </ol>
                  </div> -->
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const passwordToggle = document.querySelector('.toggle-password');
            const passwordField = document.querySelector(passwordToggle.getAttribute('toggle'));

            passwordToggle.addEventListener('click', function() {
                const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordField.setAttribute('type', type);
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>

</body>

</html>
