@extends('layouts.app')
@section('title', 'Surat Masuk')

@section('content')
    <div class="min-h-screen bg-gradient-to-b from-gray-900 to-gray-800 text-gray-100">
        <div class="container mx-auto px-4 py-8">
            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-white mb-2">Surat Masuk</h1>
                    <p class="text-gray-400">Kelola Data Surat Masuk</p>
                </div>
                <a href="{{ route('sekretaris.surat-masuk.create') }}"
                    class="mt-4 md:mt-0 bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg shadow-emerald-900/20">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Add Surat
                </a>
            </div>

            <!-- Search & Filters -->
            <div class="bg-gray-800/50 rounded-xl p-5 border border-gray-700/50 mb-8 shadow-lg">
                <form action="{{ route('sekretaris.surat-masuk.index') }}" method="GET">
                    <div class="flex flex-col md:flex-row gap-4">
                        <div class="relative flex-grow">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari berdasarkan Nama dan No Surat..."
                                class="bg-gray-900/70 text-gray-100 border border-gray-700/50 rounded-lg w-full py-2.5 pl-10 pr-4 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-cyan-500/50 focus:border-transparent transition-all duration-200">
                        </div>
                        <div class="flex gap-3">
                            <button type="submit"
                                class="bg-cyan-600 hover:bg-cyan-700 text-white font-medium py-2.5 px-5 rounded-lg transition-all duration-200 shadow-lg shadow-cyan-900/20 flex-shrink-0">
                                Search
                            </button>
                            @if (request('search'))
                                <a href="{{ route('sekretaris.surat-masuk.index') }}"
                                    class="bg-gray-700 hover:bg-gray-600 text-white font-medium py-2.5 px-5 rounded-lg transition-all duration-200 flex-shrink-0">
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3 text-emerald-400 flex-shrink-0"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
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
                                <th class="py-3 px-4">ID</th>
                                <th class="py-3 px-4">No Surat</th>
                                <th class="py-3 px-4">Nama Surat</th>
                                <th class="py-3 px-4">Asal</th>
                                <th class="py-3 px-4">Tanggal Surat</th>
                                <th class="py-3 px-4">Tanggal Diterima</th>
                                <th class="py-3 px-4">Perihal</th>
                                <th class="py-3 px-4">File Surat</th>
                                <th class="py-3 px-4">Status Surat</th>
                                <th class="py-3 px-4">Action</th>

                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800/50">
                            @forelse ($suratmasuk as $item)
                                <tr class="hover:bg-gray-700/30 transition-colors duration-150 text-center text-sm">
                                    <td class="py-3 px-4">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="py-3 px-4 text-gray-300">{{ $item->no_surat }}</td>
                                    <td class="py-3 px-4 text-gray-200 font-medium">{{ $item->nama_surat }}</td>
                                    <td class="py-3 px-4">
                                        {{ $item->asal }}
                                    </td>
                                    <td class="py-3 px-4">
                                        {{ Carbon\Carbon::parse($item->tgl_surat)->format('d F Y') }}
                                    </td>
                                    <td class="py-3 px-4 text-gray-300">
                                        {{ Carbon\Carbon::parse($item->tgl_diterima)->format('d F Y') }}</td>
                                    <td class="py-3 px-4 text-gray-300">
                                        {{ $item->perihal }}
                                    </td>
                                    <td class="py-3 px-4">
                                        <a href="{{ asset('storage/' . $item->file) }}"
                                            class="text-blue-500 underline hover:text-blue-700">
                                            Lihat File
                                        </a>
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
                                        <div class="flex gap-2">

                                            <a href="{{ route('sekretaris.surat-masuk.edit', $item->no_surat) }}"
                                                class="p-2 bg-cyan-600/20 hover:bg-cyan-600/40 text-cyan-400 hover:text-cyan-300 rounded-lg transition-colors"
                                                title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>

                                            <form action="{{ route('sekretaris.surat-masuk.destroy', $item->no_surat) }}"
                                                method="POST"
                                                onsubmit="return confirm('Apa Anda Yakin Ingin Menghapus Data Ini?');"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 bg-rose-600/20 hover:bg-rose-600/40 text-rose-400 hover:text-rose-300 rounded-lg transition-colors"
                                                    title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
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
                                            <p class="text-lg">Belum ada surat masuk</p>
                                            <p class="text-sm text-gray-600 mt-1">Try adjusting your search criteria or add
                                                a new Surat</p>
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
                    Menampilkan {{ $suratmasuk->firstItem() }} - {{ $suratmasuk->lastItem() }} dari
                    {{ $suratmasuk->total() }} data
                </div>

                {{-- Pagination links di kanan (tanpa showing) --}}
                <div class="flex gap-10">
                    {{ $suratmasuk->links('vendor.pagination.tailwind') }}
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
