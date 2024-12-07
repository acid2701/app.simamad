@extends('layouts.app')

@section('title', 'Tambah Kategori')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Lapor Pakku</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pakku.create') }}">Buat Laporan</a></div>
                    <div class="breadcrumb-item">Kirim Laporan</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Buat Laporan</h2>


                <div class="card">
                    <form action="{{ route('pakku.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <x-input name="terlapor" label="Terlapor" />

                            <x-input name="unit" label="Unit" />

                            <div class="form-group row">
                                <!-- Tanggal -->
                                <div class="col-md-6">
                                    <x-input name="tanggal" type="date" label="Tanggal" style="width: 200px;" />
                                </div>

                                <!-- Jam -->
                                <div class="col-md-6">
                                    <x-input name="jam" type="time" label="Waktu" style="width: 200px;" />
                                </div>
                            </div>

                            <x-input name="tempat" label="Tempat" />

                            <x-textarea id="laporan" name="laporan" label="Detail Laporan" :value="old('laporan')"
                                height="150" required :readonly="false" />

                            <x-textarea id="saran" name="saran" label="Saran & Masukan" :value="old('saran')"
                                height="150" required :readonly="false" />
                        </div>


                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Kirim Laporan</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
