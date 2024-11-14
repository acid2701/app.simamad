@extends('layouts.app')

@section('title', 'Detail Gaji')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Slip Gaji</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('gaji.index', $gaji->id) }}">Gaji</a></div>
                    <div class="breadcrumb-item">Slip Gaji</a></div>
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

                            <div class="card">
                                <form action="{{ route('gaji.update', $gaji) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Tombol Kembali (Kanan bawah) -->
                                    <div class="ml-auto">
                                        <a href="{{ route('gaji.index') }}" class="btn btn-primary">
                                            <i class="fa-solid fa-backward"></i>
                                            Kembali </a>
                                    </div>

                                    <div class="card-body">

                                        <head>
                                            <title>

                                            </title>
                                            <link
                                                href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
                                                rel="stylesheet">
                                        </head>

                                        <body class="bg-gray-100 p-4 sm:p-6">
                                            <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-lg p-4 sm:p-6">
                                                <!-- Header -->
                                                <div class="flex justify-center mb-4">
                                                    <div class="flex items-center space-x-4">
                                                        <img alt="image" src="{{ asset('img/logo.png') }}"
                                                            class="w-24 h-24">
                                                        <div class="text-center">
                                                            <h1 class="text-xl sm:text-2xl font-bold">RS PKU AISYIYAH
                                                                BOYOLALI</h1>
                                                            <p class="text-lg sm:text-xl">Jl. Pasar Sapi Baru Singkil -
                                                                Karanggeneng - Boyolali</p>
                                                            <p class="text-lg sm:text-xl">Telp. (0276) 322898 / Fax. (0276)
                                                                3294300</p>
                                                            <p class="text-lg sm:text-xl">Email: rpkuboyolali@yahoo.co.id ||
                                                                Website: www.rspkuboyolali.co.id</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Slip Gaji Title -->
                                                <h4 class="text-center text-3xl sm:text-4xl font-bold mb-3">SLIP GAJI</h4>

                                                <!-- Karyawan Info -->
                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2 text-lg mb-1">
                                                    <div class="text-lg mb-0">
                                                        <!-- Nama Karyawan -->
                                                        <div class="flex justify-between items-center mb-1">
                                                            <label class="w-32 font-semibold">Nama</label>
                                                            <p class="flex-1 text-left m-0">: {{ $gaji->nama_karyawan }}</p>
                                                        </div>

                                                        <!-- Unit -->
                                                        <div class="flex justify-between items-center mb-1">
                                                            <label class="w-32 font-semibold">Unit</label>
                                                            <p class="flex-1 text-left m-0">: {{ $gaji->unit_karyawan }}</p>
                                                        </div>

                                                        <!-- Bulan -->
                                                        <div class="flex justify-between items-center mb-1">
                                                            <label class="w-32 font-semibold">Bulan</label>
                                                            <p class="flex-1 text-left m-0">: {{ $gaji->namabulan }}</p>
                                                        </div>

                                                        <div class="flex justify-between items-center mb-1">
                                                            <label class="w-32 font-semibold">Post</label>
                                                            <p class="flex-1 text-left m-0">:
                                                                {{ \Carbon\Carbon::parse($gaji->tgl_post)->translatedFormat('l, d F Y') }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>



                                                <!-- Penerimaan dan Potongan -->
                                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-9 text-lg mb-6">
                                                    <!-- Penerimaan -->
                                                    <div>
                                                        <hr class="my-1 border-t-1 border-gray-500">
                                                        <h3 class="font-bold mb-2">PENERIMAAN</h3>
                                                        <hr class="my-1 border-t-1 border-gray-500">
                                                        <div class="flex justify-between mb-2"><span>Gaji
                                                                Pokok</span><span>Rp.
                                                                {{ number_format($gaji->gapok, 0, ',', '.') }}</span></div>
                                                        <div class="flex justify-between mb-2"><span>Tunjangan
                                                                Jabatan</span><span>Rp.
                                                                {{ number_format($gaji->tunjangan_jabatan, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Tunjangan
                                                                Khusus</span><span>Rp.
                                                                {{ number_format($gaji->tunjangan_khusus, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Lembur</span><span>Rp.
                                                                {{ number_format($gaji->lembur, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Jam
                                                                Malam</span><span>Rp.
                                                                {{ number_format($gaji->jam_malam, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Insentif
                                                                (1)</span><span>Rp.
                                                                {{ number_format($gaji->insentif, 0, ',', '.') }}</span>
                                                        </div>
                                                    </div>

                                                    <!-- Potongan -->
                                                    <div>
                                                        <hr class="my-1 border-t-1 border-gray-500">
                                                        <h3 class="font-bold mb-2">POTONGAN</h3>
                                                        <hr class="my-1 border-t-1 border-gray-500">
                                                        <div class="flex justify-between mb-2"><span>BPJS
                                                                Kesehatan</span><span>Rp.
                                                                {{ number_format($gaji->iuran_bpjs, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>JHT</span><span>Rp.
                                                                {{ number_format($gaji->jht, 0, ',', '.') }}</span></div>
                                                        <div class="flex justify-between mb-2"><span>Simpanan
                                                                Wajib</span><span>Rp.
                                                                {{ number_format($gaji->simpanan_wajib, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Dana
                                                                Sosial</span><span>Rp.
                                                                {{ number_format($gaji->dana_sosial, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Absensi</span><span>Rp.
                                                                {{ number_format($gaji->absensi, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Absensi
                                                                Kegiatan</span><span>Rp.
                                                                {{ number_format($gaji->pertemuan, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Kewajiban Hutang
                                                                (BPD)</span><span>Rp.
                                                                {{ number_format($gaji->kewajiban_hutang, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Zakat</span><span>Rp.
                                                                {{ number_format($gaji->zakat, 0, ',', '.') }}</span></div>
                                                        <div class="flex justify-between mb-2"><span>PPh 21</span><span>Rp.
                                                                {{ number_format($gaji->pph, 0, ',', '.') }}</span></div>
                                                        <div class="flex justify-between mb-2"><span>Sembako</span><span>Rp.
                                                                {{ number_format($gaji->sembako, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Tabungan
                                                                Koperasi</span><span>Rp.
                                                                {{ number_format($gaji->tabungan, 0, ',', '.') }}</span>
                                                        </div>
                                                        <div class="flex justify-between mb-2"><span>Bon
                                                                Obat/Lab/Rad</span><span>Rp.
                                                                {{ number_format($gaji->bon, 0, ',', '.') }}</span></div>
                                                        <div class="flex justify-between mb-2"><span>Lain -
                                                                Lain</span><span>Rp.
                                                                {{ number_format($gaji->lain_lain, 0, ',', '.') }}</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- THP (Gaji) -->
                                                <div class="text-lg mb-6">
                                                    <hr class="my-1 border-t-1 border-gray-500">
                                                    <div class="flex justify-between font-bold"><span>THP
                                                            (Gaji)</span><span>Rp.
                                                            {{ number_format($gaji->jumlah_terima, 0, ',', '.') }}</span>
                                                    </div>
                                                    <hr class="my-1 border-t-1 border-gray-500">
                                                </div>

                                                <!-- Insentif (2) -->
                                                <div class="text-lg mb-6">
                                                    <h3 class="font-bold mb-2">Insentif (2)</h3>
                                                    <div class="flex justify-between"><span>Penghasilan
                                                            Bruto</span><span>Rp.
                                                            {{ number_format($gaji->jumlah_gaji, 0, ',', '.') }}</span>
                                                    </div>
                                                    <div class="flex justify-between"><span>Jml. Potongan</span><span>Rp.
                                                            {{ number_format($gaji->jumlah_pot, 0, ',', '.') }}</span>
                                                    </div>
                                                </div>

                                                <!-- Total THP -->
                                                <div class="text-lg mb-6 bg-yellow-100 p-4 rounded-lg">
                                                    <div class="flex justify-between font-bold text-yellow-800"><span>TOTAL
                                                            THP</span><span>Rp.
                                                            {{ number_format($gaji->jumlah_terima, 0, ',', '.') }}</span>
                                                    </div>

                                                </div>

                                                <div
                                                    class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-4">
                                                    <!-- Bagian Keuangan dan Signature yang selalu di kanan -->
                                                    <div class="text-lg text-center sm:text-left ml-auto">
                                                        <p class="font-semibold">Bagian Keuangan</p>
                                                        <img src="{{ asset('img/bagian-keuangan.png') }}"
                                                            alt="Signature QR Code" class="w-16 h-16 mx-auto sm:mx-0">
                                                        <p class="text-lg mt-2">Eryna Kismawati, S.E</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </body>



                                    </div>

                                    </table>
                            </div>

                        </div>
                        </form>
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
