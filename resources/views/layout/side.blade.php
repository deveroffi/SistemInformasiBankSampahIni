<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow"
    style="border-radius: 15px; background-image:url('theme-assets/images/backgrounds/home - Copy.jpg'); background-size: contain";
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                @if (Auth::user()->role == 'admin')
                    <a class="navbar-brand" href="{{ route('adminhome') }}">
                        <b class="brand-text">HOME</b>
                    </a>
                @endif
                @if (Auth::user()->role == 'user')
                    <a class="navbar-brand" href="{{ route('nasahome') }}">
                        <b class="brand-text">HOME</b>
                    </a>
                @endif
            </li>
            <li class="nav-item d-md-none">
                <a class="nav-link close-navbar"><i class="ft-x"></i></a>
            </li>

        </ul>
    </div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @if (Auth::user()->role == 'admin')
                <li class="nav-item"><a href="{{ route('transaksiMasukNasabah') }}"><i class="ft-home"></i><span
                            class="menu-title" data-i18n="">Transaksi Masuk</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('riwayatTransaksiNasabah') }}"><i class="ft-box"></i><span
                            class="menu-title" data-i18n="">Riwayat Transaksi</span></a>
                </li>
                <!-- <li class=" nav-item"><a href="typography.html"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Riwayat Nasabah</span></a>
          </li> -->
                <li class=" nav-item"><a href="{{ route('listNasabah') }}"><i class="ft-user"></i><span
                            class="menu-title" data-i18n="">Data Nasabah</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('chartNasabah') }}"><i class="ft-pie-chart"></i><span
                            class="menu-title" data-i18n="">Charts</span></a>
                </li>
                </li>
                <li class=" nav-item"><a href="{{ route('rewardNasabah') }}"><i class="ft-credit-card"></i><span
                            class="menu-title" data-i18n="">Reward Nasabah</span></a>
                </li>
            @endif
            @if (Auth::user()->role == 'user')
                <li class="nav-item"><a href="{{ route('transaksi', ['user_id' => Auth::user()->id]) }}">
                        <i class="ft-home"></i></i><span class="menu-title" data-i18n="">Transaksi</span></a>
                </li>
                <li class="nav-item"><a href="{{ route('info') }}">
                        <i class="ft-droplet"></i></i><span class="menu-title" data-i18n="">Informasi
                            Sampah</span></a>
                </li>
                <li class="nav-item"><a href="{{ route('history', ['user_id' => Auth::user()->id]) }}">
                        <i class="ft-box"></i></i><span class="menu-title" data-i18n="">Riwayat</span></a>
                </li>

                <li class=" nav-item"><a href="{{ route('editProfil') }}"><i class="ft-user"></i><span
                            class="menu-title" data-i18n="">Data Nasabah</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('chart') }}"><i class="ft-pie-chart"></i><span
                            class="menu-title" data-i18n="">Charts</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('reward') }}"><i class="ft-credit-card"></i><span
                            class="menu-title" data-i18n="">Reward</span></a>
                </li>
            @endif


            <!-- <li class=" nav-item"><a href="cards.html"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Data Transaksi Nasabah</span></a>
          </li>
          <li class=" nav-item"><a href="buttons.html"><i class="ft-box"></i><span class="menu-title" data-i18n="">Buttons</span></a>
          </li>
          
         
          <li class=" nav-item"><a href="form-elements.html"><i class="ft-layout"></i><span class="menu-title" data-i18n="">Form Elements</span></a>
          </li>
          <li class=" nav-item"><a href="https://themeselection.com/demo/chameleon-admin-template/documentation"><i class="ft-book"></i><span class="menu-title" data-i18n="">Documentation</span></a>
          </li> -->
        </ul>
    </div>

</div>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
