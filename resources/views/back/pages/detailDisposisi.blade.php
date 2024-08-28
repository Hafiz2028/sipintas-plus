@extends('back.layout.admin-layout')
@section('content')
    <div x-data="finance">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Disposisi</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Detail</span>
            </li>
        </ul>
        @if (auth()->check() && auth()->user()->role === 'admin')
            <form class="space-y-5 panel mt-6" method="POST" action="{{ route('admin.disposisi.update', $rent->id) }}">
            @elseif (auth()->check() && auth()->user()->role === 'kabag')
                <form class="space-y-5 panel mt-6" method="POST" action="{{ route('kabag.disposisi.update', $rent->id) }}">
        @endif
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="name">Nama</label>
                <input id="name" value="{{ $rent->user->name }}" type="Text" placeholder="Enter Name"
                    class="form-input text-white-dark" readonly>
            </div>
            <div>
                <label for="opd">OPD</label>
                <input id="opd" value="{{ $rent->user->opd }}" type="Text" placeholder="Enter OPD"
                    class="form-input text-white-dark" readonly>
            </div>
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 gap-3">
            <div>
                <label for="facility">Fasilitas Yang Dipinjam</label>
                <input id="facility" type="text" placeholder="Enter Facility"
                    value="{{ $rent->facility->name }} | Kategori {{ $rent->facility->facilityType->name }}"
                    class="form-input text-white-dark" readonly>
            </div>
            <div>
                <label for="agenda">Agenda Kegiatan</label>
                <input id="agenda" type="text" placeholder="Enter Agenda" value="{{ $rent->agenda }}"
                    class="form-input text-white-dark" readonly>
            </div>
            @if ($rent->facility->facilityType->name == 'Kendaraan')
                <div>
                    <label for="tujuan">Tujuan Kegiatan</label>
                    <input id="tujuan" type="text" placeholder="Enter Tujuan" value="{{ $rent->rentDetail->tujuan }}"
                        class="form-input text-white-dark" readonly>
                </div>
            @endif
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-3">
            <div>
                <label for="rent_date">Tanggal Peminjaman</label>
                <input id="rent_date"
                    value="{{ \Carbon\Carbon::parse($rent->created_at)->locale('id')->translatedFormat('H:i | d F Y') }}"
                    type="text" placeholder="Enter Date" class="form-input text-white-dark" readonly>
            </div>
            <div>
                <label for="start">Tanggal Pakai</label>
                <input id="start"
                    value="{{ \Carbon\Carbon::parse($rent->start)->locale('id')->translatedFormat('d F Y') }}"
                    type="text" placeholder="Enter Start" class="form-input text-white-dark" readonly>
            </div>
            <div>
                <label for="hour">Jam Pakai</label>
                <input id="hour"
                    value="{{ \Carbon\Carbon::parse($rent->start)->locale('id')->translatedFormat('H:i') }}" type="text"
                    placeholder="Enter Hour" class="form-input text-white-dark" readonly>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-3">
            <div>
                <label for="nip">NIP</label>
                <input id="nip" type="email" value="{{ $rent->user->nip }}" class="form-input text-white-dark"
                    readonly />
            </div>
            <div>
                <label for="no_hp">No Hp</label>
                <input id="no_hp" type="Text" value="{{ $rent->user->no_hp }}" class="form-input text-white-dark"
                    readonly />
            </div>
        </div>

        @if (
            $rent->facility->facilityType->name == 'Kendaraan' &&
                $rent->rentDetail &&
                ($rent->rentDetail->sppd == 'ya' || $rent->rentDetail->bbm == 'ya'))
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
                @if ($rent->rentDetail->sppd == 'ya')
                    <div>
                        <label for="sppd_agreement">
                            Perizinan SPPD<span style="color: red;font-weight: bold; font-size: 1rem;">*</span>
                        </label>
                        <select id="sppd_agreement" name="sppd_agreement" class="form-select" required
                            style="border: 1px solid #ced4da; padding: 0.375rem 0.75rem; border-radius: 0.25rem;">
                            <option value="" disabled selected>Pembebanan SPPD oleh Biro Umum?</option>
                            <option value="diterima"
                                {{ $rent->rentDetail->sppd_agreement == 'diterima' ? 'selected' : '' }}>Izinkan</option>
                            <option value="ditolak" {{ $rent->rentDetail->sppd_agreement == 'ditolak' ? 'selected' : '' }}>
                                Ditolak</option>
                        </select>
                    </div>
                @endif
                @if ($rent->rentDetail->bbm == 'ya')
                    <div>
                        <label for="bbm_agreement">
                            Perizinan BBM<span style="color: red;font-weight: bold; font-size: 1rem;">*</span>
                        </label>
                        <select id="bbm_agreement" name="bbm_agreement" class="form-select" required
                            style="border: 1px solid #ced4da; padding: 0.375rem 0.75rem; border-radius: 0.25rem;">
                            <option value="" disabled selected>Pembebanan BBM oleh Biro Umum?</option>
                            <option value="diterima"
                                {{ $rent->rentDetail->bbm_agreement == 'diterima' ? 'selected' : '' }}>Izinkan</option>
                            <option value="ditolak" {{ $rent->rentDetail->bbm_agreement == 'ditolak' ? 'selected' : '' }}>
                                Ditolak</option>
                        </select>
                    </div>
                @endif
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 mt-4">
            <div>
                <label for="status">
                    Perizinan<span style="color: red;font-weight: bold; font-size: 1rem;">*</span>
                </label>
                <select id="status" name="status" class="form-select" required
                    style="border: 1px solid #ced4da; padding: 0.375rem 0.75rem; border-radius: 0.25rem;">
                    <option value="" disabled selected>Pilih status perizinan</option>
                    <option value="diterima" {{ $rent->status == 'diterima' ? 'selected' : '' }}>Izinkan</option>
                    <option value="ditolak" {{ $rent->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>
            <div id="reject-note-container" style="display: none;">
                <label id="reject-note-label" for="reject_note">Alasan Penolakan<span
                        style="color: red;font-weight: bold; font-size: 1rem;">*</span></label>
                <input id="reject_note" type="text" name="reject_note" class="form-input"
                    placeholder="Tambahkan Alasan Peminjaman Ditolak" value="{{ $rent->reject_note }}"
                    style="border: 1px solid #ced4da; padding: 0.375rem 0.75rem; border-radius: 0.25rem;" />
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label>Surat Peminjaman</label>
                <embed type="application/pdf" src="/surat_peminjaman/{{ $rent->surat }}" width="100%"
                    height="500"></embed>
            </div>
            @if ($rent->facility->pembayaran == 'ya' && $rent->rentPayment && $rent->rentPayment->bukti_pembayaran)
                @php
                    $fileExtension = pathinfo($rent->rentPayment->bukti_pembayaran, PATHINFO_EXTENSION);
                    $isPdf = strtolower($fileExtension) === 'pdf';
                    $isImage = in_array(strtolower($fileExtension), ['jpg', 'jpeg', 'png', 'gif']);
                @endphp
                <div>
                    <label>Bukti Pembayaran</label>
                    @if ($isPdf)
                        <embed type="application/pdf" src="/bukti_pembayaran/{{ $rent->rentPayment->bukti_pembayaran }}"
                            width="100%" height="500">
                    @elseif ($isImage)
                        <img src="/bukti_pembayaran/{{ $rent->rentPayment->bukti_pembayaran }}" alt="Bukti Pembayaran"
                            style="max-width: 100%; height: auto;">
                    @else
                        <p>File format not supported.</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center justify-center gap-4">
            @if (auth()->check() && auth()->user()->role === 'admin')
                <button type="button" class="btn btn-warning"><a
                        href="{{ route('admin.disposisi.index') }}">Back</a></button>
            @elseif (auth()->check() && auth()->user()->role === 'kabag')
                <button type="button" class="btn btn-warning"><a
                        href="{{ route('kabag.disposisi.index') }}">Back</a></button>
            @endif
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var statusSelect = document.getElementById('status');
            var rejectNoteContainer = document.getElementById('reject-note-container');
            var rejectNoteInput = document.getElementById('reject_note');
            var rejectNoteLabel = document.getElementById('reject-note-label');

            function toggleRejectNote() {
                if (statusSelect.value === 'ditolak') {
                    rejectNoteContainer.style.display = 'block';
                    rejectNoteLabel.innerHTML =
                        'Alasan Penolakan<span style="color: red;font-weight: bold; font-size: 1rem;">*</span>';
                    rejectNoteInput.setAttribute('required', 'required');
                    rejectNoteInput.placeholder = 'Berikan Alasan Peminjaman ditolak';
                } else if (statusSelect.value === 'diterima') {
                    rejectNoteContainer.style.display = 'block';
                    rejectNoteLabel.innerHTML =
                        'Keterangan Tambahan<span style="color: red;font-weight: bold; font-size: 1rem;">*</span>';
                    rejectNoteInput.setAttribute('required', 'required');
                    rejectNoteInput.placeholder = 'Berikan Keterangan Tambahan jika diperlukan';
                } else {
                    rejectNoteContainer.style.display = 'none';
                    rejectNoteInput.removeAttribute('required');
                    rejectNoteInput.placeholder = '';
                }
            }
            toggleRejectNote();
            statusSelect.addEventListener('change', toggleRejectNote);
        });
    </script>
@endpush
