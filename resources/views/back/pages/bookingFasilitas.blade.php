<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--====== Title ======-->
    <title>SIPINTAS PLUS</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--====== Favicon Icon ======-->
    <link rel="icon" type="image/x-icon" href="/back/image/logo/logo.png">

    <!--====== CSS Files LinkUp ======-->
    <link rel="stylesheet" href="/landing/assets/css/animate.css" />
    <link rel="stylesheet" href="/landing/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="/landing/assets/css/lineIcons.css" />
    <link rel="stylesheet" href="/landing/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/landing/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/locales/id.global.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    <style>
        .alert-card {
            background-color: #d9534f;
            /* Warna merah */
            color: #fff;
            /* Warna teks putih */
            padding: 10px;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            text-align: center;
            max-width: 500px;
            margin: 20px 0; /* Hanya margin atas dan bawah, tidak ada margin kiri-kanan */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .alert-card h3 {
            color: #fff;
            margin-top: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .alert-card p {
            color: #fff;
            margin: 0;
            font-size: 16px;
        }

        .disabled-input {
            pointer-events: none;
            background-color: #e9ecef;
            /* Optional: Change background to indicate disabled state */
            cursor: not-allowed;
        }

        .flatpickr-input {
            border: 1px solid #ced4da;
            border-radius: .375rem;
            padding: .375rem .75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            display: block;
            width: 100%;
        }

        .flatpickr-input:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 .2rem rgba(38, 143, 255, .25);
        }

        /* Warna Keterangan Calender */
        .color-legend {
            list-style: none;
            padding: 0;
            display: flex;
            gap: 15px;
        }

        .color-legend li {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .color-circle {
            display: inline-block;
            width: 15px;
            height: 15px;
            margin-right: 10px;
            border: 1px solid #ccc;
        }

        .color-text {
            font-size: 16px;
        }

        .input-container {
            display: flex;
            gap: 10px;

        }

        .input-container .form-control {
            flex: 1;
            background-color: white;
        }

        /* Swiper */
        .header-bg {
            position: relative;
            z-index: 5;
            background-position: bottom center;
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
        }

        .fc-col-header-cell-cushion {
            display: inline-block; // x-browser for when sticky (when multi-tier header)
            padding: 2px 4px;
        }

        .calendar-wrapper .fc-daygrid-event-dot {
            display: none;
        }

        .calendar-wrapper .fc-event {
            padding: 2px 4px;
            color: #fff;
        }

        .fc-daygrid-day-number {
            color: #1b1b1b !important;
            /* Mengubah warna angka tanggal menjadi hitam */
        }

        .fc-col-header-cell {
            color: #000000 !important;
            /* Mengubah warna teks hari dalam kalender mingguan */
        }

        .fc-button {
            color: #000000;
            /* Mengubah warna teks tombol menjadi hitam */
        }

        .fc-button-primary {
            padding-left: 10px !important;
            background-color: #ffffff !important;
            color: #007bff !important;
            /* Mengubah warna latar tombol menjadi hitam */
            border-color: #007bff !important;
            /* Mengubah warna border tombol menjadi hitam */
        }

        .fc-button-primary:not(:disabled):active,
        .fc-button-primary:not(:disabled).fc-button-active {
            background-color: #007bff !important;
            /* Mengubah warna latar tombol yang aktif menjadi hitam */
            color: white !important;
            /* Mengubah warna border tombol yang aktif menjadi hitam */
        }

        .fc-daygrid-day-name {
            color: #000000;
            /* Mengubah warna angka tanggal menjadi hitam */
        }

        .fc-daygrid-day-number {
            color: #000000;
            /* Mengubah warna angka tanggal menjadi hitam */
        }

        .fc-daygrid-month-number {
            color: #000000;
            /* Mengubah warna angka tanggal menjadi hitam */
        }

        .fc-event-danger {
            background-color: #ff4d4d !important;
            border-color: #ff4d4d !important;
            color: white !important;
        }

        .fc-event-primary {
            background-color: #007bff !important;
            border-color: #007bff !important;
            color: white !important;
        }

        .fc-event-warning {
            background-color: #ffc107 !important;
            border-color: #ffc107 !important;
            color: white !important;
        }

        .fc-event-info {
            background-color: #17a2b8 !important;
            border-color: #17a2b8 !important;
            color: white !important;
        }

        .fc-event-success {
            background-color: #28a745 !important;
            border-color: #28a745 !important;
            color: white !important;
        }


        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 100%;
            height: 700px;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .info {
            width: 100%;
            padding: 8px 0;
            background-color: rgb(0, 0, 0, 0.6);
            position: absolute;
            bottom: 0;
            text-align: justify;
            border-radius: 0 0 5px 5px;
        }

        .info h3 {
            font-size: 15px;
            margin-left: 7px;
            font-weight: 100px;
            color: #fff;
        }

        .info p {
            font-size: 10x;
            margin-left: 7px;
            color: #fff;
        }

        .info a {
            text-decoration: none;
            color: #fff;
            float: right;
            margin-right: 7px;
            margin-top: -40px;
            border: 1px solid #fff;
            border-radius: 20px;
            font-size: 20px;
            padding: 2px 8px;
        }

        *,
        *:after,
        *:before {
            box-sizing: border-box;
        }

        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
            user-select: none;

            &>* {
                margin: 0 10px 10px 30px;
            }
        }

        .checkbox-group-legend {
            font-size: 30px;
            font-weight: bolder;
            color: #000000;
            text-align: center;
            line-height: 1.125;
            margin-bottom: 1.25rem;
        }

        .checkbox-input {
            clip: rect(0 0 0 0);
            clip-path: inset(100%);
            height: 1px;
            overflow: hidden;
            position: absolute;
            white-space: nowrap;
            width: 1px;

            &:checked+.checkbox-tile {
                border-color: #52dc97;
                box-shadow: 0 5px 10px rgba(#000, 0.1);
                color: #52dc97;

                &:before {
                    transform: scale(1);
                    opacity: 1;
                    background-color: #00ab55;
                    border-color: #00ab55;
                }

                .checkbox-icon,
                .checkbox-label {
                    color: #00ab55;
                }
            }

            &:focus+.checkbox-tile {
                border-color: #00ab55;
                box-shadow: 0 5px 10px rgba(#000, 0.1), 0 0 0 4px #b5c9fc;

                &:before {
                    transform: scale(1);
                    opacity: 1;
                }
            }
        }


        .checkbox-tile {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 7rem;
            min-height: 7rem;
            border-radius: 0.5rem;
            border: 2px solid #b5bfd9;
            background-color: #fff;
            box-shadow: 0 5px 10px rgba(#000, 0.1);
            transition: 0.15s ease;
            cursor: pointer;
            position: relative;

            &:before {
                content: "";
                position: absolute;
                display: block;
                width: 1.25rem;
                height: 1.25rem;
                border: 2px solid #b5bfd9;
                background-color: #fff;
                border-radius: 50%;
                top: 0.25rem;
                left: 0.25rem;
                opacity: 0;
                transform: scale(0);
                transition: 0.25s ease;
                background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='192' height='192' fill='%23FFFFFF' viewBox='0 0 256 256'%3E%3Crect width='256' height='256' fill='none'%3E%3C/rect%3E%3Cpolyline points='216 72.005 104 184 48 128.005' fill='none' stroke='%23FFFFFF' stroke-linecap='round' stroke-linejoin='round' stroke-width='32'%3E%3C/polyline%3E%3C/svg%3E");
                background-size: 12px;
                background-repeat: no-repeat;
                background-position: 50% 50%;
            }

            &:hover {
                border-color: #00ab55;

                &:before {
                    transform: scale(1);
                    opacity: 1;
                }
            }
        }

        .checkbox-icon {
            transition: .375s ease;
            color: #494949;

            svg {
                width: 3rem;
                height: 3rem;
            }
        }

        .checkbox-label {
            color: #707070;
            transition: .375s ease;
            text-align: center;
        }

        .slider-penyewaan {
            overflow: hidden;
            height: 450px;
            margin: 0 50px 0;
        }

        .penyewaan {
            overflow: hidden;
            background: whitesmoke;
            border-radius: 20px;
            transition: 0.5s;
        }

        picture a {
            width: 100%;
            height: 85%;
            display: flex;
            overflow: hidden;
            margin-bottom: 5px;
        }

        picture a img {
            width: 100%;
            object-fit: cover;
        }

        .detail {
            text-align: center;
            height: 50px;
            font-size: 20px;
        }

        .slider-penyewaan .swiper-pagination-bullet {
            background: #00ab55;
            height: 15px;
            width: 15px;
        }

        .slider-penyewaan .swiper-slide-button {
            color: #00ab55;
            margin-top: -50px;
        }

        .judul-satu {
            font-size: 30px;
        }

        .judul-satu span {
            font-weight: lighter;
        }

        .area-satu {
            padding: 40px 0 40px;
            -webkit-box-shadow: 0px 0px 18px 0px rgba(50, 77, 215, 0.14);
            box-shadow: 0px 0px 18px 0px rgba(50, 77, 215, 0.14);
            border-radius: 10px;
        }

        .info-peminjaman {
            display: flex;
            align-items: center;
        }

        .info-peminjaman img {
            padding-right: 30px;
        }

        .info-peminjaman .text {
            padding-top: 10px;
        }

        @media only screen and (min-width: 765px) and (max-width: 1199px) {
            .judul-satu {
                font-size: 25px;
            }

            .info-peminjaman .banner-satu img {
                width: 750px;
                padding-right: 10px;
            }

            .info-peminjaman .banner-tiga img {
                width: 500px;
                padding-right: 10px;
            }

            .calendar-wrapper .fc-toolbar-title {
                font-size: 30px !important;
            }
        }

        @media (max-width: 767px) {

            .area-satu {
                padding: 10px 30px 10px;
            }

            .judul-satu {
                font-size: 18px;
            }

            .judul-dua {
                font-size: 16px;
            }

            .navbar-brand {
                width: 90px;
            }

            .swiper-slide {
                width: 100%;
                height: auto;
                padding-bottom: 0;
            }

            .info h3 {
                font-size: 12px;
            }

            .info p {
                font-size: 10px;
            }

            .info a {
                font-size: 15px;
            }

            .checkbox-group {
                &>* {
                    margin: 0 10px 10px 10px;
                }
            }

            .checkbox-group-legend {
                font-size: 20px;
            }

            .checkbox-tile {
                width: 5rem;
                min-height: 4rem;
            }

            .checkbox-icon {
                transition: .375s ease;
                color: #494949;

                svg {
                    padding-top: 15px;
                    width: 2rem;
                }
            }

            .checkbox-label {
                font-size: 13px;
                color: #707070;
                transition: .375s ease;
                text-align: center;
                padding-top: -80px;
            }

            .brand-area {
                padding-top: 0px;
            }

            .slider-penyewaan {
                height: 390px;
                margin: 0;
            }

            picture {
                width: 100%;
                height: 80%;
                display: flex;
                overflow: hidden;
                margin-bottom: 5px;
            }

            .detail p {
                padding-left: 10px;
                font-size: 13px;
            }

            .slider-penyewaan .swiper-pagination-bullet {
                height: 10px;
                width: 10px;
            }

            .info-peminjaman img {
                width: 600px;
                padding-right: 10px;
            }

            .info-peminjaman .banner-satu img {
                width: 750px;
                padding-right: 10px;
            }

            .info-peminjaman .banner-tiga img {
                width: 500px;
                padding-right: 10px;
            }

            .banner-try {
                display: none;
            }

            .panel-card {
                padding: 5px;
            }

            .calendar-wrapper .fc-toolbar {
                flex-direction: column !important;
            }

            .calendar-wrapper .fc-toolbar .fc-toolbar-chunk {
                margin-top: 16px;
            }

            .calendar-wrapper .fc-toolbar .fc-toolbar-chunk:first-child {
                margin-top: 0 !important;
            }

            .calendar-wrapper .fc-toolbar-title {
                font-size: 20px;
            }

            .calendar-wrapper .fc .fc-popover {
                z-index: 10;
            }

            .calendar-wrapper .fc-event {
                padding: 2px 4px;
                color: #fff;
            }

            .calendar-wrapper .fc-timegrid-event-harness-inset .fc-timegrid-event {
                box-shadow: none;
                overflow: hidden;
            }

            .calendar-wrapper .fc-daygrid-event-dot {
                display: none;
            }

            .calendar-wrapper .fc-daygrid-dot-event {
                border-width: 1px;
            }

            .calendar-wrapper .fc-event-time {
                flex-shrink: 0;
            }
        }
    </style>

</head>

<body>
    <!--[if IE]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!--====== PRELOADER PART START ======-->
    <div class="preloader">
        <div class="loader">
            <div class="spinner">
                <div class="spinner-container">
                    <div class="spinner-rotator">
                        <div class="spinner-left">
                            <div class="spinner-circle"></div>
                        </div>
                        <div class="spinner-right">
                            <div class="spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== PRELOADER PART ENDS ======-->

    <!--====== HEADER PART START ======-->
    <header class="header-area">

        <!-- Navbar -->
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            @if (!Auth::check())
                                <a class="navbar-brand" href="{{ route('landing') }}">
                                    <img src="/landing/assets/images/logo/logo.png" alt="Logo"
                                        style="width: 120px;" />
                                </a>
                            @else
                                <a class="navbar-brand" href="{{ route('homepage') }}">
                                    <img src="/landing/assets/images/logo/logo2.png" alt="Logo"
                                        style="width: 120px;" />
                                </a>
                            @endif
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"> </span>
                                <span class="toggler-icon"> </span>
                                <span class="toggler-icon"> </span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    @if (!Auth::check())
                                        <li class="nav-item">
                                            <a href="{{ route('landing') }}">Beranda</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="javascript:;" id="riwayatPeminjamanLink">Riwayat Peminjaman</a>
                                        </li>
                                        <a class="main-btn" data-scroll-nav="0" href="{{ route('login') }}">
                                            Masuk / Daftar
                                        </a>
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ route('homepage') }}">Beranda</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('history') }}">Riwayat Peminjaman</a>
                                        </li>
                                        <a class="main-btn" data-scroll-nav="0" href="{{ route('logout') }}">
                                            Logout
                                        </a>
                                    @endif
                                </ul>
                            </div>
                            <!-- navbar collapse -->
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- navbar area -->

        <!-- Slider View -->
        <div class="header-bg" style="background-image: url(/landing/assets/images/header/banner-bg.svg);">
            <div class="container">
                <div class="pt-60">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="wow fadeIn" data-wow-duration="1.0s" data-wow-delay="1.0s">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper">
                                        @if ($facility->facilityImages->isNotEmpty())
                                            @foreach ($facility->facilityImages as $facilityImage)
                                                <div class="swiper-slide">
                                                    <img src="/facility_images/{{ $facilityImage->image }}"
                                                        alt="{{ $facilityImage->image }}">
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="swiper-slide">
                                                <img src="/facility_images/default.png" alt="No Image Available">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                            <!-- header hero image -->
                        </div>
                    </div>
                    <!-- End Slide View -->
                </div>
            </div>
        </div>
        <!-- End Slider View -->

    </header>
    <!--====== HEADER PART ENDS ======-->

    <!--====== FASILITAS PART START ======-->
    <div class="brand-area pt-30" id="kategori">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.1s">
                    <h3 class="judul-dua wow fadeInUp" data-wow-duration="1.0s" data-wow-delay="0.5s">
                        {{ $facility->name }}
                    </h3>
                    <p style="text-align: justify;" class="text wow fadeInUp"
                        data-wow-duration="1.0s" data-wow-delay="0.8s">
                        {{ $facility->name }} | {{ $facility->size }}m2 | {{ $facility->kapasitas }} Orang |
                        Fasilitas
                        :
                        {{ $facility->information }} | Pembayaran : {{ $facility->pembayaran }}
                    </p>
                    <div class="alert-card">
                        <h3>Informasi Penting!!!</h3>
                        <p>Berikan jeda 1 jam jika di hari yang sama fasilitas juga dipinjam.</p>
                    </div>
                    <div class="mt-5 panel-card">
                        <div id='calendar' class="calendar-wrapper"></div>
                        <div class="mt-2">
                            <ul class="color-legend">
                                <li>
                                    <span class="color-circle" style="background-color: #28a745;"></span>
                                    <span class="color-text">Peminjaman Disetujui</span>
                                </li>
                                <li>
                                    <span class="color-circle" style="background-color: #ffc107;"></span>
                                    <span class="color-text">Peminjaman Sedang Diproses</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!--====== FASILITAS PART ENDS ======-->


    @if (Auth::check())
        @include('back.pages.modalPeminjaman')
    @endif


    <!--====== FOOTER PART START ======-->
    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe-content mt-45">
                            <h2 class="subscribe-title">
                                <h2 class="subscribe-title">
                                    Dapatkan informasi lainnya <span>pada web utama kami</span>
                                </h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="subscribe-form mt-50">
                            <form action="">
                                <input type="text" placeholder="https://biroumum.sumbarprov.go.id/" readonly />
                                <button type="button" class="main-btn"
                                    onclick="window.location.href='https://biroumum.sumbarprov.go.id/'">Pergi</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- subscribe area -->
            <div class="footer-widget pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <a class="logo" href="javascript:void(0)">
                                <img src="/landing/assets/images/logo/logo2.png" alt="logo" />
                            </a>
                            <p class="text">
                                Sipintas Plus adalah sebuah sistem informasi yang dibuat oleh Biro Umum untuk memudahkan
                                operasional peminjaman agar dapat terkelola dengan baik, sistematis dan otomatis.
                            </p>
                            <ul class="social">
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-facebook-filled"> </i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-twitter-filled"> </i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-instagram-filled"> </i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="lni lni-linkedin-original"> </i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- footer about -->
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-12">
                        <div class="footer-link d-flex mt-50 justify-content-sm-between">
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Link Lainnya</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="javascript:void(0)">FAQ</a></li>
                                    <li><a href="javascript:void(0)">Kebijakan Privasi</a></li>
                                    <li><a href="javascript:void(0)">Syarat dan Ketentuan</a></li>
                                </ul>
                            </div>
                            <!-- footer wrapper -->
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                                <div class="footer-title">
                                    <h4 class="title">Resources</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="javascript:void(0)">Home</a></li>
                                    <li><a href="javascript:void(0)">Page</a></li>
                                    <li><a href="javascript:void(0)">Portfolio</a></li>
                                    <li><a href="javascript:void(0)">Blog</a></li>
                                    <li><a href="javascript:void(0)">Contact</a></li>
                                </ul>
                            </div>
                            <!-- footer wrapper -->
                        </div>
                        <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-12">
                        <div class="footer-contact mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Kontak</h4>
                            </div>
                            <ul class="contact">
                                <li>+809272561823</li>
                                <li>info@gmail.com</li>
                                <li>www.sipintasplus.com</li>
                                <li>
                                    123 Padang, Sumatera Barat<br />
                                    Sekda Prov Sumbar.
                                </li>
                            </ul>
                        </div>
                        <!-- footer contact -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- footer widget -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-content">
                                <p class="text">
                                    © 2024 . SIPINTAS PLUS All rights reserved.
                                </p>
                            </div>
                            <!-- copyright content -->
                        </div>
                        <!-- copyright -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- footer copyright -->
        </div>
        <!-- container -->
        <div id="particles-2"></div>
    </footer>
    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TOP TOP PART START ======-->
    <a href="#" class="back-to-top"> <i class="lni lni-chevron-up"> </i> </a>
    <!--====== BACK TOP TOP PART ENDS ======-->

    <!--====== Javascript Files ======-->
    <script src="/landing/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/landing/assets/js/wow.min.js"></script>
    <script src="/landing/assets/js/glightbox.min.js"></script>
    <script src="/landing/assets/js/count-up.min.js"></script>
    <script src="/landing/assets/js/particles.min.js"></script>
    <script src="/landing/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var riwayatLink = document.getElementById('riwayatPeminjamanLink');
            if (riwayatLink) {
                riwayatLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Tidak Login',
                        text: 'Silahkan melakukan Login terlebih dahulu',
                        showCancelButton: true,
                        confirmButtonText: 'Login',
                        cancelButtonText: 'Cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/login';
                        }
                    });
                });
            }
        });
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "coverflow",
            grabCursor: false,
            centeredSlides: true,
            slidesPerView: "auto",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            grabCursor: true,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiper = new Swiper(".slider-penyewaan", {

            breakpoints: {
                "@0.00": {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
                "@0.75": {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                "@1.00": {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                "@1.50": {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
                "@2.00": {
                    slidesPerView: 5,
                    spaceBetween: 20,
                },
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                dynamicBullets: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });



        document.addEventListener('DOMContentLoaded', function() {
            var rents = @json($rents);
            var facility = @json($facility);
            var bookingForm = document.getElementById('bookingForm');
            var pembayaranInput = document.getElementById('pembayaran');
            var suratInput = document.getElementById('surat');
            var suratLink = document.getElementById('suratLink');
            var submitButton = document.querySelector('#bookingForm button[type="submit"]');
            var startDateInput = document.getElementById('start_date');
            var startTimeInput = document.getElementById('start_time');
            var endDateInput = document.getElementById('end_date');
            var endTimeInput = document.getElementById('end_time');
            var agendaInput = document.getElementById('agenda');
            var tujuanInput = document.getElementById('tujuan');
            var sppdInputs = document.querySelectorAll('input[name="sppd"]');
            var bbmInputs = document.querySelectorAll('input[name="bbm"]');
            var isLoggedIn = @json(auth()->check());
            var startDatePicker, endDatePicker, startTimePicker, endTimePicker;

            var bookingModalElement = document.getElementById('bookingModal');
            var bookingModal;
            if (bookingModalElement) {
                bookingModal = new bootstrap.Modal(bookingModalElement);
            }

            if (startDateInput && startTimeInput && endDateInput && endTimeInput) {
                startDatePicker = flatpickr(startDateInput, {
                    dateFormat: "Y-m-d",
                });

                endDatePicker = flatpickr(endDateInput, {
                    dateFormat: "Y-m-d",
                });

                startTimePicker = flatpickr(startTimeInput, {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true,
                    minuteIncrement: 60,
                });

                endTimePicker = flatpickr(endTimeInput, {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true,
                    minuteIncrement: 60,
                });

                function parseDateTime(dateTimeString) {
                    const [date, time] = dateTimeString.split('T');
                    return {
                        date: date,
                        time: time.slice(0, 5)
                    };
                }

                function setDateTimePickers(datePicker, timePicker, dateTimeString) {
                    const {
                        date,
                        time
                    } = parseDateTime(dateTimeString);
                    datePicker.setDate(date);
                    timePicker.setDate(time);
                }

                function getFormattedDateTime(datePicker, timePicker) {
                    const date = datePicker.input.value;
                    const time = timePicker.input.value;
                    return `${date}T${time}`;
                }

                function prepareRequestData() {
                    const startDateTime = getFormattedDateTime(startDatePicker, startTimePicker);
                    const endDateTime = getFormattedDateTime(endDatePicker, endTimePicker);
                    const requestData = {
                        start: startDateTime,
                        end: endDateTime,
                    };
                    console.log('Prepared Request Data:', requestData);
                    return requestData;
                }
            } else {
                console.warn('Start or End input elements not found');
            }

            function toggleFormForExistingBooking(isExisting) {
                if (isExisting) {
                    console.log('Existing booking');
                    if (pembayaranInput) {
                        pembayaranInput.closest('.mb-3').style.display = 'none';
                    }
                    if (suratInput) {
                        suratInput.closest('.mb-3').style.display = 'none';
                    }
                    if (suratLink) {
                        suratLink.style.display = 'block';
                    }
                    submitButton.textContent = 'Oke';
                    submitButton.setAttribute('type', 'button');
                    submitButton.style.display = 'none';
                    submitButton.addEventListener('click', function() {
                        if (isLoggedIn) {
                            bookingModal.hide();
                        }
                    });
                    agendaInput.readOnly = true;
                    if (isLoggedIn && startDateInput && startTimeInput && endDateInput && endTimeInput) {
                        startDateInput.classList.add('disabled-input');
                        startTimeInput.classList.add('disabled-input');
                        endDateInput.classList.add('disabled-input');
                        endTimeInput.classList.add('disabled-input');
                    }
                    if (facility.facility_type.name == 'Kendaraan') {
                        tujuanInput.readOnly = true;
                        sppdInputs.forEach(input => input.disabled = true);
                        bbmInputs.forEach(input => input.disabled = true);
                    }
                } else {
                    console.log('New booking');
                    if (pembayaranInput) {
                        pembayaranInput.closest('.mb-3').style.display = 'block';
                    }
                    if (suratInput) {
                        suratInput.closest('.mb-3').style.display = 'block';
                    }
                    if (suratLink) {
                        suratLink.style.display = 'none';
                    }
                    submitButton.textContent = 'Submit';
                    submitButton.setAttribute('type', 'submit');
                    submitButton.style.display = 'inline';
                    agendaInput.readOnly = false;
                    if (isLoggedIn && startDateInput && startTimeInput && endDateInput && endTimeInput) {
                        startDateInput.classList.remove('disabled-input');
                        startTimeInput.classList.remove('disabled-input');
                        endDateInput.classList.remove('disabled-input');
                        endTimeInput.classList.remove('disabled-input');
                    }
                    if (facility.facility_type.name == 'Kendaraan') {
                        tujuanInput.readOnly = false;
                        sppdInputs.forEach(input => input.disabled = false);
                        bbmInputs.forEach(input => input.disabled = false);
                    }
                }
            }

            function getMonth(date, offset = 0) {
                var month = date.getMonth() + 1 + offset;
                return (month < 10 ? '0' : '') + month;
            }

            var events = rents.map(function(rent) {
                let className = '';
                if (rent.status === 'proses') {
                    className = 'fc-event-warning';
                } else if (rent.status === 'diterima') {
                    className = 'fc-event-success';
                } else if (rent.status === 'ditolak') {
                    return null;
                }
                return {
                    id: rent.id,
                    title: 'Peminjam : ' + rent.user.name,
                    start: rent.start,
                    end: rent.end,
                    className: [className],
                    description: 'OPD: ' + rent.user.opd,
                };
            }).filter(event => event !== null);

            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'id',
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                buttonText: {
                    today: 'Hari Ini',
                    month: 'Bulan',
                    week: 'Minggu',
                    day: 'Hari',
                    list: 'Daftar'
                },
                events: events,
                editable: true,
                selectable: true,

                eventClick: function(info) {
                    if (!isLoggedIn) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Tidak Login',
                            text: 'Silahkan melakukan Login terlebih dahulu',
                            showCancelButton: true,
                            confirmButtonText: 'Login',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/login';
                            }
                        });
                    } else {
                        var rent = rents.find(r => r.id == info.event.id);
                        console.log(rent);
                        if (rent) {
                            const startDate = moment(rent.start).format('YYYY-MM-DDTHH:mm');
                            const endDate = moment(rent.end).format('YYYY-MM-DDTHH:mm');
                            const eventIdElem = document.getElementById('eventId');
                            const startDateElem = document.getElementById('start_date');
                            const startTimeElem = document.getElementById('start_time');
                            const endDateElem = document.getElementById('end_date');
                            const endTimeElem = document.getElementById('end_time');
                            const agendaElem = document.getElementById('agenda');
                            const nameElem = document.getElementById('name');
                            const opdElem = document.getElementById('opd');
                            const tujuanElem = document.getElementById('tujuan');
                            const sppdElems = document.getElementsByName('sppd');
                            const bbmElems = document.getElementsByName('bbm');
                            if (eventIdElem) eventIdElem.value = rent.id;
                            if (startDateElem && startTimeElem) {
                                setDateTimePickers(startDatePicker, startTimePicker, startDate);
                            }
                            if (endDateElem && endTimeElem) {
                                setDateTimePickers(endDatePicker, endTimePicker, endDate);
                            }
                            if (agendaElem) agendaElem.value = rent.agenda;
                            if (nameElem) nameElem.value = rent.user.name;
                            if (opdElem) opdElem.value = rent.user.opd;
                            if (rent.facility.facility_type.name == 'Kendaraan') {
                                if (tujuanElem) tujuanElem.value = rent.rent_detail.tujuan;
                                sppdElems.forEach(elem => {
                                    if (elem.value === rent.rent_detail.sppd) {
                                        elem.checked = true;
                                    }
                                });
                                bbmElems.forEach(elem => {
                                    if (elem.value === rent.rent_detail.bbm) {
                                        elem.checked = true;
                                    }
                                });
                            }
                            toggleFormForExistingBooking(true);
                            if (isLoggedIn && bookingModal) {
                                bookingModal.show();
                            }
                        }
                    }
                },
                dateClick: function(info) {
                    if (!isLoggedIn) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Tidak Login',
                            text: 'Silahkan melakukan Login terlebih dahulu',
                            showCancelButton: true,
                            confirmButtonText: 'Login',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = '/login';
                            }
                        });
                    } else {
                        startDatePicker.setDate(info.dateStr);
                        endDatePicker.setDate(info.dateStr);
                        startTimePicker.setDate('00:00');
                        endTimePicker.setDate('23:59');
                        var agendaElem = document.getElementById('agenda');
                        if (agendaElem) {
                            agendaElem.value = '';
                        }
                        if (facilityTypeName === 'Kendaraan') {
                            var tujuanElem = document.getElementById('tujuan');
                            var sppdElems = document.getElementsByName('sppd');
                            var bbmElems = document.getElementsByName('bbm');

                            if (tujuanElem) {
                                tujuanElem.value = '';
                            }
                            sppdElems.forEach(function(elem) {
                                elem.checked = false;
                            });
                            bbmElems.forEach(function(elem) {
                                elem.checked = false;
                            });
                        }
                        @if (auth()->check())
                            document.getElementById('name').value = "{{ auth()->user()->name }}";
                            document.getElementById('opd').value = "{{ auth()->user()->opd }}";
                        @endif
                        toggleFormForExistingBooking(false);
                        if (isLoggedIn && bookingModal) {
                            bookingModal.show();
                        }
                    }
                }
            });
            calendar.render();
            bookingModalElement.addEventListener('hide.bs.modal', function() {
                window.location.reload();
            });
            if (bookingForm) {
                bookingForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    var requestData = prepareRequestData();
                    var formData = new FormData(this);
                    var isValid = true;
                    var facilityTypeName = '{{ $facility->facilityType->name }}';
                    var facilityPembayaran = '{{ $facility->pembayaran }}';
                    var startDateInput = document.getElementById('start_date');
                    var startTimeInput = document.getElementById('start_time');
                    var endDateInput = document.getElementById('end_date');
                    var endTimeInput = document.getElementById('end_time');
                    var agendaInput = document.getElementById('agenda');
                    var suratInput = document.getElementById('surat');
                    var pembayaranInput = document.getElementById('pembayaran');
                    var start = `${startDateInput.value}T${startTimeInput.value}`;
                    var end = `${endDateInput.value}T${endTimeInput.value}`;
                    var surat = suratInput.files.length;
                    var pembayaran = pembayaranInput ? pembayaranInput.files.length : 0;
                    if (isLoggedIn) {
                        if (!agendaInput.value.trim()) {
                            isValid = false;
                            agendaInput.classList.add('is-invalid');
                        } else {
                            agendaInput.classList.remove('is-invalid');
                        }

                        if (!start) {
                            isValid = false;
                            startDateInput.classList.add('is-invalid');
                            startTimeInput.classList.add('is-invalid');
                        } else {
                            startDateInput.classList.remove('is-invalid');
                            startTimeInput.classList.remove('is-invalid');
                        }

                        if (!end) {
                            isValid = false;
                            endDateInput.classList.add('is-invalid');
                            endTimeInput.classList.add('is-invalid');
                        } else {
                            endDateInput.classList.remove('is-invalid');
                            endTimeInput.classList.remove('is-invalid');
                        }
                        if (facilityTypeName == 'Kendaraan') {
                            var tujuanInput = document.getElementById('tujuan');
                            var tujuan = tujuanInput.value.trim();
                            if (!tujuan) {
                                isValid = false;
                                tujuanInput.classList.add('is-invalid');
                            } else {
                                tujuanInput.classList.remove('is-invalid');
                            }
                            var sppdGroup = document.getElementsByName('sppd');
                            if (![...sppdGroup].some(input => input.checked)) {
                                isValid = false;
                                sppdGroup.forEach(input => input.parentElement.classList.add('is-invalid'));
                            } else {
                                sppdGroup.forEach(input => input.parentElement.classList.remove(
                                    'is-invalid'));
                            }
                            var bbmGroup = document.getElementsByName('bbm');
                            if (![...bbmGroup].some(input => input.checked)) {
                                isValid = false;
                                bbmGroup.forEach(input => input.parentElement.classList.add('is-invalid'));
                            } else {
                                bbmGroup.forEach(input => input.parentElement.classList.remove(
                                    'is-invalid'));
                            }
                        }
                        if (surat === 0) {
                            isValid = false;
                            suratInput.classList.add('is-invalid');
                        } else {
                            suratInput.classList.remove('is-invalid');
                        }
                        if (facilityPembayaran == 'ya' && pembayaran === 0) {
                            isValid = false;
                            pembayaranInput.classList.add('is-invalid');
                        } else {
                            if (pembayaranInput) {
                                pembayaranInput.classList.remove('is-invalid');
                            }
                        }
                        if (!isValid) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Kesalahan Validasi',
                                text: 'Harap isi semua kolom yang wajib diisi.',
                            });
                            return;
                        }
                    }
                    formData.append('start', start);
                    formData.append('end', end);
                    fetch('/book-facility', {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content')
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            Swal.fire({
                                icon: data.success ? 'success' : 'error',
                                title: data.success ? 'Success' : 'Error',
                                text: data.message,
                            }).then(() => {
                                if (data.success) {
                                    var bookingModal = bootstrap.Modal.getInstance(document
                                        .getElementById('bookingModal'));
                                    bookingModal.hide();
                                    window.location.reload();
                                }
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Terjadi Kesalahan Saat Menyimpan Peminjaman.',
                            });
                        });
                });
            }
        });
    </script>

</body>

</html>
