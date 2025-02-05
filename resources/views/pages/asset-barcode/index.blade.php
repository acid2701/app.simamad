@extends('layouts.app')

@section('title', 'Scanner Asset')

@push('style')
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <style>
        @media (max-width: 768px) {
            #reader {
                height: 27vh; /* Sesuaikan tinggi layar untuk mobile */
            }
            .qrbox-glow, .qrbox-line {
                width: 200px;
                height: 200px;
            }
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Scanner Asset</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('asset-barcode.index') }}">Scanner Asset</a></div>
                    <div class="breadcrumb-item">Scanner Asset</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert') <!-- Menampilkan alert jika ada -->
                    </div>
                </div>

                <div class="container">
                    <div class="w-full md:w-1/2">

                        <div class="text-center p-6">
                            <!-- Scanner Container -->
                            <div id="reader" class="relative w-full h-72 mx-auto overflow-hidden bg-gray-200 border border-gray-300 rounded-lg shadow-lg">
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <div class="qrbox-glow"></div>
                                    <div class="qrbox-line"></div>
                                </div>
                            </div>

                            <!-- Dropdown Pilihan Kamera -->
                            <div class="mb-4">
                                <label for="camera-select" class="text-lg font-semibold text-gray-800">Pilih Kamera:</label>
                                <select id="camera-select" class="mt-2 p-2 border border-gray-300 rounded-md bg-white"></select>
                            </div>

                            <!-- Button Start & Stop Kamera -->
                            <div class="mb-4">
                                <button id="start-camera-btn" class="p-2 bg-blue-500 text-white rounded-md">Mulai Kamera</button>
                                <button id="stop-camera-btn" class="p-2 bg-red-500 text-white rounded-md hidden">Stop Kamera</button>
                            </div>

                            <!-- Loading Message -->
                            <div id="loading-message" class="hidden text-lg font-semibold text-gray-600 mt-4">Loading kamera...</div>

       <!-- Hasil Scan -->
<div id="result-message" class="mt-8 hidden">
    <strong class="block">Barcode Scan:</strong>
    <p id="scanned-result" class="text-lg font-medium text-gray-800"></p>
    <strong class="block">Detail Scan:</strong>
    <div id="asset-detail">
        <!-- Detail asset akan dimasukkan di sini melalui JavaScript -->
    </div>
</div>

                            <!-- Error Message -->
                            <div id="error-message" class="hidden text-lg font-semibold text-red-600 mt-4"></div>
                        </div>

                    </div>


                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        let html5QrCode;
        let isCameraActive = false;

        async function loadDevices() {
            try {
                const devices = await Html5Qrcode.getCameras();
                const cameraSelect = document.getElementById("camera-select");
                cameraSelect.innerHTML = "";
                if (devices.length === 0) {
                    showError("Tidak ada kamera yang terdeteksi.");
                    return;
                }
                devices.forEach((device, index) => {
                    let option = document.createElement("option");
                    option.value = device.id;
                    option.innerText = device.label || `Kamera ${index + 1}`;
                    cameraSelect.appendChild(option);
                });
            } catch (err) {
                showError("Gagal memuat perangkat kamera.");
            }
        }

        function startCamera() {
        const selectedCameraId = document.getElementById("camera-select").value;
        if (!selectedCameraId) return showError("Pilih kamera terlebih dahulu.");

        document.getElementById("loading-message").classList.remove("hidden");
        html5QrCode = new Html5Qrcode("reader");

        html5QrCode.start(
            selectedCameraId,
            {
                fps: 10,
                qrbox: { width: 250, height: 250 },  // Atur ukuran qrbox
            },
            (decodedText) => {
                // Menampilkan hasil scan sementara di halaman
                document.getElementById("scanned-result").innerText = decodedText;
                document.getElementById("result-message").classList.remove("hidden");

                // Kirimkan data ke server untuk mendapatkan asset berdasarkan kode_inv
                fetch("{{ route('asset-barcode.scan-result') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    body: JSON.stringify({ kode_inv: decodedText }) // Mengirim kode_inv yang dipindai
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Menampilkan data asset di UI
                        document.getElementById("asset-detail").innerHTML = `
                     <div class="w-full p-8 overflow-auto text-sm text-left bg-gray-50 rounded-lg shadow-inner max-h-99 max-w-screen-xl mx-auto">
    <table class="min-w-full table-auto">
        <tbody>
            <tr class="border-b">
                <td class="px-4 py-2 font-semibold text-left" colspan="2"><strong>Kode Inventaris:</strong></td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 text-left" colspan="2">${data.data.kode_inv}</td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 font-semibold text-left" colspan="2"><strong>Nama Barang:</strong></td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 text-left" colspan="2">${data.data.namabarang}</td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 font-semibold text-left" colspan="2"><strong>Jenis:</strong></td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 text-left" colspan="2">${data.data.jenis}</td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 font-semibold text-left" colspan="2"><strong>Subjenis:</strong></td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 text-left" colspan="2">${data.data.subjenis}</td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 font-semibold text-left" colspan="2"><strong>Merek:</strong></td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 text-left" colspan="2">${data.data.merek}</td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 font-semibold text-left" colspan="2"><strong>Type:</strong></td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 text-left" colspan="2">${data.data.type}</td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 font-semibold text-left" colspan="2"><strong>Seri:</strong></td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 text-left" colspan="2">${data.data.seri}</td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 font-semibold text-left" colspan="2"><strong>Kondisi:</strong></td>
            </tr>
            <tr class="border-b">
                <td class="px-4 py-2 text-left" colspan="2">${data.data.kondisi}</td>
            </tr>
            <tr>
                <td class="px-4 py-2 font-semibold text-left" colspan="2"><strong>Unit:</strong></td>
            </tr>
            <tr>
                <td class="px-4 py-2 text-left" colspan="2">${data.data.milikunit}</td>
            </tr>
        </tbody>
    </table>
</div>

                        `;
                        document.getElementById("result-message").classList.remove("hidden");
                    } else {
                        showError(data.message); // Menampilkan pesan error jika asset tidak ditemukan
                    }
                })
                .catch(err => showError("Terjadi kesalahan saat memproses hasil scan."));
            },
            (errorMessage) => console.warn(`Scan error: ${errorMessage}`)
        ).then(() => {
            toggleButtons(true);
        }).catch(() => showError("Gagal memulai scanner."));
    }


        function stopCamera() {
            if (!html5QrCode || !isCameraActive) return;
            html5QrCode.stop().then(() => {
                html5QrCode.clear();
                toggleButtons(false);

                // Menambahkan QR box kembali setelah menghentikan kamera
                const reader = document.getElementById("reader");
                reader.innerHTML = `
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="qrbox-glow"></div>
                        <div class="qrbox-line"></div>
                    </div>
                `;
            }).catch(err => console.error("Gagal menghentikan scanner", err));
        }

        function toggleButtons(isScanning) {
            document.getElementById("loading-message").classList.add("hidden");
            document.getElementById("start-camera-btn").classList.toggle("hidden", isScanning);
            document.getElementById("stop-camera-btn").classList.toggle("hidden", !isScanning);
            isCameraActive = isScanning;
        }

        function showError(message) {
            document.getElementById("error-message").innerText = message;
            document.getElementById("error-message").classList.remove("hidden");
            document.getElementById("loading-message").classList.add("hidden");
        }

        document.addEventListener("DOMContentLoaded", function() {
            loadDevices();
            document.getElementById("start-camera-btn").addEventListener("click", startCamera);
            document.getElementById("stop-camera-btn").addEventListener("click", stopCamera);
        });
    </script>

@endpush
