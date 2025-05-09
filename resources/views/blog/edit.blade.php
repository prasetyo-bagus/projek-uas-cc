@extends('navbar.adminnavbar')

@section('content')
    {{-- <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-5xl mx-auto"> --}}
        <div class="bg-white shadow-lg rounded-xl p-8 w-full max-w-5xl mx-auto min-h-[1500px]">
            <!-- Judul, Form Fields, dan Summernote Editor di sini -->    
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Edit Blog</h1>
                <p class="text-gray-500 mt-1">Ubah konten blog untuk Nusantara Edupark</p>
            </div>
            <a href="{{ route('blogs.index') }}"
                class="flex items-center text-primary-600 hover:text-primary-800 transition-colors">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Daftar
            </a>
        </div>

        <form action="{{ route('blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Judul Blog</label>
                        <input type="text" name="title" value="{{ old('title', $blog->title) }}" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                        <p class="mt-1 text-xs text-gray-500">Judul blog harus jelas dan menarik perhatian pembaca</p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Slug URL</label>
                        <input type="text" name="url" value="{{ old('url', $blog->url) }}"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500"
                            placeholder="contoh: cara-reservasi-di-nusantara-edupark">
                        <p class="mt-1 text-xs text-gray-500">Biarkan kosong untuk menghasilkan slug otomatis dari judul</p>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Kategori</label>
                        <select name="category"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary-500">
                            <option value="">Pilih Kategori</option>
                            <option value="BERITA" {{ $blog->category == 'BERITA' ? 'selected' : '' }}>Berita</option>
                            <option value="ACARA" {{ $blog->category == 'ACARA' ? 'selected' : '' }}>Acara</option>
                            <option value="DESTINASI" {{ $blog->category == 'DESTINASI' ? 'selected' : '' }}>Destinasi</option>
                            <option value="PANDUAN_WISATA" {{ $blog->category == 'PANDUAN_WISATA' ? 'selected' : '' }}>Panduan Wisata</option>
                            <option value="KULINER" {{ $blog->category == 'KULINER' ? 'selected' : '' }}>Kuliner</option>
                            <option value="PROMO" {{ $blog->category == 'PROMO' ? 'selected' : '' }}>Promo</option>
                            <option value="FASILITAS" {{ $blog->category == 'FASILITAS' ? 'selected' : '' }}>Fasilitas</option>
                        </select>
                    </div>
                    <div class="flex items-center space-x-3 bg-gray-50 p-4 rounded-lg">
                        <input type="checkbox" name="is_featured" value="1" id="is_featured"
                            class="w-5 h-5 text-primary-600 border-gray-300 rounded focus:ring-primary-500"
                            {{ old('is_featured', $blog->is_featured) ? 'checked' : '' }}>
                        <div>
                            <label for="is_featured" class="text-gray-700 font-medium">Tandai sebagai Berita Unggulan</label>
                            <p class="text-xs text-gray-500 mt-0.5">Berita unggulan akan ditampilkan di halaman utama</p>
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Status Publikasi</label>
                        <div class="flex space-x-4">
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="PUBLISH"
                                    class="h-5 w-5 text-primary-600 focus:ring-primary-500"
                                    {{ $blog->status == 'PUBLISH' ? 'checked' : '' }}>
                                <span class="ml-2 flex items-center">
                                    <i class="fa-solid fa-globe text-green-500 mr-1.5"></i>
                                    <span>Publish</span>
                                </span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="status" value="DRAF"
                                    class="h-5 w-5 text-primary-600 focus:ring-primary-500"
                                    {{ $blog->status == 'DRAF' ? 'checked' : '' }}>
                                <span class="ml-2 flex items-center">
                                    <i class="fa-solid fa-pencil text-yellow-500 mr-1.5"></i>
                                    <span>Draft</span>
                                </span>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="space-y-2">
                    <label class="block text-gray-700 font-medium mb-2">Gambar Utama</label>
                    <div class="border-2 border-dashed border-gray-300 rounded-lg p-4 text-center relative" id="dropzone">
                        <input type="file" name="picture" id="imageInput"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div id="placeholder" class="{{ $blog->picture ? 'hidden' : '' }} flex flex-col items-center justify-center py-4">
                            <i class="fa-solid fa-cloud-arrow-up text-gray-400 text-3xl mb-2"></i>
                            <p class="text-gray-500">Klik atau seret gambar ke sini</p>
                            <p class="text-xs text-gray-400 mt-1">JPG, PNG atau JPEG (Maks. 2MB)</p>
                        </div>
                        <div id="preview" class="{{ $blog->picture ? '' : 'hidden' }}">
                            <img src="{{ $blog->picture ? asset('storage/' . $blog->picture) : '#' }}" alt="Preview" class="max-h-52 mx-auto rounded-lg">
                        </div>
                    </div>
                </div>

            </div>
            <div>
                <label class="block text-gray-700 font-medium mb-2">Isi Blog</label>
                <textarea id="summernote" class="hidden">{!! old('body', $blog->body) !!}</textarea>
                <input type="hidden" name="body" id="body">
            </div>

            <div class="border-t border-gray-200 pt-6 mt-6">
                <div class="flex justify-end space-x-3">
                    <a href="{{ route('blogs.index') }}"
                        class="px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-primary-600 text-white rounded-lg hover:bg-primary-700 transition-colors flex items-center">
                        <i class="fa-solid fa-floppy-disk mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('imageInput');
            const preview = document.getElementById('preview');
            const placeholder = document.getElementById('placeholder');
            const previewImg = preview.querySelector('img');
            const dropzone = document.getElementById('dropzone');
    
            function showPreview(file) {
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        previewImg.src = e.target.result;
                        placeholder.classList.add('hidden');
                        preview.classList.remove('hidden');
                        dropzone.classList.add('border-primary-300', 'bg-primary-50');
                        dropzone.classList.remove('border-gray-300');
                    }
                    reader.readAsDataURL(file);
                }
            }
    
            imageInput.addEventListener('change', function () {
                if (this.files && this.files[0]) {
                    showPreview(this.files[0]);
                }
            });
    
            dropzone.addEventListener('dragover', function (e) {
                e.preventDefault();
                dropzone.classList.add('border-primary-400', 'bg-primary-50');
            });
    
            dropzone.addEventListener('dragleave', function (e) {
                e.preventDefault();
                if (!preview.classList.contains('hidden')) return;
                dropzone.classList.remove('border-primary-400', 'bg-primary-50');
            });
    
            dropzone.addEventListener('drop', function (e) {
                e.preventDefault();
                if (e.dataTransfer.files && e.dataTransfer.files[0]) {
                    imageInput.files = e.dataTransfer.files;
                    showPreview(e.dataTransfer.files[0]);
                }
            });
    
            // Inisialisasi Summernote
            $('#summernote').summernote({
                placeholder: 'Isi konten blog di sini...',
                tabsize: 2,
                height: 800,
                callbacks: {
                    onImageUpload: function (files) {
                        uploadImage(files[0]);
                    }
                },
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']]
                ]
            });
    
            // Upload gambar Summernote
            function uploadImage(file) {
                const data = new FormData();
                data.append("file", file);
    
                $.ajax({
                    url: '/upload-image',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: data,
                    type: "POST",
                    success: function (response) {
                        $('#summernote').summernote('insertImage', response.url);
                    },
                    error: function () {
                        alert("Upload gambar gagal.");
                    }
                });
            }
    
            // Simpan isi Summernote ke input hidden saat submit
            document.querySelector('form').addEventListener('submit', function () {
                const content = $('#summernote').summernote('code');
                document.getElementById('body').value = content;
            });
        });
    </script>
@endsection