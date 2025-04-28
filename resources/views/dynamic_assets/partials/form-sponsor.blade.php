<!-- Nama Sponsor -->
<div class="col-span-2">
    <label for="title" class="block text-gray-700 font-medium mb-2">Nama Sponsor / Partner</label>
    <input type="text" name="title" id="title" value="{{ old('title') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
        placeholder="Masukkan nama sponsor atau partner">
    @error('title')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Upload Logo -->
<div class="col-span-2">
    <label for="image" class="block text-gray-700 font-medium mb-2">Logo Sponsor</label>
    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center">
        <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage()">
        <label for="image" class="block cursor-pointer">
            <div id="preview-container" class="hidden mb-4">
                <img id="preview" class="max-h-48 mx-auto">
            </div>
            <div id="upload-prompt" class="py-8">
                <i class="fa-solid fa-cloud-arrow-up text-gray-400 text-3xl mb-2"></i>
                <p class="text-gray-500">Klik untuk memilih gambar atau seret dan lepas di sini</p>
                <p class="text-gray-400 text-sm mt-1">PNG, JPG, JPEG (Maks. 2MB)</p>
            </div>
        </label>
    </div>
    @error('image')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Website URL -->
<div class="col-span-2">
    <label for="detail" class="block text-gray-700 font-medium mb-2">Website (Opsional)</label>
    <input type="url" name="detail" id="detail" value="{{ old('detail') }}"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
        placeholder="https://www.contoh.com">
    @error('detail')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Deskripsi Singkat -->
<div class="col-span-2">
    <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi Singkat (Opsional)</label>
    <textarea name="description" id="description" rows="3"
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-primary-500 focus:border-primary-500"
        placeholder="Deskripsi singkat tentang sponsor atau partner">{{ old('description') }}</textarea>
    @error('description')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
</div>

<!-- Status Aktif -->
<div class="col-span-2">
    <label for="is_active" class="flex items-center">
        <input type="hidden" name="is_active" value="0">
        <input type="checkbox" name="is_active" id="is_active" value="1" checked
            class="rounded border-gray-300 text-primary-600 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50">
        <span class="ml-2 text-gray-700">Aktifkan Sponsor</span>
    </label>
</div>

<!-- Button Submit -->
<div class="flex justify-end">
    <button type="submit"
        class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
        <i class="fa-solid fa-floppy-disk mr-2"></i>
        {{ isset($data) ? 'Update' : 'Simpan' }} Sponsor
    </button>
</div>
</form>

<script>
    function previewImage() {
        const input = document.getElementById('image');
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('preview-container');
        const uploadPrompt = document.getElementById('upload-prompt');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');
                uploadPrompt.classList.add('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
