<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
    <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Bank Sampah UINSA Surabaya</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-size: 5pt;
        }
        hr {
            border: none;
            border-top: 1px solid #000; /* Warna garis bisa disesuaikan */
        }
        footer {
            position: fixed; /* Menjadikan footer posisi tetap */
            bottom: 0; /* Menempatkan footer di bagian bawah */
            width: 100%; /* Lebar footer mengikuti lebar halaman */
            text-align: center; /* Teks di tengah */
            padding: 10px; /* Ruang padding */
            
        }
        .content {
            margin-top: 20px; /* Atur margin atas sebesar 50 piksel */
        }
        footer {
            display: flex; /* Menggunakan flexbox */
            justify-content: space-between; /* Menempatkan elemen di sisi kanan dan kiri */
            align-items: center; /* Menyelaraskan elemen vertikal di tengah */
          
            padding: 10px;
        }
    </style>
  </head>
  <body>
    <header style="text-align: left;">
        {{-- <img src="theme-assets/images/ico/bss.png" alt="Logo" style="width: 190px; height: auto; border-radius: 100px;"><br> --}}
    
        <h4>Bank Sampah Syariah</h4>
        <h5>Universitas Islam Negeri Sunan Ampel Surabaya</h5>
        <i><p>Jl. Kendangsari Gg III/50 Kec. Tenggilis Mejoyo Sby - 031-8438369</p></i>
        <hr>
    </header>
                                   <div style="overflow-x: auto;" style="border-radius: 15px;">
                                            <div class="row" class="content">
                                        
                                                 <div class="card" style="border-radius: 15px;background-image: url('theme-assets/images/backgrounds/4860404.jpg'); background-size: cover;">
                                          <div class="card-body" >
                                                  <h5 class="card-title">Reward Nasabah</h5>
                                                             <h7 class="card-title">Bank Sampah Syariah UINSA Surabaya /</h7>
                                                             <small class="text-muted">
                                                    <i>{{ \Carbon\Carbon::now()->format('Y-m-d H:i:s') }}</i>
                                                </small>
                                                <table class="table table-striped">
                                                                    <thead>
                                                                        <tr><b>
                                                                            <th>No.</th>
                                                                            <th>Nama</th>
                                                                            <th>Email</th>
                                                                            <th>Alamat</th>
                                                                            <th>Telepon</th>
                                                                            <th>Jumlah Transaksi</th>
                                                                            <th>Saldo</th>
                                                                            
                                                                    </b> </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach($nasabah as $index => $dataNasabah)
                                                                            @php
                                                                            // Mendapatkan informasi pengguna (nasabah) berdasarkan user_id
                                                                            $nasabahInfo = App\Models\User::find($dataNasabah->user_id);
                                                                            @endphp
                                                                            <tr>
                                                                                <td></td>
                                                                                <td>{{ $index + 1 }}</td>
                                                                                <td>{{ $nasabahInfo->name }}</td>
                                                                                <td>{{ $nasabahInfo->email }}</td>
                                                                                <td>{{ $nasabahInfo->alamat }}</td>
                                                                                <td>{{ $nasabahInfo->telepon }}</td>
                                                                                <td>{{ $dataNasabah->total_transaksi }}</td>
                                                                                <td>{{ $nasabahInfo->saldo}}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                            
                                                                     </table>
                                                                    </div>
                                                                  </div>
                                                                 </div>
                                                                </div>
                                                             
                                <footer class="footer footer-static footer-light navbar-border navbar-shadow">
                                <hr>
      </div>

      <div class="left">
      <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block">Bank Sampah Syariah  &copy; UINSA Surabaya <i><p>Jl. Kendangsari Gg III/50 Kec. Tenggilis Mejoyo Sby - 031-8438369</p></i></span>
       
    </div>
    <div class="right">
    <a class="float-md-right d-block d-md-inline-block" class="text-bold-800 grey darken-2">2024</a></span>
    </div>
    </footer>
  </body>
</html>