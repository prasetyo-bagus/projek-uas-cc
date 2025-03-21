<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Blog</title>

    @vite('resources/css/app.css')

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="container mx-auto p-6 bg-white shadow-md rounded-lg w-full md:w-3/4 lg:w-2/3">
        <h2 class="text-center text-2xl font-bold mb-4">Daftar Blog</h2>

        @auth
            <div class="mb-4">
                <a href="{{ route('blogs.create') }}"
                    class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah Blog</a>
            </div>
        @endauth

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-4 border">Gambar</th>
                        <th class="py-3 px-4 border">Judul</th>
                        <th class="py-3 px-4 border hidden sm:table-cell">URL</th>
                        <th class="py-3 px-4 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                        <tr class="border">
                            <td class="py-2 px-4 border text-center">
                                @if($blog->picture)
                                    <img src="{{ asset('storage/blogs/' . $blog->picture) }}" alt=""
                                        class="w-20 h-20 object-cover rounded">
                                @endif
                            </td>
                            <td class="py-2 px-4 border font-semibold text-blue-600">
                                <a href="{{ route('blog.show', $blog->url) }}">{{ $blog->title }}</a>
                            </td>
                            <td class="py-2 px-4 border hidden sm:table-cell">
                                <code>{{ $blog->url }}</code>
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

</body>

</html>