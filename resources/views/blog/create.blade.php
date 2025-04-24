@extends('navbar.adminnavbar')

@section('content')
<div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-5xl mx-auto">
    <div class="flex items-center justify-between mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Tambah Blog</h1>
            <p class="text-gray-500 mt-1">Buat konten blog baru untuk Nusantara Edupark</p>
        </div>
        <a href="{{ route('blogs.index') }}" class="flex items-center text-primary-600 hover:text-primary-800 transition-colors">
            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
        </a>
    </div>

    <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Judul Blog</label>
                    <input type="text" name="title" required 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors"
                        placeholder="Masukkan judul blog yang menarik">
                    <p class="mt-1 text-xs text-gray-500">Judul blog harus jelas dan menarik perhatian pembaca</p>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Slug URL</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500 text-sm">
                            <!-- nusantaraedupark.com/blog/ -->
                        </span>
                        <input type="text" name="url" 
                            placeholder="Masukkan slug URL"
                            class="w-full pl-[10px] pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors">
                    </div>
                    <p class="mt-1 text-xs text-gray-500">Biarkan kosong untuk menghasilkan slug otomatis dari judul</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-2">Kategori</label>
                    <div class="relative">
                        <select name="category" 
                            class="appearance-none w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 transition-colors pr-10">
                            <option value="">Pilih Kategori</option>
                            <option value="BERITA">Berita</option>
                            <option value="ACARA">Acara</option>
                            <option value="DESTINASI">Destinasi</option>
                            <option value="PANDUAN_WISATA">Panduan Wisata</option>
                            <option value="KULINER">Kuliner</option>
                            <option value="PROMO">Promo</option>
                            <option value="FASILITAS">Fasilitas</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <i class="fa-solid fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium mb-2">Gambar Utama</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center relative" id="dropzone">
                        <input type="file" name="picture" required id="imageInput"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div id="placeholder" class="flex flex-col items-center justify-center py-4">
                            <i class="fa-solid fa-cloud-arrow-up text-gray-400 text-3xl mb-2"></i>
                            <p class="text-gray-500">Klik atau seret gambar ke sini</p>
                            <p class="text-xs text-gray-400 mt-1">JPG, PNG atau JPEG (Maks. 2MB)</p>
                        </div>
                        <div id="preview" class="hidden">
                            <img src="#" alt="Preview" class="max-h-52 mx-auto rounded-lg">
                            <button type="button" id="removeImage" class="mt-2 text-red-500 text-sm hover:text-red-700">
                                <i class="fa-solid fa-xmark mr-1"></i> Hapus Gambar
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured"
                        class="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring focus:ring-primary-500 focus:ring-opacity-50">
                    <div>
                        <label for="is_featured" class="text-gray-700 font-medium">Tandai sebagai Berita Unggulan</label>
                        <p class="text-xs text-gray-500 mt-0.5">Berita unggulan akan ditampilkan di bagian atas halaman utama</p>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700 font-medium mb-2">Status Publikasi</label>
                    <div class="flex space-x-4">
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="PUBLISH" checked
                                class="h-5 w-5 text-primary-600 focus:ring-primary-500">
                            <span class="ml-2 flex items-center">
                                <i class="fa-solid fa-globe text-green-500 mr-1.5"></i>
                                <span>Publish</span>
                            </span>
                        </label>
                        <label class="inline-flex items-center">
                            <input type="radio" name="status" value="DRAF"
                                class="h-5 w-5 text-primary-600 focus:ring-primary-500">
                            <span class="ml-2 flex items-center">
                                <i class="fa-solid fa-pencil text-yellow-500 mr-1.5"></i>
                                <span>Draft</span>
                            </span>
                        </label>
                    </div>
                </div>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Isi Blog</label>
                <input id="body" type="hidden" name="body">
                <trix-editor input="body" contenteditable="true"
                    class="w-full min-h-[500px] px-4 py-3 border rounded-lg prose max-w-none">
                </trix-editor>
            </div>
        </div>

        <div class="border-t border-gray-200 pt-6 mt-6">
            <div class="flex justify-end space-x-3">
                <a href="{{ route('blogs.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                    Batal
                </a>
                <button type="submit"
                    class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors flex items-center">
                    <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Blog
                </button>
            </div>
        </div>
    </form>
</div>

<!-- CSRF Token untuk Trix Editor -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Style dan Script untuk Trix Editor -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Preview gambar 
        const imageInput = document.getElementById('imageInput');
        const preview = document.getElementById('preview');
        const placeholder = document.getElementById('placeholder');
        const previewImg = preview.querySelector('img');
        const removeButton = document.getElementById('removeImage');
        const dropzone = document.getElementById('dropzone');
        
        // Fungsi untuk menampilkan preview gambar
        function showPreview(file) {
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImg.src = e.target.result;
                    placeholder.classList.add('hidden');
                    preview.classList.remove('hidden');
                    dropzone.classList.add('border-primary-300', 'bg-primary-50');
                    dropzone.classList.remove('border-gray-300');
                }
                reader.readAsDataURL(file);
            }
        }
        
        // Event untuk memilih file
        imageInput.addEventListener('change', function() {
            if (this.files && this.files[0]) {
                showPreview(this.files[0]);
            }
        });
        
        // Event untuk menghapus gambar
        removeButton.addEventListener('click', function() {
            imageInput.value = '';
            placeholder.classList.remove('hidden');
            preview.classList.add('hidden');
            dropzone.classList.remove('border-primary-300', 'bg-primary-50');
            dropzone.classList.add('border-gray-300');
        });
        
        // Drag & drop functionality
        dropzone.addEventListener('dragover', function(e) {
            e.preventDefault();
            dropzone.classList.add('border-primary-400', 'bg-primary-50');
        });
        
        dropzone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            if (!preview.classList.contains('hidden')) return;
            dropzone.classList.remove('border-primary-400', 'bg-primary-50');
        });
        
        dropzone.addEventListener('drop', function(e) {
            e.preventDefault();
            if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                imageInput.files = e.dataTransfer.files;
                showPreview(e.dataTransfer.files[0]);
            }
        });
    });

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
                                <div class="flex items-center space-x-2 mb-2 p-2 bg-gray-100 rounded">
                                    <span class="text-xs text-gray-500">Ukuran:</span>
                                    <button onclick="resizeImage('${data.url}', 'small')" class="px-2 py-1 text-xs bg-primary-500 text-white rounded hover:bg-primary-600 transition-colors">Kecil</button>
                                    <button onclick="resizeImage('${data.url}', 'medium')" class="px-2 py-1 text-xs bg-green-500 text-white rounded hover:bg-green-600 transition-colors">Sedang</button>
                                    <button onclick="resizeImage('${data.url}', 'large')" class="px-2 py-1 text-xs bg-blue-500 text-white rounded hover:bg-blue-600 transition-colors">Besar</button>
                                </div>
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
                img.style.width = "200px";
            } else if (size === "medium") {
                img.style.width = "400px";
            } else if (size === "large") {
                img.style.width = "100%";
            }
        }
    }
</script>
@endsection