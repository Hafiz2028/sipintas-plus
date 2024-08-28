<div id="editBookingModal" class="modal fade" tabindex="-1" aria-labelledby="editBookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBookingModalLabel">Book Facility</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editBookingForm" enctype="multipart/form-data" method="POST"
                    action="{{ route('update-peminjaman', $rent->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="facility" class="form-label">Fasilitas:</label>
                        <input type="text" id="facility" class="form-control text-white-dark" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Peminjam:</label>
                        <input type="text" id="name" class="form-control" readonly>
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
                    {{--
                    <div class="mb-3">
                        <label for="start" class="form-label">Dari Tanggal:</label>
                        <input type="datetime-local" id="start" name="start" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">Sampai Tanggal:</label>
                        <input type="datetime-local" id="end" name="end" class="form-control" required>
                    </div> --}}
                    <div class="mb-3">
                        <label for="agenda" class="form-label">Agenda:</label>
                        <input type="text" id="agenda" name="agenda" class="form-control" required>
                    </div>
                    <div style="display: none" id="kendaraaanSection">
                        <div class="mb-3">
                            <label for="tujuan" class="form-label">Tujuan:</label>
                            <input type="text" id="tujuan" name="tujuan" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="sppd" class="form-label">Pembebanan Dana SPPD ke Pihak Biro Umum:</label>
                            <div>
                                <input type="radio" id="sppd_ya" name="sppd" value="ya">
                                <label for="sppd_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="sppd_tidak" name="sppd" value="tidak">
                                <label for="sppd_tidak">Tidak</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="bbm" class="form-label">Pembebanan Dana BBM ke Pihak Biro Umum:</label>
                            <div>
                                <input type="radio" id="bbm_ya" name="bbm" value="ya">
                                <label for="bbm_ya">Ya</label>
                            </div>
                            <div>
                                <input type="radio" id="bbm_tidak" name="bbm" value="tidak">
                                <label for="bbm_tidak">Tidak</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="surat" class="form-label">Surat Peminjaman (maks 5MB) (PDF only):</label>
                        <br>
                        <a href="#" id="existingSuratLink" target="_blank" style="display: none;">Lihat Surat
                            Sebelumnya</a>
                        <input type="file" id="surat" name="surat" class="form-control" accept=".pdf">
                        <small>jangan tambahkan surat baru jika tidak ingin mengubah surat</small>
                    </div>
                    <div class="mb-3" id="paymentSection" style="display: none;">
                        <label for="pembayaran" class="form-label">Bukti Pembayaran (maks 5MB) (JPG, JPEG,
                            PNG, PDF):</label>
                        <br>
                        <a href="#" id="existingPaymentLink" target="_blank" style="display: none;">Lihat
                            Bukti
                            Pembayaran Sebelumnya</a>
                        <input type="file" id="pembayaran" name="pembayaran" class="form-control"
                            accept=".jpg,.jpeg,.png,.pdf">
                        <small>jangan tambahkan bukti pembayaran baru jika tidak ingin mengubah bukti pembayaran
                            sebelumnya</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
