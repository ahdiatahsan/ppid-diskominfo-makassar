<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>PPID Diskominfo Kota Makassar - @yield('title')</title>
    <link rel="icon" href="{{ asset('users/img/logo-public.png') }}" type="image/ico" />
    <link rel="stylesheet" href="{{ asset('users/css/maicons.css') }}">
    <link rel="stylesheet" href="{{ asset('users/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('users/vendor/animate/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('users/css/theme.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('vendor-css')

    <!--begin::php get route -->
    @php

    # Get current request route
    $beranda = request()->routeIs('home');
    $berkala = request()->routeIs('berkalapublic');
    $setiapsaat = request()->routeIs('setiapsaatpublic');
    $sertamerta = request()->routeIs('sertamertapublic');
    $infografis = request()->routeIs('infografispublic');
    $tentang = request()->routeIs('about');

    $informasipublik = ($berkala || $setiapsaat || $sertamerta || $infografis);

    @endphp
    <!--end::php get route -->
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
            <div class="container">
                <a href="{{ route('home') }}" class="navbar-brand" style="text-decoration: none;"><img
                        src="{{ asset('users/img/logo.png') }}" alt=""></a>

                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item {{ ($beranda ? 'active' : '') }}">
                            <a class="nav-link" href="{{ route('home') }}">Beranda</a>
                        </li>
                        <div class="dropdown-navbar" style="display: inline-block;">
                            <li class="nav-item {{ ($informasipublik ? 'active' : '') }}">
                                <button class="nav-link nav-link-dropdown">Informasi Publik <i
                                        class="fa fa-caret-down"></i></button>
                                <div class="dropdown-content nav-item">
                                    <a href="{{ route('berkalapublic') }}">Secara Berkala</a>
                                    <a href="{{ route('setiapsaatpublic') }}">Setiap Saat</a>
                                    <a href="{{ route('sertamertapublic') }}">Serta Merta Informasi</a>
                                    <a href="{{ route('infografispublic') }}">Serta Merta Infografis</a>
                                </div>
                            </li>
                        </div>
                        </li>
                        <li class="nav-item {{ ($tentang ? 'active' : '') }}">
                            <a class="nav-link" href="{{ route('about') }}">Tentang Kami</a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>

        <div class="container">
            @yield('banner')
        </div>
    </header>

    @yield('content')

    <footer class="page-footer bg-image" style="background-color: #081726;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 py-3">
                    <h5>Dinas Komunikasi Dan Informatika Kota Makassar</h5>
                    <p>Pejabat Pengelola Informasi Dan Dokumentasi Diskominfo Kota Makassar.</p>
                </div>
                <div class="col-lg-4 py-3">
                    <h5>Alamat</h5>
                    <ul class="footer-menu">
                        <p>Jl. A. P. Pettarani No.62, Tamamaung, Kec. Panakkukang, Kota Makassar, Sulawesi Selatan 90232
                        </p>
                    </ul>
                </div>
                <div class="col-lg-4 py-3">
                    <h5>Kontak</h5>
                    <a href="#" class="footer-link"><b>Telepon : </b> 0411-4671729</a>
                    <!-- <a href="#" class="footer-link"> diskominfoprovsulsel@gmail.com</a> -->
                    <div class="social-media-button">
                        <a href="https://www.facebook.com/kominfo.id"><span class="mai-logo-facebook-f"></span></a>
                        <a href="https://twitter.com/DiskominfoMKS"><span class="mai-logo-twitter"></span></a>
                        <a href="https://www.instagram.com/diskominfomks/"><span class="mai-logo-instagram"></span></a>
                        <a href="https://www.youtube.com/c/KOMINFOTVKotaMakassar/"><span
                                class="mai-logo-youtube"></span></a>
                    </div>
                </div>
            </div>

            <p class="text-center" id="copyright">Copyright &copy; 2021. Dinas Komunikasi Dan Informatika Kota Makassar
            </p>
        </div>
    </footer>

    <script src="{{ asset('users/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('users/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('users/js/google-maps.js') }}"></script>
    <script src="{{ asset('users/vendor/wow/wow.min.js') }}"></script>

    @yield('vendor-js')

    <!-- <script src="../assets/js/theme.js"></script> -->

</body>

</html>
