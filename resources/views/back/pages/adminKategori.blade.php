@extends('back.layout.admin-layout')
@section('content')
    <div x-data="contacts">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Data Master</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Kategori Fasilitas</span>
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
                            Tambah Kategori Fasilitas
                        </button>
                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                            :class="addContactModal && '!block'">
                            <div class="flex min-h-screen items-center justify-center px-4"
                                @click.self="addContactModal = false">
                                <div x-show="addContactModal" x-transition="" x-transition.duration.300=""
                                    class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                                    <button type="button"
                                        class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                        @click="addContactModal = false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <h3 class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
                                        x-text="params.id ? 'Edit Contact' : 'Add Contact'"></h3>
                                    <div class="p-5">
                                        <form @submit.prevent="saveUser">
                                            <div class="mb-5">
                                                <label for="name">Name</label>
                                                <input id="name" type="text" placeholder="Enter Name"
                                                    class="form-input" x-model="params.name">
                                            </div>
                                            <div class="mb-5">
                                                <label for="email">Email</label>
                                                <input id="email" type="email" placeholder="Enter Email"
                                                    class="form-input" x-model="params.email">
                                            </div>
                                            <div class="mb-5">
                                                <label for="number">Phone Number</label>
                                                <input id="number" type="text" placeholder="Enter Phone Number"
                                                    class="form-input" x-model="params.phone">
                                            </div>
                                            <div class="mb-5">
                                                <label for="occupation">Occupation</label>
                                                <input id="occupation" type="text" placeholder="Enter Occupation"
                                                    class="form-input" x-model="params.role">
                                            </div>
                                            <div class="mb-5">
                                                <label for="address">Address</label>
                                                <textarea id="address" rows="3" placeholder="Enter Address" class="form-textarea min-h-[130px] resize-none"
                                                    x-model="params.location"></textarea>
                                            </div>
                                            <div class="mt-8 flex items-center justify-end">
                                                <button type="button" class="btn btn-outline-danger"
                                                    @click="addContactModal = false">
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
                </div>
                <div class="relative">
                    <input type="text" placeholder="Cari Kategori" class="peer form-input py-2 ltr:pr-11 rtl:pl-11"
                        x-model="searchUser" @keyup="searchContacts">
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
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th>Icon</th>
                                <th class="!text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="contact in filterdContactsList" :key="contact.id">
                                <tr>
                                    <td x-text="contact.id" class="whitespace-nowrap"></td>></td>
                                    <td x-text="contact.name"></td>
                                    <td x-text="contact.location" class="whitespace-nowrap"></td>
                                    <td>
                                        <div class="flex items-center justify-center gap-4">
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                @click="editUser(contact)">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                @click="deleteUser(contact)">
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

            Alpine.data('contacts', () => ({
                defaultParams: {
                    id: null,
                    name: '',
                    email: '',
                    role: '',
                    phone: '',
                    location: '',
                },
                displayType: 'list',
                addContactModal: false,
                params: {
                    id: null,
                    name: '',
                    email: '',
                    role: '',
                    phone: '',
                    location: '',
                },
                filterdContactsList: [],
                searchUser: '',
                contactList: [{
                        id: 1,
                        path: 'profile-35.png',
                        name: 'Soeng Souy',
                        role: 'Web Developer',
                        email: 'soengsouy@mail.com',
                        location: 'Boston, USA',
                        phone: '+1 202 555 0197',
                        posts: 25,
                        followers: '5K',
                        following: 500,
                    },
                    {
                        id: 2,
                        path: 'profile-35.png',
                        name: 'StarCode Kh',
                        role: 'Web Designer',
                        email: 'starcodekh@mail.com',
                        location: 'Sydney, Australia',
                        phone: '+1 202 555 0170',
                        posts: 25,
                        followers: '21.5K',
                        following: 350,
                    },
                    {
                        id: 3,
                        path: 'profile-35.png',
                        name: 'Lila Perry',
                        role: 'UX/UI Designer',
                        email: 'lila@mail.com',
                        location: 'Miami, USA',
                        phone: '+1 202 555 0105',
                        posts: 20,
                        followers: '21.5K',
                        following: 350,
                    },
                    {
                        id: 4,
                        path: 'profile-35.png',
                        name: 'Andy King',
                        role: 'Project Lead',
                        email: 'andy@mail.com',
                        location: 'Tokyo, Japan',
                        phone: '+1 202 555 0194',
                        posts: 25,
                        followers: '21.5K',
                        following: 300,
                    },
                    {
                        id: 5,
                        path: 'profile-35.png',
                        name: 'Jesse Cory',
                        role: 'Web Developer',
                        email: 'jesse@mail.com',
                        location: 'Edinburgh, UK',
                        phone: '+1 202 555 0161',
                        posts: 30,
                        followers: '20K',
                        following: 350,
                    },
                    {
                        id: 6,
                        path: 'profile-35.png',
                        name: 'Xavier',
                        role: 'UX/UI Designer',
                        email: 'xavier@mail.com',
                        location: 'Phnom Penh',
                        phone: '+1 202 555 0155',
                        posts: 25,
                        followers: '21.5K',
                        following: 350,
                    },
                    {
                        id: 7,
                        path: 'profile-35.png',
                        name: 'Susan',
                        role: 'Project Manager',
                        email: 'susan@mail.com',
                        location: 'Miami, USA',
                        phone: '+1 202 555 0118',
                        posts: 40,
                        followers: '21.5K',
                        following: 350,
                    },
                    {
                        id: 8,
                        path: 'profile-35.png',
                        name: 'Raci Lopez',
                        role: 'Web Developer',
                        email: 'traci@mail.com',
                        location: 'Edinburgh, UK',
                        phone: '+1 202 555 0135',
                        posts: 25,
                        followers: '21.5K',
                        following: 350,
                    },
                    {
                        id: 9,
                        path: 'profile-35.png',
                        name: 'Steven Mendoza',
                        role: 'HR',
                        email: 'sokol@verizon.net',
                        location: 'Monrovia, US',
                        phone: '+1 202 555 0100',
                        posts: 40,
                        followers: '21.8K',
                        following: 300,
                    },
                    {
                        id: 10,
                        path: 'profile-35.png',
                        name: 'James Cantrell',
                        role: 'Web Developer',
                        email: 'sravani@comcast.net',
                        location: 'Michigan, US',
                        phone: '+1 202 555 0134',
                        posts: 100,
                        followers: '28K',
                        following: 520,
                    },
                    {
                        id: 11,
                        path: 'profile-35.png',
                        name: 'Reginald Brown',
                        role: 'Web Designer',
                        email: 'drhyde@gmail.com',
                        location: 'Entrimo, Spain',
                        phone: '+1 202 555 0153',
                        posts: 35,
                        followers: '25K',
                        following: 500,
                    },
                    {
                        id: 12,
                        path: 'profile-35.png',
                        name: 'Stacey Smith',
                        role: 'Chief technology officer',
                        email: 'maikelnai@optonline.net',
                        location: 'Lublin, Poland',
                        phone: '+1 202 555 0115',
                        posts: 21,
                        followers: '5K',
                        following: 200,
                    },
                ],

                init() {
                    this.searchContacts();
                },

                searchContacts() {
                    this.filterdContactsList = this.contactList.filter((d) => d.name.toLowerCase()
                        .includes(this.searchUser.toLowerCase()));
                },

                editUser(user) {
                    this.params = this.defaultParams;
                    if (user) {
                        this.params = JSON.parse(JSON.stringify(user));
                    }

                    this.addContactModal = true;
                },

                saveUser() {
                    if (!this.params.name) {
                        this.showMessage('Name is required.', 'error');
                        return true;
                    }
                    if (!this.params.email) {
                        this.showMessage('Email is required.', 'error');
                        return true;
                    }
                    if (!this.params.phone) {
                        this.showMessage('Phone is required.', 'error');
                        return true;
                    }
                    if (!this.params.role) {
                        this.showMessage('Occupation is required.', 'error');
                        return true;
                    }

                    if (this.params.id) {
                        //update user
                        let user = this.contactList.find((d) => d.id === this.params.id);
                        user.name = this.params.name;
                        user.email = this.params.email;
                        user.role = this.params.role;
                        user.phone = this.params.phone;
                        user.location = this.params.location;
                    } else {
                        //add user
                        let maxUserId = this.contactList.length ?
                            this.contactList.reduce((max, character) => (character.id > max ? character
                                .id : max), this.contactList[0].id) :
                            0;

                        let user = {
                            id: maxUserId + 1,
                            path: 'profile-35.png',
                            name: this.params.name,
                            email: this.params.email,
                            role: this.params.role,
                            phone: this.params.phone,
                            location: this.params.location,
                            posts: 20,
                            followers: '5K',
                            following: 500,
                        };
                        this.contactList.splice(0, 0, user);
                        this.searchContacts();
                    }

                    this.showMessage('User has been saved successfully.');
                    this.addContactModal = false;
                },

                deleteUser(user) {
                    this.contactList = this.contactList.filter((d) => d.id != user.id);
                    // this.ids = this.ids.filter((d) => d != user.id);
                    this.searchContacts();
                    this.showMessage('User has been deleted successfully.');
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
