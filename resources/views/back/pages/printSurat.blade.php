<head>
    <title>Surat Pemberitahuan</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

    <style>
        body {
            print-color-adjust: exact;
            line-height: 1;
            margin-right: 1.4cm;
            margin-left: 1.4cm;
            margin-top: 0.5cm;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }

            @page {
                size: A4;
                size: portrait;
            }
        }

        .number-section {
            font-size: 14px;
        }

        .number-section .number {
            width: 5%;
        }

        .number-section .title {
            width: 240px;
        }

        .number-section .value {
            width: auto;
        }

        .print-hidden {
            display: none;
        }

        @media print {
            .print-hidden {
                display: none;
            }

            .print-show {
                display: block;
            }
        }
    </style>

</head>

<body>
    <div class="print-hidden print-show" id="printArea">
        <table cellscellspacing="0" style="width: 100%;">
            <tr>
                <td>
                    <img src="/back/image/logo/logo.png" alt="Logo Sumatera Barat" width="65dp">
                </td>
                <td style="text-align: center; padding-right: 13%;">
                    <span style="font-size: 16; font-weight: bold;">PEMERINTAH PROVINSI SUMATERA BARAT<br></span>
                    <span style="font-size: 26; font-weight: bold;">SEKRETARIAT DAERAH<br></span>
                    <span style="font-size: 11;">Jalan Jendral Sudirman No. 51 Telp. 31401 – 31402 – 34425 Padang <br>
                        <a href="">http://www.sumbarprov.go.id</a> – e-mail: biro_umum@sumbarprov.go.id
                    </span>
                </td>
            <tr>
                <td colspan=" 2">
                    <span style="width:100%; background-color: black; display: block; height: 0.2em;"></span>
                </td>
            </tr>
            <tr>
                <td colspan="2"
                    style="font-size: 14; font-weight: bold; text-decoration: underline; text-align: center; padding-top: 20px;">
                    SURAT IZIN PEMAKAIAN FASILITAS</td>
            </tr>
        </table>
        <table>
            <tr>
                <td colspan="2" style="font-size: 14px; text-align: justify; padding-top: 10px;">
                    Yang bertanda tangan di bawah ini Kepala Biro Umum Sekretariat Daerah Provinsi Sumatera Barat,
                    dengan ini
                    menerangkan bahwa :
                </td>
            </tr>
        </table>

        <!-- Bagian Angka -->
        <table>
            <tr>
                <td class="title">Nama</td>
                <td class="value">: {{ $rent->user->name }} </td>
            </tr>
            <tr>
                <td class="title">Nomor Induk Pegawai (NIP) &nbsp;</td>
                <td class="value">: {{ $rent->user->nip }}</td>
            </tr>
            <tr>
                <td class="title">Organisasi Pemerintah <br> Daerah (OPD)</td>
                <td class="value">: {{ $rent->user->opd }}</td>
            </tr>
            <tr>
                <td class="title">Fasilitas </td>
                <td class="value">: {{ $rent->facility->name }}</td>
            </tr>
            <tr>
                <td class="title">Tanggal Pemakaian</td>
                <td class="value">: {{ \Carbon\Carbon::parse($rent->start)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td class="title">Jam Mulai</td>
                <td class="value">: {{ \Carbon\Carbon::parse($rent->start)->translatedFormat('h : m') }} WIB</td>
            </tr>
            <tr>
                <td class="title">Tanggal Selesai</td>
                <td class="value">: {{ \Carbon\Carbon::parse($rent->end)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td class="title">Jam Selesai</td>
                <td class="value">: {{ \Carbon\Carbon::parse($rent->end)->translatedFormat('h : m') }} WIB</td>
            </tr>
            <tr>
                <td class="title">No Hp / WA</td>
                <td class="value">: {{ $rent->user->no_hp }}</td>
            </tr>
            <tr>
                <td class="title">Status Peminjaman</td>
                <td class="value">: {{ ucfirst($rent->status) }}</td>
            </tr>
        </table>
        <br>
        <span style="font-size: 14; text-align: justify; padding-top: 16px;">
            Bahwa nama yang terlampir di atas telah mendapatkan izin pemakaian fasilitas yang dikelola Sekretariat
            Daerah
            Provinsi Sumatera Barat sesuai data yang tertara.
        </span>
        <p></p>
        <span style="font-size: 14; text-align: justify;">
            Surat Keterangan ini dipergunakan untuk izin pemakaian fasilitas yang dikelola Sekretariat Daerah Provinsi
            Sumatera Barat.
        </span>
        <p></p>
        <span style="font-size: 14; text-align: justify;">
            Demikian surat keterangan ini dibuat dengan sebenarnya dan diberikan kepada yang bersangkutan untuk dapat
            dipergunakan sebagaimana perlunya.
        </span>

        <table style="width: 100%;">
            <tr>
                <td style=" padding-left: 70%;">
                    <div style="font-size: 14; padding-top: 100px; height: auto; right: auto;">
                        Padang, 22 Agustus 2024<br>
                        <b>Kepala Biro Umum,</b><br>
                        <div id="qrcode"></div>
                        <div style="font-weight: bold;">Ir, Edi Dharma Syafni, M.Si
                        </div>
                        <div style="font-weight: bold;">Pembina Utama Muda (IV/c)</div>
                        <div style="font-weight: bold;">NIP. 19680513 199403 1 014</div>
                    </div>
                </td>
            </tr>
        </table>
        <script>
            var imageUrl = "https://sipintasplus.setdaprovsumbar.com/logo.png"; // Ganti dengan URL gambar Anda
            var qrcode = new QRCode(document.getElementById("qrcode"), {
                text: imageUrl,
                width: 100, // Lebar QR code
                height: 100 // Tinggi QR code
            });
            window.onload = function() {
                window.print();
            };
        </script>
    </div>
</body>
