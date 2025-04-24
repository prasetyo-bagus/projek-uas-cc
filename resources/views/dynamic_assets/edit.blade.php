@extends('navbar.adminnavbar')

@section('content')
<div class="bg-white shadow-lg rounded-xl p-8 w-full mx-auto">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Edit Aset Dinamis</h2>
            <p class="text-gray-500 mt-1">Perbarui informasi {{ strtolower($dynamicAsset->type == 'BANNER' ? 'Banner' : ($dynamicAsset->type == 'GALERY' ? 'Galeri' : 'Fasilitas')) }}</p>
        </div>
        <a href="{{ route('dynamic-assets.index') }}" class="text-primary-600 hover:text-primary-800 flex items-center">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    @if ($errors->any())
    <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded">
        <div class="flex items-center mb-2">
            <i class="fa-solid fa-circle-exclamation mr-2 text-red-500"></i>
            <p class="font-semibold">Terdapat kesalahan:</p>
        </div>
        <ul class="list-disc ml-6">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-gray-50 p-6 rounded-xl border border-gray-200">
        <div class="flex items-center mb-6">
            <div class="w-10 h-10 flex items-center justify-center rounded-full bg-primary-100 text-primary-600 mr-3">
                <i class="fa-solid {{ $dynamicAsset->type == 'BANNER' ? 'fa-image' : ($dynamicAsset->type == 'GALERY' ? 'fa-images' : 'fa-building') }} text-lg"></i>
            </div>
            <div>
                <h3 class="text-xl font-semibold text-gray-800">Edit {{ $dynamicAsset->type == 'BANNER' ? 'Banner' : ($dynamicAsset->type == 'GALERY' ? 'Galeri' : 'Fasilitas') }}</h3>
                <p class="text-sm text-gray-500">Silakan perbarui informasi {{ strtolower($dynamicAsset->type == 'BANNER' ? 'Banner' : ($dynamicAsset->type == 'GALERY' ? 'Galeri' : 'Fasilitas')) }}</p>
            </div>
        </div>
        
        <form action="{{ route('dynamic-assets.update', $dynamicAsset->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="type" value="{{ $dynamicAsset->type }}">
            
            <div class="space-y-6">
                @if($dynamicAsset->type == 'BANNER')
                    <div class="col-span-2">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Judul Banner</label>
                            <input type="text" name="title" value="{{ old('title', $dynamicAsset->title) }}" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="Masukkan judul banner">
                        </div>
                    </div>

                    <div class="col-span-2">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Gambar Banner</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center relative" id="dropzone">
                                <input type="file" name="image" id="imageInput"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                                <div id="placeholder" class="flex flex-col items-center justify-center py-4 {{ $dynamicAsset->image ? 'hidden' : '' }}">
                                    <i class="fa-solid fa-cloud-arrow-up text-gray-400 text-3xl mb-2"></i>
                                    <p class="text-gray-500">Klik atau seret gambar ke sini</p>
                                    <p class="text-xs text-gray-400 mt-1">JPG, PNG atau JPEG (Rasio 16:9 untuk hasil terbaik)</p>
                                </div>
                                <div id="preview" class="{{ $dynamicAsset->image ? '' : 'hidden' }}">
                                    <img src="{{ asset('storage/' . $dynamicAsset->image) }}" 
                                        alt="Preview" class="max-h-52 mx-auto rounded-lg">
                                    <button type="button" id="removeImage" class="mt-2 text-red-500 text-sm hover:text-red-700">
                                        <i class="fa-solid fa-xmark mr-1"></i> Hapus Gambar
                                    </button>
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar</p>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Deskripsi Singkat</label>
                            <textarea name="description" rows="3" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="Masukkan deskripsi singkat banner">{{ old('description', $dynamicAsset->description) }}</textarea>
                            <p class="text-xs text-gray-500 mt-1">Deskripsi ini akan ditampilkan di bawah gambar banner</p>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-medium mb-2">Detail Tambahan (Opsional)</label>
                            <textarea name="detail" rows="4" 
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                                placeholder="Masukkan detail tambahan jika diperlukan">{{ old('detail', $dynamicAsset->detail) }}</textarea>
                        </div>
                    </div>
                @elseif($dynamicAsset->type == 'GALERY')
                    <div class="mb-4">
                        <label class="block font-medium">Judul Galeri</label>
                        <input type="text" name="title" value="{{ old('title', $dynamicAsset->title) }}"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Gambar Galeri</label>
                        <div class="mt-1 mb-2">
                            <img src="{{ asset('storage/' . $dynamicAsset->image) }}" class="w-32 mt-2 rounded">
                        </div>
                        <input type="file" name="image" class="mt-1 block w-full">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar</p>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Deskripsi Gambar</label>
                        <input type="text" name="description" value="{{ old('description', $dynamicAsset->description) }}"
                            class="w-full border rounded p-2">
                    </div>
                @else
                    <div class="mb-4">
                        <label class="block font-medium">Nama Fasilitas</label>
                        <input type="text" name="title" value="{{ old('title', $dynamicAsset->title) }}"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Ikon / Gambar Fasilitas</label>
                        <div class="mt-1 mb-2">
                            <img src="{{ asset('storage/' . $dynamicAsset->image) }}" class="w-32 mt-2 rounded">
                        </div>
                        <input type="file" name="image" class="mt-1 block w-full">
                        <p class="text-xs text-gray-500 mt-1">Biarkan kosong jika tidak ingin mengubah gambar</p>
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Keterangan Singkat</label>
                        <input type="text" name="description" value="{{ old('description', $dynamicAsset->description) }}"
                            class="w-full border rounded p-2">
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium">Detail Fasilitas</label>
                        <textarea name="detail" rows="4"
                            class="w-full border rounded p-2">{{ old('detail', $dynamicAsset->detail) }}</textarea>
                    </div>
                @endif

                <div class="mb-4">
                    <label class="block font-medium mb-2">Status</label>
                    <div class="flex items-center space-x-6">
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="1" 
                                {{ old('is_active', $dynamicAsset->is_active) ? 'checked' : '' }} 
                                class="form-radio h-4 w-4 text-green-600">
                            <span class="ml-2">Aktif</span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="is_active" value="0" 
                                {{ old('is_active', $dynamicAsset->is_active) ? '' : 'checked' }} 
                                class="form-radio h-4 w-4 text-red-600">
                            <span class="ml-2">Nonaktif</span>
                        </label>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-6 mt-6">
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('dynamic-assets.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                            Batal
                        </a>
                        <button type="submit" class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors flex items-center">
                            <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
// Script untuk preview gambar (khusus Banner)
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('imageInput');
    if (imageInput) {
        const preview = document.getElementById('preview');
        const placeholder = document.getElementById('placeholder');
        const previewImg = preview.querySelector('img');
        const removeButton = document.getElementById('removeImage');
        const dropzone = document.getElementById('dropzone');
        
        // Fungsi untuk menampilkan preview gambar
        function showPreview(file) {
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    placeholder.classList.add('hidden');
                    preview.classList.remove('hidden');
                    dropzone.classList.add('border-primary-300', 'bg-primary-50');
                    dropzone.classList.remove('border-gray-300');
                }
                reader.readAsDataURL(file);
            }
        }
        
        // Event untuk memilih file
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                showPreview(this.files[0]);
            }
        });
        
        // Event untuk menghapus gambar
        if (removeButton) {
            removeButton.addEventListener('click', function() {
                imageInput.value = '';
                placeholder.classList.remove('hidden');
                preview.classList.add('hidden');
                dropzone.classList.remove('border-primary-300', 'bg-primary-50');
                dropzone.classList.add('border-gray-300');
            });
        }
    }
});
</script>
@endsection