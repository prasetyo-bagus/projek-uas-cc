<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Aset Dinamis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white shadow-lg rounded-xl w-full max-w-2xl p-8">
        <h2 class="text-2xl font-bold mb-6">Edit Aset Dinamis</h2>
        <form action="{{ route('dynamic-assets.update', $dynamicAsset->id) }}" method="POST"
            enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label for="type" class="block text-sm font-medium text-gray-700">Tipe Aset</label>
                <select name="type" id="type" required
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="BANNER" {{ $dynamicAsset->type == 'BANNER' ? 'selected' : '' }}>Banner</option>
                    <option value="GALERY" {{ $dynamicAsset->type == 'GALERY' ? 'selected' : '' }}>Galeri</option>
                    <option value="FACILITY" {{ $dynamicAsset->type == 'FACILITY' ? 'selected' : '' }}>Fasilitas</option>
                </select>
            </div>

            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Judul</label>
                <input type="text" name="title" id="title" value="{{ $dynamicAsset->title }}"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                @if ($dynamicAsset->image)
                    <div class="mt-1 mb-2">
                        <img src="{{ asset('storage/' . $dynamicAsset->image) }}" alt="Gambar Lama"
                            class="w-32 rounded shadow">
                    </div>
                @endif
                <input type="file" name="image" id="image"
                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-indigo-100 file:text-indigo-700 hover:file:bg-indigo-200" />
                <p class="text-xs text-gray-500 mt-1">Kosongkan jika tidak ingin mengganti gambar</p>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Singkat</label>
                <input type="text" name="description" id="description" value="{{ $dynamicAsset->description }}"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div>
                <label for="detail" class="block text-sm font-medium text-gray-700">Detail Lengkap</label>
                <textarea name="detail" id="detail" rows="4"
                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $dynamicAsset->detail }}</textarea>
            </div>

            <div class="text-right">
                <button type="submit"
                    class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">Update</button>
            </div>
        </form>
    </div>
</body>

</html>