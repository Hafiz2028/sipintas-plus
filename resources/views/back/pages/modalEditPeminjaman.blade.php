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
                        <input type="text" id="facility" class="form-control text-white-dark"
                            value="{{ $rent->facility->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Peminjam:</label>
                        <input type="text" id="name" class="form-control" value="{{ $rent->user->name }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="start" class="form-label">Dari Tanggal:</label>
                        <input type="datetime-local" id="start" value="{{ $rent->start->format('Y-m-d\TH:i') }}"
                            name="start" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">Sampai Tanggal:</label>
                        <input type="datetime-local" id="end" value="{{ $rent->end->format('Y-m-d\TH:i') }}"
                            name="end" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="surat" class="form-label">Surat Peminjaman (PDF only):</label>
                        @if ($rent->surat)
                            <a href="{{ asset('surat_peminjaman/' . $rent->surat) }}" target="_blank">Lihat Surat yang
                                sudah Ada</a>
                        @endif
                        <input type="file" id="surat" name="surat" class="form-control" accept=".pdf">
                        <small>jangan tambahkan surat baru jika tidak ingin mengubah surat</small>
                    </div>
                    @if ($rent->facility->pembayaran == 'ya')
                        <div class="mb-3">
                            <label for="pembayaran" class="form-label">Bukti Pembayaran (Image only - JPG, JPEG,
                                PNG):</label>
                            @if ($rent->rentPayment && $rent->rentPayment->bukti_pembayaran)
                                <a href="{{ asset('bukti_pembayaran/' . $rent->rentPayment->bukti_pembayaran) }}"
                                    target="_blank">Lihat Bukti Pembayaran Sebelumnya</a>
                            @endif
                            <input type="file" id="pembayaran" name="pembayaran" class="form-control"
                                accept=".jpg,.jpeg,.png">
                            <small>jangan tambahkan bukti pembayaran baru jika tidak ingin mengubah bukti pembayaran
                                sebelumnya</small>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
