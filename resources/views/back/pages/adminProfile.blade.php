@extends('back.layout.admin-layout')
@section('content')
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <!-- start main content section -->
        <div>
            <ul class="flex space-x-2 rtl:space-x-reverse">
                <li>
                    <a href="javascript:;" class="text-primary hover:underline">Users</a>
                </li>
                <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                    <span>Profile</span>
                </li>
            </ul>
            <div x-data="modal">
                <div class="pt-5">
                    <div
                        class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                        <h6 class="mb-5 text-lg font-bold">Profile</h6>
                        <div class="flex flex-col sm:flex-row">
                            <div class="mb-5 w-full sm:w-2/12 ltr:sm:mr-4 rtl:sm:ml-4">
                                <a href="javascript:;"
                                    onclick="event.preventDefault();document.getElementById('adminProfilePictureFile').click();"
                                    class="edit-avatar"><i class="fas fa-pencil-alt"></i></a>
                                <img src="{{ $user->picture }}" alt="image"
                                    class="mx-auto h-20 w-20 rounded-full object-cover md:h-32 md:w-32"
                                    id="adminProfilePicture">
                                <input type="file" name="adminProfilePictureFile" id="adminProfilePictureFile"
                                    class="d-none" style="opacity:0">
                                <h5 class="text-lg font-bold text-center mt-3 mb-0">{{ $user->name }}</h5>
                                <label class="text-center mt-0 p-0"><i>{{ $user->role }}</i></label>
                            </div>
                            @if (auth()->check() && auth()->user()->role === 'admin')
                                <form action="{{ route('admin.update-profile') }}" method="POST">
                                @elseif (auth()->check() && auth()->user()->role === 'kabag')
                                    <form action="{{ route('kabag.update-profile') }}" method="POST">
                            @endif
                            @csrf
                            <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">
                                <div>
                                    <label for="name">Nama Lengkap</label>
                                    <input id="name" type="text" name="name" value="{{ $user->name }}"
                                        class="form-input">
                                </div>
                                <div>
                                    <label for="nip">NIP</label>
                                    <input id="nip" type="text" name="nip" value="{{ $user->nip }}"
                                        class="form-input">
                                </div>
                                <div>
                                    <label for="opd">OPD</label>
                                    <input id="opd" type="text" name="opd" value="{{ $user->opd }}"
                                        class="form-input">
                                </div>
                                <div>
                                    <label for="no_hp">Nomor HP</label>
                                    <input id="no_hp" type="text" name="no_hp" value="{{ $user->no_hp }}"
                                        class="form-input">
                                </div>
                                <div>
                                    <label for="password">Password</label>
                                    <input id="password" type="password" name="password" class="form-input">
                                    <small>Biarkan kosong jika tidak ingin mengubah password</small>
                                </div>
                                <div>
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input id="password_confirmation" type="password" name="password_confirmation"
                                        class="form-input">
                                    <small>Biarkan kosong jika tidak ingin mengubah password</small>
                                </div>
                                <div class="mt-3 sm:col-span-2">
                                    <button type="submit" class="btn btn-primary">Edit Profile</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end main content section -->
    </div>
@endsection
@push('scripts')
    <script>
        var userRole = '{{ auth()->user()->role }}';
        var processUrl;
        if (userRole === 'kabag') {
            processUrl = '{{ route('kabag.change-profile-picture') }}';
        } else if (userRole === 'kabiro') {
            processUrl = '{{ route('kabiro.change-profile-picture') }}';
        } else if (userRole === 'admin') {
            processUrl = '{{ route('admin.change-profile-picture') }}';
        } else if (userRole === 'superadmin') {
            processUrl = '{{ route('superadmin.change-profile-picture') }}';
        } else {
            console.error('Invalid role: ' + userRole);
        }

        $('input[type="file"][name="adminProfilePictureFile"][id="adminProfilePictureFile"]').ijaboCropTool({
            preview: '#adminProfilePicture',
            setRatio: 1,
            allowedExtensions: ['jpg', 'jpeg', 'png'],
            buttonsText: ['CROP', 'QUIT'],
            buttonsColor: ['#30bf7d', '#ee5155', -15],
            processUrl: processUrl,
            withCSRF: ['_token', '{{ csrf_token() }}'],
            onSuccess: function(message) {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: message,
                    confirmButtonText: 'OK',
                }).then(function() {
                    window.location.reload();
                });
            },
            onError: function(message) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: message,
                });
            }
        });
    </script>
@endpush
