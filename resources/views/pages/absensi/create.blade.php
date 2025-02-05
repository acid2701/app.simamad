@extends('layouts.app')

@section('title', 'Create Absensi')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Absensi</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('absen-rekap.index') }}">Rekap Absensi</a></div>
                    <div class="breadcrumb-item">Create Absensi</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="container">
                    <h2>Scan Barcode</h2>

                    <!-- Panggil komponen scanner di sini -->
                    @include('components.scanner')


                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Pastikan html5-qrcode juga dimuat -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
@endpush
