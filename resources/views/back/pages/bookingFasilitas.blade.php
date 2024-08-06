<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />

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
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <style>
        /* Swiper */
        .fc-daygrid-day-number {
            color: #000000 !important;
            /* Mengubah warna angka tanggal menjadi hitam */
        }

        .fc-daygrid-day-top {
            color: #000000 !important;
            /* Mengubah warna teks hari dalam kalender */
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
            background-color: #000000 !important;
            /* Mengubah warna latar tombol menjadi hitam */
            border-color: #000000 !important;
            /* Mengubah warna border tombol menjadi hitam */
        }

        .fc-button-primary:not(:disabled):active,
        .fc-button-primary:not(:disabled).fc-button-active {
            background-color: #000000 !important;
            /* Mengubah warna latar tombol yang aktif menjadi hitam */
            border-color: #000000 !important;
            /* Mengubah warna border tombol yang aktif menjadi hitam */
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
        }

        .fc-event-primary {
            background-color: #007bff !important;
            border-color: #007bff !important;
        }

        .fc-event-info {
            background-color: #17a2b8 !important;
            border-color: #17a2b8 !important;
        }

        .fc-event-success {
            background-color: #28a745 !important;
            border-color: #28a745 !important;
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
            height: 550px;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
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
                width: 300px;
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
                            <a class="navbar-brand" href="{{ route('home') }}">
                                <img src="/landing/assets/images/logo/logo2.png" alt="Logo" style="width: 120px;" />
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"> </span>
                                <span class="toggler-icon"> </span>
                                <span class="toggler-icon"> </span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('home') }}">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#">Riwayat Peminajaman</a>
                                    </li>
                                    <a class="main-btn" data-scroll-nav="0" href="{{ route('login') }}">
                                        Masuk / Daftar
                                    </a>
                                    </li>
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
        <div id="home" class="header-hero bg_cover"
            style="background-image: url(/landing/assets/images/header/banner-bg.svg)">
            <div class="container">
                <div class="pt-60">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="wow fadeIn" data-wow-duration="1.0s" data-wow-delay="1.0s">
                                <div class="swiper mySwiper">
                                    <div class="swiper-wrapper text-center">
                                        <div class="swiper-slide">
                                            <img src="/back/fasilitas/aula.jpeg" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="/back/fasilitas/aula2.jpeg" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="/back/fasilitas/halaman.jpeg" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="/back/fasilitas/mobil 2.jpeg" alt="">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="/back/fasilitas/mobil.jpeg" alt="">
                                        </div>
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
                        Aula Kantor Gubernur
                    </h3>
                    <p style="font-weight:lighter; text-align: justify;" class="text wow fadeInUp"
                        data-wow-duration="1.0s" data-wow-delay="0.8s">
                        Aula Kantor Gubernur | 1240 m2 | 750 Orang | Fasilitas : Hall Utama, Area Latihan, Tribun
                        Penonton, Ruang Sekretariat, Ruang Official, Ruang Kesehatan, Ruang Ticketing, Gudang, Ruang
                        Ganti Atlet dan Toilet
                    </p>

                    <div class="mt-5">
                        <div id='calendar'></div>
                    </div>


                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!--====== FASILITAS PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe-content mt-45">
                            <h2 class="subscribe-title">
                                Subscribe Our Newsletter <span>get reguler updates</span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="subscribe-form mt-50">
                            <form action="#">
                                <input type="text" placeholder="Enter eamil" />
                                <button class="main-btn">Subscribe</button>
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
                                Lorem ipsum dolor sit amet consetetur sadipscing elitr,
                                sederfs diam nonumy eirmod tempor invidunt ut labore et dolore
                                magna aliquyam.
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>


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
            var now = new Date();

            function getMonth(date, offset = 0) {
                var month = date.getMonth() + 1 + offset;
                return (month < 10 ? '0' : '') + month;
            }

            var events = [{
                    id: 1,
                    title: 'All Day Event',
                    start: now.getFullYear() + '-' + getMonth(now) + '-01T14:30:00',
                    end: now.getFullYear() + '-' + getMonth(now) + '-02T14:30:00',
                    className: 'fc-event-danger',
                    description: 'Aenean fermentum quam vel sapien rutrum cursus. Vestibulum imperdiet finibus odio, nec tincidunt felis facilisis eu.',
                },
                {
                    id: 2,
                    title: 'Site Visit',
                    start: now.getFullYear() + '-' + getMonth(now) + '-07T19:30:00',
                    end: now.getFullYear() + '-' + getMonth(now) + '-08T14:30:00',
                    className: 'fc-event-primary',
                    description: 'Etiam a odio eget enim aliquet laoreet. Vivamus auctor nunc ultrices varius lobortis.',
                },
                {
                    id: 3,
                    title: 'Product Lunching Event',
                    start: now.getFullYear() + '-' + getMonth(now) + '-17T14:30:00',
                    end: now.getFullYear() + '-' + getMonth(now) + '-18T14:30:00',
                    className: 'fc-event-info',
                    description: 'Proin et consectetur nibh. Mauris et mollis purus. Ut nec tincidunt lacus. Nam at rutrum justo, vitae egestas dolor.',
                },
                {
                    id: 4,
                    title: 'Meeting',
                    start: now.getFullYear() + '-' + getMonth(now) + '-12T10:30:00',
                    end: now.getFullYear() + '-' + getMonth(now) + '-13T10:30:00',
                    className: 'fc-event-danger',
                    description: 'Mauris ut mauris aliquam, fringilla sapien et, dignissim nisl. Pellentesque ornare velit non mollis fringilla.',
                },
                {
                    id: 5,
                    title: 'Lunch',
                    start: now.getFullYear() + '-' + getMonth(now) + '-12T15:00:00',
                    end: now.getFullYear() + '-' + getMonth(now) + '-13T15:00:00',
                    className: 'fc-event-info',
                    description: 'Integer fermentum bibendum elit in egestas. Interdum et malesuada fames ac ante ipsum primis in faucibus.',
                },
                {
                    id: 6,
                    title: 'Conference',
                    start: now.getFullYear() + '-' + getMonth(now) + '-12T21:30:00',
                    end: now.getFullYear() + '-' + getMonth(now) + '-13T21:30:00',
                    className: 'fc-event-success',
                    description: 'Curabitur facilisis vel elit sed dapibus. Nunc sagittis ex nec ante facilisis, sed sodales purus rhoncus. Donec est sapien, porttitor et feugiat sed, eleifend quis sapien. Sed sit amet maximus dolor.',
                },
                {
                    id: 7,
                    title: 'Happy Hour',
                    start: now.getFullYear() + '-' + getMonth(now) + '-12T05:30:00',
                    end: now.getFullYear() + '-' + getMonth(now) + '-13T05:30:00',
                    className: 'fc-event-info',
                    description: ' odio lectus, porttitor molestie scelerisque blandit, hendrerit sed ex. Aenean malesuada iaculis erat, vitae blandit nisl accumsan ut.',
                },
                {
                    id: 8,
                    title: 'Dinner',
                    start: now.getFullYear() + '-' + getMonth(now) + '-12T20:00:00',
                    end: now.getFullYear() + '-' + getMonth(now) + '-13T20:00:00',
                    className: 'fc-event-danger',
                    description: 'Sed purus urna, aliquam et pharetra ut, efficitur id mi. Pellentesque ut convallis velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                },
                {
                    id: 9,
                    title: 'Birthday Party',
                    start: now.getFullYear() + '-' + getMonth(now) + '-27T20:00:00',
                    end: now.getFullYear() + '-' + getMonth(now) + '-28T20:00:00',
                    className: 'fc-event-success',
                    description: 'Sed purus urna, aliquam et pharetra ut, efficitur id mi. Pellentesque ut convallis velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                },
                {
                    id: 10,
                    title: 'New Talent Event',
                    start: now.getFullYear() + '-' + getMonth(now, 1) + '-24T08:12:14',
                    end: now.getFullYear() + '-' + getMonth(now, 1) + '-27T22:20:20',
                    className: 'fc-event-danger',
                    description: 'Sed purus urna, aliquam et pharetra ut, efficitur id mi. Pellentesque ut convallis velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                },
                {
                    id: 11,
                    title: 'Other new',
                    start: now.getFullYear() + '-' + getMonth(now, -1) + '-13T08:12:14',
                    end: now.getFullYear() + '-' + getMonth(now, -1) + '-16T22:20:20',
                    className: 'fc-event-primary',
                    description: 'Pellentesque ut convallis velit. Sed purus urna, aliquam et pharetra ut, efficitur id mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                },
                {
                    id: 13,
                    title: 'Upcoming Event',
                    start: now.getFullYear() + '-' + getMonth(now, 1) + '-15T08:12:14',
                    end: now.getFullYear() + '-' + getMonth(now, 1) + '-18T22:20:20',
                    className: 'fc-event-primary',
                    description: 'Pellentesque ut convallis velit. Sed purus urna, aliquam et pharetra ut, efficitur id mi. Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                },
            ];

            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: events,
                editable: true,
                selectable: true,
                eventClick: function(info) {
                    alert(info.event.title + '\n' + info.event.extendedProps.description);
                },
                select: function(info) {
                    alert('selected ' + info.startStr + ' to ' + info.endStr);
                    window.location.replace("{{ route('login') }}")
                }
            });
            calendar.render();
        });
    </script>

</body>

</html>
