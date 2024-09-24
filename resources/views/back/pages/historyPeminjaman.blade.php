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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <style>
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

        .aksi-btn {
            width: 70px;
            height: 38px;
        }

        .header-bg {
            position: relative;
            z-index: 5;
            background-position: bottom center;
            background-size: cover;
            background-repeat: no-repeat;
            width: 100%;
            height: 100%;
        }

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
        <div id="home" class="header-bg pb-50"
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
                                    @if ($user->rents->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center">
                                                <div class="alert alert-danger">Tidak ada peminjaman oleh User ini
                                                </div>
                                            </td>
                                        </tr>
                                    @else
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
                                                    @php
                                                        $start = \Carbon\Carbon::parse($rent->start);
                                                        $end = \Carbon\Carbon::parse($rent->end);
                                                        $diffInDays = $start->diffInDays($end);
                                                        $diffInHours = $start->diffInHours($end);
                                                    @endphp
                                                    @if ($diffInDays > 0)
                                                        {{ $diffInDays }} Hari
                                                    @else
                                                        {{ $diffInHours }} Jam
                                                    @endif
                                                </td>
                                                <td class="text-center fs-5">
                                                    @if (
                                                        $rent->status == 'proses kabag' ||
                                                            $rent->status == 'proses kabiro' ||
                                                            $rent->status == 'proses kasubag kdh' ||
                                                            $rent->status == 'proses kasubag wkdh' ||
                                                            $rent->status == 'proses kasubag dalam')
                                                        <span class="badge bg-warning">Proses</span>
                                                    @elseif($rent->status == 'diterima')
                                                        <span class="badge bg-success">Diterima</span>
                                                    @elseif($rent->status == 'ditolak')
                                                        <span class="badge bg-danger">Ditolak</span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if (
                                                        $rent->status == 'proses kabag' ||
                                                            $rent->status == 'proses kabiro' ||
                                                            $rent->status == 'proses kasubag kdh' ||
                                                            $rent->status == 'proses kasubag wkdh' ||
                                                            $rent->status == 'proses kasubag dalam')
                                                        <span class="badge bg-secondary">Peminjaman Sedang dalam Proses
                                                            Disposisi</span>
                                                    @else
                                                        <span
                                                            class="badge bg-secondary">{{ $rent->reject_note }}</span>
                                                    @endif
                                                    @if ($rent->facility && $rent->facility->facilityType && $rent->facility->facilityType->name == 'Kendaraan')
                                                        @if ($rent->rentDetail)
                                                            @if ($rent->rentDetail->sppd_agreement == 'diterima')
                                                                <span class="badge bg-success">Pembebanan SPPD
                                                                    Diizinkan</span><br>
                                                            @elseif($rent->rentDetail->sppd_agreement == 'ditolak')
                                                                <span class="badge bg-danger">Pembebanan SPPD
                                                                    Ditolak</span><br>
                                                            @elseif($rent->rentDetail->sppd_agreement == 'proses' || $rent->rentDetail->sppd_agreement == '')
                                                                <span class="badge bg-warning">Pengajuan Pembebanan
                                                                    SPPD
                                                                    dalam Proses</span><br>
                                                            @else
                                                                <span class="badge bg-danger">Data Tidak
                                                                    Valid</span><br>
                                                            @endif
                                                            @if ($rent->rentDetail->bbm_agreement == 'diterima')
                                                                <span class="badge bg-success">Pembebanan BBM
                                                                    Diizinkan</span><br>
                                                            @elseif($rent->rentDetail->bbm_agreement == 'ditolak')
                                                                <span class="badge bg-danger">Pembebanan BBM
                                                                    Ditolak</span><br>
                                                            @elseif($rent->rentDetail->bbm_agreement == 'proses' || $rent->rentDetail->bbm_agreement == 'proses')
                                                                <span class="badge bg-warning">Pengajuan Pembebanan BBM
                                                                    dalam Proses</span><br>
                                                            @else
                                                                <span class="badge bg-danger">Data Tidak Valid</span>
                                                            @endif
                                                        @else
                                                            <span class="badge bg-danger">Data SPPD atau BBM Tidak
                                                                Valid</span>
                                                        @endif
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($rent->status == 'diterima')
                                                        @if ($rent->facility->facilityType->name == 'Kendaraan' && $rent->rentDetail->sopir == null)
                                                            <a class="btn btn-warning text-white tolak-print"
                                                                href="#" role="button"
                                                                data-rent-id="{{ $rent->id }}"
                                                                data-status="{{ $rent->status }}"
                                                                data-driver="{{ $rent->rentDetail->sopir }}">
                                                                <i class="bi bi-printer"></i>
                                                            </a>
                                                        @else
                                                            <a class="btn btn-success print-btn" id="printButton"
                                                                href="{{ route('printSurat', $rent->id) }}"
                                                                target="_blank" role="button"
                                                                data-rent-id="{{ $rent->id }}"><i
                                                                    class="bi bi-printer"></i></a>
                                                        @endif
                                                    @elseif (
                                                        $rent->status == 'proses kabag' ||
                                                            $rent->status == 'proses kabiro' ||
                                                            $rent->status == 'ditolak' ||
                                                            $rent->status == 'proses kasubag kdh' ||
                                                            $rent->status == 'proses kasubag wkdh' ||
                                                            $rent->status == 'proses kasubag dalam')
                                                        <a class="btn btn-warning text-white tolak-print"
                                                            href="#" role="button"
                                                            data-rent-id="{{ $rent->id }}"
                                                            data-status="{{ $rent->status }}">
                                                            <i class="bi bi-printer"></i>
                                                        </a>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if ($rent->status == 'proses kabiro')
                                                        <a type="button"class="btn btn-primary aksi-btn edit-btn"
                                                            href="javascript:;"
                                                            data-rent-id="{{ $rent->id }}">Edit
                                                        </a>
                                                    @endif
                                                    <a class="btn btn-danger delete-btn mt-1"
                                                        data-rent-id="{{ $rent->id }}" href="javascript:;"
                                                        type="button">Hapus</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
    {{-- 488 --}}
    <!--====== Javascript Files ======-->
    <script src="landing/assets/js/bootstrap.bundle.min.js"></script>
    <script src="landing/assets/js/wow.min.js"></script>
    <script src="landing/assets/js/glightbox.min.js"></script>
    <script src="landing/assets/js/count-up.min.js"></script>
    <script src="landing/assets/js/particles.min.js"></script>
    <script src="landing/assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startDateInput = document.getElementById('start_date');
            const startTimeInput = document.getElementById('start_time');
            const endDateInput = document.getElementById('end_date');
            const endTimeInput = document.getElementById('end_time');

            const startDatePicker = flatpickr(startDateInput, {
                dateFormat: "Y-m-d",
            });

            const endDatePicker = flatpickr(endDateInput, {
                dateFormat: "Y-m-d",
            });
            const startTimePicker = flatpickr(startTimeInput, {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                minuteIncrement: 60,

            });

            const endTimePicker = flatpickr(endTimeInput, {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                minuteIncrement: 60,
            });

            function parseDateTime(dateTimeString) {
                const date = dateTimeString.split(' ')[0]; // Get date part
                const time = dateTimeString.split(' ')[1]; // Get time part
                return {
                    date: date,
                    time: time.slice(0, 5) // Format time to HH:mm
                };
            }

            function add60Minutes(date) {
                date.setMinutes(date.getMinutes() + 60);
                return date;
            }

            function subtract60Minutes(date) {
                date.setMinutes(date.getMinutes() - 60);
                return date;
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
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            if (!csrfTokenMeta) {
                console.error('Meta tag for CSRF token not found!');
                return;
            }
            const csrfToken = csrfTokenMeta.getAttribute('content');

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
            document.querySelectorAll('.edit-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    const rentId = this.getAttribute('data-rent-id');
                    const form = document.getElementById('editBookingForm');
                    form.action = `/update-peminjaman/${rentId}`;
                    console.log('Rent ID:', rentId);
                    fetch(`/api/rent/${rentId}`, {
                            method: 'GET',
                            headers: {
                                'Accept': 'application/json',
                                'X-CSRF-TOKEN': csrfToken
                            }
                        })
                        .then(response => {
                            console.log('Response Status:', response.status);
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Rent Data:', data);
                            if (data.error) {
                                console.error('Error in rent data response:', data
                                    .error); // Log specific error
                                alert('Error fetching rent data.');
                                return;
                            }
                            if (data.facility && data.facility.name) {
                                document.getElementById('facility').value = data.facility.name;
                            } else {
                                console.warn('Facility data is missing');
                            }
                            if (data.user && data.user.name) {
                                document.getElementById('name').value = data.user.name;
                            } else {
                                console.warn('User data is missing');
                            }
                            const startDateTime = data.start ? String(data.start) : '';
                            const endDateTime = data.end ? String(data.end) : '';
                            console.log('Start DateTime String:', startDateTime);
                            console.log('End DateTime String:', endDateTime);

                            if (startDateTime) {
                                setDateTimePickers(startDatePicker, startTimePicker,
                                    startDateTime);
                            }
                            if (endDateTime) {
                                setDateTimePickers(endDatePicker, endTimePicker, endDateTime);
                            }
                            if (data.agenda) {
                                document.getElementById('agenda').value = data.agenda;
                            } else {
                                console.warn('Agenda data is missing');
                            }
                            // Surat Peminjaman
                            const existingSuratLink = document.getElementById(
                                'existingSuratLink');
                            if (data.surat) {
                                existingSuratLink.href = `/surat_peminjaman/${data.surat}`;
                                existingSuratLink.style.display = 'inline';
                            } else {
                                existingSuratLink.style.display = 'none';
                            }
                            // Bukti Pembayaran
                            const paymentSection = document.getElementById('paymentSection');
                            if (data.facility.pembayaran === 'ya') {
                                paymentSection.style.display = 'block';
                                const existingPaymentLink = document.getElementById(
                                    'existingPaymentLink');
                                if (data.rent_payment && data.rent_payment.bukti_pembayaran) {
                                    existingPaymentLink.href =
                                        `/bukti_pembayaran/${data.rent_payment.bukti_pembayaran}`;
                                    existingPaymentLink.style.display = 'inline';
                                } else {
                                    existingPaymentLink.style.display = 'none';
                                }
                            } else {
                                paymentSection.style.display = 'none';
                            }
                            const kendaraanSection = document.getElementById(
                                'kendaraaanSection');
                            if (kendaraanSection && data.facility.facility_type && data.facility
                                .facility_type.name === 'Kendaraan' && data.rent_detail) {
                                kendaraanSection.style.display = 'block';
                                document.getElementById('tujuan').value = data.rent_detail
                                    .tujuan || '';

                                // Set radio buttons for sppd
                                const sppdYa = document.getElementById('sppd_ya');
                                const sppdTidak = document.getElementById('sppd_tidak');
                                if (sppdYa && sppdTidak) {
                                    sppdYa.checked = data.rent_detail.sppd === 'ya';
                                    sppdTidak.checked = data.rent_detail.sppd === 'tidak';
                                }

                                // Set radio buttons for bbm
                                const bbmYa = document.getElementById('bbm_ya');
                                const bbmTidak = document.getElementById('bbm_tidak');
                                if (bbmYa && bbmTidak) {
                                    bbmYa.checked = data.rent_detail.bbm === 'ya';
                                    bbmTidak.checked = data.rent_detail.bbm === 'tidak';
                                }
                            } else if (kendaraanSection) {
                                kendaraanSection.style.display = 'none';
                            }
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
        document.addEventListener('DOMContentLoaded', function() {
            var printButtons = document.querySelectorAll('.tolak-print');

            printButtons.forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();

                    var status = button.getAttribute('data-status');
                    var driverName = button.getAttribute('data-driver');

                    if (status === 'proses kabiro' || status === 'proses kabag' || status ===
                        'proses kasubag kdh' || status === 'proses kasubag wkdh' || status ===
                        'proses kasubag dalam') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Tidak Bisa Cetak Surat Izin',
                            text: 'Tidak Bisa Cetak Surat Izin karena peminjaman dalam status Proses.',
                            confirmButtonText: 'OK'
                        });
                    } else if (status === 'ditolak') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Tidak Bisa Cetak Surat Izin',
                            text: 'Tidak Bisa Cetak Surat Izin karena status Peminjaman Ditolak.',
                            confirmButtonText: 'OK'
                        });
                    } else if (status === 'diterima' && !driverName) {
                        Swal.fire({
                            icon: 'info',
                            title: 'Tidak Bisa Cetak Surat Izin',
                            text: 'Nama Sopir belum ditambahkan, Silahkan Menunggu Admin menambahkan nama Sopir.',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
