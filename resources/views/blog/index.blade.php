@extends(Auth::check() ? 'navbar.adminnavbar' : 'navbar.guestnavbar')

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
                                        <button type="submit" class="text-red-500 hover:text-red-600 px-2">
                                            <i class="fas fa-trash"></i> Hapus
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
@endsection