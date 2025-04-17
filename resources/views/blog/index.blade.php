<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Nusantara Edupark</title>
    @vite('resources/css/app.css')
</head>

<body>
    <!-- Halaman untuk Pengguna Terautentikasi -->
    @auth
        <div class="bg-gray-100 flex items-center justify-center min-h-screen">
            <div class="container mx-auto p-6 bg-white shadow-md rounded-lg w-full">
                <h2 class="text-center text-2xl font-bold mb-4">Daftar Blog</h2>

                <div class="mb-4">
                    <a href="{{ route('blogs.create') }}"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Tambah Blog
                    </a>
                </div>

                @php
                    $blogUnggulan = request()->has('page') && request()->page > 1 ? collect([]) : $blogUnggulan;
                    $allBlogs = $blogUnggulan->merge($blogReguler->getCollection());
                @endphp

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
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
                                <tr class="border {{ $blog->is_featured ?: '' }}">
                                    <td class="py-4 px-6 border text-center">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-2 border w-24">
                                        <div class="flex justify-center">
                                            @if ($blog->picture)
                                                <img src="{{ asset('storage/' . $blog->picture) }}" alt="{{ $blog->title }}">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border font-semibold text-blue-600">
                                        <a href="{{ route('blog.show', $blog->url) }}" title="{{ $blog->title }}" class="block">
                                            <span
                                                class="sm:hidden text-l">{{ \Illuminate\Support\Str::limit($blog->title, 20, '...') }}</span>
                                            <span
                                                class="hidden sm:inline text-l">{{ \Illuminate\Support\Str::limit($blog->title, 80, '...') }}</span>
                                        </a>
                                    </td>
                                    <td class="py-2 px-2 border hidden sm:table-cell">
                                        <code>https://officialnusantaraedupark/blogs/{{ $blog->url }}</code>
                                    </td>
                                    <td class="py-2 px-4 border text-center">
                                        @if ($blog->is_featured)
                                            <span class="text-green-600 font-bold">✓</span>
                                        @else
                                            <span class="text-gray-400">✗</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border text-center">
                                        @if ($blog->status == 'PUBLISH')
                                            <span class="text-green-600 font-bold">Publish</span>
                                        @else
                                            <span class="text-gray-500">Draft</span>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border text-center">
                                        <a href="{{ route('blogs.edit', $blog->id) }}"
                                            class="text-yellow-500 hover:text-yellow-600 px-2">Edit</a>
                                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" class="inline"
                                            onsubmit="return confirm('Yakin ingin menghapus?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600 px-2">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-3 px-6 text-center text-gray-500">Tidak ada blog tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $blogReguler->links() }}
                </div>
            </div>
        </div>
    @endauth

    <!-- Halaman untuk Pengguna Tidak Terautentikasi -->
    @php
        $blogUnggulan = request()->has('page') && request()->page > 1 ? collect([]) : $blogUnggulan;
        $allBlogs = $blogUnggulan->merge($blogReguler->getCollection());
    @endphp

    @guest
        <div class="bg-gray-100 min-h-screen p-6">
            <div class="container mx-auto max-w-5xl">
                <h1 class="text-center text-xl font-bold mb-6">BERITA & ARTIKEL NUSANTARA EDUPARK</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($allBlogs as $blog)
                                <div
                                    class="relative bg-white shadow-md overflow-hidden border border-gray-200 rounded-lg h-full flex flex-col">
                                    <a href="{{ route('blog.show', $blog->url) }}"
                                        class="hover:shadow-lg transition-shadow duration-200 h-full flex flex-col">
                                        <div class="w-full h-72 overflow-hidden">
                                            <img src="{{ asset('storage/' . $blog->picture) }}" alt="{{ $blog->title }}">
                                        </div>

                                        @php
                                            if ($blog->is_featured) {
                                                $positionStyle = 'top-10';
                                            } else {
                                                $positionStyle = 'top-2';
                                            }

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
                                            <!-- Menampilkan berita utama dengan posisi top-2 -->
                                            <span class="absolute top-2 left-2 bg-purple-500 text-white text-xs px-2 py-1 rounded">
                                                Berita Utama
                                            </span>
                                        @endif

                                        @if ($blog->category)
                                            <!-- Menampilkan kategori dengan posisi yang ditentukan -->
                                            <span
                                                class="absolute {{ $positionStyle }} left-2 {{ $categoryColor }} text-white text-xs px-2 py-1 rounded">
                                                <p>{{ ucwords(str_replace('_', ' ', strtolower($blog->category))) }}</p>
                                            </span>
                                        @endif

                                        <div class="p-4 flex flex-col flex-grow">
                                            <h2
                                                class="font-semibold text-gray-800 hover:text-yellow-500 transition-colors duration-200 min-h-[80px]">
                                                {{ $blog->title }}
                                            </h2>
                                            <p class="text-gray-600 text-sm mt-2">
                                                {{ Str::limit(strip_tags($blog->body), 100) }}
                                            </p>
                                            <span class="mt-auto text-purple-700 hover:text-purple-500 transition-colors duration-200">
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
    @endguest

</body>

</html>