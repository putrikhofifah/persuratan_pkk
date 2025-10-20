@extends('layouts.app')

@section('title', 'Profile')

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
                            Hallo! Saya {{ Auth()->user()->name }}, Saya Sebagai {{ Auth()->user()->role }} Persuratan PKK

                        </p>

                       
                    </div>
                </div>
            </div>

            <!-- About Section -->
            <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-3 gap-8 mb-16">
                <!-- About Me -->
                <div class="lg:col-span-4">
                    <div
                        class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden h-full">
                        <div class="p-6 border-b border-gray-700/50 flex">
                            <h2 class="text-xl font-semibold text-white flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                        clip-rule="evenodd" />
                                </svg>
                                Pengguna
                            </h2>

                            <a href="{{ route('admin.profile.create') }}"
                                class="ms-auto mt-4 md:mt-0 bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-2.5 px-5 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg shadow-emerald-900/20">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Add Akun
                            </a>
                        </div>
                        <div class="container mx-auto px-4 mt-3">
                            <!-- Kelola Akun Grid 4 -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-3 mb-3 gap-6">
                                @foreach ($user as $data)
                                    <div
                                        class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl border border-gray-700/50 shadow-xl overflow-hidden">
                                        <div class=" flex p-4 border-b border-gray-700/50">
                                            <h3 class="text-md font-semibold text-white flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-400"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                Akun Pengguna
                                            </h3>
                                            <form action="{{ route('admin.profile.destroy', $data->id) }}" method="POST"
                                                onsubmit="return confirm('Apa Anda Yakin Ingin Menghapus Data Ini?');"
                                                class="inline ms-auto">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="p-2 bg-rose-600/20 hover:bg-rose-600/40 text-rose-400 hover:text-rose-300 rounded-lg transition-colors"
                                                    title="Delete">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                        viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class="p-4">
                                            <div class="flex items-center mb-4">
                                                @if ($data->file)
                                                    <img src="{{ asset('storage/' . $data->file) }}"
                                                        alt="{{ $data->name }}"
                                                        class="w-12 h-12 rounded-full object-cover border border-gray-600 shadow-sm"
                                                        onerror="this.src='/images/fallback.jpg'">
                                                @else
                                                    <div
                                                        class="w-12 h-12 rounded-full bg-gradient-to-r from-cyan-500 to-blue-500 flex items-center justify-center text-white font-bold text-sm uppercase">
                                                        {{ substr($data->name, 0, 1) }}
                                                    </div>
                                                @endif
                                                <div class="ml-4">
                                                    <h4 class="text-white font-medium">
                                                        {{ $data->name }}</h4>
                                                    <p class="text-gray-400 text-sm">
                                                        {{ $data->email }}</p>

                                                </div>
                                            </div>
                                            <div class="pt-3 border-t border-gray-700/50">
                                                <a href="{{ route('admin.profile.edit', $data->id) }}"
                                                    class="text-cyan-400 hover:text-cyan-300 text-sm flex items-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1"
                                                        viewBox="0 0 20 20" fill="currentColor">
                                                        <path
                                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                    </svg>
                                                    Edit Profile
                                                    <p class="text-gray-400 text-sm ml-auto">
                                                        {{ $data->role }}</p>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
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
