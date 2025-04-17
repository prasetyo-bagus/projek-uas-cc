<form method="POST"
    action="{{ isset($data) ? route('dynamic-assets.update', $data->id) : route('dynamic-assets.store') }}"
    enctype="multipart/form-data" class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">

    @csrf
    @if(isset($data))
        @method('PUT')
    @endif

    <input type="hidden" name="type" value="BANNER">

    <!-- Gambar Banner -->
    <div class="mb-6">
        <label for="image" class="block text-sm font-medium text-gray-700">Gambar Banner</label>
        <input type="file" name="image" id="image"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @if(isset($data) && $data->image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $data->image) }}" alt="Banner Image"
                    class="w-32 h-32 object-cover rounded-md">
            </div>
        @endif
    </div>

    <!-- Deskripsi Singkat -->
    <div class="mb-6">
        <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
        <input type="text" name="description" id="description"
            value="{{ old('description', $data->description ?? '') }}"
            class="w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 p-2">
    </div>

    <!-- Button Submit -->
    <div class="text-right">
        <button type="submit"
            class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
            {{ isset($data) ? 'Update' : 'Simpan' }} Banner
        </button>
    </div>
</form>