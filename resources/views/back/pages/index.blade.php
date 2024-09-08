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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">



    <style>
        /* Swiper */

        .swiper {
            width: 100%;
            padding-top: 50px;
            padding-bottom: 50px;
        }

        .swiper-slide {
            background-position: center;
            background-size: cover;
            width: 450px;
        }

        .swiper-slide .gambar {
            height: 300px;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 10px;
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

        .swiper-button-next,
        .swiper-button-prev {
            /* Style navigation buttons */
            color: #000;
            /* Adjust color as needed */
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
                border-color: #fff;
                box-shadow: 0 5px 10px rgba(#000, 0.1);
                color: #52dc97;
                background-color: #00ab55;

                &:before {
                    transform: scale(1);
                    opacity: 1;

                    background-color: #00ab55;
                    border-color: #00ab55;
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
            border: 2px solid #ffffff;
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

                .checkbox-icon,
                .checkbox-label {
                    color: #00ab55;
                }
            }
        }

        .checkbox-icon {
            transition: .375s ease;
            color: #ffffff;

            svg {
                width: 3rem;
                height: 3rem;
            }

        }

        .checkbox-label {
            color: #ffffff;
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
                color: #fff;

                svg {
                    padding-top: 15px;
                    width: 2rem;
                }
            }

            .checkbox-label {
                font-size: 13px;
                color: #fff;
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

            .swiper-slide {
                width: 300px;
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
                            @if (!Auth::check())
                                <a class="navbar-brand" href="#home">
                                    <img src="/landing/assets/images/logo/logo2.png" alt="Logo"
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
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#kategori">Fasilitas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">Cara Peminjaman</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('file.download') }}" class="">SOP Peminjaman</a>
                                    </li>
                                    @if (!Auth::check())
                                        <li class="nav-item">
                                            <a href="javascript:;" id="riwayatPeminjamanLink">Riwayat Peminjaman</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a href="{{ route('history') }}">Riwayat Peminjaman</a>
                                        </li>
                                    @endif

                                    @if (!Auth::check())
                                        <a class="main-btn" data-scroll-nav="0" href="{{ route('login') }}">
                                            Masuk / Daftar
                                        </a>
                                    @else
                                        <a class="main-btn" data-scroll-nav="0" href="{{ route('logout') }}">
                                            Logout
                                        </a>
                                    @endif
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
        <div id="home" class="header-hero" style="padding-top: 250px;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h1 class="header-title wow fadeInUp" data-wow-duration="1.0s" data-wow-delay="0.5s">
                                SIPINTAS - PLUS
                            </h1>
                            <h5 style="font-weight:lighter;" class="text wow fadeInUp" data-wow-duration="1.0s"
                                data-wow-delay="0.8s">
                                Layanan Peminjaman Fasilitas Online Provinsi Sumatera Barat
                            </h5>
                        </div>
                        <!-- header hero content -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wow fadeIn" data-wow-duration="1.0s" data-wow-delay="1.0s">
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper text-center">
                                    @foreach ($facilities as $facility)
                                        <div class="swiper-slide">
                                            <div class="gambar">
                                                @if ($facility['image_url'])
                                                    <img src="{{ $facility['image_url'] }}"
                                                        alt="{{ $facility['image_alt'] }}">
                                                @else
                                                    <img src="/facility_images/default.png" alt="No Image Available">
                                                @endif
                                                <div class="info">
                                                    <h3>{{ $facility['name'] }}</h3>
                                                    <p>{{ $facility['information'] }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
            <!-- container -->

            <div class="bg_cover"></div>
            <div id="particles-1" class="particles"></div>
        </div>
        <!-- End Slider View -->

    </header>
    <!--====== HEADER PART ENDS ======-->

    <!--====== FASILITAS PART START ======-->
    <div class="brand-area pt-90" id="kategori">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="0.1s">
                    <fieldset class="checkbox-group">
                        <legend class="checkbox-group-legend">Pilih Kategori Fasilitas</legend>
                        <div class="checkbox">
                            <label class="checkbox-wrapper">
                                <input type="checkbox" class="checkbox-input" value="Semua">
                                <span class="checkbox-tile" onMouseOver="this.style.backgroundColor='#F8F8F8'"
                                    onMouseClick="this.style.backgroundColor='#F8F8F8'"
                                    onMouseOut="this.style.backgroundColor='#DC493A'"
                                    style=" background-color: #DC493A; ">
                                    <span class="checkbox-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-grid" viewBox="-3 0 20 18">
                                            <path
                                                d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5z" />
                                        </svg>
                                    </span>
                                    <span class="checkbox-label">Semua</span>
                                </span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="checkbox-wrapper">
                                <input type="checkbox" class="checkbox-input" value="Kendaraan">
                                <span class="checkbox-tile" onMouseOver="this.style.backgroundColor='#F8F8F8'"
                                    onMouseClick="this.style.backgroundColor='#F8F8F8'"
                                    onMouseOut="this.style.backgroundColor='#FFEC4F'"
                                    style=" background-color: #FFEC4F ">
                                    <span class="checkbox-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                            fill="currentColor" class="bi bi-car-front" viewBox="0 0 18 18">
                                            <path
                                                d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276" />
                                            <path
                                                d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z" />
                                        </svg>
                                    </span>
                                    <span class="checkbox-label">Kendaraan</span>
                                </span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="checkbox-wrapper">
                                <input type="checkbox" class="checkbox-input" value="Penginapan">
                                <span class="checkbox-tile" onMouseOver="this.style.backgroundColor='#F8F8F8'"
                                    onMouseClick="this.style.backgroundColor='#F8F8F8'"
                                    onMouseOut="this.style.backgroundColor='#30C5F9'"
                                    style=" background-color: #30C5F9">
                                    <span class="checkbox-icon">
                                        <svg width="64" height="64" viewBox="4 10 55 55"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect width="64" height="64" fill="none" />
                                            <path
                                                d="M4 52V36H8V28C8 25.8 9.8 24 12 24H52C54.2 24 56 25.8 56 28V36H60V52H56V44H8V52H4ZM12 36H52V28H12V36ZM20 32H16C14.3 32 13 30.7 13 29C13 27.3 14.3 26 16 26H20C21.7 26 23 27.3 23 29C23 30.7 21.7 32 20 32ZM48 32H44C42.3 32 41 30.7 41 29C41 27.3 42.3 26 44 26H48C49.7 26 51 27.3 51 29C51 30.7 49.7 32 48 32Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <span class="checkbox-label">Penginapan</span>
                                </span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="checkbox-wrapper">
                                <input type="checkbox" class="checkbox-input" value="Ruang Rapat">
                                <span class="checkbox-tile" onMouseOver="this.style.backgroundColor='#F8F8F8'"
                                    onMouseClick="this.style.backgroundColor='#F8F8F8'"
                                    onMouseOut="this.style.backgroundColor='#245CA1'"
                                    style=" background-color: #245CA1">
                                    <span class="checkbox-icon">
                                        <svg width="64" height="64" viewBox="0 0 64 64"
                                            xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <rect width="64" height="64" fill="none" />
                                            <circle cx="32" cy="12" r="6" fill="currentColor" />
                                            <path
                                                d="M40 20H24C20.7 20 18 22.7 18 26V34H14C12.3 34 11 35.3 11 37V44H6V48H58V44H53V37C53 35.3 51.7 34 50 34H46V26C46 22.7 43.3 20 40 20ZM24 24H40C41.1 24 42 24.9 42 26V34H22V26C22 24.9 22.9 24 24 24ZM20 38H44V42H20V38Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <span class="checkbox-label">Ruang Rapat</span>
                                </span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="checkbox-wrapper">
                                <input type="checkbox" class="checkbox-input" value="Aula">
                                <span class="checkbox-tile" onMouseOver="this.style.backgroundColor='#F8F8F8'"
                                    onMouseClick="this.style.backgroundColor='#F8F8F8'"
                                    onMouseOut="this.style.backgroundColor='#F2288C'"
                                    style=" background-color: #F2288C">
                                    <span class="checkbox-icon">
                                        <svg width="64" height="64" viewBox="0 0 64 64"
                                            xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <rect width="64" height="64" fill="none" />
                                            <path
                                                d="M32 4L4 20V60H60V20L32 4ZM28 52H20V44H28V52ZM44 52H36V44H44V52ZM52 52H48V44C48 41.8 46.2 40 44 40H20C17.8 40 16 41.8 16 44V52H12V24H52V52ZM8 22L32 8L56 22H8Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <span class="checkbox-label">Aula</span>
                                </span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="checkbox-wrapper">
                                <input type="checkbox" class="checkbox-input" value="Auditorium">
                                <span class="checkbox-tile" onMouseOver="this.style.backgroundColor='#F8F8F8'"
                                    onMouseClick="this.style.backgroundColor='#F8F8F8'"
                                    onMouseOut="this.style.backgroundColor='#971585'"
                                    style=" background-color: #971585">
                                    <span class="checkbox-icon">
                                        <svg width="64" height="64" viewBox="0 0 64 64"
                                            xmlns="http://www.w3.org/2000/svg" fill="none">
                                            <rect width="64" height="64" fill="none" />
                                            <path
                                                d="M8 52V28H56V52H48V36H16V52H8ZM4 20H60V24H4V20ZM18 32H46V52H18V32ZM32 6C33.1 6 34 6.9 34 8V14H30V8C30 6.9 30.9 6 32 6ZM24 10C25.1 10 26 10.9 26 12V14H22V12C22 10.9 22.9 10 24 10ZM40 10C41.1 10 42 10.9 42 12V14H38V12C38 10.9 38.9 10 40 10ZM14 12C15.1 12 16 12.9 16 14V16H12V14C12 12.9 12.9 12 14 12ZM50 12C51.1 12 52 12.9 52 14V16H48V14C48 12.9 48.9 12 50 12Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <span class="checkbox-label">Auditorium</span>
                                </span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="checkbox-wrapper">
                                <input type="checkbox" class="checkbox-input" value="Peralatan">
                                <span class="checkbox-tile" onMouseOver="this.style.backgroundColor='#F8F8F8'"
                                    onMouseClick="this.style.backgroundColor='#F8F8F8'"
                                    onMouseOut="this.style.backgroundColor='#FEA002'"
                                    style=" background-color: #FEA002">
                                    <span class="checkbox-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-tools" viewBox="-3 0 20 18">
                                            <path
                                                d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3q0-.405-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708M3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026z" />
                                        </svg>
                                    </span>
                                    <span class="checkbox-label">Peralatan</span>
                                </span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="checkbox-wrapper">
                                <input type="checkbox" class="checkbox-input" value="Lainnya">
                                <span class="checkbox-tile" onMouseOver="this.style.backgroundColor='#F8F8F8'"
                                    onMouseClick="this.style.backgroundColor='#F8F8F8'"
                                    onMouseOut="this.style.backgroundColor='#1ED593'"
                                    style=" background-color: #1ED593">
                                    <span class="checkbox-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                            <path
                                                d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3" />
                                        </svg>
                                    </span>
                                    <span class="checkbox-label">Lainnya</span>
                                </span>
                            </label>
                        </div>
                    </fieldset>
                    <!-- brand logo -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!--====== FASILITAS PART ENDS ======-->

    <!--====== Fasilitas Kendaraan ======-->
    <section id="features-vehicles" class="services-area pt-25">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 wow fadeInLeft" data-wow-duration="0.8s" data-wow-delay="1.0s">
                    <div class="section-title">
                        <div class="line m-auto"></div>
                        <h4 class="judul-dua">
                            Fasilitas Kendaraan
                        </h4>
                    </div>
                    <!-- section title -->
                </div>
            </div>
            <!-- row -->
            <div class="row justify-content-center wow fadeInRight" data-wow-duration="0.8s" data-wow-delay="1.4s">
                <div class="col-lg-12 swiper" style="padding-top: 15px; padding-bottom: 35px;">
                    <div class="slider-penyewaan swiper-container">
                        <div class="swiper-wrapper" id="facility-results-vehicles">

                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-slide-button swiper-button-next"></div>
                        <div class="swiper-slide-button swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!--====== Fasilitas Kendaraan ENDS ======-->

    <!--====== Fasilitas Bangunan ======-->
    <section id="features-buildings" class="services-area pt-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.4s">
                    <div class="section-title">
                        <h4 class="judul-dua">
                            Fasilitas Bangunan
                        </h4>
                    </div>
                    <!-- section title -->
                </div>
            </div>
            <!-- row -->
            <div class="row justify-content-center wow fadeInRight" data-wow-duration="1.2s" data-wow-delay="1.4s">
                <div class="col-lg-12 swiper" style="padding-top: 15px; padding-bottom: 35px;">
                    <div class="slider-penyewaan swiper-container">
                        <div class="swiper-wrapper" id="facility-results-buildings">

                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-slide-button swiper-button-next"></div>
                        <div class="swiper-slide-button swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!--====== Fasilitas Bangunan ENDS ======-->
    <!--====== Fasilitas Peralatan ======-->
    <section id="features-tools" class="services-area pt-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1.4s">
                    <div class="section-title">
                        <h4 class="judul-dua">
                            Fasilitas Peralatan
                        </h4>
                    </div>
                    <!-- section title -->
                </div>
            </div>
            <!-- row -->
            <div class="row justify-content-center wow fadeInRight" data-wow-duration="1.2s" data-wow-delay="1.4s">
                <div class="col-lg-12 swiper" style="padding-top: 15px; padding-bottom: 35px;">
                    <div class="slider-penyewaan swiper-container">
                        <div class="swiper-wrapper" id="facility-results-tools">

                        </div>
                        <div class="swiper-pagination"></div>
                        <div class="swiper-slide-button swiper-button-next"></div>
                        <div class="swiper-slide-button swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!--====== Fasilitas Peralatan ENDS ======-->

    <div class="container pt-70" id="about">
        <div class="area-satu wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s"
            style="background: linear-gradient(to right, #2196f3 0%, #92dbff 50%, #e7f7ff 100%);">
            <div class="row">
                <div class="col-lg-12">
                    <div class="subscribe-content">
                        <h3 class="judul-satu" style="text-align: center;">
                            <span>Nikmati Efektifitas Peminjaman Fasilitas</span> Menggunakan SIPINTAS PLUS
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-50">
        <div class="row">
            <div class="col-lg-6">
                <div class="info-peminjaman pt-40">
                    <div class="banner-satu col-lg-4 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="1s">
                        <img src="/landing/assets/images/about/regis.svg" alt="about" class="satu" />
                    </div>
                    <div class="section-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="1s">
                        <div class="line"></div>
                        <h5 class="judul-dua wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
                            Lakukan registrasi online dan login untuk melakukan peminjaman
                        </h5>
                        <p class="text">
                            Dapatkan akun SIREPORA dengan cara registrasi akun yang dapat dilakukan dengan menekan
                            tombol <a href="#" style="color: #00ab55;">masuk/daftar</a>, kemudian klik
                            registrasi dan inputkan seluruh data yang diminta. Jika proses pendaftaran selesai proses
                            login dapat dilakukan dan anda dapat memilih fasilitas yang ingin dipinjam.
                        </p>
                    </div>
                </div>
                <div class="info-peminjaman pt-40">
                    <div class="banner-dua col-lg-4 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="1s">
                        <img src="/landing/assets/images/about/choose.svg" alt="about" />
                    </div>
                    <div class="section-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="1s">
                        <div class="line"></div>
                        <h5 class="judul-dua wow fadeInDown" data-wow-duration="1s" data-wow-delay="1s">
                            Pilih Fasilitas dan waktu peminjaman
                        </h5>
                        <p class="text">
                            Silahkan tentukan fasilitas yang akan dipinjam, waktu dan durasi peminjaman serta inputkan
                            surat peminjaman sesuai format OPD anda. Jika Sudah selesai tunggu 1x24 jam untuk
                            mendapatkan konfirmasi perizinan penggunaan fasilitas.
                        </p>
                    </div>
                </div>
                <div class="info-peminjaman pt-40">
                    <div class="banner-tiga col-lg-4 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="1.5s">
                        <img src="/landing/assets/images/about/wait.svg" alt="about" />
                    </div>
                    <div class="section-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="1.5s">
                        <div class="line"></div>
                        <h5 class="judul-dua wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.5s">
                            Mengecek konfirmasi peminjaman
                        </h5>
                        <p class="text">
                            Untuk mengetahui peminjaman fasilitas sudah disetujui dapat di cek pada halaman <a
                                href="#" style="color: #00ab55;">hystori peminjaman, </a> jika colom status
                            berisikan diizinkan, maka peminjaman fasilitas anda sudah disetujui.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 pt-40">
                <div class="banner-try wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1s">
                    <img src="/landing/assets/images/bannner/banner-lending.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!--====== FOOTER PART START ======-->
    <footer id="footer" class="footer-area pt-120">
        <div class="container">
            <div class="subscribe-area wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="subscribe-content mt-45">
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>


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
        $(document).ready(function() {
            // Pass the facilities data from the controller to JavaScript
            var facilities = @json($facilities);

            // Log the facilities data to check the structure
            console.log('Facilities data:', facilities);

            // Initialize Swiper instances
            var swiperVehicles = new Swiper('#features-vehicles .swiper-container', {
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

            var swiperBuildings = new Swiper('#features-buildings .swiper-container', {
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
            var swiperTools = new Swiper('#features-tools .swiper-container', {
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

            // Function to update the facility results based on filter
            function updateFacilityResults(facilities) {
                $('#facility-results-vehicles').empty();
                $('#facility-results-buildings').empty();
                $('#facility-results-tools').empty();

                let showVehicles = false;
                let showBuildings = false;
                let showTools = false;

                facilities.forEach(function(facility) {
                    console.log('Facility data:', facility); // Check the data structure

                    var imageUrl = facility.image_url || 'default-panjang.png';
                    var imageAlt = facility.image_alt || 'No Image Available';

                    var facilityHtml = `
                        <div class="penyewaan swiper-slide">
                            <picture>
                                <a href="${facility.detail_url}">
                                    <img src="${imageUrl}" alt="${imageAlt}">
                                </a>
                            </picture>
                            <div class="detail">
                                <p>
                                    <b>${facility.name}</b><br>
                                    <small>${facility.facilityTypeName}</small>
                                </p>
                            </div>
                        </div>
                    `;

                    if (facility.facilityTypeName === 'Kendaraan Dinas' || facility.facilityTypeName ===
                        'Kendaraan') {
                        $('#facility-results-vehicles').append(facilityHtml);
                        showVehicles = true;
                    } else if (facility.facilityTypeName === 'Peralatan') {
                        $('#facility-results-tools').append(facilityHtml);
                        showTools = true;
                    } else {
                        $('#facility-results-buildings').append(facilityHtml);
                        showBuildings = true;
                    }
                });

                if (showVehicles) {
                    $('#features-vehicles').fadeIn();
                    swiperVehicles.update();
                } else {
                    $('#features-vehicles').fadeOut();
                }

                if (showBuildings) {
                    $('#features-buildings').fadeIn();
                    swiperBuildings.update();
                } else {
                    $('#features-buildings').fadeOut();
                }
                if (showTools) {
                    $('#features-tools').fadeIn();
                    swiperTools.update();
                } else {
                    $('#features-tools').fadeOut();
                }
            }

            // Function to get selected categories
            function getSelectedCategories() {
                var selectedCategories = [];
                var isAllSelected = $('.checkbox-input:checked').filter(function() {
                    return $(this).val() === "Semua";
                }).length > 0;

                if (isAllSelected) {
                    // If "Semua" is selected, ignore other selections and return an empty array
                    selectedCategories = [];
                } else {
                    $('.checkbox-input:checked').each(function() {
                        var category = $(this).next().find('.checkbox-label').text();
                        selectedCategories.push(category);
                    });
                }

                return selectedCategories;
            }

            // Automatically trigger the filter for "Semua" on page load
            function filterAllCategories() {
                var selectedCategories = getSelectedCategories();
                $.ajax({
                    url: '/search/filter',
                    method: 'GET',
                    data: {
                        categories: selectedCategories
                    },
                    success: function(response) {
                        console.log('Filtered facilities data:', response
                            .facilities); // Log filtered facilities data
                        updateFacilityResults(response.facilities);
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            }

            // Trigger filtering for "Semua" on page load
            filterAllCategories();

            // Handle checkbox change
            $('.checkbox-input').change(function() {
                var selectedCategories = getSelectedCategories();
                $.ajax({
                    url: '/search/filter',
                    method: 'GET',
                    data: {
                        categories: selectedCategories
                    },
                    success: function(response) {
                        console.log('Filtered facilities data:', response
                            .facilities); // Log filtered facilities data
                        updateFacilityResults(response.facilities);
                    },
                    error: function(xhr) {
                        console.log('Error:', xhr.responseText);
                    }
                });
            });

            // Initialize with current facilities
            updateFacilityResults(facilities);
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
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    html: '{!! session('success') !!}',
                    confirmButtonText: 'OK'
                });
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: '{{ $error }}',
                        confirmButtonText: 'OK'
                    });
                @endforeach
            @endif
        });
    </script>

</body>

</html>
