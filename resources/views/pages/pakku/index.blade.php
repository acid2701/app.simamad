@extends('layouts.app')

@section('title', 'Lapooran Pakku')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Lapor Pakku</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('pakku.index') }}">Pakku</a></div>
                    <div class="breadcrumb-item">Semua Laporan</a></div>
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
                            <div class="card-header">
                                <h4>Manajemen Laporan Pakku</h4>
                            </div>

                            <div class="card-body">
                                <div class="float-left">
                                    <div class="section-header-button">
                                        <a href="{{ route('pakku.create') }}" class="btn btn-primary">Tambah
                                            Laporan</a>
                                    </div>
                                </div>

                                <div class="float-right">
                                    <form method="GET" action="{{ route('pakku.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="keyword">
                                            <!-- Ganti 'name' menjadi 'keyword' -->
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                                <div class="clearfix mb-3"></div>
                                @php
                                    use Carbon\Carbon;
                                    Carbon::setLocale('id');
                                @endphp

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>Terlapor</th>
                                            <th>Unit</th>
                                            <th>Tanggal</th>
                                            <th>Jam</th>
                                            <th>Tempat</th>
                                            <th>Laporan</th>
                                            <th>Saran</th>

                                        </tr>
                                        @foreach ($pakku as $pak)
                                            <tr>
                                                <th scope="row">{{ $pakku->firstItem() + $loop->index }}
                                                </th>
                                                <td>{{ $pak->terlapor }}
                                                </td>
                                                <td>
                                                    {{ $pak->unit }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($pak->tanggal)->translatedFormat('l, d F Y') }}
                                                </td>
                                                <td>
                                                    {{ $pak->jam }} WIB
                                                </td>
                                                <td>
                                                    {{ $pak->tempat }}
                                                </td>
                                                <td>
                                                    {{ $pak->laporan }}
                                                </td>
                                                <td>
                                                    {{ $pak->saran }}
                                                </td>


                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $pakku->withQueryString()->links() }}
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
    <script src="{{ asset('js/delete/pakku.js') }}"></script>
@endpush
