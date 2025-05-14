<!-- Kolom Judul Layanan -->
<div>
    <label for="title" class="block text-gray-700 font-medium mb-2">Judul Layanan <span
            class="text-red-500">*</span></label>
    <input type="text" name="title" id="title" value="{{ old('title') }}" required
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
        placeholder="Contoh: Edukasi Pertanian">
    @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Kolom Kategori -->
<div>
    <label for="category" class="block text-gray-700 font-medium mb-2">Kategori <span
            class="text-red-500">*</span></label>
    <select name="category" id="category" required
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
        <option value="">Pilih Kategori</option>
        <option value="Pertanian" {{ old('category') == 'Pertanian' ? 'selected' : '' }}>Pertanian</option>
        <option value="Peternakan" {{ old('category') == 'Peternakan' ? 'selected' : '' }}>Peternakan</option>
        <option value="Perkebunan" {{ old('category') == 'Perkebunan' ? 'selected' : '' }}>Perkebunan</option>
    </select>
    @error('category')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Kolom Deskripsi -->
<div class="md:col-span-2">
    <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi <span
            class="text-red-500">*</span></label>
    <textarea name="description" id="description" rows="4" required
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
        placeholder="Deskripsi singkat tentang layanan...">{{ old('description') }}</textarea>
    @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Kolom Ikon -->
<div>
    <label for="icon" class="block text-gray-700 font-medium mb-2">Ikon (Font Awesome) <span
            class="text-red-500">*</span></label>
    <input type="text" name="icon" id="icon" value="{{ old('icon') }}" required
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
        placeholder="Contoh: fas fa-seedling">
    <p class="text-gray-500 text-xs mt-1">Masukkan kelas ikon dari Font Awesome (mis. fas fa-seedling, fas fa-horse)</p>

    <div class="mt-2 p-3 bg-gray-50 rounded-lg border border-gray-200">
        <p class="text-sm text-gray-600 mb-2">Beberapa contoh ikon populer:</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
            <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option"
                data-icon="fas fa-seedling">
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
            <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option"
                data-icon="fas fa-apple-alt">
                <i class="fas fa-apple-alt text-xl text-red-600"></i>
                <p class="text-xs mt-1">fas fa-apple-alt</p>
            </div>
            <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option" data-icon="fas fa-horse">
                <i class="fas fa-horse text-xl text-brown-600"></i>
                <p class="text-xs mt-1">fas fa-horse</p>
            </div>
            <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option"
                data-icon="fas fa-tractor">
                <i class="fas fa-tractor text-xl text-yellow-600"></i>
                <p class="text-xs mt-1">fas fa-tractor</p>
            </div>
            <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option"
                data-icon="fas fa-mountain">
                <i class="fas fa-mountain text-xl text-blue-600"></i>
                <p class="text-xs mt-1">fas fa-mountain</p>
            </div>
            <div class="text-center p-2 hover:bg-gray-100 rounded cursor-pointer icon-option" data-icon="fas fa-hiking">
                <i class="fas fa-hiking text-xl text-green-600"></i>
                <p class="text-xs mt-1">fas fa-hiking</p>
            </div>
        </div>
    </div>

    @error('icon')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Kolom Gambar -->
<div>
    <label for="image" class="block text-gray-700 font-medium mb-2">Gambar Layanan <span
            class="text-red-500">*</span></label>
    <input type="file" name="image" id="image" accept="image/*" {{ isset($asset) ? '' : 'required' }}
        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
    <p class="text-gray-500 text-xs mt-1">Ukuran gambar disarankan: 800x600px (rasio 4:3) untuk tampilan yang seragam,
        format: JPG, PNG</p>
    @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Kolom Status -->
<div>
    <label class="block text-gray-700 font-medium mb-2">Status<span class="text-red-500">*</span></label>
    <div class="flex items-center space-x-6">
        <label class="inline-flex items-center">
            <input type="radio" name="is_active" value="1" {{ old('is_active', 1) ? 'checked' : '' }}
                class="form-radio h-4 w-4 text-green-600">
            <span class="ml-2">Aktif</span>
        </label>
        <label class="inline-flex items-center">
            <input type="radio" name="is_active" value="0" {{ old('is_active', 1) ? '' : 'checked' }}
                class="form-radio h-4 w-4 text-red-600">
            <span class="ml-2">Nonaktif</span>
        </label>
    </div>
</div>

<!-- Kolom Detail Item -->
<div class="md:col-span-2">
    <label class="block text-gray-700 font-medium mb-2">Detail Layanan <span class="text-red-500">*</span></label>

    <div id="service-items" class="space-y-4">
        <div class="item-row border border-gray-200 rounded-lg p-4 bg-gray-50">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700 text-sm mb-1">Judul Item</label>
                    <input type="text" name="item_titles[]"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Contoh: Workshop Bertanam">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm mb-1">Deskripsi Item</label>
                    <textarea name="item_descriptions[]"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                        placeholder="Deskripsi singkat item..." rows="2"></textarea>
                </div>
            </div>
            <button type="button" class="remove-item mt-2 text-red-500 text-sm hover:text-red-700"
                style="display: none;">
                <i class="fas fa-times-circle"></i> Hapus Item
            </button>
        </div>
    </div>

    <button type="button" id="add-item" class="mt-2 text-primary-600 hover:text-primary-800 text-sm font-medium">
        <i class="fas fa-plus-circle"></i> Tambah Item Baru
    </button>
</div>

<!-- Tombol Submit -->
<div class="md:col-span-2 border-t border-gray-200 pt-6 mt-6">
    <div class="flex justify-end space-x-3">
        <a href="{{ route('dynamic-assets.index') }}"
            class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
            Batal
        </a>
        <button type="submit"
            class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors flex items-center">
            <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Layanan
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
            if (e.target.classList.contains('remove-item') || e.target.parentElement.classList.contains(
                    'remove-item')) {
                const button = e.target.classList.contains('remove-item') ? e.target : e.target
                    .parentElement;
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
