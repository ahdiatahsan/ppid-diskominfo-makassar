<!DOCTYPE html>
<html lang="id">

<!-- begin::Head -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/logo.png') }}" type="image/ico" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PPID Dinas Kominfo Makassar - @yield('title')</title>

    <!--begin::Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap">

    <!--end::Fonts -->

    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ asset('metronic/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('metronic/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->

    <!--begin::Page Vendors Styles(used by this page) -->
    @yield('vendor-css')
    <!--end::Page Vendor Styles -->

    <!--begin::php get route -->
    @php

    # Get current request route
    $dashboard = request()->routeIs('dashboard');
    $berkala = request()->routeIs('berkala*');
    $setiapsaat = request()->routeIs('setiapsaat*');
    $sertamerta = request()->routeIs('sertamerta*');
    $infografis = request()->routeIs('infografis*');
    $profil = request()->routeIs('profil*');

    @endphp
    <!--end::php get route -->

</head>
<!-- end::Head -->

<!-- begin::Body -->

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">

    <!-- begin:: Page -->
    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="#" class="kt-font-brand">
                <b>PPID DISKOMINFO MAKASSAR</b>
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left"
                id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
                    class="flaticon-more"></i></button>
        </div>
    </div>

    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
                id="kt_aside">

                <!-- begin:: Brand -->
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="{{ route('dashboard') }}">
                            <img alt="Logo" src="{{ asset('img/ppid.png') }}" width="100%" />
                        </a>
                    </div>
                </div>

                <!-- end:: Brand -->

                <!-- begin:: Aside Menu -->
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu  kt-aside-menu--dropdown " data-ktmenu-vertical="1"
                        data-ktmenu-dropdown="1" data-ktmenu-scroll="0">
                        <ul class="kt-menu__nav ">
                            <li class="kt-menu__item  kt-menu__item--submenu {{ ($dashboard ? 'kt-menu__item--open kt-menu__item--here' : '') }}"
                                title=" Dashboard">
                                <a href="{{ route('dashboard') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-icon fa fa-home"></i><span
                                        class="kt-menu__link-text">Dashboard</span></a>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu {{ ($berkala ? 'kt-menu__item--open kt-menu__item--here' : '') }}"
                                title=" Berkala">
                                <a href="{{ route('berkala.index') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-icon fa fa-file-contract"></i><span
                                        class="kt-menu__link-text">Berkala</span></a>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu {{ ($setiapsaat ? 'kt-menu__item--open kt-menu__item--here' : '') }}"
                                title=" Setiap Saat">
                                <a href="{{ route('setiapsaat.index') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-icon fa fa-file-pdf"></i><span
                                        class="kt-menu__link-text">Setiap Saat</span></a>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu {{ ($sertamerta ? 'kt-menu__item--open kt-menu__item--here' : '') }}"
                                title=" Serta Merta">
                                <a href="{{ route('sertamerta.index') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-icon fa fa-file-excel"></i><span
                                        class="kt-menu__link-text">Serta Merta</span></a>
                            </li>
                            <li class="kt-menu__item  kt-menu__item--submenu {{ ($infografis ? 'kt-menu__item--open kt-menu__item--here' : '') }}"
                                title=" Infografis">
                                <a href="{{ route('infografis.index') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-icon fa fa-file-image"></i><span
                                        class="kt-menu__link-text">Infografis</span></a>
                            </li>
                            <li class="kt-menu__item kt-menu__item--submenu  kt-menu__item--bottom-1 {{ ($profil ? 'kt-menu__item--open kt-menu__item--here' : '') }}"
                                title=" Profil">
                                <a href="{{ route('profil.index') }}" class="kt-menu__link"><i
                                        class="kt-menu__link-icon fa fa-user-cog"></i><span
                                        class="kt-menu__link-text">Profil</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- end:: Aside Menu -->
            </div>
            <div class="kt-aside-menu-overlay"></div>

            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- begin:: Header -->
                <div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">
                    <div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">

                    </div>
                    <!-- begin:: Header Topbar -->
                    <div class="kt-header__topbar">

                        <!--begin: User bar -->
                        <div class="kt-header__topbar-item kt-header__topbar-item--user">
                            <div class="kt-header__topbar-wrapper" data-offset="10px,0px">
                                <span class="kt-header__topbar-welcome text-right">
                                    {{-- {{ Auth::user()->nama }} --}}
                                </span>
                                {{-- @if (Storage::exists('public/user/' . Auth::user()->foto))
                                <img class="" alt="Pic" src="{{ Storage::url('public/user/' . Auth::user()->foto) }}"
                                />
                                @else --}}
                                <img class="" alt="Pic" src="{{ asset('img/user.png') }}" />
                                {{-- @endif --}}
                                &nbsp; &nbsp;
                                <span class="kt-header__topbar-welcome">
                                    <button type="button" class="btn btn-label btn-label-danger btn-sm btn-bold"
                                        data-toggle="modal" data-target="#logout_modal">Logout</button>
                                </span>
                            </div>
                        </div>

                        <!--end: User bar -->
                    </div>

                    <!-- end:: Header Topbar -->
                </div>

                <!-- Modal -->
                <div class="modal fade" id="logout_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Logout Akun ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-clean" data-dismiss="modal">
                                    <i class="fa fa-reply"></i>Kembali</button>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-sign-out-alt"></i>Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end:: Header -->
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <!-- begin:: Subheader -->
                    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-subheader__main">
                                @yield('subheader-main')
                            </div>
                            <div class="kt-subheader__toolbar">
                                <div class="kt-subheader__wrapper">
                                    <a href="#" class="btn kt-subheader__btn-daterange" data-toggle="kt-tooltip"
                                        title="Tanggal Hari Ini" data-placement="left">
                                        <span class="kt-subheader__btn-daterange-title">Tanggal : </span>&nbsp;
                                        <span class="kt-subheader__btn-daterange-date">{{ date("d/m/Y") }}</span>

                                        <!--<i class="flaticon2-calendar-1"></i>-->
                                        <svg xmlns="{{'http://www.w3.org/2000/svg'}}"
                                            xmlns:xlink="{{'http://www.w3.org/1999/xlink'}}" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--sm">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg> </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                        @include('layouts.partials.alerts')
                        @yield('content')
                    </div>

                    <!-- end:: Content -->
                </div>

                <!-- begin:: Footer -->
                <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-footer__copyright">
                            {{ date('Y') }}&nbsp;&copy;&nbsp;<a href="{{'https://kominfo.sulselprov.go.id/'}}"
                                target="_blank" class="kt-link">Dinas Komunikasi Dan Informatika Kota Makassar</a>
                        </div>
                    </div>
                </div>

                <!-- end:: Footer -->
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>

    <!-- end::Scrolltop -->

</body>

<!-- end::Body -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{ asset('metronic/assets/plugins/global/plugins.bundle.js') }}" type="text/javascript"></script>
<script src="{{ asset('metronic/assets/js/scripts.bundle.js') }}" type="text/javascript"></script>

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
@yield('vendor-js')

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('metronic/assets/js/pages/dashboard.js') }}" type="text/javascript"></script>

@yield('js')
<!--end::Page Scripts -->

</html>
