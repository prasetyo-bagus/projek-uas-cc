@extends(Auth::check() ? 'navbar.adminnavbar' : 'layouts.guest')

@section('content')
    @php
        $blogUnggulan = request()->has('page') && request()->page > 1 ? collect([]) : $blogUnggulan;
        $allBlogs = $blogUnggulan->merge($blogReguler->getCollection());
    @endphp

    @auth
        <div class="bg-white shadow-md rounded-lg p-6 w-full">
            <h2 class="text-2xl font-bold mb-4">Daftar Blog</h2>

            <div class="mb-4">
                <a href="{{ route('blogs.create') }}"
                    class="px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600 inline-flex items-center">
                    <i class="fas fa-plus mr-2"></i> Tambah Blog
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                            <th class="py-3 px-4 border">No</th>
                            <th class="py-3 px-4 border">Gambar</th>
                            <th class="py-3 px-4 border">Judul</th>
                            <th class="py-3 px-4 border hidden sm:table-cell">URL</th>
                            <th class="py-3 px-4 border">Unggulan</th>
                            <th class="py-3 px-4 border">Status</th>
                            <th class="py-3 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allBlogs as $index => $blog)
                            <tr class="border hover:bg-gray-50">
                                <td class="py-4 px-6 border text-center">{{ $loop->iteration }}</td>
                                <td class="py-2 px-2 border w-24">
                                    <div class="flex justify-center">
                                        @if ($blog->picture)
                                            <img src="{{ asset('storage/' . $blog->picture) }}" alt="{{ $blog->title }}"
                                                class="h-16 object-cover rounded">
                                        @endif
                                    </div>
                                </td>
                                <td class="py-2 px-4 border font-semibold text-purple-600">
                                    <a href="{{ route('blog.show', $blog->url) }}" class="block hover:text-purple-800">
                                        <span class="sm:hidden">{{ \Illuminate\Support\Str::limit($blog->title, 20, '...') }}</span>
                                        <span
                                            class="hidden sm:inline">{{ \Illuminate\Support\Str::limit($blog->title, 80, '...') }}</span>
                                    </a>
                                </td>
                                <td class="py-2 px-2 border hidden sm:table-cell">
                                    <code class="text-xs bg-gray-100 px-1 py-1 rounded">
                                                                                                                                                                                                    https://officialnusantaraedupark/blogs/{{ $blog->url }}
                                                                                                                                                                                    </code>
                                </td>
                                <td class="py-2 px-4 border text-center">
                                    @if ($blog->is_featured)
                                        <span class="text-green-600 font-bold"><i class="fas fa-star"></i></span>
                                    @else
                                        <span class="text-gray-400"><i class="far fa-star"></i></span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border text-center">
                                    @if ($blog->status == 'PUBLISH')
                                        <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Publish</span>
                                    @else
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded-full text-xs">Draft</span>
                                    @endif
                                </td>
                                <td class="py-2 px-4 border text-center">
                                    <a href="{{ route('blogs.edit', $blog->id) }}"
                                        class="text-yellow-500 hover:text-yellow-600 px-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline"
                                        onsubmit="return confirm('Yakin ingin menghapus?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            onclick="openDeleteModal('{{ route('blogs.destroy', $blog->id) }}', '{{ $blog->title }}')"
                                            class="text-red-500 hover:text-red-600 px-2">
                                            <i class="fas fa-trash-alt"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="py-3 px-6 text-center text-gray-500">Tidak ada blog tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $blogReguler->links() }}
            </div>
        </div>
    @else
        <div class="bg-gray-100 min-h-screen p-6">
            <div class="container mx-auto max-w-5xl">
                <h1 class="text-center text-xl font-bold mb-6">BERITA & ARTIKEL NUSANTARA EDUPARK</h1>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($allBlogs as $blog)
                        <div class="relative bg-white shadow-md border border-gray-200 rounded-lg h-full flex flex-col">
                            <a href="{{ route('blog.show', $blog->url) }}" class="hover:shadow-lg h-full flex flex-col">
                                <div class="w-full h-72 overflow-hidden">
                                    <img src="{{ asset('storage/' . $blog->picture) }}" alt="{{ $blog->title }}">
                                </div>

                                @php
                                    $positionStyle = $blog->is_featured ? 'top-10' : 'top-2';
                                    $categoryColor = match ($blog->category) {
                                        'BERITA' => 'bg-blue-500',
                                        'ACARA' => 'bg-green-500',
                                        'PROMO' => 'bg-red-500',
                                        'KULINER' => 'bg-yellow-500',
                                        'DESTINASI' => 'bg-purple-500',
                                        'PANDUAN_WISATA' => 'bg-teal-500',
                                        'FASILITAS' => 'bg-orange-500',
                                    };
                                @endphp

                                @if ($blog->is_featured)
                                    <span class="absolute top-2 left-2 bg-purple-500 text-white text-xs px-2 py-1 rounded">
                                        Berita Utama
                                    </span>
                                @endif

                                @if ($blog->category)
                                    <span
                                        class="absolute {{ $positionStyle }} left-2 {{ $categoryColor }} text-white text-xs px-2 py-1 rounded">
                                        <p>{{ ucwords(str_replace('_', ' ', strtolower($blog->category))) }}</p>
                                    </span>
                                @endif

                                <div class="p-4 flex flex-col flex-grow">
                                    <h2 class="font-semibold text-gray-800 hover:text-yellow-500 min-h-[80px]">
                                        {{ $blog->title }}
                                    </h2>
                                    <p class="text-gray-600 text-sm mt-2">
                                        {{ Str::limit(strip_tags($blog->body), 100) }}
                                    </p>
                                    <span class="mt-auto text-purple-700 hover:text-purple-500">
                                        Baca Selengkapnya
                                    </span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    {{ $blogReguler->links() }}
                </div>
            </div>
        </div>
    @endauth

    <!-- Modal Konfirmasi Hapus -->
    <div id="confirm-delete-modal"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-opacity duration-300">
        <div id="modal-box"
            class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md mx-auto transform scale-95 opacity-0 transition-all duration-300">

            <!-- Header Icon -->
            <div class="text-center mb-4">
                <div class="w-16 h-16 mx-auto bg-purple-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fa-solid fa-trash-alt text-purple-600"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Konfirmasi Hapus</h2>
            </div>

            <!-- Body -->
            <p class="text-center text-gray-600 mb-6">
                Apakah Anda yakin ingin menghapus berita ini?
                <br>
                <span class="text-sm text-gray-400">Tindakan ini tidak dapat dibatalkan.</span>
            </p>

            <!-- Footer Buttons -->
            <form id="confirm-delete-form" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex flex-col sm:flex-row justify-center sm:space-x-4 space-y-3 sm:space-y-0">
                    <button type="button" onclick="closeDeleteModal()"
                        class="w-full sm:w-1/2 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="w-full sm:w-1/2 bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg font-medium transition">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

<script>
    function openDeleteModal(action, userName) {
        const modal = document.getElementById('confirm-delete-modal');
        const box = document.getElementById('modal-box');

        document.getElementById('confirm-delete-form').action = action;

        modal.classList.remove('hidden');
        setTimeout(() => {
            box.classList.remove('scale-95', 'opacity-0');
            box.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    function closeDeleteModal() {
        const modal = document.getElementById('confirm-delete-modal');
        const box = document.getElementById('modal-box');

        box.classList.remove('scale-100', 'opacity-100');
        box.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300);
    }
</script>