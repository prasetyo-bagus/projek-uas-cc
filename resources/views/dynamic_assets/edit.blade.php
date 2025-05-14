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
                @elseif($dynamicAsset->type == 'LAYANAN')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kolom Judul Layanan -->
                        <div>
                            <label for="title" class="block text-gray-700 font-medium mb-2">Judul Layanan <span class="text-red-500">*</span></label>
                            <input type="text" name="title" id="title" value="{{ old('title', $dynamicAsset->title) }}" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Contoh: Edukasi Pertanian">
                        </div>

                        <!-- Kolom Kategori -->
                        <div>
                            <label for="category" class="block text-gray-700 font-medium mb-2">Kategori <span class="text-red-500">*</span></label>
                            <select name="category" id="category" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                                <option value="">Pilih Kategori</option>
                                <option value="Pertanian" {{ old('category', $dynamicAsset->category) == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
                                <option value="Peternakan" {{ old('category', $dynamicAsset->category) == 'Peternakan' ? 'selected' : '' }}>Peternakan</option>
                                <option value="Perkebunan" {{ old('category', $dynamicAsset->category) == 'Perkebunan' ? 'selected' : '' }}>Perkebunan</option>
                            </select>
                        </div>

                        <!-- Kolom Deskripsi -->
                        <div class="md:col-span-2">
                            <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi <span class="text-red-500">*</span></label>
                            <textarea name="description" id="description" rows="4" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Deskripsi singkat tentang layanan...">{{ old('description', $dynamicAsset->description) }}</textarea>
                        </div>

                        <!-- Kolom Ikon -->
                        <div>
                            <label for="icon" class="block text-gray-700 font-medium mb-2">Ikon (Font Awesome) <span class="text-red-500">*</span></label>
                            <input type="text" name="icon" id="icon" value="{{ old('icon', $dynamicAsset->icon) }}" required
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Contoh: fas fa-seedling">
                            <p class="text-gray-500 text-xs mt-1">Masukkan kelas ikon dari Font Awesome (mis. fas fa-seedling, fas fa-horse)</p>
                            
                            <div class="mt-2 p-3 bg-gray-50 rounded-lg border border-gray-200">
                                <p class="text-sm text-gray-600 mb-2">Beberapa contoh ikon populer:</p>
                                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                                    <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option" data-icon="fas fa-seedling">
                                        <i class="fas fa-seedling text-xl text-green-600"></i>
                                        <p class="text-xs mt-1">fas fa-seedling</p>
                                    </div>
                                    <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option" data-icon="fas fa-leaf">
                                        <i class="fas fa-leaf text-xl text-green-600"></i>
                                        <p class="text-xs mt-1">fas fa-leaf</p>
                                    </div>
                                    <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option" data-icon="fas fa-tree">
                                        <i class="fas fa-tree text-xl text-green-600"></i>
                                        <p class="text-xs mt-1">fas fa-tree</p>
                                    </div>
                                    <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option" data-icon="fas fa-apple-alt">
                                        <i class="fas fa-apple-alt text-xl text-red-600"></i>
                                        <p class="text-xs mt-1">fas fa-apple-alt</p>
                                    </div>
                                    <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option" data-icon="fas fa-horse">
                                        <i class="fas fa-horse text-xl text-brown-600"></i>
                                        <p class="text-xs mt-1">fas fa-horse</p>
                                    </div>
                                    <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option" data-icon="fas fa-tractor">
                                        <i class="fas fa-tractor text-xl text-yellow-600"></i>
                                        <p class="text-xs mt-1">fas fa-tractor</p>
                                    </div>
                                    <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option" data-icon="fas fa-mountain">
                                        <i class="fas fa-mountain text-xl text-blue-600"></i>
                                        <p class="text-xs mt-1">fas fa-mountain</p>
                                    </div>
                                    <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option" data-icon="fas fa-hiking">
                                        <i class="fas fa-hiking text-xl text-green-600"></i>
                                        <p class="text-xs mt-1">fas fa-hiking</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Gambar -->
                        <div>
                            <label for="image" class="block text-gray-700 font-medium mb-2">Gambar Layanan</label>
                            <div class="mt-1 mb-2">
                                <img src="{{ asset('storage/' . $dynamicAsset->image) }}" class="w-48 h-36 object-cover mt-2 rounded">
                            </div>
                            <input type="file" name="image" id="image" accept="image/*"
                                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                            <p class="text-gray-500 text-xs mt-1">Biarkan kosong jika tidak ingin mengubah gambar. Ukuran disarankan: 800x600px (rasio 4:3) untuk tampilan yang seragam</p>
                        </div>

                        <!-- Kolom Detail Item -->
                        <div class="md:col-span-2">
                            <label class="block text-gray-700 font-medium mb-2">Detail Layanan <span class="text-red-500">*</span></label>
                            
                            <div id="service-items" class="space-y-4">
                                @if(isset($dynamicAsset->service_items) && is_array($dynamicAsset->service_items))
                                    @foreach($dynamicAsset->service_items as $index => $item)
                                        <div class="item-row border border-gray-200 rounded-lg p-4 bg-gray-50">
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-gray-700 text-sm mb-1">Judul Item</label>
                                                    <input type="text" name="item_titles[]" class="w-full border border-gray-300 rounded-lg px-4 py-2" 
                                                           value="{{ $item['title'] }}" placeholder="Contoh: Workshop Bertanam">
                                                </div>
                                                <div>
                                                    <label class="block text-gray-700 text-sm mb-1">Deskripsi Item</label>
                                                    <textarea name="item_descriptions[]" class="w-full border border-gray-300 rounded-lg px-4 py-2" 
                                                              placeholder="Deskripsi singkat item..." rows="2">{{ $item['description'] }}</textarea>
                                                </div>
                                            </div>
                                            <button type="button" class="remove-item mt-2 text-red-500 text-sm hover:text-red-700" 
                                                    style="display: {{ count($dynamicAsset->service_items) > 1 ? 'inline-block' : 'none' }}">
                                                <i class="fas fa-times-circle"></i> Hapus Item
                                            </button>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="item-row border border-gray-200 rounded-lg p-4 bg-gray-50">
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-gray-700 text-sm mb-1">Judul Item</label>
                                                <input type="text" name="item_titles[]" class="w-full border border-gray-300 rounded-lg px-4 py-2" 
                                                       placeholder="Contoh: Workshop Bertanam">
                                            </div>
                                            <div>
                                                <label class="block text-gray-700 text-sm mb-1">Deskripsi Item</label>
                                                <textarea name="item_descriptions[]" class="w-full border border-gray-300 rounded-lg px-4 py-2"
                                                          placeholder="Deskripsi singkat item..." rows="2"></textarea>
                                            </div>
                                        </div>
                                        <button type="button" class="remove-item mt-2 text-red-500 text-sm hover:text-red-700" style="display: none;">
                                            <i class="fas fa-times-circle"></i> Hapus Item
                                        </button>
                                    </div>
                                @endif
                            </div>
                            
                            <button type="button" id="add-item" class="mt-2 text-primary-600 hover:text-primary-800 text-sm font-medium">
                                <i class="fas fa-plus-circle"></i> Tambah Item Baru
                            </button>
                        </div>
                    </div>

                    <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const container = document.getElementById('service-items');
                        const addButton = document.getElementById('add-item');
                        
                        // Fungsi untuk menambah item baru
                        addButton.addEventListener('click', function() {
                            const itemRow = document.createElement('div');
                            itemRow.className = 'item-row border border-gray-200 rounded-lg p-4 bg-gray-50';
                            
                            itemRow.innerHTML = `
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-gray-700 text-sm mb-1">Judul Item</label>
                                        <input type="text" name="item_titles[]" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500" 
                                               placeholder="Contoh: Workshop Bertanam">
                                    </div>
                                    <div>
                                        <label class="block text-gray-700 text-sm mb-1">Deskripsi Item</label>
                                        <textarea name="item_descriptions[]" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                                  placeholder="Deskripsi singkat item..." rows="2"></textarea>
                                    </div>
                                </div>
                                <button type="button" class="remove-item mt-2 text-red-500 text-sm hover:text-red-700">
                                    <i class="fas fa-times-circle"></i> Hapus Item
                                </button>
                            `;
                            
                            container.appendChild(itemRow);
                            
                            // Tampilkan tombol hapus pada semua item jika ada lebih dari satu
                            if (container.querySelectorAll('.item-row').length > 1) {
                                container.querySelectorAll('.remove-item').forEach(btn => {
                                    btn.style.display = 'inline-block';
                                });
                            }
                        });
                        
                        // Fungsi untuk menghapus item (delegasi event)
                        container.addEventListener('click', function(e) {
                            if (e.target.classList.contains('remove-item') || e.target.parentElement.classList.contains('remove-item')) {
                                const button = e.target.classList.contains('remove-item') ? e.target : e.target.parentElement;
                                const item = button.closest('.item-row');
                                item.remove();
                                
                                // Sembunyikan tombol hapus jika hanya ada satu item
                                if (container.querySelectorAll('.item-row').length <= 1) {
                                    container.querySelector('.remove-item').style.display = 'none';
                                }
                            }
                        });
                        
                        // Tambahkan event listener untuk pilihan ikon
                        document.querySelectorAll('.icon-option').forEach(option => {
                            option.addEventListener('click', function() {
                                const iconClass = this.getAttribute('data-icon');
                                document.getElementById('icon').value = iconClass;
                            });
                        });
                    });
                    </script>
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