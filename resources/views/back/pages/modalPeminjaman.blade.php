<div id="bookingModal" class="modal fade" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Pinjam Fasilitas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="bookingForm" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" id="eventId" name="eventId" value="{{ $facility->id }}">
                    <input type="hidden" id="facilityTypeName" value="{{ $facility->facilityType->name }}">
                    <div class="mb-3">
                        <label for="fasilitas" class="form-label">Fasilitas:</label>
                        <input type="text" id="fasilitas" class="form-control" value="{{ $facility->name }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Peminjam:</label>
                        <input type="text" id="name" class="form-control"
                            value="{{ isset($rent) ? $rent->user->name : auth()->user()->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="opd" class="form-label">OPD:</label>
                        <input type="text" id="opd" class="form-control"
                            value="{{ isset($rent) ? $rent->user->opd : auth()->user()->opd }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="agenda" class="form-label">Agenda:<span
                                style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                        <input type="text" id="agenda" name="agenda"
                            value="{{ isset($rent) ? $rent->agenda : '' }}" class="form-control">
                    </div>



                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                        <div style="margin-right: 20px;">
                            <label for="start_date">Dari Tanggal <span
                                    style="color: red; font-weight: bold; font-size: 1.3rem;">*</span></label>
                            <input type="text" id="start_date" name="start_date" class="form-input flatpickr-input"
                                placeholder="Pilih Tanggal Mulai" required style="display: block; margin-top: 5px;">
                        </div>
                        <div>
                            <label for="start_time">Jam <span
                                    style="color: red; font-weight: bold; font-size: 1.3rem;">*</span></label>
                            <input type="text" id="start_time" name="start_time" class="form-input flatpickr-input"
                                placeholder="Pilih Jam Mulai" required style="display: block; margin-top: 5px;">
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; margin-bottom: 15px;">
                        <div style="margin-right: 20px;">
                            <label for="end_date">Hingga Tanggal <span
                                    style="color: red; font-weight: bold; font-size: 1.3rem;">*</span></label>
                            <input type="text" id="end_date" name="end_date" class="form-input flatpickr-input"
                                placeholder="Pilih Tanggal Selesai" required style="display: block; margin-top: 5px;">
                        </div>
                        <div>
                            <label for="end_time">Jam <span
                                    style="color: red; font-weight: bold; font-size: 1.3rem;">*</span></label>
                            <input type="text" id="end_time" name="end_time" class="form-input flatpickr-input"
                                placeholder="Pilih Jam Selesai" required style="display: block; margin-top: 5px;">
                        </div>
                    </div>

                    @if ($facility->facilityType->name == 'Kendaraan')
                        <div class="mb-3">
                            <label for="tujuan" class="form-label">Tujuan:<span
                                    style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                            <input type="text" id="tujuan" name="tujuan"
                                value="{{ isset($rent) ? $rent->tujuan : '' }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pembebanan SPPD oleh Biro Umum?<span
                                    style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                            <div class="form-check">
                                <input type="radio" id="sppd_yes" name="sppd" value="ya"
                                    class="form-check-input"
                                    {{ isset($rent) && $rent->rentDetail->sppd == 'ya' ? 'checked' : '' }}>
                                <label for="sppd_yes" class="form-check-label">Ya</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="sppd_no" name="sppd" value="tidak"
                                    class="form-check-input"
                                    {{ isset($rent) && $rent->rentDetail->sppd == 'tidak' ? 'checked' : '' }}>
                                <label for="sppd_no" class="form-check-label">Tidak</label>
                            </div>
                            <div class="invalid-feedback">Pembebanan SPPD harus dipilih.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Pembebanan BBM oleh Biro Umum?<span
                                    style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                            <div class="form-check">
                                <input type="radio" id="bbm_yes" name="bbm" value="ya"
                                    class="form-check-input"
                                    {{ isset($rent) && $rent->rentDetail->bbm == 'ya' ? 'checked' : '' }}>
                                <label for="bbm_yes" class="form-check-label">Ya</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="bbm_no" name="bbm" value="tidak"
                                    class="form-check-input"
                                    {{ isset($rent) && $rent->rentDetail->bbm == 'tidak' ? 'checked' : '' }}>
                                <label for="bbm_no" class="form-check-label">Tidak</label>
                            </div>
                            <div class="invalid-feedback">Pembebanan BBM harus dipilih.</div>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="surat" class="form-label">Surat Peminjaman (format PDF):<span
                                style="color: red; font-weight: bold; font-size: 1.3rem;">*</span></label>
                        <input type="file" id="surat" name="surat" class="form-control" accept=".pdf">
                        {{-- <small>Jangan tambahkan surat baru jika tidak ingin mengubah surat</small> --}}
                    </div>
                    @if ($facility->pembayaran == 'ya')
                        <div class="mb-3">
                            <label for="pembayaran" class="form-label">Bukti Pembayaran (Image (JPG, JPEG,
                                PNG) & PDF only):<span
                                    style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                            <input type="file" id="pembayaran" name="pembayaran" class="form-control"
                                accept=".jpg,.jpeg,.png,.pdf">
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Tambah Peminjaman</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        aria-label="Close">Batal</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="successModal" class="modal fade" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Peminjaman Berhasil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Peminjaman berhasil dilakukan!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
            </div>
        </div>
    </div>
</div>
<style>
    .is-invalid {
        border-color: #dc3545;
    }
</style>
