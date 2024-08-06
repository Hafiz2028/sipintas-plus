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
    <form class="space-y-5 panel mt-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="gridEmail">Nama</label>
                <input id="gridEmail" type="Text" placeholder="Enter Email" class="form-input"
                    readonly />
            </div>
            <div>
                <label for="gridPassword">OPD</label>
                <input id="gridPassword" type="Text" placeholder="Enter Password"
                    class="form-input" readonly />
            </div>
        </div>
        <div>
            <label for="gridAddress1">Fasilitas Yang Dipinjam</label>
            <input id="gridAddress1" type="text" placeholder="Enter Address" value="1234 Main St"
                class="form-input" readonly />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-3">
            <div>
                <label for="gridCity">Tanggal Peminjanam</label>
                <input id="gridCity" type="text" placeholder="Enter City" class="form-input" />
            </div>
            <div>
                <label for="gridState">Tanggal Pakai</label>
                <input id="gridCity" type="text" placeholder="Enter City" class="form-input" />
            </div>
            <div>
                <label for="gridZip">Jam Pakai</label>
                <input id="gridZip" type="text" placeholder="Enter Zip" class="form-input" />
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="gridEmail">E-mail</label>
                <input id="gridEmail" type="email" value="email@gmail.com" class="form-input"
                    readonly />
            </div>
            <div>
                <label for="gridPassword">No Hp</label>
                <input id="gridPassword" type="Text" value="084563636" class="form-input"
                    readonly />
            </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label>Surat Peminjaman</label>
                <embed type="application/pdf" src="/back/surat/contoh_surat.pdf" width="100%"
                    height="500"></embed>
            </div>
            <div>
                <label for="gridPerizinan">Perizinan</label>
                <select id="ctnSelect1" class="form-select text-white-dark" required>
                    <option>pilih status perizinan</option>
                    <option>Izinkan</option>
                    <option>Ditolak</option>
                </select>
            </div>
        </div>
        <div class="flex items-center justify-center gap-4">
            <button type="button" class="btn btn-warning"><a
                    href="adminDisposisi.html">Back</a></button>
            <button type="button" class="btn btn-success"><a
                    href="adminDisposisi.html">Save</a></button>
        </div>
    </form>
</div>
@endsection
