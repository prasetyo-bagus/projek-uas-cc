<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Nusantara Edupark</title>
    @auth
        <title>Daftar Blog Nusantara Edupark</title>
    @endauth

    @vite('resources/css/app.css')
</head>

<body>
    <!-- 
    ============================================
    Halaman untuk Pengguna Terautentikasi
    ============================================ 
    - Menampilkan daftar blog dalam format tabel.
    - Memungkinkan pengguna dengan hak akses untuk menambah, mengedit, dan menghapus blog.
    -->
    @auth

        <div class="bg-gray-100 flex items-center justify-center min-h-screen">
            <div class="container mx-auto p-6 bg-white shadow-md rounded-lg w-full md:w-3/4 lg:w-2/3">
                <h2 class="text-center text-2xl font-bold mb-4">Daftar Blog</h2>

                <div class="mb-4">
                    <a href="{{ route('blogs.create') }}"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Blog</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                                <th class="py-3 px-4 border">No</th>
                                <th class="py-3 px-4 border">Gambar</th>
                                <th class="py-3 px-4 border">Judul</th>
                                <th class="py-2 px-2 border hidden sm:table-cell">URL</th>
                                <th class="py-3 px-4 border">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                                <tr class="border">
                                    <td class="py-4 px-6 border text-center w-10">{{ $loop->iteration }}</td>
                                    <td class="py-2 px-2 border w-24">
                                        <div class="flex justify-center">
                                            @if($blog->picture)
                                                <img src="{{ asset('storage/blogs/' . $blog->picture) }}" alt="Gambar Blog"
                                                    class="w-16 h-10 object-cover rounded">
                                            @endif
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border font-semibold text-blue-600">
                                        <a href="{{ route('blog.show', $blog->url) }}">{{ $blog->title }}</a>
                                    </td>
                                    <td class="py-2 px-2 border hidden sm:table-cell">
                                        <code>https://officialnusantaraedupark/blogs/{{ $blog->url }}</code>
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
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    @endauth

    <!-- 
    ============================================
    Halaman untuk Pengguna Tidak Terautentikasi
    ============================================ 
    - Menampilkan daftar blog dalam format kartu (grid).
    - Hanya menampilkan informasi dasar blog (gambar, judul, ringkasan).
    - Pengguna hanya dapat melihat blog tanpa opsi untuk mengedit atau menghapus.
    -->
    @guest

        <div class="bg-gray-100 min-h-screen p-6">
            <div class="container mx-auto max-w-5xl">
                <h1 class="text-center text-xl font-bold mb-6">BERITA & ARTIKEL NUSANTARA EDUPARK</h1>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($blogs as $blog)
                        <div class="bg-white shadow-md overflow-hidden">
                            <a href="{{ route('blog.show', $blog->url) }}"
                                class="block bg-white shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
                                <img src="{{ asset('storage/blogs/' . $blog->picture) }}" alt="Gambar Blog"
                                    class="w-full h-40 object-cover">
                                <div class="p-4">
                                    <h2
                                        class="font-semibold text-gray-800 hover:text-yellow-500 transition-colors duration-200">
                                        {{ $blog->title }}
                                    </h2>
                                    <p class="text-gray-600 text-sm truncate">{{ Str::limit($blog->content, 100) }}</p>
                                    <span
                                        class="block mt-3 text-purple-700 hover:text-purple-500 transition-colors duration-200">Baca
                                        Selengkapnya</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $blogs->links() }}
                </div>
            </div>
        </div>
    @endguest
</body>

</html>