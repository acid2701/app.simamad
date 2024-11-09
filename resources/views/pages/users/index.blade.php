@extends('layouts.app')

@section('title', 'Users')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Users</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></div>
                    <div class="breadcrumb-item">Semua Users</a></div>
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
                                <h4>Manajemen User</h4>
                            </div>
                            <div class="card-body">

                                <div class="float-left">
                                    <div class="section-header-button">
                                        <a href="#" class="btn btn-primary">Tambah User Baru</a>
                                    </div>
                                </div>

                                <div class="float-right">
                                    <form method="GET" action="{{ route('users.index') }}">
                                        <div class="input-group">
                                            <!-- Pastikan nama input adalah 'username' sesuai dengan yang diterima controller -->
                                            <input type="text" class="form-control" placeholder="cari Username"
                                                name="username" value="{{ request('username') }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>No</th>
                                            <th>id_nik</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>level</th>
                                            <th>motivasi</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($user as $usr)
                                            <!-- Ganti $user menjadi $usr di dalam loop -->
                                            <tr>
                                                <th scope="row">{{ $user->firstItem() + $loop->index }}</th>
                                                <!-- Ini juga perlu diperbaiki -->
                                                <td>{{ $usr->id_nik }}</td>
                                                <!-- Ganti $user->id_nik menjadi $usr>id_nik -->
                                                <td>{{ $usr->username }}</td>
                                                <td>{{ $usr->password }}</td>
                                                <td>{{ $usr->level }}</td>
                                                <td>{{ $usr->motivasi }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <form action="#" class="ml-2">
                                                            <button class="btn btn-sm btn-success btn-icon"
                                                                style="width: 100px;">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                        </form>

                                                        <form action="#" class="ml-2">
                                                            <button class="btn btn-sm btn-info btn-icon"
                                                                style="width: 100px;">
                                                                <i class="fa-solid fa-eye"></i> View
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $user->withQueryString()->links() }}
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
