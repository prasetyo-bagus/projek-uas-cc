@extends('navbar.adminnavbar')

@section('content')
    <div class="bg-white shadow-lg rounded-xl p-8 w-full mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Tambah Aset Dinamis</h2>
                <p class="text-gray-500 mt-1">Unggah dan kelola aset untuk digunakan di website Nusantara Edupark</p>
            </div>
            <a href="{{ route('dynamic-assets.index') }}"
                class="flex items-center text-primary-600 hover:text-primary-800 transition-colors">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        <!-- Pilihan Tipe Aset -->
        <div class="mb-8">
            <label for="type" class="block text-gray-700 font-medium mb-2">Pilih Jenis Aset</label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <a href="{{ route('dynamic-assets.create', ['type' => 'BANNER']) }}"
                    class="flex flex-col items-center p-6 rounded-xl border-2 transition-all {{ $type == 'BANNER' ? 'border-primary-500 bg-primary-50' : 'border-gray-200 hover:border-primary-300 hover:bg-primary-50/50' }}">
                    <div
                        class="w-16 h-16 flex items-center justify-center rounded-full {{ $type == 'BANNER' ? 'bg-primary-100 text-primary-600' : 'bg-gray-100 text-gray-500' }} mb-3">
                        <i class="fa-solid fa-image text-2xl"></i>
                    </div>
                    <h3 class="font-semibold {{ $type == 'BANNER' ? 'text-primary-700' : 'text-gray-700' }}">Banner</h3>
                    <p class="text-xs text-gray-500 text-center mt-1">Gambar banner untuk slider</p>
                </a>

                <a href="{{ route('dynamic-assets.create', ['type' => 'GALERY']) }}"
                    class="flex flex-col items-center p-6 rounded-xl border-2 transition-all {{ $type == 'GALERY' ? 'border-primary-500 bg-primary-50' : 'border-gray-200 hover:border-primary-300 hover:bg-primary-50/50' }}">
                    <div
                        class="w-16 h-16 flex items-center justify-center rounded-full {{ $type == 'GALERY' ? 'bg-primary-100 text-primary-600' : 'bg-gray-100 text-gray-500' }} mb-3">
                        <i class="fa-solid fa-images text-2xl"></i>
                    </div>
                    <h3 class="font-semibold {{ $type == 'GALERY' ? 'text-primary-700' : 'text-gray-700' }}">Galeri</h3>
                    <p class="text-xs text-gray-500 text-center mt-1">Kumpulan foto galeri</p>
                </a>

                <a href="{{ route('dynamic-assets.create', ['type' => 'FACILITY']) }}"
                    class="flex flex-col items-center p-6 rounded-xl border-2 transition-all {{ $type == 'FACILITY' ? 'border-primary-500 bg-primary-50' : 'border-gray-200 hover:border-primary-300 hover:bg-primary-50/50' }}">
                    <div
                        class="w-16 h-16 flex items-center justify-center rounded-full {{ $type == 'FACILITY' ? 'bg-primary-100 text-primary-600' : 'bg-gray-100 text-gray-500' }} mb-3">
                        <i class="fa-solid fa-building text-2xl"></i>
                    </div>
                    <h3 class="font-semibold {{ $type == 'FACILITY' ? 'text-primary-700' : 'text-gray-700' }}">Fasilitas
                    </h3>
                    <p class="text-xs text-gray-500 text-center mt-1">Fasilitas dan layanan</p>
                </a>

                <a href="{{ route('dynamic-assets.create', ['type' => 'PACKET']) }}"
                    class="flex flex-col items-center p-6 rounded-xl border-2 transition-all {{ $type == 'PACKET' ? 'border-primary-500 bg-primary-50' : 'border-gray-200 hover:border-primary-300 hover:bg-primary-50/50' }}">
                    <div
                        class="w-16 h-16 flex items-center justify-center rounded-full {{ $type == 'PACKET' ? 'bg-primary-100 text-primary-600' : 'bg-gray-100 text-gray-500' }} mb-3">
                        <i class="fas fa-ticket-alt mr-1 text-2xl"></i>
                    </div>
                    <h3 class="font-semibold {{ $type == 'PACKET' ? 'text-primary-700' : 'text-gray-700' }}">Paket Wisata
                    </h3>
                    <p class="text-xs text-gray-500 text-center mt-1">Harga Paket Wisata</p>
                </a>

                <a href="{{ route('dynamic-assets.create', ['type' => 'SPONSOR']) }}"
                    class="flex flex-col items-center p-6 rounded-xl border-2 transition-all {{ $type == 'SPONSOR' ? 'border-primary-500 bg-primary-50' : 'border-gray-200 hover:border-primary-300 hover:bg-primary-50/50' }}">
                    <div
                        class="w-16 h-16 flex items-center justify-center rounded-full {{ $type == 'SPONSOR' ? 'bg-primary-100 text-primary-600' : 'bg-gray-100 text-gray-500' }} mb-3">
                        <i class="fa-solid fa-handshake text-2xl"></i>
                    </div>
                    <h3 class="font-semibold {{ $type == 'SPONSOR' ? 'text-primary-700' : 'text-gray-700' }}">Sponsor
                    </h3>
                    <p class="text-xs text-gray-500 text-center mt-1">Logo sponsor dan partner</p>
                </a>
            </div>
        </div>

        <!-- Formulir Dinamis -->
        @if ($type)
            <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
                <div class="flex items-center mb-6">

                    <div class="w-10 h-10 flex items-center justify-center rounded-full bg-primary-100 text-primary-600 mr-3">

                        <i
                            class="fa-solid {{ $type == 'BANNER' ? 'fa-image' : ($type == 'GALERY' ? 'fa-images' : ($type == 'FACILITY' ? 'fa-building' : ($type == 'SPONSOR' ? 'fa-handshake' : 'fa-building'))) }} text-lg"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold text-gray-800">Tambah
                            {{ $type == 'BANNER' ? 'Banner' : ($type == 'GALERY' ? 'Galeri' : ($type == 'FACILITY' ? 'Fasilitas' : ($type == 'SPONSOR' ? 'Sponsor' : 'Paket Wisata'))) }}
                        </h3>
                        <p class="text-sm text-gray-500">Silakan isi detail informasi
                            {{ strtolower($type == 'BANNER' ? 'Banner' : ($type == 'GALERY' ? 'Galeri' : ($type == 'FACILITY' ? 'Fasilitas' : ($type == 'SPONSOR' ? 'Sponsor' : 'Paket Wisata')))) }}
                        </p>
                    </div>
                </div>

                <form action="{{ route('dynamic-assets.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    <input type="hidden" name="type" value="{{ $type }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Form fields will be included here -->
                        @includeIf('dynamic_assets.partials.form-' . strtolower($type))

                    </div>
                    {{--
                    <div class="border-t border-gray-200 pt-6 mt-6">
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('dynamic-assets.index') }}"
                                class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors flex items-center">
                                <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Aset
                            </button>
                        </div>
                    </div> --}}

                </form>
            </div>
        @else
            <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-8 text-center">
                <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fa-solid fa-lightbulb text-yellow-500 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Pilih Jenis Aset</h3>

                <p class="text-gray-600 mb-4">Silakan pilih jenis aset terlebih dahulu dari pilihan di atas untuk
                    menampilkan formulir.</p>
            </div>
        @endif
    </div>
@endsection