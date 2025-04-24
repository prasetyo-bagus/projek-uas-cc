<form method="POST"
    action="{{ isset($data) ? route('dynamic-assets.update', $data->id) : route('dynamic-assets.store') }}"
    enctype="multipart/form-data">
    @csrf
    @if(isset($data)) @method('PUT') @endif

    <input type="hidden" name="type" value="FACILITY">

    <div class="mb-4">
        <label class="block font-medium">Nama Fasilitas</label>
        <input type="text" name="title" value="{{ old('title', $data->title ?? '') }}"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Ikon / Gambar Fasilitas</label>
        <input type="file" name="image" class="mt-1 block w-full">
        @if(isset($data))
            <img src="{{ asset('storage/' . $data->image) }}" class="w-32 mt-2 rounded">
        @endif
    </div>

    <div class="mb-4">
        <label class="block font-medium">Keterangan Singkat</label>
        <input type="text" name="description" value="{{ old('description', $data->description ?? '') }}"
            class="w-full border rounded p-2">
    </div>

    <div class="mb-4">
        <label class="block font-medium">Detail Fasilitas</label>
        <textarea name="detail" rows="4"
            class="w-full border rounded p-2">{{ old('detail', $data->detail ?? '') }}</textarea>
    </div>

    <div class="flex justify-end">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            <i class="fa-solid fa-floppy-disk mr-2"></i>
            {{ isset($data) ? 'Update' : 'Simpan' }} Fasilitas
        </button>
    </div>
</form>