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

    <div class="flex justify-center">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
            <i class="fa-solid fa-floppy-disk mr-2"></i>
            {{ isset($data) ? 'Update' : 'Simpan' }} Galeri
        </button>
    </div>
</form>