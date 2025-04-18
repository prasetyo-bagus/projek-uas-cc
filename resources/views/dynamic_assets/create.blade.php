<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Aset Dinamis</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center py-10">
    <div class="bg-white p-6 rounded-lg shadow max-w-3xl w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">Tambah Aset Dinamis</h2>

        <!-- Pilihan Tipe Aset -->
        <div class="mb-6">
            <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Pilih Jenis Aset</label>
            <select name="type" id="type" onchange="changeType(this)" class="w-full border rounded-lg p-2">
                <option disabled selected>Pilih jenis aset</option>
                <option value="{{ route('dynamic-assets.create', ['type' => 'BANNER']) }}" {{ $type == 'BANNER' ? 'selected' : '' }}>Banner</option>
                <option value="{{ route('dynamic-assets.create', ['type' => 'GALERY']) }}" {{ $type == 'GALERY' ? 'selected' : '' }}>Galeri</option>
                <option value="{{ route('dynamic-assets.create', ['type' => 'FACILITY']) }}" {{ $type == 'FACILITY' ? 'selected' : '' }}>Fasilitas</option>
            </select>
        </div>

        <!-- Formulir Dinamis -->
        @if ($type)
            <form action="{{ route('dynamic-assets.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="{{ $type }}">
                @includeIf('dynamic_assets.partials.form-' . strtolower($type))
            </form>
        @else
            <p class="text-gray-500 text-center">Silakan pilih jenis aset terlebih dahulu untuk menampilkan formulir.</p>
        @endif
    </div>

    <script>
        function changeType(select) {
            const selectedUrl = select.value;
            if (selectedUrl) {
                window.location.href = selectedUrl;
            }
        }
    </script>
</body>

</html>