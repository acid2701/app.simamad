@extends('layouts.app')

@section('title', 'Gaji')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Manajemen Gaji</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('gaji.index') }}">Gaji</a></div>
                    <div class="breadcrumb-item">Halaman Gaji</a></div>
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
                                <h4>Manajemen Gaji</h4>
                            </div>
                            <div class="card-body">


                                <div class="float-right">
                                    <form method="GET" action="{{ route('gaji.index') }}">
                                        <div class="input-group">
                                            <!-- Pastikan nama input adalah 'username' sesuai dengan yang diterima controller -->
                                            <input type="text" class="form-control" placeholder="Cari Bulan"
                                                name="namabulan" value="{{ request('namabulan') }}">
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
                                            <th>Nama Karyawan</th>
                                            <th>Bulan</th>
                                            <th>Tanggal Terbit</th>
                                            <th>Unit Karyawan</th>
                                            <th>Jumlah Terima</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($gaji as $g)
                                            <tr>
                                                <th scope="row">{{ $gaji->firstItem() + $loop->index }}</th>
                                                <!-- Ini juga perlu diperbaiki -->
                                                <td>{{ $g->nama_karyawan }}</td>
                                                <td>{{ $g->namabulan }}</td>
                                                <!-- Ganti $user->id_nik menjadi $usr>id_nik -->
                                                <td>
                                                    {{ \Carbon\Carbon::parse($g->tanggal_terbit)->translatedFormat('l, d F Y') }}
                                                </td>

                                                <td>{{ $g->unit_karyawan }}</td>
                                                <td> <b>Rp {{ number_format($g->jumlah_terima, 0, ',', '.') }}</b></td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('gaji.show', $g->id) }}'
                                                            class="btn btn-sm btn-info btn-icon" style="width: 100px;">
                                                            <i class="fa-regular fa-eye"></i> View
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>


                                <div class="float-right">
                                    {{ $gaji->withQueryString()->links() }}
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
