@extends('layouts.app')

@section('title', 'Rekap Absensi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Rekap Absensi</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('absen-apm.index') }}">Absensi Apm</a></div>
                    <div class="breadcrumb-item">Rekap Absensi</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <div class="clearfix mb-3"></div>
                                @php
                                    use Carbon\Carbon;
                                    Carbon::setLocale('id');
                                @endphp


                                <!-- Modal pencarian popup-->
                                <div x-data="{ isOpen: false, tanggalMasuk: '{{ request('tanggalmasuk') }}', tanggalKeluar: '{{ request('tanggalkeluar') }}' }">
                                    <!-- Tombol untuk membuka modal -->
                                    <div class="text-right">
                                        <button @click="isOpen = !isOpen" class="btn btn-primary mb-4">
                                            Pencarian
                                        </button>
                                    </div>


                                    <!-- Modal -->
                                    <div x-show="isOpen" x-transition
                                        class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 flex items-center justify-center">
                                        <!-- Modal content -->
                                        <div class="bg-white rounded-xl p-6 w-96">
                                            <div class="flex justify-between items-center mb-4">
                                                <h3 class="text-lg font-semibold">Pencarian</h3>
                                                <button @click="isOpen = false"
                                                    class="text-xl text-gray-500">&times;</button>
                                            </div>

                                            <!-- Form Pencarian -->
                                            <form action="{{ route('absen-rekap.index') }}" method="GET">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="tanggalmasuk" class="form-label">Tanggal Masuk</label>
                                                        <input type="date" class="form-control" id="tanggalmasuk"
                                                            name="tanggalmasuk" x-model="tanggalMasuk">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="tanggalkeluar" class="form-label">Tanggal Pulang</label>
                                                        <input type="date" class="form-control" id="tanggalkeluar"
                                                            name="tanggalkeluar" x-model="tanggalKeluar">
                                                    </div>
                                                </div>
                                                <div class="flex justify-between">
                                                    <button type="submit" class="btn btn-primary mt-4">Cari</button>
                                                    <!-- Tombol Clear Pencarian -->
                                                    <button type="button" @click="tanggalMasuk = ''; tanggalKeluar = ''"
                                                        class="btn btn-warning mt-4">
                                                        Clear
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                {{-- Isi rekap absen --}}
                                <div class="table-responsive">
                                    <div class="list-group space-y-4" x-data="{ openIndex: null }">
                                        @foreach ($absenrekap as $index => $rekap)
                                            <div class="list-group-item bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
                                                x-data="{ index: {{ $index }} }">
                                                <!-- Dropdown untuk Tanggal Masuk -->
                                                <button
                                                    class="btn btn-link w-full text-left p-2 hover:bg-indigo-100 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-xl flex justify-between items-center"
                                                    @click="openIndex = (openIndex === index ? null : index)">
                                                    <strong class="text-sm text-gray-600">
                                                        {{ \Carbon\Carbon::parse($rekap->tanggalmasuk)->translatedFormat('l, d F Y') }}
                                                    </strong>
                                                    <svg class="w-6 h-6 text-indigo-500 transform transition-transform duration-300"
                                                        :class="{ 'rotate-180': openIndex === index }"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                                    </svg>
                                                </button>

                                                <!-- Isi dropdown yang berisi informasi lain -->
                                                <div x-show="openIndex === index" class="list-group mt-3 space-y-2">
                                                    <div class="list-group-item bg-indigo-40 p-4 rounded-xl shadow-sm">
                                                        <strong class="text-indigo-700">Tanggal Masuk: </strong>
                                                        {{ $rekap->tanggalmasuk ? \Carbon\Carbon::parse($rekap->tanggalmasuk)->translatedFormat('l, d F Y') : '-' }}
                                                    </div>

                                                    <div class="list-group-item bg-indigo-40 p-4 rounded-xl shadow-sm">
                                                        <strong class="text-indigo-700">Tanggal Pulang: </strong>
                                                        {{ $rekap->tanggalkeluar ? \Carbon\Carbon::parse($rekap->tanggalkeluar)->translatedFormat('l, d F Y') : '-' }}
                                                    </div>

                                                    <div class="list-group-item bg-indigo-40 p-4 rounded-xl shadow-sm">
                                                        <strong class="text-indigo-700">Jam Masuk: </strong>
                                                        {{ \Carbon\Carbon::parse($rekap->jammasuk)->translatedFormat('H:i:s') }}
                                                        WIB
                                                    </div>

                                                    <div class="list-group-item bg-indigo-40 p-4 rounded-xl shadow-sm">
                                                        <strong class="text-indigo-700">Jam Pulang: </strong>
                                                        {{ $rekap->jamkeluar ? \Carbon\Carbon::parse($rekap->jamkeluar)->translatedFormat('H:i:s') : '-' }}
                                                        WIB
                                                    </div>

                                                    <div class="list-group-item bg-indigo-40 p-4 rounded-xl shadow-sm">
                                                        <strong class="text-indigo-700">Lama Bekerja: </strong>
                                                        {{ $rekap->Jam ? \Carbon\Carbon::parse($rekap->Jam)->translatedFormat('H:i:s') : '-' }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                <!-- Pagination -->
                                <div class="float-right">
                                    {{ $absenrekap->withQueryString()->links() }}
                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
    <script src="{{ asset('js/delete/user.js') }}"></script>
@endpush
