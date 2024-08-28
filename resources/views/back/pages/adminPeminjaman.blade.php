@extends('back.layout.admin-layout')
@section('content')
    <div class="animate__animated p-6" :class="[$store.app.animation]">
        <div x-data="calendar">
            <div class="panel">
                <div class="mb-5">
                    <div class="mb-4 flex flex-col items-center justify-center sm:flex-row sm:justify-between">
                        <div class="mb-4 sm:mb-0">
                            <div class="text-center text-lg font-semibold ltr:sm:text-left rtl:sm:text-right">
                                Peminjaman</div>
                            <div class="mt-2 flex flex-wrap items-center justify-center sm:justify-start">
                                <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                    <div class="h-2.5 w-2.5 rounded-sm bg-warning ltr:mr-2 rtl:ml-2">
                                    </div>
                                    <div>proses</div>
                                </div>
                                <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                    <div class="h-2.5 w-2.5 rounded-sm bg-success ltr:mr-2 rtl:ml-2">
                                    </div>
                                    <div>diterima</div>
                                </div>
                                <div class="flex items-center ltr:mr-4 rtl:ml-4">
                                    <div class="h-2.5 w-2.5 rounded-sm bg-danger ltr:mr-2 rtl:ml-2">
                                    </div>
                                    <div>ditolak</div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" @click="resetForm(); isAddEventModal = true">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            Tambah Peminjaman
                        </button>
                        <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60"
                            :class="isAddEventModal && '!block'">
                            <div class="flex min-h-screen items-center justify-center px-4" @click.self="resetForm()">
                                <div x-show="isAddEventModal" x-transition="" x-transition.duration.300=""
                                    class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                                    <button type="button"
                                        class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4"
                                        @click="resetForm()">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                            viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </button>
                                    <h3 class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]"
                                        x-text="params.id ? 'Edit Peminjaman' : 'Tambah Peminjaman'"></h3>
                                    <div class="p-5">
                                        <form @submit.prevent="saveRent" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-5">
                                                <label for="fasilitas">Fasilitas yang dipinjam <span
                                                        style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                <select id="fasilitas" class="form-select" x-ref="facilityDropdown"
                                                    x-model="params.facility_id" @change="handleFacilityChange">
                                                    <option value="" selected>Pilih Fasilitas</option>
                                                    <template x-for="facility in facilities" :key="facility.id">
                                                        <option :value="facility.id" x-text="facility.name">
                                                        </option>
                                                    </template>
                                                </select>
                                            </div>
                                            <div class="mb-5">
                                                <label for="agenda">Agenda Kegiatan <span
                                                        style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                <input id="agenda" type="text" placeholder="Tambahkan agenda kegiatan"
                                                    class="form-input" x-model="params.agenda">
                                            </div>
                                            <div
                                                style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                                                <div style="flex: 1; margin-right: 1rem;">
                                                    <label for="start-date">Dari Tanggal <span
                                                            style="color: red; font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                    <input type="text" id="start-date" x-model="params.startDate"
                                                        class="form-input" placeholder="Pilih Tanggal Mulai" required
                                                        style="width: 100%; box-sizing: border-box;">
                                                </div>
                                                <div style="flex: 1;">
                                                    <label for="start-time">Dari Jam <span
                                                            style="color: red; font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                    <input type="text" id="start-time" x-model="params.startTime"
                                                        class="form-input" placeholder="Pilih Waktu Mulai" required
                                                        style="width: 100%; box-sizing: border-box;">
                                                </div>
                                            </div>
                                            <div
                                                style="display: flex; justify-content: space-between; margin-bottom: 1rem;">
                                                <div style="flex: 1; margin-right: 1rem;">
                                                    <label for="end-date">Hingga Tanggal <span
                                                            style="color: red; font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                    <input type="text" id="end-date" x-model="params.endDate"
                                                        class="form-input" placeholder="Pilih Tanggal Akhir" required
                                                        style="width: 100%; box-sizing: border-box;">
                                                </div>
                                                <div style="flex: 1;">
                                                    <label for="end-time">Hingga Jam <span
                                                            style="color: red; font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                    <input type="text" id="end-time" x-model="params.endTime"
                                                        class="form-input" placeholder="Pilih Waktu Akhir" required
                                                        style="width: 100%; box-sizing: border-box;">
                                                </div>
                                            </div>
                                            <div x-show="showKendaraanInput" class="mb-5">
                                                <label for="tujuan">Lokasi Tujuan <span
                                                        style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                <input id="tujuan" type="text"
                                                    placeholder="Tambahkan Tujuan Lokasi Kegiatan" class="form-input"
                                                    x-model="params.tujuan">
                                            </div>
                                            <div x-show="showKendaraanInput" class="mb-5">
                                                <label for="sppd">Pembebanan SPPD oleh Biro Umum? <span
                                                        style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="sppd"
                                                            value="tidak" x-model="params.sppd">
                                                        <span class="ml-2">Tidak</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="sppd"
                                                            value="ya" x-model="params.sppd">
                                                        <span class="ml-2">Ya</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div x-show="showKendaraanInput" class="mb-5">
                                                <label for="bbm">Pembebanan BBM oleh Biro Umum? <span
                                                        style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="bbm"
                                                            value="tidak" x-model="params.bbm">
                                                        <span class="ml-2">Tidak</span>
                                                    </label>
                                                </div>
                                                <div>
                                                    <label class="inline-flex items-center">
                                                        <input type="radio" class="form-radio" name="bbm"
                                                            value="ya" x-model="params.bbm">
                                                        <span class="ml-2">Ya</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="mb-5">
                                                <label for="surat">Surat Peminjaman <span
                                                        style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                <input id="surat" type="file" class="form-input" accept=".pdf"
                                                    @change="handleSuratUpload">
                                                <p x-ref="suratInfo" style="display:none;" class="mt-2 text-info"></p>
                                            </div>
                                            <div x-show="showPaymentInput" class="mb-5">
                                                <label for="bukti_pembayaran">Bukti Pembayaran Booking <span
                                                        style="color: red;font-weight: bold; font-size: 1.3rem;">*</span></label>
                                                <input id="bukti_pembayaran" type="file" class="form-input"
                                                    @change="handlePaymentUpload">
                                                <p x-ref="pembayaranInfo" style="display:none;" class="mt-2 text-info">
                                                </p>
                                            </div>
                                            <div class="mt-8 flex items-center justify-end">
                                                <button type="button" class="btn btn-outline-danger"
                                                    @click="isAddEventModal = false">
                                                    Cancel
                                                </button>
                                                <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4"
                                                    x-text="params.id ? 'Update Peminjaman' : 'Tambah Peminjaman'"></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="calendar-wrapper" id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('stylesheets')
    <style>
        .fc-daygrid-event.bg-warning {
            background-color: #ffc107 !important;
            /* Sesuaikan warna dengan yang diinginkan untuk status 'warning' */
            color: #ffffff;
            /* Sesuaikan warna teks jika diperlukan */
            border: 1px solid #ff9800;
            /* Sesuaikan warna border dengan yang diinginkan untuk status 'warning' */
        }

        .fc-daygrid-event.bg-success {
            background-color: #28a745 !important;
            /* Sesuaikan warna dengan yang diinginkan untuk status 'success' */
            color: #fff;
            /* Sesuaikan warna teks jika diperlukan */
            border: 1px solid #218838;
            /* Sesuaikan warna border dengan yang diinginkan untuk status 'success' */
        }

        .fc-daygrid-event.bg-danger {
            background-color: #dc3545 !important;
            /* Sesuaikan warna dengan yang diinginkan untuk status 'danger' */
            color: #fff;
            /* Sesuaikan warna teks jika diperlukan */
            border: 1px solid #c82333;
            /* Sesuaikan warna border dengan yang diinginkan untuk status 'danger' */
        }
    </style>
