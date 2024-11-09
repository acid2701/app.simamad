@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush


@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>




                <div class="card-body">
                    <div class="row justify-content-start">
                        <!-- Ganti justify-content-center dengan justify-content-start -->
                        <!-- Statistik Users -->
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-danger d-flex justify-content-center align-items-center">
                                    <i class="fa-regular fa-user" style="color: #ffffff; font-size: 24px;"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>Users</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $user }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @endsection

            @push('scripts')
                <!-- JS Libraies -->
                <script src="{{ asset('library/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
                <script src="{{ asset('library/chart.js/dist/Chart.js') }}"></script>
                <script src="{{ asset('library/owl.carousel/dist/owl.carousel.min.js') }}"></script>
                <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
                <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
                <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
                <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
                <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
                <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
                <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
                <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>


                <!-- Page Specific JS File -->
                <script src="{{ asset('js/page/index.js') }}"></script>
                <script src="{{ asset('js/page/index-0.js') }}"></script>
            @endpush
