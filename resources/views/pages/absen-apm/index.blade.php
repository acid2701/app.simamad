@extends('layouts.app')

@section('title', 'Absensi Apm')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">

            <div class="section-header">
                <h1>Absensi Apm</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Absensi Apm</a></div>
                </div>
            </div>


            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center"
                                style="height: 50vh; padding-top: 3vh;">
                                <div class="text-center p-5"
                                    style="background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                                    <h1 class="mb-4" style="font-size: 2.5rem; font-weight: 600; color: #333;">Barcode
                                        Karyawan</h1>

                                    <!-- Barcode Section -->
                                    <div class="mb-9">
                                        <h3 class="mb-4" style="font-size: 1.5rem; font-weight: 500; color: #555;">

                                        </h3>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- Barcode berada di tengah secara vertikal dan horizontal -->
                                            <div>{!! $barcode !!}</div>
                                        </div>
                                    </div>



                                    <!-- Nama Karyawan -->
                                    <p class="lead mb-2" style="font-size: 1.2rem; color: #555;">Nama Karyawan: <span
                                            class="text-black">{{ $karyawan->nama_karyawan }}</span></p>

                                    <!-- NIK Karyawan -->
                                    <p class="lead mb-2" style="font-size: 1.2rem; color: #555;">Nik Karyawan: <span
                                            class="text-black">{{ $karyawan->nik_karyawan }}</span></p>

                                    <!-- Unit Karyawan -->
                                    <p class="lead mb-2" style="font-size: 1.2rem; color: #555;">Unit Karyawan: <span
                                            class="text-black">{{ $karyawan->unit_karyawan }}</span></p>


                                    {{-- <!-- Optional Button or Action -->
                                    <a href="{{ route('some.route') }}" class="btn btn-primary mt-3"
                                        style="font-weight: 500; padding: 10px 20px; font-size: 1rem;">Download Barcode</a> --}}
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
