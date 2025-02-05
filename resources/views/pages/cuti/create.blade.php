@extends('layouts.app')

@section('title', 'Create Cuti')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Cuti</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('cuti.index') }}">Cuti</a></div>
                    <div class="breadcrumb-item">Create Cuti</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <h2 class="section-title">Create Cuti</h2>

                <div class="card">
                    <form action="{{ route('cuti.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">

                            <div class="form-group">
                                <label class="form-label">Jenis Pengajuan</label>

                                <select class="form-control selectric @error('jenis_pengajuan') is-invalid @enderror"
                                    name="jenis_pengajuan">
                                    <option value="">Pilih Pengajuan</option>
                                    <option value="CUTI"
                                        {{ old('jenis_pengajuan', $cuti->jenis_pengajuan ?? '') == 'CUTI' ? 'selected' : '' }}>
                                        CUTI</option>
                                    <option value="IJIN"
                                        {{ old('jenis_pengajuan', $cuti->jenis_pengajuan ?? '') == 'IJIN' ? 'selected' : '' }}>
                                        IJIN</option>
                                </select>

                            </div>

                            <x-input name="tgl_cuti" type="date" label="Tanggal Pengajuan" style="width: 200px;" />

                            <div class="form-group">
                                <label class="form-label">Pengajuan Kepada</label>
                                <select class="form-control selectric @error('idkaru') is-invalid @enderror"
                                    name="idkaru">
                                    <option value="">Pengajuan Kepada</option>
                                    @foreach ($usimamad as $usmmd)
                                        <option value="{{ $usmmd->id_nik }}">{{ $usmmd->nama_karyawan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <x-textarea id="keterangan" name="keterangan" label="Keterangan" :value="old('keterangan')"
                                height="150" required :readonly="false" />

                        </div>


                        <div class="card-footer text-right">
                            <button id="showAlertButton" class="btn btn-primary">Kirim Pengajuan</button>
                        </div>
                    </form>
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
    <script src="{{ asset('js/succes/cuti.js') }}"></script>
@endpush
