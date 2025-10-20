@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
        <div class="container mx-auto px-4 py-12">
            <!-- Hero Section -->
            <div class="relative mb-16">
                <!-- Background Pattern -->
                <div class="absolute inset-0 bg-cyan-600/5 rounded-3xl overflow-hidden">
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-cyan-600/10 rounded-full blur-3xl"></div>
                    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-cyan-600/10 rounded-full blur-3xl"></div>
                    <div
                        class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-32 bg-gradient-to-r from-cyan-600/0 via-cyan-600/10 to-cyan-600/0 blur-2xl">
                    </div>
                </div>

                <div class="relative flex flex-col md:flex-row items-center gap-8 p-8 md:p-12 rounded-3xl">
                    <!-- Profile Image -->
                    <div class="relative">
                        <div
                            class="absolute inset-0 -m-3 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full blur-md opacity-70">
                        </div>
                        <div
                            class="relative w-40 h-40 md:w-48 md:h-48 rounded-full overflow-hidden border-4 border-gray-800 shadow-xl">
                            <img src="{{ asset('storage/' . Auth::user()->file) }}" alt=""
                                class="w-full h-full object-cover">
                        </div>
                    </div>

                    <!-- Profile Info -->
                    <div class="text-center md:text-left">
                        <h1 class="text-4xl md:text-5xl font-bold text-white mb-2">{{ Auth::user()->name }}</h1>
                        <div
                            class="inline-flex items-center px-3 py-1 rounded-full bg-cyan-600/20 text-cyan-400 text-sm font-medium mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                            {{ Auth::user()->role }} Persuratan PKK
                        </div>
                        <p class="text-lg text-gray-300 max-w-2xl">
                            "Terwujudnya administrasi persuratan PKK yang tertib, akurat, dan transparan, mendukung
                            kelancaran pelaksanaan program-program PKK dalam mewujudkan keluarga sejahtera."
                        </p>

                        
                    </div>
                </div>
            </div>

            <!-- About Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-16">
                <!-- About Me -->
                <div class="lg:col-span-2">
                    <div
                        class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden h-full">
                        <div class="p-6 border-b border-gray-700/50">
                            <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Tentang PKK
                            </h2>
                        </div>
                        <div class="p-6">
                            <p class="text-gray-300 mb-4">
                                Gerakan Pemberdayaan dan Kesejahteraan Keluarga (PKK) berawal dari inisiatif pemerintah pada
                                masa awal Orde Baru untuk meningkatkan kesejahteraan keluarga sebagai fondasi pembangunan
                                nasional. Pada awalnya, kegiatan PKK difokuskan pada penyuluhan dan pembinaan keluarga di
                                bidang kesehatan,
                            </p>
                            <p class="text-gray-300 mb-4">
                                Seiring dengan berjalannya waktu, gerakan PKK mendapatkan pengakuan dan dukungan lebih luas
                                dari pemerintah pusat hingga daerah. Tahun 1972 menjadi tonggak penting ketika Presiden
                                Soeharto secara resmi menginstruksikan agar gerakan PKK disebarluaskan ke seluruh pelosok
                                tanah air melalui surat instruksi kepada para gubernur, bupati, dan wali kota.
                            </p>
                            <p class="text-gray-300">
                                Meskipun demikian, tantangan tetap ada, seperti kurangnya regenerasi kader, minimnya
                                dukungan anggaran di beberapa daerah, serta perubahan pola pikir masyarakat modern yang
                                lebih individualistis. Namun, dengan semangat gotong royong dan dedikasi para kadernya, PKK
                                tetap menjadi pilar penting dalam membangun keluarga Indonesia yang mandiri, sehat, dan
                                sejahtera.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Quick Info -->
                <div class="lg:col-span-1">
                    <div
                        class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden h-full">
                        <div class="p-6 border-b border-gray-700/50">
                            <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd" />
                                </svg>
                                Info Lengkap
                            </h2>
                        </div>
                        <div class="p-6">
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <div class="p-1.5 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-white font-medium">Lokasi</h3>
                                        <p class="text-gray-400">Indonesia</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="p-1.5 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-white font-medium">Tempat</h3>
                                        <p class="text-gray-400">Gedung PKK</p>
                                        </p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="p-1.5 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-white font-medium">Edukasi</h3>
                                        <p class="text-gray-400">Sistem Surat</p>
                                    </div>
                                </li>
                                <li class="flex items-start gap-3">
                                    <div class="p-1.5 bg-cyan-600/20 text-cyan-400 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                                clip-rule="evenodd" />
                                            <path
                                                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-white font-medium">Tersedia untuk</h3>
                                        <p class="text-gray-400">Pegawai Gedung PKK</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        /* Custom scrollbar for webkit browsers */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(31, 41, 55, 0.5);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: rgba(75, 85, 99, 0.5);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: rgba(107, 114, 128, 0.5);
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>
@endsection
