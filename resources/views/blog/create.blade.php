<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Blog</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-2xl">
        <h1 class="text-2xl font-bold text-center mb-6">Tambah Blog</h1>

        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700">Judul:</label>
                <input type="text" name="title" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700">Slug:</label>
                <input type="text" name="url" required placeholder="contoh: cara-reservasi-di-nusantara-edupark"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700">Isi Blog:</label>
                <input id="body" type="hidden" name="body">
                <trix-editor input="body" contenteditable="true"
                    class="w-full min-h-[600px] px-4 py-2 border rounded-lg">
                </trix-editor>
            </div>

            <div class="mb-4">
                <label class="block font-semibold">Kategori</label>
                <select name="category" class="w-full border p-2 rounded">
                    <option value="">Pilih Kategori</option>
                    <option value="BERITA">Berita</option>
                    <option value="ACARA">Acara</option>
                    <option value="DESTINASI">Destinasi</option>
                    <option value="PANDUAN_WISATA">Panduan Wisata</option>
                    <option value="KULINER">Kuliner</option>
                    <option value="PROMO">Promo</option>
                    <option value="FASILITAS">Fasilitas</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700">Gambar:</label>
                <input type="file" name="picture" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label class="block text-gray-700">Status:</label>
                <select name="status"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="PUBLISH">Publish</option>
                    <option value="DRAFT">Draft</option>
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
                    } else {
                        attachment.remove();
                    }
                })
                .catch(error => {
                    console.error("Upload error:", error);
                    attachment.remove();
                });
        }
    </script>

</body>

</html>