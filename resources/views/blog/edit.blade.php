<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-2xl">
        <h1 class="text-2xl font-bold text-center mb-6">Edit Blog</h1>

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700">Judul:</label>
                <input type="text" name="title" value="{{ old('title', $blog->title) }}" required
                    class=" w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700">Slug:</label>
                <input type="text" name="url" value="{{ old('url', $blog->url) }}" placeholder=" contoh:
                    cara-reservasi-di-nusantara-edupark"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block">Kategori</label>
                <select name="category" class="w-full border p-2 rounded">
                    <option value="">Pilih Kategori</option>
                    <option value="BERITA" {{ $blog->category == 'BERITA' ? 'selected' : '' }}>Berita</option>
                    <option value="ACARA" {{ $blog->category == 'ACARA' ? 'selected' : '' }}>Acara</option>
                    <option value="DESTINASI" {{ $blog->category == 'DESTINASI' ? 'selected' : '' }}>Destinasi</option>
                    <option value="PANDUAN_WISATA" {{ $blog->category == 'PANDUAN_WISATA' ? 'selected' : '' }}>Panduan
                        Wisata</option>
                    <option value="KULINER" {{ $blog->category == 'KULINER' ? 'selected' : '' }}>Kuliner</option>
                    <option value="PROMO" {{ $blog->category == 'PROMO' ? 'selected' : '' }}>Promo</option>
                    <option value="FASILITAS" {{ $blog->category == 'FASILITAS' ? 'selected' : '' }}>Fasilitas</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700">Gambar Utama:</label>
                <input type="file" name="picture"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

                @if ($blog->picture)
                    <div class="mt-2 text-center">
                        <img src="{{ asset('storage/blogs/' . $blog->picture) }}" alt="Gambar Blog"
                            class="w-40 rounded-lg mx-auto">
                        <p>Gambar Lama</p>
                    </div>
                @endif
            </div>

            <div>
                <label class="block text-gray-700">Isi Blog:</label>
                <input id="body" type="hidden" name="body" value="{{ old('body', $blog->body) }}">
                <trix-editor input="body" contenteditable="true"
                    class="w-full min-h-[600px] px-8 py-8 border rounded-lg">
                </trix-editor>
            </div>

            <div>
                <label class="block text-gray-700">Status:</label>
                <select name="status"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="PUBLISH" {{ $blog->status == 'PUBLISH' ? 'selected' : '' }}>Publish</option>
                    <option value="DRAFT" {{ $blog->status == 'DRAFT' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <button type="submit"
                class="w-full bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Simpan</button>
        </form>
    </div>

    <script>
        document.addEventListener('trix-attachment-add', function (event) {
            let attachment = event.attachment;
            if (attachment.file) {
                uploadAttachment(attachment);
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            setTimeout(() => {
                document.querySelector("trix-editor").editor.loadHTML(document.querySelector("trix-editor").value);
            }, 500);
        });

        function uploadAttachment(attachment) {
            let file = attachment.file;
            let formData = new FormData();
            formData.append('file', file);

            fetch("{{ route('trix.upload') }}", {
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.url) {
                        attachment.setAttributes({
                            url: data.url,
                            href: data.url
                        });

                        // Tambahkan fitur ukuran gambar
                        setTimeout(() => {
                            let img = document.querySelector(`img[src="${data.url}"]`);
                            if (img) {
                                img.style.maxWidth = "100%";
                                img.style.height = "auto";

                                let toolbar = document.createElement("div");
                                toolbar.innerHTML = `
                                    <button onclick="resizeImage('${data.url}', 'small')" class="px-2 py-1 text-xs bg-blue-500 text-white rounded">Kecil</button>
                                    <button onclick="resizeImage('${data.url}', 'medium')" class="px-2 py-1 text-xs bg-green-500 text-white rounded">Sedang</button>
                                    <button onclick="resizeImage('${data.url}', 'large')" class="px-2 py-1 text-xs bg-red-500 text-white rounded">Besar</button>
                                `;
                                toolbar.style.display = "flex";
                                toolbar.style.gap = "5px";
                                toolbar.style.marginTop = "5px";
                                img.insertAdjacentElement("afterend", toolbar);
                            }
                        }, 500);
                    } else {
                        attachment.remove();
                    }
                })
                .catch(error => {
                    console.error("Upload error:", error);
                    attachment.remove();
                });
        }

        function resizeImage(url, size) {
            let img = document.querySelector(`img[src="${url}"]`);
            if (img) {
                if (size === "small") {
                    img.style.width = "100px";
                } else if (size === "medium") {
                    img.style.width = "300px";
                } else if (size === "large") {
                    img.style.width = "500px";
                }
            }
        }
    </script>

</body>

</html>