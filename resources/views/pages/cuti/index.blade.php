@extends('layouts.app')

@section('title', 'Rekap Cuti')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Rekap Cuti</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('cuti.index') }}">Cuti</a></div>
                    <div class="breadcrumb-item">Cuti Karyawan</a></div>
                </div>
            </div>
            <div class="section-body">
                {{-- <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div> --}}

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
                                <div x-data="{ isOpen: false, tglCuti: '{{ request('tgl_cuti') }}' }">

                                    <div class="flex justify-between mb-4">
                                        <!-- Sisa Cuti (kiri) -->
                                        <div class="text-left bg-yellow-200 text-black p-2 rounded hover:bg-yellow-300 transition-all">
                                            Cuti digunakan: {{ $karyawan->totalcuti ?? '0'  }}/{{ $karyawan->jatah_cuti  ?? '--'  }}
                                        </div>


                                        <!-- Tombol untuk membuka modal pencarian (kanan) -->
                                        <div class="text-right">
                                            <button @click="isOpen = !isOpen" class="btn btn-primary">
                                                Pencarian
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div x-show="isOpen" x-transition
                                        class="fixed inset-0 bg-gray-500 bg-opacity-75 z-50 flex items-center justify-center">
                                        <!-- Modal content -->
                                        <div class="bg-white rounded-xl p-6 w-96">
                                            <div class="flex justify-between items-center mb-4">
                                                <h3 class="text-lg font-semibold">Pencarian</h3>
                                                <button @click="isOpen = false" class="text-xl text-gray-500">&times;</button>
                                            </div>

                                            <!-- Form Pencarian -->
                                            <form action="{{ route('cuti.index') }}" method="GET">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="tgl_cuti_dari" class="form-label">Dari</label>
                                                        <input type="date" class="form-control" id="tgl_cuti_dari"
                                                            name="tgl_cuti_dari" x-model="tgl_cuti_dari">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="tgl_cuti_sampai" class="form-label">Sampai</label>
                                                        <input type="date" class="form-control" id="tgl_cuti_sampai"
                                                            name="tgl_cuti_sampai" x-model="tgl_cuti_sampai">
                                                    </div>
                                                </div>
                                                <div class="flex justify-between">
                                                    <button type="submit" class="btn btn-primary mt-4">Cari</button>
                                                    <!-- Tombol Clear Pencarian -->
                                                    <button type="button" @click="tglCuti = ''"
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
                                        @foreach ($cutirekap as $index => $cuti)
                                            <div class="list-group-item bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
                                                x-data="{ index: {{ $index }} }">
                                                <!-- Dropdown untuk Tanggal Masuk -->
                                                <button
                                                   class="btn btn-link w-full text-left p-2 hover:bg-indigo-100 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 rounded-xl flex justify-between items-center"
                                                    @click="openIndex = (openIndex === index ? null : index)">
                                                    <strong class="text-sm text-gray-600">
                                                        {{ $cuti->jenis_pengajuan ?? '-' }} <br>
                                                         {{ \Carbon\Carbon::parse($cuti->tgl_cuti)->translatedFormat('l, d F Y') }}
                                                    </strong>


                                                    <strong class="text-indigo-50"></strong>
                                                    <span
                                                        class="@if(str_contains($cuti->catatan, 'di ACC')) text-green-500
                                                               @elseif(str_contains($cuti->catatan, 'di Tolak')) text-red-500
                                                               @elseif(str_contains($cuti->catatan, 'Proses Persetujuan')) text-yellow-500
                                                               @else text-black
                                                               @endif">
                                                        {{ $cuti->catatan ?? '-' }}
                                                    </span>


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

                                                        <strong class="text-indigo-40">Nama:</strong><br>
                                                        {{ $cuti->nama_karyawan ?? '-' }}<br>

                                                        <strong class="text-indigo-40">Tanggal {{ $cuti->jenis_pengajuan ?? '-' }} :<br> </strong>
                                                        {{ $cuti->tgl_cuti ? \Carbon\Carbon::parse($cuti->tanggalmasuk)->translatedFormat('l, d F Y') : '-' }}

                                                        <strong class="text-indigo-40">Alasan:</strong><br>
                                                        {{ $cuti->keterangan ?? '-' }}<br>

                                                        <strong class="text-indigo-40">Status:</strong><br>
                                                        {{ $cuti->catatan ?? '-' }}

                                                    </div>





                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>


                                <!-- Pagination -->
                                <div class="d-flex justify-content-center">
                                    {{ $cutirekap->withQueryString()->links() }}
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

@endpush
