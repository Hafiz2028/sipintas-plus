@extends('back.layout.admin-layout')
@section('content')
    <div x-data="facilityTypes()">
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
                        <button type="button" class="btn btn-primary" @click="editFacilityType">
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
                            :class="addFacilityTypeModal && '!block'">
                            <div class="flex min-h-screen items-center justify-center px-4"
                                @click.self="addFacilityTypeModal = false">
                                <div x-show="addFacilityTypeModal" x-transition="" x-transition.duration.300=""
                                    class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                                    <button type="button"
                                        class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                        @click="addFacilityTypeModal = false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <h3 class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
                                        x-text="params.id ? 'Edit FacilityType' : 'Tambah Kategori Fasilitas'"></h3>
                                    <div class="p-5">
                                        <form @submit.prevent="saveFacilityType">
                                            <div class="mb-5">
                                                <label for="name">Nama Kategori</label>
                                                <input id="name" type="text"
                                                    placeholder="Tambahkan nama kategori fasilitas" class="form-input"
                                                    x-model="params.name">
                                            </div>
                                            <div class="mt-8 flex items-center justify-end">
                                                <button type="button" class="btn btn-outline-danger"
                                                    @click="addFacilityTypeModal = false">
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
                        x-model="searchName" @keyup="searchFacilityTypes">
                    <div class="absolute top-1/2 -translate-y-1/2 peer-focus:text-primary ltr:right-[11px] rtl:left-[11px]">
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
                                <th>Name Kategori</th>
                                {{-- <th>Icon</th> --}}
                                <th class="!text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(facilityType, index) in filterdFacilityTypesList" :key="facilityType.id">
                                <tr>
                                    <td x-text="index + 1" class="whitespace-nowrap"></td>></td>
                                    <td x-text="facilityType.name"></td>
                                    {{-- <td x-text="facilityType.location" class="whitespace-nowrap"></td> --}}
                                    <td>
                                        <div class="flex items-center justify-center gap-4">
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                @click="editFacilityType(facilityType)">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                @click="deleteFacilityType(facilityType)">
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

            Alpine.data('facilityTypes', () => ({
                defaultParams: {
                    id: null,
                    name: '',
                },
                displayType: 'list',
                addFacilityTypeModal: false,
                params: {
                    id: null,
                    name: '',
                },
                filterdFacilityTypesList: [],
                searchName: '',
                facilityTypesList: @json($facilityTypes) || [],

                init() {
                    this.searchFacilityTypes();
                },

                searchFacilityTypes() {
                    if (!Array.isArray(this.facilityTypesList)) {
                        console.error('facilityTypesList is not an array:', this.facilityTypesList);
                        return;
                    }
                    this.filterdFacilityTypesList = this.facilityTypesList.filter((d) => d.name
                        .toLowerCase()
                        .includes(this.searchName.toLowerCase()));
                },

                editFacilityType(facilityType) {
                    this.params = this.defaultParams;
                    if (facilityType) {
                        this.params = JSON.parse(JSON.stringify(facilityType));
                    }

                    this.addFacilityTypeModal = true;
                },

                async saveFacilityType() {
                    console.log('Data being sent:', this.params);
                    if (!this.params.name) {
                        this.showMessage('Name is required.', 'error');
                        return;
                    }

                    try {
                        let response;
                        if (this.params.id) {
                            response = await fetch(`/superadmin/tipe-fasilitas/${this.params.id}`, {
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
                            response = await fetch('/superadmin/tipe-fasilitas', {
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
                            throw new Error('Failed to save facility type');
                        }

                        console.log('Facility type saved successfully:', await response.json());

                        this.showMessage('Facility type has been saved successfully.');
                        this.addFacilityModal = false;
                        setTimeout(() => {
                            window.location.href = '/superadmin/tipe-fasilitas';
                        }, 1000);
                    } catch (error) {
                        console.log('Error in saveFacilityType:', error);
                        this.showMessage('Failed to save facility type.', 'error');
                    }
                },

                async deleteFacilityType(facilityType) {
                    try {
                        const response = await fetch(`/superadmin/tipe-fasilitas/${facilityType.id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            }
                        });

                        if (!response.ok) throw new Error('Failed to delete facility type');
                        this.showMessage('Facility type has been deleted successfully.');
                        setTimeout(() => {
                            window.location.href = '/superadmin/tipe-fasilitas';
                        }, 1000);
                    } catch (error) {
                        this.showMessage('Failed to delete facility type.', 'error');
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
