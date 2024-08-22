<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--====== Title ======-->
    <title>SIPINTAS PLUS</title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!--====== Favicon Icon ======-->
    <link rel="icon" type="image/x-icon" href="/back/image/logo/logo.png">

    <!--====== CSS Files LinkUp ======-->
    <link rel="stylesheet" href="landing/assets/css/animate.css" />
    <link rel="stylesheet" href="landing/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="landing/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="landing/assets/css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .modal-backdrop {
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .modal-dialog {
            pointer-events: auto;
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
                                        <a href="{{ route('homepage') }}">Beranda</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#kategori">Fasilitas</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">Cara Peminjaman</a>
                                    </li>
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
        <div id="home" class="header-hero bg_cover pb-50"
            style="background-image: url(landing/assets/images/header/banner-bg.svg)">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="header-hero-content ">
                        <div class="table-responsive"
                            style="background-color: rgb(255, 255, 255); border-radius: 10px; box-shadow: 2px 2px 20px 2px rgba(218, 218, 218, 0.8);padding:20px 20px 10px 20px;">
                            <h5>Riwayat Peminjaman</h5>
                            <br>
                            <table class="table table-borderless">
                                <thead style="background-color: rgb(246, 246, 250);">
                                    <tr class="text-center">
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Fasilitas</th>
                                        <th scope="col">Tgl Peminjaman</th>
                                        <th scope="col">Tgl Pakai</th>
                                        <th scope="col">Durasi Peminjaman</th>
                                        <th scope="col">Status Verifikasi</th>
                                        <th scope="col">Catatan</th>
                                        <th scope="col">Surat Izin</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->rents as $rent)
                                        <tr class="align-middle">
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $rent->facility->name }}</td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($rent->created_at)->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($rent->start)->translatedFormat('d F Y') }}
                                            </td>
                                            <td class="text-center">
                                                {{ \Carbon\Carbon::parse($rent->start)->diffInDays(\Carbon\Carbon::parse($rent->end)) }}
                                                Hari</td>
                                            <td class="text-center fs-5">
                                                @if ($rent->status == 'proses')
                                                    <span class="badge bg-warning">Proses</span>
                                                @elseif($rent->status == 'diterima')
                                                    <span class="badge bg-success">Diterima</span>
                                                @elseif($rent->status == 'ditolak')
                                                    <span class="badge bg-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            <td class="text-center">{{ $rent->reject_note ?? '-' }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-success print-btn" id="printButton"
                                                    href="{{ route('printSurat', $rent->id) }}" target="_blank" role="button"
                                                    data-rent-id="{{ $rent->id }}"><i
                                                        class="bi bi-printer"></i></a>
                                            </td>
                                            <td class="text-center">
                                                @if ($rent->status == 'proses')
                                                    <a type="button"class="btn btn-primary edit-btn"
                                                        href="javascript:;"
                                                        data-rent-id="{{ $rent->id }}">Edit</a>
                                                @endif
                                                <a class="btn btn-danger delete-btn"
                                                    data-rent-id="{{ $rent->id }}" href="javascript:;"
                                                    type="button">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <br>
                        <br><br>
                    </div>
                </div>
            </div>
            <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div>
        <!-- End Slider View -->
        @include('back.pages.modalEditPeminjaman')
    </header>
    <!--====== HEADER PART ENDS ======-->

    <!--====== FOOTER PART START ======-->
    <footer id="footer" class="footer-area pt-200">
        <div class="container">

            <div class="footer-widget pb-20 mt-200">
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
    <script src="landing/assets/js/bootstrap.bundle.min.js"></script>
    <script src="landing/assets/js/wow.min.js"></script>
    <script src="landing/assets/js/glightbox.min.js"></script>
    <script src="landing/assets/js/count-up.min.js"></script>
    <script src="landing/assets/js/particles.min.js"></script>
    <script src="landing/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            if (!csrfTokenMeta) {
                console.error('Meta tag for CSRF token not found!');
                return;
            }
            const csrfToken = csrfTokenMeta.getAttribute('content');

            function formatDateForInput(date) {
                const d = new Date(date);
                const year = d.getFullYear();
                const month = String(d.getMonth() + 1).padStart(2, '0');
                const day = String(d.getDate()).padStart(2, '0');
                const hours = String(d.getHours()).padStart(2, '0');
                const minutes = String(d.getMinutes()).padStart(2, '0');
                return `${year}-${month}-${day}T${hours}:${minutes}`;
            }
            document.querySelectorAll('.edit-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    const rentId = this.getAttribute('data-rent-id');
                    const form = document.getElementById('editBookingForm');
                    form.action = `/update-peminjaman/${rentId}`;
                    console.log('Rent ID:', rentId);
                    fetch(`/api/rent/${rentId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                alert('Error fetching rent data.');
                                return;
                            }
                            document.getElementById('facility').value = data.facility.name;
                            document.getElementById('name').value = data.user.name;
                            document.getElementById('start').value = formatDateForInput(data
                                .start);
                            document.getElementById('end').value = formatDateForInput(data.end);
                            // Check form action URL
                            const form = document.getElementById('editBookingForm');
                            console.log('Form Action URL:', form.action);
                            const editBookingModal = new bootstrap.Modal(document
                                .getElementById('editBookingModal'));
                            editBookingModal.show();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            alert('An error occurred while fetching rent data.');
                        });
                });
            });
            document.querySelectorAll('.delete-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    const rentId = this.getAttribute('data-rent-id');
                    Swal.fire({
                        title: 'Hapus Peminjaman',
                        text: "Apakah Anda yakin ingin menghapus peminjaman ini?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, Hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            fetch(`/delete-rent/${rentId}`, {
                                    method: 'DELETE',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': csrfToken
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        Swal.fire(
                                            'Dihapus!',
                                            'Peminjaman telah dihapus.',
                                            'success'
                                        ).then(() => {
                                            window.location.reload();
                                        });
                                    } else {
                                        Swal.fire(
                                            'Gagal!',
                                            'Terjadi kesalahan saat menghapus peminjaman.',
                                            'error'
                                        );
                                    }
                                })
                                .catch(error => {
                                    Swal.fire(
                                        'Error!',
                                        'Terjadi kesalahan saat menghubungi server.',
                                        'error'
                                    );
                                });
                        }
                    });
                });
            });
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

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{!! session('error') !!}',
                    confirmButtonText: 'OK'
                });
            @endif
        });
    </script>
    <script>
        document.querySelectorAll('.print-btn').forEach(button => {
            button.addEventListener('click', function() {
                var rentId = this.getAttribute('data-rent-id');
                fetch(`/print-surat/${rentId}`)
                    .then(response => response.text())
                    .then(data => {
                        var printTab = window.open('', '_blank');
                        printTab.document.open();
                        printTab.document.write('<html><head>');
                        printTab.document.write('</head><body>');
                        printTab.document.write(data);
                        printTab.document.write('</body></html>');
                        printTab.document.close();
                        printTab.onbeforeunload = function() {
                            window.history.replaceState(null, document.title, window.location.href);
                        };
                        printTab.focus();
                        printTab.print();
                        printTab.onafterprint = function() {
                            printTab.close();
                        };
                        printTab.addEventListener('load', function() {
                            setTimeout(() => {
                                if (printTab.document.body.innerHTML.trim() === '') {
                                    printTab.close();
                                }
                            }, 1000);
                        });
                    })
                    .catch(error => {
                        console.error('Error fetching print content:', error);
                    });
            });
        });
    </script>





    {{-- <script>
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
    </script> --}}

</body>

</html>