@endpush
@push('scripts')
    <script>
        function updateFlatpickrValues(startDate, startTime, endDate, endTime) {
            console.log('Updating Flatpickr with:', startDate, startTime, endDate, endTime);
            const startDatePicker = document.querySelector("#start-date")?._flatpickr;
            const endDatePicker = document.querySelector("#end-date")?._flatpickr;

            const startDateTime = `${startDate} ${startTime}`;
            const endDateTime = `${endDate} ${endTime}`;

            console.log('Parsed startDateTime:', startDateTime);
            console.log('Parsed endDateTime:', endDateTime);

            if (startDatePicker && endDatePicker) {
                startDatePicker.setDate(flatpickr.parseDate(startDateTime, "Y-m-d H:i"));
                endDatePicker.setDate(flatpickr.parseDate(endDateTime, "Y-m-d H:i"));
            }
        }

        function updateDatetime() {
            const dateValue = document.getElementById('dateInput').value;
            const timeValue = document.getElementById('timeInput').value;
            if (dateValue && timeValue) {
                const datetime = `${dateValue}T${timeValue}`;
                console.log('Selected datetime:', datetime);
                const calendarData = Alpine.data('calendar');
                if (calendarData && calendarData.params) {
                    calendarData.params.start = datetime;
                } else {
                    console.error('Alpine.data("calendar") or params is undefined');
                }
            }
        }
    </script>
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

            Alpine.data('calendar', () => ({
                defaultParams: {
                    id: null,
                    facility_id: null,
                    start: '',
                    end: '',
                    surat: '',
                    agenda: '',
                },
                params: {
                    id: null,
                    facility_id: null,
                    start: '',
                    end: '',
                    surat: '',
                    agenda: '',
                    tujuan: null,
                    sppd: null,
                    bbm: null,
                    bukti_pembayaran: null,
                },
                showPaymentInput: false,
                showKendaraanInput: false,
                isAddEventModal: false,
                minStartDate: '',
                minEndDate: '',
                calendar: null,
                now: new Date(),
                events: [],
                facilities: @json($facilities) || [],
                rentList: @json($rents) || [],
                init() {
                    this.fetchEvents();
                    this.initializeEvents();
                    this.initializeCalendar();
                    this.watchSidebarToggle();

                    this.startDateTimePicker = flatpickr("#start", {
                        enableTime: true,
                        dateFormat: "Y-m-d H:i",
                        time_24hr: true,
                        minuteIncrement: 60,
                        onChange: (selectedDates, dateStr) => {
                            this.params.start = dateStr;
                        }
                    });

                    this.endDateTimePicker = flatpickr("#end", {
                        enableTime: true,
                        dateFormat: "Y-m-d H:i",
                        time_24hr: true,
                        minuteIncrement: 60,
                        onChange: (selectedDates, dateStr) => {
                            this.params.end = dateStr;
                        }
                    });

                    this.startDatePicker = flatpickr("#start-date", {
                        dateFormat: "Y-m-d",
                        onChange: (selectedDates, dateStr) => {
                            this.params.startDate = dateStr;
                            this.updateStart();
                        }
                    });

                    this.startTimePicker = flatpickr("#start-time", {
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        time_24hr: true,
                        minuteIncrement: 60,
                        onChange: (selectedDates, dateStr) => {
                            this.params.startTime = dateStr;
                            this.updateStart();
                        }
                    });

                    this.endDatePicker = flatpickr("#end-date", {
                        dateFormat: "Y-m-d",
                        onChange: (selectedDates, dateStr) => {
                            this.params.endDate = dateStr;
                            this.updateEnd();
                        }
                    });

                    this.endTimePicker = flatpickr("#end-time", {
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:i",
                        time_24hr: true,
                        minuteIncrement: 60,
                        onChange: (selectedDates, dateStr) => {
                            this.params.endTime = dateStr;
                            this.updateEnd();
                        }
                    });
                },
                updateStart() {
                    if (this.params.startDate && this.params.startTime) {
                        this.params.start = `${this.params.startDate}T${this.params.startTime}`;
                    }
                },
                updateEnd() {
                    if (this.params.endDate && this.params.endTime) {
                        this.params.end = `${this.params.endDate}T${this.params.endTime}`;
                    }
                },
                resetForm() {
                    this.params = {
                        id: null,
                        facility_id: this.facilities.length > 0 ? this.facilities[0].id : null,
                        startDate: '',
                        startTime: '',
                        endDate: '',
                        endTime: '',
                        start: '',
                        end: '',
                        surat: '',
                        agenda: '',
                        tujuan: null,
                        sppd: null,
                        bbm: null,
                        bukti_pembayaran: null,
                    };
                    this.$nextTick(() => {
                        if (this.$refs.facilityDropdown) {
                            this.$refs.facilityDropdown.value = this.params.facility_id;
                            this.handleFacilityChange();
                        }
                    });
                    this.$refs.suratInfo.style.display = 'none';
                    this.$refs.pembayaranInfo.style.display = 'none';
                    this.showPaymentInput = false;
                    this.showKendaraanInput = false;
                    this.isAddEventModal = false;
                },
                initializeEvents() {
                    this.events = this.rentList.map(rent => {
                        let statusClass = this.getStatusClass(rent.status);
                        return {
                            id: rent.id,
                            title: `${rent.facility.name} - ${rent.agenda || 'Agenda tidak tersedia'}`,
                            facility_id: rent.facility_id,
                            start: this.dateFormat(rent.start),
                            end: this.dateFormat(rent.end),
                            surat: rent.surat,
                            agenda: rent.agenda,
                            tujuan: rent.tujuan,
                            sppd: rent.sppd,
                            bbm: rent.bbm,
                            bukti_pembayaran: rent.bukti_pembayaran,
                            className: statusClass,
                        };
                    });
                },
                initializeCalendar() {
                    var calendarEl = document.getElementById('calendar');
                    this.calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        headerToolbar: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'dayGridMonth,timeGridWeek,timeGridDay',
                        },
                        editable: true,
                        dayMaxEvents: true,
                        selectable: true,
                        droppable: true,
                        eventClick: (event) => {
                            this.editRent(event);
                        },
                        select: (event) => {
                            this.editDate(event);
                        },
                        events: this.events,
                    });
                    this.calendar.render();
                },
                watchSidebarToggle() {
                    this.$watch('$store.app.sidebar', () => {
                        setTimeout(() => {
                            this.calendar.render();
                        }, 300);
                    });
                },
                getStatusClass(status) {
                    let statusClass = '';
                    switch (status) {
                        case 'proses':
                            statusClass = 'bg-primary';
                            break;
                        case 'diterima':
                            statusClass = 'bg-success';
                            break;
                        case 'ditolak':
                            statusClass = 'bg-danger';
                            break;
                    }
                    return statusClass;
                },
                getMonth(dt, add = 0) {
                    let month = dt.getMonth() + 1 + add;
                    return dt.getMonth() < 10 ? '0' + month : month;
                },
                handleSuratUpload(event) {
                    this.params.surat = event.target.files[0];
                },
                handlePaymentUpload(event) {
                    this.params.bukti_pembayaran = event.target.files[0];
                },
                handleFacilityChange(event) {
                    let selectedFacility = this.facilities.find(facility => facility.id === parseInt(
                        this.params.facility_id));
                    this.showPaymentInput = false;
                    if (selectedFacility) {
                        // console.log(selectedFacility);
                        this.showPaymentInput = selectedFacility.pembayaran === 'ya';
                        if (selectedFacility.facility_type) {
                            this.showKendaraanInput = selectedFacility.facility_type.name ===
                                'Kendaraan';
                        } else {
                            this.showKendaraanInput = false;
                        }
                    } else {
                        this.showPaymentInput = false;
                        this.showKendaraanInput = false;
                    }
                },
                editRent(data) {
                    this.params = this.defaultParams;
                    if (data) {
                        let obj = JSON.parse(JSON.stringify(data.event));
                        console.log('Event Data:', obj);
                        const startDateTime = new Date(obj.start);
                        const endDateTime = new Date(obj.end);
                        const startDate = startDateTime.toISOString().split('T')[0];
                        const startTime = startDateTime.toTimeString().split(' ')[0].slice(0, 5);
                        const endDate = endDateTime.toISOString().split('T')[0];
                        const endTime = endDateTime.toTimeString().split(' ')[0].slice(0, 5);
                        console.log('Start Date:', startDate);
                        console.log('Start Time:', startTime);
                        console.log('End Date:', endDate);
                        console.log('End Time:', endTime);
                        this.params = {
                            id: obj.id || null,
                            facility_id: obj.extendedProps?.facility_id || this.params.facility_id,
                            startDate: startDate,
                            startTime: startTime,
                            endDate: endDate,
                            endTime: endTime,
                            agenda: obj.extendedProps?.agenda,
                            surat: obj.extendedProps?.surat || this.params.surat,
                            tujuan: obj.extendedProps?.tujuan || this.params.tujuan,
                            sppd: obj.extendedProps?.sppd || this.params.sppd,
                            bbm: obj.extendedProps?.bbm || this.params.bbm,
                            bukti_pembayaran: obj.extendedProps?.bukti_pembayaran || this.params
                                .bukti_pembayaran,
                        };
                        console.log('Params:', this.params);
                        this.handleFacilityChange();
                        this.minStartDate = new Date();
                        this.minEndDate = this.dateFormat(obj.start);
                        if (this.params.facility_id) {
                            setTimeout(() => {
                                this.$refs.facilityDropdown.value = this.params.facility_id;
                            }, 100);
                        }
                        if (this.params.surat) {
                            this.$refs.suratInfo.textContent =
                                `Surat telah diupload: ${this.params.surat}`;
                            this.$refs.suratInfo.style.display = 'block';
                        } else {
                            this.$refs.suratInfo.style.display = 'none';
                        }
                        if (this.params.bukti_pembayaran) {
                            this.$refs.pembayaranInfo.textContent =
                                `Bukti Pembayaran telah diupload: ${this.params.bukti_pembayaran}`;
                            this.$refs.pembayaranInfo.style.display = 'block';
                        } else {
                            this.$refs.pembayaranInfo.style.display = 'none';
                        }

                        updateFlatpickrValues(this.params.startDate, this.params.startTime, this.params
                            .endDate, this.params.endTime);
                    } else {
                        this.minStartDate = new Date();
                        this.minEndDate = new Date();
                    }
                    this.isAddEventModal = true;
                },

                editDate(data) {
                    let obj = {
                        event: {
                            start: data.start,
                            end: data.end,
                            facility_id: this.params.facility_id,
                            surat: this.params.surat,
                        },
                    };
                    this.editRent(obj);
                },

                dateFormat(dt) {
                    dt = new Date(dt);
                    const month = dt.getMonth() + 1 < 10 ? '0' + (dt.getMonth() + 1) : dt.getMonth() +
                        1;
                    const date = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
                    const hours = dt.getHours() < 10 ? '0' + dt.getHours() : dt.getHours();
                    const mins = dt.getMinutes() < 10 ? '0' + dt.getMinutes() : dt.getMinutes();
                    dt = dt.getFullYear() + '-' + month + '-' + date + 'T' + hours + ':' + mins;
                    return dt;
                },

                saveRent() {
                    console.log('this.params:', this.params);
                    if (!this.params.facility_id || this.params.facility_id === '') {
                        this.showMessage('Pilih Fasilitas yang akan dipinjam.', 'error');
                        return;
                    }
                    if (!this.params.agenda) {
                        this.showMessage(
                            'Tambahkan Agenda Kegiatan.', 'error'
                        );
                        return;
                    }
                    if (!this.params.startDate || !this.params.startTime) {
                        this.showMessage('Pilih Jadwal Awal Peminjaman.', 'error');
                        return;
                    }
                    if (!this.params.endDate || !this.params.endTime) {
                        this.showMessage('Pilih Jadwal Akhir peminjaman.', 'error');
                        return;
                    }
                    if (this.showKendaraanInput && !this.params.tujuan) {
                        this.showMessage(
                            'Tambahkan Lokasi Tujuan Kegiatan.', 'error'
                        );
                        return;
                    }
                    if (this.showKendaraanInput && !this.params.sppd) {
                        this.showMessage(
                            'Pilih Opsi Pembebanan SPPD.', 'error'
                        );
                        return;
                    }
                    if (this.showKendaraanInput && !this.params.bbm) {
                        this.showMessage(
                            'Pilih Opsi Pembebanan BBM.', 'error'
                        );
                        return;
                    }
                    if (this.showPaymentInput && !this.params.bukti_pembayaran && !this.params.id) {
                        this.showMessage(
                            'Upload Bukti Pembayaran.', 'error'
                        );
                        return;
                    }
                    if (!this.params.surat && !this.params.id) {
                        this.showMessage('Upload Surat Peminjaman Fasilitas.', 'error');
                        return;
                    }
                    let startDateTime = `${this.params.startDate} ${this.params.startTime}`;
                    let endDateTime = `${this.params.endDate} ${this.params.endTime}`;
                    console.log('Local Start:', startDateTime);
                    console.log('Local End:', endDateTime);
                    let formData = new FormData();
                    formData.append('facility_id', this.params.facility_id);
                    formData.append('start', startDateTime);
                    formData.append('end', endDateTime);
                    formData.append('agenda', this.params.agenda);
                    if (this.params.surat instanceof File) {
                        formData.append('surat', this.params.surat);
                    } else if (this.params.surat && typeof this.params.surat === 'string') {
                        formData.append('surat', this.params.surat);
                    }
                    if (this.showPaymentInput && this.params.bukti_pembayaran instanceof File) {
                        formData.append('bukti_pembayaran', this.params.bukti_pembayaran);
                    }
                    if (this.showKendaraanInput && this.params.sppd) {
                        formData.append('sppd', this.params.sppd);
                    }
                    if (this.showKendaraanInput && this.params.tujuan) {
                        formData.append('tujuan', this.params.tujuan);
                    }
                    if (this.showKendaraanInput && this.params.bbm) {
                        formData.append('bbm', this.params.bbm);
                    }
                    for (let pair of formData.entries()) {
                        console.log(`${pair[0]}: ${pair[1]}`);
                    }
                    const url = this.params.id ? `/admin/rent-update/${this.params.id}` : '/admin/rent';
                    const method = this.params.id ? 'POST' : 'POST';
                    fetch(url, {
                            method: method,
                            body: formData,
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                'Accept': 'application/json'
                            },
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                this.fetchEvents();
                                this.showMessage('Peminjaman berhasil dilakukan.');
                                setTimeout(() => {
                                    window.location.href = '/admin/rent';
                                }, 1000);
                            } else {
                                this.showMessage(data.error || 'Error saving event', 'error');
                            }
                        })
                        .catch(error => {
                            console.error('Network error:', error);
                            let errorMessage = 'Gagal Melakukan Peminjaman';

                            try {
                                const errorData = JSON.parse(error.message);
                                if (errorData.error) {
                                    errorMessage += ': ' + errorData.error;
                                }
                            } catch (e) {
                                errorMessage += ': ' + error.message;
                            }

                            this.showMessage(errorMessage, 'error');
                        });
                },
                fetchEvents() {
                    fetch('/admin/api/rent', {
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                'Accept': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.text().then(text => {
                                    // console.error('Error fetching events:', text);
                                    throw new Error(text);
                                });
                            }
                            return response.json();
                        })
                        .then(events => {
                            // console.log('Raw Fetched Events:', events);
                            this.events = events.map(event => {
                                // console.log('Original Event Data:', event);
                                let statusClass = '';
                                switch (event.status) {
                                    case 'proses':
                                        statusClass =
                                            'bg-warning';
                                        break;
                                    case 'diterima':
                                        statusClass =
                                            'bg-success';
                                        break;
                                    case 'ditolak':
                                        statusClass =
                                            'bg-danger';
                                        break;
                                    default:
                                        statusClass =
                                            'bg-info';
                                        break;
                                }
                                const mappedEvent = {
                                    id: event.id,
                                    title: event.title,
                                    start: event.start,
                                    end: event.end,
                                    agenda: event.agenda,
                                    extendedProps: {
                                        surat: event.surat,
                                        facility_id: event.facility_id,
                                        tujuan: event.tujuan,
                                        sppd: event.sppd,
                                        bbm: event.bbm,
                                        bukti_pembayaran: event.bukti_pembayaran,
                                    },
                                    className: statusClass,
                                };
                                // console.log('Mapped Event Data:', mappedEvent);
                                return mappedEvent;
                            });
                            this.calendar.getEventSources()[0].remove();
                            this.calendar.addEventSource(this.events);
                            this.calendar.render();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            this.showMessage('Error fetching events: ' + error.message,
                                'error');
                        });
                },
                startDateChange(event) {
                    const dateStr = event.target.value;
                    if (dateStr) {
                        this.minEndDate = this.dateFormat(dateStr);
                        this.params.start = dateStr;
                        this.params.end = '';
                    }
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
        document.addEventListener('DOMContentLoaded', function() {
            if (document.getElementById('start-date')) {
                updateFlatpickrValues(
                    document.getElementById('start-date').value,
                    document.getElementById('end-date').value
                );
            }
        });
    </script>
@endpush
