<form method="POST"
    action="{{ isset($data) ? route('dynamic-assets.update', $data->id) : route('dynamic-assets.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if(isset($data)) @method('PUT') @endif

    <input type="hidden" name="type" value="GALERY">

    <div class="mb-4">
        <label class="block font-medium">Judul Galeri</label>
        <input type="text" name="title" value="{{ old('title', $data->title ?? '') }}"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Gambar Galeri</label>
        <input type="file" name="image" class="mt-1 block w-full">
        @if(isset($data))
            <img src="{{ asset('storage/' . $data->image) }}" class="w-32 mt-2 rounded">
        @endif
    </div>

    <div class="mb-4">
        <label class="block font-medium">Deskripsi Gambar</label>
        <input type="text" name="description" value="{{ old('description', $data->description ?? '') }}"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block font-medium mb-2">Status</label>
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
    </div>

    <div class="text-right">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
            {{ isset($data) ? 'Update' : 'Simpan' }} Galeri
        </button>
    </div>
</form>