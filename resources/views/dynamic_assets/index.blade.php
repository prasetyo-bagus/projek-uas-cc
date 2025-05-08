@extends('navbar.adminnavbar')

@section('content')
    <div class="bg-white shadow-lg rounded-xl p-8 w-full mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Kelola Aset Dinamis</h2>
                <p class="text-gray-500 mt-1">Unggah dan kelola aset untuk digunakan di website Nusantara Edupark</p>
            </div>
            <a href="{{ route('dynamic-assets.create') }}"
                class="bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors flex items-center">
                <i class="fa-solid fa-plus mr-2"></i> Tambah Aset
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                <div class="flex items-center">
                    <i class="fa-solid fa-circle-check mr-2 text-green-500"></i>
                    <p>{{ session('success') }}</p>
                </div>
            </div>
        @endif

        <!-- Filter dan Pencarian -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6 flex flex-wrap gap-4 items-center">
            <div>
                <label class="text-sm text-gray-600 mr-2">Filter:</label>
                <select id="type-filter" class="border border-gray-300 rounded px-3 py-1 text-sm">
                    <option value="">Semua Tipe</option>
                    <option value="BANNER">Banner</option>
                    <option value="GALERY">Galeri</option>
                    <option value="FACILITY">Fasilitas</option>
                    <option value="PACKET">Packet</option>
                    <option value="SPONSOR">Sponsor</option>
                </select>
            </div>
            <div>
                <select id="status-filter" class="border border-gray-300 rounded px-3 py-1 text-sm">
                    <option value="">Semua Status</option>
                    <option value="active">Aktif</option>
                    <option value="inactive">Nonaktif</option>
                </select>
            </div>
            <div class="relative flex-grow md:max-w-xs">
                <input type="text" id="search-input" placeholder="Cari aset..."
                    class="border border-gray-300 rounded pl-9 pr-3 py-1 w-full text-sm">
                <i class="fa-solid fa-search text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
            </div>
        </div>

        <!-- Tabel Aset -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipe</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="assets-table-body">
                    @forelse($assets as $asset)
                        <tr class="asset-row" data-type="{{ $asset->type }}"
                            data-status="{{ $asset->is_active ? 'active' : 'inactive' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <img src="{{ asset('storage/' . $asset->image) }}" alt="{{ $asset->title }}"
                                    class="h-12 w-16 object-cover rounded">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 py-1 text-xs rounded {{ $asset->type == 'BANNER'
                                        ? 'bg-blue-100 text-blue-800'
                                        : ($asset->type == 'GALERY'
                                            ? 'bg-purple-100 text-purple-800'
                                            : ($asset->type == 'FACILITY'
                                                ? 'bg-red-100 text-red-800'
                                                :   ($asset->type == 'PACKET'
                                                ? 'bg-orange-100 text-orange-800'
                                                : 'bg-green-100 text-green-800'))) }}">
                                    {{ $asset->type }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $asset->title ?: 'Tanpa judul' }}</div>
                                <div class="text-xs text-gray-500 truncate max-w-xs">{{ $asset->description ?: '-' }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $asset->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    <span
                                        class="w-2 h-2 mr-1 rounded-full {{ $asset->is_active ? 'bg-green-500' : 'bg-red-500' }}"></span>
                                    {{ $asset->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div>{{ $asset->created_at->format('d M Y') }}</div>
                                <div class="text-xs text-gray-400">{{ $asset->created_at->format('H:i') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-center gap-5">
                                    <form action="{{ route('dynamic-assets.toggle-status', $asset->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit"
                                            class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 rounded-md p-1.5 transition-colors">
                                            <i
                                                class="fa-solid {{ $asset->is_active ? 'fa-toggle-on' : 'fa-toggle-off' }}"></i>
                                        </button>
                                    </form>
                                    <a href="{{ route('dynamic-assets.edit', $asset->id) }}"
                                        class="text-amber-600 hover:text-amber-900 bg-amber-50 hover:bg-amber-100 rounded-md p-1.5 transition-colors">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('dynamic-assets.destroy', $asset->id) }}" method="POST"
                                        class="inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 rounded-md p-1.5 transition-colors">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                <i class="fa-solid fa-inbox text-gray-300 text-4xl mb-3"></i>
                                <p>Belum ada aset yang ditambahkan</p>
                                <a href="{{ route('dynamic-assets.create') }}"
                                    class="inline-block mt-3 text-primary-600 hover:text-primary-800">Tambah aset
                                    sekarang</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Filter dan pencarian
        document.addEventListener('DOMContentLoaded', function() {
            const typeFilter = document.getElementById('type-filter');
            const statusFilter = document.getElementById('status-filter');
            const searchInput = document.getElementById('search-input');
            const assetRows = document.querySelectorAll('.asset-row');

            function filterAssets() {
                const typeValue = typeFilter.value;
                const statusValue = statusFilter.value;
                const searchValue = searchInput.value.toLowerCase();

                assetRows.forEach(row => {
                    const rowType = row.getAttribute('data-type');
                    const rowStatus = row.getAttribute('data-status');
                    const rowText = row.textContent.toLowerCase();

                    const typeMatch = !typeValue || rowType === typeValue;
                    const statusMatch = !statusValue || rowStatus === statusValue;
                    const searchMatch = !searchValue || rowText.includes(searchValue);

                    if (typeMatch && statusMatch && searchMatch) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            typeFilter.addEventListener('change', filterAssets);
            statusFilter.addEventListener('change', filterAssets);
            searchInput.addEventListener('input', filterAssets);

            // Konfirmasi penghapusan
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    if (confirm(
                            'Apakah Anda yakin ingin menghapus aset ini? Tindakan ini tidak dapat dibatalkan.'
                        )) {
                        this.submit();
                    }
                });
            });
        });
    </script>
@endsection
