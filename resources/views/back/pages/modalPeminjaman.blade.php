<div id="bookingModal" class="modal fade" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Book Facility</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> 
                <form id="bookingForm" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" id="eventId" name="eventId" value="{{ $facility->id }}">
                    <div class="mb-3">
                        <label for="name" class="form-label">Peminjam:</label>
                        <input type="text" id="name" class="form-control" value="{{ isset($rent) ? $rent->user->name : auth()->user()->name }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="opd" class="form-label">OPD:</label>
                        <input type="text" id="opd" class="form-control" value="{{ isset($rent) ? $rent->user->opd : auth()->user()->opd }}"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nip" class="form-label">NIP:</label>
                        <input type="text" id="nip" value="{{ isset($rent) ? $rent->user->nip : auth()->user()->nip }}" class="form-control"
                            readonly>
                    </div>
                    <div class="mb-3">
                        <label for="start" class="form-label">Dari Tanggal:</label>
                        <input type="datetime-local" id="start" value="{{ isset($rent) ? $rent->start : '' }}" name="start" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="end" class="form-label">Sampai Tanggal:</label>
                        <input type="datetime-local" id="end" value="{{ isset($rent) ? $rent->end : '' }}" name="end" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="surat" class="form-label">Surat Peminjaman (PDF only):</label>
                        <input type="file" id="surat" name="surat" class="form-control" accept=".pdf"
                            required>
                    </div>
                    @if ($facility->pembayaran == 'ya')
                        <div class="mb-3">
                            <label for="pembayaran" class="form-label">Bukti Pembayaran (Image only - JPG, JPEG,
                                PNG):</label>
                            <input type="file" id="pembayaran" name="pembayaran" class="form-control"
                                accept=".jpg,.jpeg,.png">
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="successModal" class="modal fade" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Booking Successful</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Your booking has been saved successfully!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<style>
    .is-invalid {
        border-color: #dc3545;
    }
</style>
