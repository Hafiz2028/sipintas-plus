@extends('back.layout.admin-layout')
@section('content')
    <div x-data="users">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Data Master</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Pengguna</span>
            </li>
        </ul>
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-xl"></h2>
            <div class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary" @click="editUser">
                            <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                <circle cx="10" cy="6" r="4" stroke="currentColor" stroke-width="1.5">
                                </circle>
                                <path opacity="0.5"
                                    d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"></path>
                            </svg>
                            Tambah Pengguna
                        </button>
                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                            :class="addUserModal && '!block'">
                            <div class="flex min-h-screen items-center justify-center px-4"
                                @click.self="addUserModal = false">
                                <div x-show="addUserModal" x-transition="" x-transition.duration.300=""
                                    class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                                    <button type="button"
                                        class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                        @click="addUserModal = false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <h3 class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
                                        x-text="params.id ? 'Edit Pengguna' : 'Tambah Pengguna'"></h3>
                                    <div class="p-5">
                                        <form @submit.prevent="saveUser">
                                            <div class="mb-5">
                                                <label for="name">Nama</label>
                                                <input id="name" type="text" placeholder="Enter Name"
                                                    class="form-input" x-model="params.name">
                                            </div>
                                            <div class="mb-5">
                                                <label for="nip">NIP</label>
                                                <input id="nip" type="text" placeholder="Enter NIP"
                                                    class="form-input" x-model="params.nip">
                                            </div>
                                            <div class="mb-5">
                                                <label for="no_hp">Nomor Hp</label>
                                                <input id="no_hp" type="text" placeholder="Enter Phone Number"
                                                    class="form-input" x-model="params.no_hp">
                                            </div>
                                            <div class="mb-5">
                                                <label for="opd">OPD</label>
                                                <input id="opd" type="text" placeholder="Enter OPD"
                                                    class="form-input" x-model="params.opd">
                                            </div>
                                            <div class="mb-5">
                                                <label for="role">Role Pengguna</label>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="role"
                                                            value="admin" x-model="params.role">
                                                        <span class="ml-2">Admin</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="role"
                                                            value="kabag" x-model="params.role">
                                                        <span class="ml-2">Kepala Bagian</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="role"
                                                            value="peminjam" x-model="params.role">
                                                        <span class="ml-2">Peminjam</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <label for="password">Password</label>
                                                <input id="password" type="password" placeholder="Enter Password"
                                                    class="form-input" x-model="params.password">
                                            </div>
                                            <div class="mb-5">
                                                <label for="password_confirmation">Konfirmasi Password</label>
                                                <input id="password_confirmation" type="password"
                                                    placeholder="Enter Password Confirmation" class="form-input"
                                                    x-model="params.password_confirmation">
                                            </div>
                                            <div class="mt-8 flex items-center justify-end">
                                                <button type="button" class="btn btn-outline-danger"
                                                    @click="addUserModal = false">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                    x-text="params.id ? 'Update' : 'Add'"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                    </div>
                </div>
                <div class="relative">
                    <input type="text" placeholder="Cari Pengguna" class="peer form-input py-2 ltr:pr-11 rtl:pl-11"
                        x-model="searchUser" @keyup="searchUsers">
                    <div
                        class="absolute top-1/2 -translate-y-1/2 peer-focus:text-primary ltr:right-[11px] rtl:left-[11px]">
                        <svg class="mx-auto" width="16" height="16" viewbox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5"
                                opacity="0.5"></circle>
                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel mt-5 overflow-hidden border-0 p-0">
            <template x-if="displayType === 'list'">
                <div class="table-responsive">
                    <table class="table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>NIP</th>
                                <th>OPD</th>
                                <th>Role</th>
                                <th>Nomor Hp</th>
                                <th class="!text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="user in filterdUsersList" :key="user.id">
                                <tr>
                                    <td x-text="user.name" class="whitespace-nowrap"></td>></td>
                                    <td x-text="user.nip"></td>
                                    <td x-text="user.opd" class="whitespace-nowrap"></td>
                                    <td x-text="user.role" class="whitespace-nowrap"></td>
                                    <td x-text="user.no_hp" class="whitespace-nowrap"></td>
                                    <td>
                                        <div class="flex items-center justify-center gap-4">
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                @click="editUser(user)">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                @click="deleteUser(user)">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </template>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            // main section
            Alpine.data('scrollToTop', () => ({
                showTopButton: false,
                init() {
                    window.onscroll = () => {
                        this.scrollFunction();
                    };
                },

                scrollFunction() {
                    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                        this.showTopButton = true;
                    } else {
                        this.showTopButton = false;
                    }
                },

                goToTop() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                },
            }));

            // theme customization
            Alpine.data('customizer', () => ({
                showCustomizer: false,
            }));

            // sidebar section
            Alpine.data('sidebar', () => ({
                init() {
                    const selector = document.querySelector('.sidebar ul a[href="' + window.location
                        .pathname + '"]');
                    if (selector) {
                        selector.classList.add('active');
                        const ul = selector.closest('ul.sub-menu');
                        if (ul) {
                            let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                            if (ele) {
                                ele = ele[0];
                                setTimeout(() => {
                                    ele.click();
                                });
                            }
                        }
                    }
                },
            }));

            // header section
            Alpine.data('header', () => ({
                init() {
                    const selector = document.querySelector('ul.horizontal-menu a[href="' + window
                        .location.pathname + '"]');
                    if (selector) {
                        selector.classList.add('active');
                        const ul = selector.closest('ul.sub-menu');
                        if (ul) {
                            let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                            if (ele) {
                                ele = ele[0];
                                setTimeout(() => {
                                    ele.classList.add('active');
                                });
                            }
                        }
                    }
                },


                languages: [{
                        id: 1,
                        key: 'Khmer',
                        value: 'kh',
                    },
                    {
                        id: 2,
                        key: 'Danish',
                        value: 'da',
                    },
                    {
                        id: 3,
                        key: 'English',
                        value: 'en',
                    },
                    {
                        id: 4,
                        key: 'French',
                        value: 'fr',
                    },
                    {
                        id: 5,
                        key: 'German',
                        value: 'de',
                    },
                    {
                        id: 6,
                        key: 'Greek',
                        value: 'el',
                    },
                    {
                        id: 7,
                        key: 'Hungarian',
                        value: 'hu',
                    },
                    {
                        id: 8,
                        key: 'Italian',
                        value: 'it',
                    },
                    {
                        id: 9,
                        key: 'Japanese',
                        value: 'ja',
                    },
                    {
                        id: 10,
                        key: 'Indonesia',
                        value: 'pl',
                    },
                    {
                        id: 11,
                        key: 'Portuguese',
                        value: 'pt',
                    },
                    {
                        id: 12,
                        key: 'Russian',
                        value: 'ru',
                    },
                    {
                        id: 13,
                        key: 'Spanish',
                        value: 'es',
                    },
                    {
                        id: 14,
                        key: 'Swedish',
                        value: 'sv',
                    },
                    {
                        id: 15,
                        key: 'Turkish',
                        value: 'tr',
                    },
                    {
                        id: 16,
                        key: 'Arabic',
                        value: 'ae',
                    },
                ],
            }));

            Alpine.data('users', () => ({
                defaultParams: {
                    id: null,
                    name: '',
                    nip: '',
                    no_hp: '',
                    opd: '',
                    password: '',
                    role: '',
                },
                displayType: 'list',
                addUserModal: false,
                params: {
                    id: null,
                    name: '',
                    nip: '',
                    no_hp: '',
                    opd: '',
                    password: '',
                    role: '',
                },
                filterdUsersList: [],
                searchUser: '',
                userList: @json($users) || [],

                init() {
                    this.searchUsers();
                },

                searchUsers() {
                    if (!Array.isArray(this.userList)) {
                        console.error('userList is not an array:', this.userList);
                        return;
                    }
                    this.filterdUsersList = this.userList.filter((d) => d.name.toLowerCase()
                        .includes(this.searchUser.toLowerCase()));
                },

                editUser(user) {
                    this.params = this.defaultParams;
                    if (user) {
                        this.params = JSON.parse(JSON.stringify(user));
                    }

                    this.addUserModal = true;
                },

                async saveUser() {
                    console.log('Data being sent:', this.params);
                    if (!this.params.name) {
                        this.showMessage('Nama pengguna harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.nip) {
                        this.showMessage('NIP pengguna harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.no_hp) {
                        this.showMessage('No Hp pengguna harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.opd) {
                        this.showMessage('OPD pengguna harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.role) {
                        this.showMessage('Role pengguna harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.password) {
                        this.showMessage('Password pengguna harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.password_confirmation) {
                        this.showMessage('Konfirmasi Password Pengguna harus diisi.', 'error');
                        return true;
                    }
                    if (this.params.password !== this.params.password_confirmation) {
                        this.showMessage(
                            'Password dan Konfirmasi Password berbeda, tolong diperbaiki.',
                            'error');
                        return true;
                    }

                    try {
                        let response;
                        if (this.params.id) {
                            response = await fetch(`/admin/user/${this.params.id}`, {
                                method: 'PUT',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                body: JSON.stringify(this.params),
                            });
                        } else {
                            response = await fetch('/admin/user', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                body: JSON.stringify(this.params),
                            });
                        }
                        if (!response.ok) {
                            console.log('Response status:', response.status);
                            console.log('Response status text:', response.statusText);
                            console.log('Response body:', await response.text());
                            throw new Error('Failed to save user');
                        }
                        console.log('User saved successfully:', await response.json());
                        this.showMessage('User has been saved successfully.');
                        this.addUserModal = false;
                        setTimeout(() => {
                            window.location.href = '/admin/user';
                        }, 1000);
                    } catch (error) {
                        console.log('Error in save User:', error);
                        this.showMessage('Failed to save user.', 'error');
                    }
                },

                async deleteUser(user) {
                    try {
                        const response = await fetch(`/admin/user/${user.id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            }
                        });

                        if (!response.ok) throw new Error('Failed to delete user');
                        this.showMessage('User has been deleted successfully.');
                        setTimeout(() => {
                            window.location.href = '/admin/user';
                        }, 1000);
                    } catch (error) {
                        this.showMessage('Failed to delete User.', 'error');
                    }
                },

                setDisplayType(type) {
                    this.displayType = type;
                },

                showMessage(msg = '', type = 'success') {
                    const toast = window.Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                    });
                    toast.fire({
                        icon: type,
                        title: msg,
                        padding: '10px 20px',
                    });
                },
            }));
        });
    </script>
@endpush
