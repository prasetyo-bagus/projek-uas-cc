<form method="POST"
    action="{{ isset($data) ? route('dynamic-assets.update', $data->id) : route('dynamic-assets.store') }}"
    enctype="multipart/form-data" class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
    @csrf
    @if(isset($data)) @method('PUT') @endif

    <input type="hidden" name="type" value="GALERY">

    <div class="col-span-2">
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Judul Galeri</label>
            <input type="text" name="title" value="{{ old('title', $data->title ?? '') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                placeholder="Masukkan judul galeri">
        </div>
    </div>

    <div class="col-span-2">
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Gambar Galeri</label>
            <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center relative" id="dropzone">
                <input type="file" name="image" id="imageInput" {{ isset($data) ? '' : 'required' }}
                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                <div id="placeholder"
                    class="flex flex-col items-center justify-center py-4 {{ isset($data) && $data->image ? 'hidden' : '' }}">
                    <i class="fa-solid fa-cloud-arrow-up text-gray-400 text-3xl mb-2"></i>
                    <p class="text-gray-500">Klik atau seret gambar ke sini</p>
                    <p class="text-xs text-gray-400 mt-1">JPG, PNG atau JPEG (Rasio 16:9 untuk hasil terbaik)</p>
                </div>
                <div id="preview" class="{{ isset($data) && $data->image ? '' : 'hidden' }}">
                    <img src="{{ isset($data) && $data->image ? asset('storage/' . $data->image) : '#' }}" alt="Preview"
                        class="max-h-52 mx-auto rounded-lg">
                    <button type="button" id="removeImage" class="mt-2 text-red-500 text-sm hover:text-red-700">
                        <i class="fa-solid fa-xmark mr-1"></i> Hapus Gambar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-span-2">
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Deskripsi Gambar</label>
            <textarea name="description" rows="3"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                placeholder="Masukkan deskripsi gambar">{{ old('description', $data->description ?? '') }}</textarea>
            <p class="text-xs text-gray-500 mt-1">Deskripsi ini akan ditampilkan dengan gambar galeri</p>
        </div>
    </div>

    <div class="col-span-2">
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2">Status</label>
            <div class="flex items-center space-x-6">
                <label class="inline-flex items-center">
                    <input type="radio" name="is_active" value="1"
                        {{ old('is_active', $data->is_active ?? true) ? 'checked' : '' }}
                        class="form-radio h-4 w-4 text-green-600">
                    <span class="ml-2">Aktif</span>
                </label>
                <label class="inline-flex items-center">
                    <input type="radio" name="is_active" value="0"
                        {{ old('is_active', $data->is_active ?? true) ? '' : 'checked' }}
                        class="form-radio h-4 w-4 text-red-600">
                    <span class="ml-2">Nonaktif</span>
                </label>
            </div>
            <p class="text-xs text-gray-500 mt-1">Galeri yang aktif akan ditampilkan di halaman galeri</p>
        </div>
    </div>

    <!-- Button Submit -->
    <div class="flex justify-end">
        <button type="submit"
            class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
            <i class="fa-solid fa-floppy-disk mr-2"></i>
            {{ isset($data) ? 'Update' : 'Simpan' }} Galeri
        </button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Preview gambar
        const imageInput = document.getElementById('imageInput');
        const preview = document.getElementById('preview');
        const placeholder = document.getElementById('placeholder');
        const previewImg = preview.querySelector('img');
        const removeButton = document.getElementById('removeImage');
        const dropzone = document.getElementById('dropzone');

        // Fungsi untuk menampilkan preview gambar
        function showPreview(file) {
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
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
        imageInput.addEventListener('change', function () {
            if (this.files && this.files[0]) {
                showPreview(this.files[0]);
            }
        });

        // Event untuk menghapus gambar
        removeButton.addEventListener('click', function () {
            imageInput.value = '';
            placeholder.classList.remove('hidden');
            preview.classList.add('hidden');
            dropzone.classList.remove('border-primary-300', 'bg-primary-50');
            dropzone.classList.add('border-gray-300');
        });

        // Drag & drop functionality
        dropzone.addEventListener('dragover', function (e) {
            e.preventDefault();
            dropzone.classList.add('border-primary-400', 'bg-primary-50');
        });

        dropzone.addEventListener('dragleave', function (e) {
            e.preventDefault();
            if (!preview.classList.contains('hidden')) return;
            dropzone.classList.remove('border-primary-400', 'bg-primary-50');
        });

        dropzone.addEventListener('drop', function (e) {
            e.preventDefault();
            if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                imageInput.files = e.dataTransfer.files;
                showPreview(e.dataTransfer.files[0]);
            }
        });
    });
</script>