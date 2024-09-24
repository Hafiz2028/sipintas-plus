@extends('back.layout.admin-layout')
@section('content')
    <div x-data="facilities">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Data Master</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Fasilitas</span>
            </li>
        </ul>
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="text-xl"></h2>
            <div class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary" @click="editFacility">
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
                            Tambah Fasilitas
                        </button>
                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                            :class="addFacilityModal && '!block'">
                            <div class="flex min-h-screen items-center justify-center px-4"
                                @click.self="addFacilityModal = false">
                                <div x-show="addFacilityModal" x-transition="" x-transition.duration.300=""
                                    class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                                    <button type="button"
                                        class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                        @click="addFacilityModal = false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <h3 class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
                                        x-text="params.id ? 'Edit Fasilitas' : 'Tambah Fasilitas'"></h3>
                                    <div class="p-5">
                                        <form @submit.prevent="saveFacility" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-5">
                                                <label for="name">Nama</label>
                                                <input id="name" type="text" placeholder="Masukkan Nama Fasilitas"
                                                    class="form-input" x-model="params.name">
                                            </div>
                                            <div class="mb-5">
                                                <label for="kategori">Kategori</label>
                                                <select id="kategori" class="form-select"
                                                    x-model="params.facility_type_id">
                                                    <option value="" disabled>Pilih Kategori</option>
                                                    <template x-for="facilityType in facilityTypes" :key="facilityType.id">
                                                        <option :value="facilityType.id" x-text="facilityType.name">
                                                        </option>
                                                    </template>
                                                </select>
                                            </div>
                                            <div class="mb-5">
                                                <label for="size">Ukuran (M2)</label>
                                                <input id="size" type="text" placeholder="Ukuran Fasilitas"
                                                    class="form-input" x-model="params.size">
                                            </div>
                                            <div class="mb-5">
                                                <label for="kapasitas">Kapasitas (Orang)</label>
                                                <input id="kapasitas" type="text" placeholder="Daya Tampung Fasilitas"
                                                    class="form-input" x-model="params.kapasitas">
                                            </div>
                                            <div class="mb-5">
                                                <label for="pembayaran">Pembayaran</label>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="pembayaran"
                                                            value="tidak" x-model="params.pembayaran">
                                                        <span class="ml-2">Tidak</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="pembayaran"
                                                            value="ya" x-model="params.pembayaran">
                                                        <span class="ml-2">Ya</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <label for="information">Deskripsi</label>
                                                <textarea id="information" placeholder="Deskripsi tambahan fasilitas" class="form-textarea min-h-[130px] resize-none"
                                                    x-model="params.information"></textarea>
                                            </div>
                                            <div class="mb-5">
                                                <label for="photos">Upload Foto Fasilitas</label>
                                                <div class="mt-4"
                                                    style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem;">
                                                    <template x-for="(image, index) in params.existingImages"
                                                        :key="image.id">
                                                        <div
                                                            style="display: flex; flex-direction: column; align-items: center; max-width: 150px; width: 100%;">
                                                            <img :src="image.url" alt="Facility Image"
                                                                class="w-32 h-32 object-cover"
                                                                style="width: 100%; height: auto;">
                                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                                style="margin-top: 0.5rem; width: 100%;"
                                                                @click="removeImage(image.id)">Remove</button>
                                                        </div>
                                                    </template>
                                                </div>
                                                <input id="photos" type="file" multiple accept="image/*"
                                                    class="form-input mt-4" @change="previewImages">
                                                <small>maks size : 5 MB</small>
                                                <div class="mt-4"
                                                    style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem;">
                                                    <template x-for="(image, index) in imagePreviews"
                                                        :key="'new-' + index">
                                                        <div
                                                            style="display: flex; flex-direction: column; align-items: center; max-width: 150px; width: 100%;">
                                                            <img :src="image" style="width: 100%; height: auto;">
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                            <div class="mt-8 flex items-center justify-end">
                                                <button type="button" class="btn btn-outline-danger"
                                                    @click="addFacilityModal = false">
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
                    <input type="text" placeholder="Cari Fasilitas" class="peer form-input py-2 ltr:pr-11 rtl:pl-11"
                        x-model="searchFacility" @keyup="searchFacilities">
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
                                <th>Nomor</th>
                                <th>Nama Fasilitas</th>
                                <th>Kategori</th>
                                <th>Ukuran (M2)</th>
                                <th>Kapasitas (Orang)</th>
                                <th>Pembayaran</th>
                                <th>Gambar</th>
                                <th class="!text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(facility, index) in filterdFacilitiesList" :key="facility.id">
                                <tr>
                                    <td x-text="index + 1" class="whitespace-nowrap"></td>></td>
                                    <td x-text="facility.name"></td>
                                    <td x-text="facility.facility_type.name" class="whitespace-nowrap"></td>
                                    <td x-text="facility.size" class="whitespace-nowrap"></td>
                                    <td x-text="facility.kapasitas" class="whitespace-nowrap"></td>
                                    <td x-text="facility.pembayaran" class="whitespace-nowrap"></td>
                                    <td class="whitespace-nowrap">
                                        <img :src="facility.facility_images && facility.facility_images.length > 0 ?
                                            `/facility_images/${facility.facility_images[0].image}` :
                                            '/facility_images/default.png'"
                                            :alt="facility.facility_images && facility.facility_images.length > 0 ?
                                                facility.facility_images[0].image :
                                                'Default Image'"
                                            class="w-20 h-20 object-cover" />
                                    </td>
                                    <td>
                                        <div class="flex items-center justify-center gap-4">
                                            <button type="button" class="btn btn-sm btn-outline-primary"
                                                @click="editFacility(facility)">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-sm btn-outline-danger"
                                                @click="deleteFacility(facility)">
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

            Alpine.data('facilities', () => ({
                defaultParams: {
                    id: null,
                    name: '',
                    facility_type_id: '',
                    size: '',
                    kapasitas: '',
                    pembayaran: '',
                    information: '',
                    images: [],
                    existingImages: [],
                    imagesToRemove: [],
                },
                displayType: 'list',
                addFacilityModal: false,
                params: {
                    id: null,
                    name: '',
                    facility_type_id: '',
                    size: '',
                    kapasitas: '',
                    pembayaran: '',
                    information: '',
                    images: [],
                    existingImages: [],
                    imagesToRemove: [],
                },
                filterdFacilitiesList: [],
                searchFacility: '',
                facilityList: @json($facilities) || [],
                facilityTypes: @json($facilityTypes) || [],
                imagePreviews: [],

                init() {
                    this.searchFacilities();
                },

                searchFacilities() {
                    if (!Array.isArray(this.facilityList)) {
                        console.error('facilityList is not an array:', this.facilityList);
                        return;
                    }
                    this.filterdFacilitiesList = this.facilityList.filter((d) => d.name.toLowerCase()
                        .includes(this.searchFacility.toLowerCase()));
                },

                editFacility(facility) {
                    this.params = JSON.parse(JSON.stringify(this.defaultParams));

                    if (facility) {
                        this.params = JSON.parse(JSON.stringify(facility));
                        console.log('Facility Data:', facility);
                        if (facility.facility_images && Array.isArray(facility.facility_images)) {
                            this.params.existingImages = facility.facility_images.map(image => {
                                console.log('Mapping image:', image);
                                return {
                                    id: image.id,
                                    url: '/facility_images/' + image.image,
                                };
                            });
                        } else {
                            console.log('No facility images found or facilityImages is not an array');
                            this.params.existingImages = [];
                        }

                        console.log('Existing Images:', this.params.existingImages);
                    }
                    this.addFacilityModal = true;
                },
                previewImages(event) {
                    const files = event.target.files;
                    this.imagePreviews = [];
                    this.params.images = [];

                    Array.from(files).forEach(file => {
                        const reader = new FileReader();
                        reader.onload = e => {
                            this.imagePreviews.push(e.target.result);
                        };
                        reader.readAsDataURL(file);
                        this.params.images.push(file);
                    });
                },
                removeImage(imageId) {
                    if (!Array.isArray(this.params.imagesToRemove)) {
                        console.error('imagesToRemove is not an array');
                        this.params.imagesToRemove = [];
                    }
                    if (!this.params.imagesToRemove.includes(imageId)) {
                        this.params.imagesToRemove.push(imageId);
                    }
                    this.params.existingImages = this.params.existingImages.filter(image => image.id !==
                        imageId);
                    console.log('Image to be removed:', imageId);
                    console.log('Updated imagesToRemove:', this.params.imagesToRemove);
                    this.showMessage('Image marked for removal.', 'success');
                },

                async saveFacility() {
                    console.log('Data being sent:', this.params);
                    if (!this.params.name) {
                        this.showMessage('Nama Fasilitas harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.facility_type_id) {
                        this.showMessage('Kategori Fasilitas harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.size) {
                        this.showMessage('Ukuran Fasilitas harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.kapasitas) {
                        this.showMessage('Kapasitas Fasilitas harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.pembayaran) {
                        this.showMessage('Pembayaran Fasilitas harus diisi.', 'error');
                        return true;
                    }
                    if (!this.params.information) {
                        this.showMessage('Detail Fasilitas harus diisi.', 'error');
                        return true;
                    }
                    if (this.params.images) {
                        for (const image of this.params.images) {
                            if (image.size > 5000000) { // 5000 KB in bytes
                                this.showMessage('Ukuran Foto tidak boleh lebih dari 5000 KB.', 'error');
                                return true;
                            }
                        }
                    }
                    try {
                        let response;
                        const formData = new FormData();
                        Object.keys(this.params).forEach(key => {
                            if (key !== 'images' && key !== 'existingImages' && key !==
                                'imagesToRemove') {
                                formData.append(key, this.params[key] || '');
                            }
                        });
                        if (this.params.images) {
                            this.params.images.forEach(image => {
                                formData.append('images[]', image);
                            });
                        }
                        if (this.params.imagesToRemove) {
                            this.params.imagesToRemove.forEach((imageId, index) => {
                                formData.append(`imagesToRemove[]`, imageId);
                            });
                        }
                        console.log('data update :', formData);

                        if (this.params.id) {
                            response = await fetch(`/superadmin/fasilitas-update/${this.params.id}`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                body: formData,
                            });
                        } else {
                            response = await fetch('/superadmin/fasilitas', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute(
                                        'content')
                                },
                                body: formData,
                            });
                        }
                        if (!response.ok) {
                            console.log('Response status:', response.status);
                            console.log('Response status text:', response.statusText);
                            console.log('Response body:', await response.text());
                            throw new Error('Failed to update facility');
                        }
                        console.log('Facility update successfully:', await response.json());
                        this.showMessage('Facility has been update successfully.');
                        this.addFacilityModal = false;
                        setTimeout(() => {
                            window.location.href = '/superadmin/fasilitas';
                        }, 1000);
                    } catch (error) {
                        console.log('Error in saveFacility:', error);
                        this.showMessage('Failed to save facility.', 'error');
                    }
                },

                async deleteFacility(facility) {
                    try {
                        const response = await fetch(`/superadmin/fasilitas/${facility.id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            }
                        });

                        if (!response.ok) throw new Error('Failed to delete facility');
                        this.showMessage('Facility has been deleted successfully.');
                        setTimeout(() => {
                            window.location.href = '/superadmin/fasilitas';
                        }, 1000);
                    } catch (error) {
                        this.showMessage('Failed to delete facility.', 'error');
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
