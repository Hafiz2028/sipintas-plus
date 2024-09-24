﻿@extends('back.layout.admin-layout')
@section('content')
    <div x-data="disposisi" x-init="init()">
        <div class="panel mt-6">
            <h5 class="mb-5 text-lg font-semibold dark:text-white-light md:absolute md:top-[25px] md:mb-0">
                Disposisi Peminjaman</h5>
            <table id="myTable" class="table-hover whitespace-nowrap">
            </table>
        </div>
    </div>
@endsection
@push('stylesheets')
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
@endpush
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

            Alpine.data('disposisi', () => ({
                datatable: null,
                rents: [],
                addContactModal: false,
                driverName: '',
                selectedRentId: null,
                async init() {
                    await this.fetchData();
                    this.initializeDataTable();
                },
                async fetchData() {
                    const response = await fetch('{{ route('admin.disposisi.api') }}');
                    const data = await response.json();
                    this.rents = data.rents;
                },
                initializeDataTable() {
                    this.datatable = new simpleDatatables.DataTable('#myTable', {
                        data: {
                            headings: ['No', 'Tanggal Pinjam', 'Nama Peminjam', 'OPD',
                                'Fasilitas Yang Dipinjam',
                                'Jadwal Pakai', 'Phone', 'Status', 'Keterangan',
                                "<div class='text-center'>Action</div>"
                            ],
                            data: this.rents.map((rent, index) => [
                                index + 1,
                                new Date(rent.created_at).toLocaleDateString(
                                    'id-ID', {
                                        day: '2-digit',
                                        month: '2-digit',
                                        year: 'numeric'
                                    }),
                                rent.user.name,
                                rent.user.opd,
                                rent.facility.name,
                                this.formatDate(rent.start),
                                rent.user.no_hp,
                                rent.status,
                                rent.reject_note,
                                rent.id
                            ]),
                        },
                        searchable: true,
                        perPage: 10,
                        perPageSelect: [10, 20, 30, 50, 100],
                        columns: [{
                                select: 0,
                                sort: 'asc',
                            },
                            {
                                select: 7,
                                render: (data, cell, row) => {
                                    let color;
                                    switch (data) {
                                        case 'proses kabiro':
                                            color = 'bg-warning';
                                            break;
                                        case 'proses kabag':
                                            color = 'bg-warning';
                                            break;
                                        case 'proses kasubag kdh':
                                            color = 'bg-warning';
                                            break;
                                        case 'proses kasubag wkdh':
                                            color = 'bg-warning';
                                            break;
                                        case 'proses kasubag dalam':
                                            color = 'bg-warning';
                                            break;
                                        case 'diterima':
                                            color = 'bg-success';
                                            break;
                                        case 'ditolak':
                                            color = 'bg-danger';
                                            break;
                                        default:
                                            color = 'black';
                                    }
                                    return `<span class="badge whitespace-nowrap ${color}">${data}</span>`;
                                },
                                sortable: true,
                            },
                            {
                                select: 9,
                                sortable: false,
                                render: (data, cell, row) => {
                                    const rentId = data;
                                    const rentData = this.rents.find(rent => rent
                                        .id === parseInt(rentId));
                                    if (!rentData) {
                                        return ''; // Return empty if no rentData found
                                    }
                                    const rentStatus = rentData.status;
                                    const rentFacilityType = rentData.facility
                                        .facility_type.name;
                                    const rentDriver = rentData.rent_detail && rentData
                                        .rent_detail.sopir;
                                    const driverName = rentData.rent_detail && rentData
                                        .rent_detail.sopir ? rentData.rent_detail
                                        .sopir :
                                        '';
                                    const userRole =
                                        "{{ auth()->check() ? auth()->user()->role : '' }}";
                                    let actions = '';
                                    if ((userRole === 'admin' || userRole ===
                                            'superadmin') && rentStatus ===
                                        'diterima' && rentFacilityType ===
                                        'Kendaraan') {
                                        actions += `<a href="javascript:;" onclick="openEditDriverModal('/rent/${rentId}/update-driver', '${driverName}')" class="btn btn-warning ltr:mr-2 w-10 h-10 p-0 rounded-full">
                                            <span class="icon">
                                                <i class="fas fa-user"></i>
                                            </span>
                                        </a>`;
                                    }
                                    if (rentStatus === 'diterima') {
                                        if (rentFacilityType === 'Kendaraan' &&
                                            rentDriver == null) {
                                            const printUrl =
                                                `{{ route('printSurat', ':rentId') }}`
                                                .replace(':rentId', rentId);
                                            actions += `<a href="javascript:;" onclick="confirmPrint('${printUrl}', '${rentId}')" class="btn btn-outline-warning ltr:mr-2 w-10 h-10 p-0 rounded-full" role="button">
                                                        <span class="icon">
                                                            <i class="fas fa-print"></i>
                                                        </span>
                                                    </a>`;
                                        } else {
                                            const printUrl =
                                                `{{ route('printSurat', ':rentId') }}`
                                                .replace(':rentId', rentId);
                                            actions += `<a class="btn btn-outline-success print-btn ltr:mr-2 w-10 h-10 p-0 rounded-full" id="printButton"
                                                href="${printUrl}"
                                                target="_blank" role="button"
                                                data-rent-id="${rentId}">
                                                <span class="icon">
                                                <i class="fas fa-print"></i>
                                                </span>
                                                </a>`;
                                        }
                                    }

                                    if (userRole === 'superadmin') {
                                        actions += `<a href="/superadmin/disposisi/${rentId}/edit" class="btn btn-outline-primary ltr:mr-2 w-10 h-10 p-0 rounded-full">
                                    <span class="icon">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    </a>`;
                                    }
                                    if (rentStatus != 'diterima') {
                                        if (userRole === 'kabag') {
                                            actions += `<a href="/kabag/disposisi/${rentId}/edit" class="btn btn-outline-primary ltr:mr-2 w-10 h-10 p-0 rounded-full">
                                    <span class="icon">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    </a>`;
                                        }
                                        if (userRole === 'kabiro') {
                                            actions += `<a href="/kabiro/disposisi/${rentId}/edit" class="btn btn-outline-primary ltr:mr-2 w-10 h-10 p-0 rounded-full">
                                    <span class="icon">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    </a>`;
                                        }
                                        if (userRole === 'kasubag kdh') {
                                            actions += `<a href="/kasubagkdh/disposisi/${rentId}/edit" class="btn btn-outline-primary ltr:mr-2 w-10 h-10 p-0 rounded-full">
                                    <span class="icon">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    </a>`;
                                        }
                                        if (userRole === 'kasubag wkdh') {
                                            actions += `<a href="/kasubagwkdh/disposisi/${rentId}/edit" class="btn btn-outline-primary ltr:mr-2 w-10 h-10 p-0 rounded-full">
                                    <span class="icon">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    </a>`;
                                        }
                                        if (userRole === 'kasubag dalam') {
                                            actions += `<a href="/kasubagdalam/disposisi/${rentId}/edit" class="btn btn-outline-primary ltr:mr-2 w-10 h-10 p-0 rounded-full">
                                    <span class="icon">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    </a>`;
                                        }
                                    }
                                    actions += `<a href="javascript:;" onclick="confirmDelete('/admin/disposisi/${rentId}')" class="btn btn-outline-danger ltr:mr-2 w-10 h-10 p-0 rounded-full">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>`;
                                    return `<div class="flex items-center justify-center">${actions}</div>`;
                                },
                            },
                        ],
                        firstLast: true,
                        firstText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        lastText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M11 19L17 12L11 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> <path opacity="0.5" d="M6.99976 19L12.9998 12L6.99976 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        prevText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M15 5L9 12L15 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        nextText: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-4.5 h-4.5 rtl:rotate-180"> <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/> </svg>',
                        labels: {
                            perPage: '{select}',
                        },
                        layout: {
                            top: '{search}',
                            bottom: '{info}{select}{pager}',
                        },
                    });
                    document.addEventListener('edit-driver', (event) => {
                        this.openEditDriverModal(event.detail.rentId);
                    });
                },
                formatDate(dateString) {
                    const date = new Date(dateString);
                    const time = date.toLocaleTimeString('id-ID', {
                        hour: '2-digit',
                        minute: '2-digit',
                        hour12: false
                    });
                    const options = {
                        day: '2-digit',
                        month: 'short',
                        year: 'numeric'
                    };
                    const formattedDate = date.toLocaleDateString('id-ID', options);
                    const formattedDateTime = `${formattedDate} | ${time}`;
                    return `${formattedDateTime}`;
                },
            }));
        });

        async function confirmPrint(url, rentId) {
            Swal.fire({
                title: 'Tidak bisa Cetak Surat',
                text: 'Nama Sopir belum ditambahkan, Silahkan Menunggu Admin menambahkan nama Sopir',
                icon: 'warning',
                cancelButtonColor: '#d33',
            });
        }


        async function openEditDriverModal(updateUrl, initialDriverName) {
            console.log('openEditDriverModal triggered', updateUrl);
            const driverName = initialDriverName || '';
            console.log('nama sopir skrg : ', driverName);

            Swal.fire({
                title: 'Edit Nama Sopir',
                html: `
                        <input type="text" id="driverNameInput" class="swal2-input" placeholder="Nama Sopir" value="${driverName}">
                    `,
                showCancelButton: true,
                confirmButtonText: 'Update',
                preConfirm: () => {
                    const input = Swal.getPopup().querySelector(
                        '#driverNameInput');
                    return input.value;
                }
            }).then(async (result) => {
                if (result.isConfirmed) {
                    const updatedDriverName = result.value;
                    await this.updateDriverName(updateUrl, updatedDriverName);
                }
            });
        }
        async function updateDriverName(updateUrl, updatedDriverName) {
            try {
                const response = await fetch(updateUrl, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        sopir: updatedDriverName
                    })
                });

                if (response.ok) {
                    Swal.fire('Success', 'Nama Sopir updated successfully!', 'success')
                        .then(() => {
                            window.location.reload();
                        });
                    // Optionally, refresh the data or close the modal
                    // Example: this.fetchData();
                } else {
                    throw new Error('Failed to update driver name');
                }
            } catch (error) {
                Swal.fire('Error', error.message, 'error');
            }
        }
        async function confirmDelete(deleteUrl) {
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: "This data will be deleted!",
                showCancelButton: true,
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel',
                padding: '2em',
                customClass: 'sweet-alerts',
            }).then(async (result) => {
                if (result.isConfirmed) {
                    try {
                        await fetch(deleteUrl, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]')
                                    .getAttribute('content')
                            },
                        });

                        Swal.fire({
                            title: 'Deleted!',
                            text: 'The data has been deleted.',
                            icon: 'success',
                            customClass: 'sweet-alerts'
                        }).then(() => {
                            window.location.reload();
                        });
                    } catch (error) {
                        Swal.fire({
                            title: 'Error!',
                            text: 'Something went wrong.',
                            icon: 'error',
                            customClass: 'sweet-alerts'
                        });
                    }
                }
            });
        }
    </script>
@endpush
