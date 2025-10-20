@extends('layouts.app')

@section('title', 'Laporan')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
        <div class="container mx-auto px-4 py-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Laporan Surat Masuk</h1>
                    <p class="text-gray-400">Kelola Laporan Surat</p>
                </div>
                <a href="{{ route('admin.laporan-masuk.export') }}"
                    class="mt-4 md:mt-0 bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg shadow-emerald-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-5 w-5" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    Export Surat
                </a>
            </div>
           <!-- Search & Filters -->
            <div class="bg-gray-800/50 rounded-xl p-5 border border-gray-700/50 mb-8 shadow-lg">
                <form action="{{ route('admin.laporan-masuk') }}" method="GET">
                    <div class="flex flex-col md:flex-row items-end justify-between gap-4">
                        <div class="flex flex-col md:flex-row gap-6 w-full">

                            <!-- Filter Tanggal Awal -->
                            <div class="flex flex-col">
                                <label for="tgl_awal" class="text-sm font-medium text-gray-300 mb-1">Tanggal Awal</label>
                                <input type="date" name="tgl_awal" id="tgl_awal" value="{{ request('tgl_awal') }}"
                                    class="bg-gray-900/70 text-gray-100 border border-gray-700/50 rounded-lg py-2.5 px-4 
                                        focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent 
                                        transition-all duration-200" />
                            </div>

                            <!-- Filter Tanggal Akhir -->
                            <div class="flex flex-col">
                                <label for="tgl_akhir" class="text-sm font-medium text-gray-300 mb-1">Tanggal Akhir</label>
                                <input type="date" name="tgl_akhir" id="tgl_akhir" value="{{ request('tgl_akhir') }}"
                                    class="bg-gray-900/70 text-gray-100 border border-gray-700/50 rounded-lg py-2.5 px-4 
                                        focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent 
                                        transition-all duration-200" />
                            </div>

                            <!-- Filter No Surat -->
                            <div class="flex flex-col">
                                <label for="no_surat" class="text-sm font-medium text-gray-300 mb-1">No Surat</label>
                                <input type="text" name="no_surat" id="no_surat" value="{{ request('no_surat') }}"
                                    class="bg-gray-900/70 text-gray-100 border border-gray-700/50 rounded-lg py-2.5 px-4 
                                        focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent 
                                        transition-all duration-200" />
                            </div>
                        </div>

                        <div class="flex gap-3">
                            <button type="submit"
                                class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-5 rounded-lg 
                                    transition-all duration-200 shadow-lg shadow-cyan-900/20">
                                Search
                            </button>

                            @if (request('no_surat') || request('tgl_awal') || request('tgl_akhir'))
                                <a href="{{ route('admin.laporan-masuk') }}"
                                    class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 
                                        rounded-lg transition-all duration-200">
                                    Clear
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>



            <!-- Notifications -->
            @if (session('success'))
                <div
                    class="bg-emerald-900/50 border-l-4 border-emerald-500 text-emerald-200 p-4 mb-6 rounded-r-lg flex items-start">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-6 w-6 mr-3 text-emerald-400"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-rose-900/50 border-l-4 border-rose-500 text-rose-200 p-4 mb-6 rounded-r-lg flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-rose-400 flex-shrink-0" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Surat Table -->
            <div class="bg-gray-800/50 rounded-xl border border-gray-700/50 overflow-hidden shadow-xl mb-8">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="">
                            <tr class="bg-gray-900/70 text-gray-400 text-sm text-center font-medium">
                                <th class="py-3 px-4">No</th>
                                <th class="py-3 px-4">Ditangani Oleh</th>
                                <th class="py-3 px-4">No Surat</th>
                                <th class="py-3 px-4">Asal</th>
                                <th class="py-3 px-4">Tanggal Surat </th>
                                <th class="py-3 px-4">Tanggal Surat Diterima</th>
                                <th class="py-3 px-4">Perihal</th>
                                <th class="py-3 px-4">Status Surat</th>
                                <th class="py-3 px-4">File</th>
                                <th class="py-3 px-4">Action</th>

                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800/50">
                            @forelse ($data as $index => $item)
                                <tr class="hover:bg-gray-700/30 transition-colors duration-150 text-center text-sm">
                                    <td class="py-3 px-4">{{ $loop->iteration }}</td>
                                    <td class="py-3 px-4 text-gray-300">{{ $item->user->name }}</td>
                                    <td class="py-3 px-4 text-gray-200 font-medium"> {{ $item->no_surat }}</td>
                                    <td class="py-3 px-4 text-gray-200 font-medium"> {{ $item->asal }}</td>
                                    <td class="py-3 px-4 text-gray-200">
                                        {{ $item->tgl_surat ? \Carbon\Carbon::parse($item->tgl_surat)->translatedFormat('d F Y') : \Carbon\Carbon::parse($item->tgl_diterima)->translatedFormat('d F Y') }}
                                    </td>
                                    <td class="py-3 px-4 text-gray-200">
                                        {{ $item->tgl_diterima ? \Carbon\Carbon::parse($item->tgl_diterima)->translatedFormat('d F Y') : \Carbon\Carbon::parse($item->tgl_surat)->translatedFormat('d F Y') }}
                                    </td>

                                    <td class="py-3 px-4 text-gray-300">
                                        {{ $item->perihal ?? '-' }}
                                    </td>
                                    <td class="py-3 px-4">
                                        @if ($item->status === 'proses')
                                            <span
                                                class="px-2.5 py-1 bg-yellow-500/50 text-gray-300 rounded-full text-xs font-medium">
                                                {{ $item->status }}
                                            </span>
                                        @elseif ($item->status === 'dibatalkan')
                                            <span
                                                class="px-2.5 py-1 bg-red-500/50 text-gray-300 rounded-full text-xs font-medium">
                                                {{ $item->status }}
                                            </span>
                                        @elseif ($item->status === 'diterima')
                                            <span
                                                class="px-2.5 py-1 bg-green-500/50 text-gray-300 rounded-full text-xs font-medium">
                                                {{ $item->status }}
                                            </span>
                                        @endif
                                    </td>

                                    <td class="py-3 px-4">
                                        @if ($item->file)
                                            <a href="{{ asset('storage/' . $item->file) }}" target="_blank" download
                                                class="text-blue-500 underline hover:text-blue-700">
                                                Unduh File
                                            </a>
                                        @else
                                            <span class="text-gray-500 italic">Tidak ada file</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4">
                                        <div class="flex gap-2">

                                            <a href="{{ route('admin.suratmasuk.export', $item->no_surat) }}"
                                                class="p-2 bg-yellow-600/20 hover:bg-yellow-600/40 text-yellow-400 hover:text-yellow-300 rounded-lg transition-colors"
                                                title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="h-5 w-5"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                                </svg>

                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="py-8 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-600 mb-4"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            <p class="text-lg">Belum ada laporan surat</p>
                                            <p class="text-sm text-gray-600 mt-1">Silakan tambah data atau ubah filter
                                                pencarian.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex flex-wrap items-center justify-between px-4 py-2 text-sm text-gray-300">
                {{-- Showing info di kiri --}}
                <div>
                    Menampilkan {{ $data->firstItem() }} - {{ $data->lastItem() }} dari
                    {{ $data->total() }} data
                </div>

                {{-- Pagination links di kanan (tanpa showing) --}}
                <div class="flex gap-10">
                    {{ $data->links('vendor.pagination.tailwind') }}
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

        /* Table styles */
        table {
            border-collapse: separate;
            border-spacing: 0;
        }

        /* Glow effects */
        .bg-cyan-600\/20 {
            box-shadow: 0 0 10px rgba(8, 145, 178, 0.1);
        }

        .bg-rose-600\/20 {
            box-shadow: 0 0 10px rgba(225, 29, 72, 0.1);
        }

        /* Smooth transitions */
        .transition-all {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 300ms;
        }
    </style>
@endsection
