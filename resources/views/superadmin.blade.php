@extends('navbar.adminnavbar')

@section('content')
    <div class="container mx-auto">
        <!-- Dashboard Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-2xl font-bold text-gray-800 mb-2">Dashboard Super Admin</h1>
            <p class="text-gray-600">Selamat datang di panel superadmin Nusantara Edupark.</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <!-- Blog Stats -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Total Blog</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $totalBlogs }}</h3>
                    </div>
                    <div class="bg-purple-100 p-3 rounded-full">
                        <i class="fas fa-newspaper text-purple-500 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex justify-between text-sm">
                    <span class="text-green-500">
                        <i class="fas fa-check-circle"></i> {{ $publishedBlogs }} Published
                    </span>
                    <span class="text-yellow-500">
                        <i class="fas fa-edit"></i> {{ $draftBlogs }} Draft
                    </span>
                </div>
            </div>

            <!-- Featured Blogs -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Blog Unggulan</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $featuredBlogs }}</h3>
                    </div>
                    <div class="bg-blue-100 p-3 rounded-full">
                        <i class="fas fa-star text-blue-500 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 text-sm">
                    <span class="text-blue-500">
                        <i class="fas fa-percentage"></i>
                        {{ $totalBlogs > 0 ? round(($featuredBlogs / $totalBlogs) * 100) : 0 }}% dari total blog
                    </span>
                </div>
            </div>

            <!-- Assets Stats -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Total Asset</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $totalAssets }}</h3>
                    </div>
                    <div class="bg-green-100 p-3 rounded-full">
                        <i class="fas fa-images text-green-500 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 flex justify-between text-sm">
                    <span class="text-green-500">
                        <i class="fas fa-image"></i> {{ $banners }} Banner
                    </span>
                    <span class="text-green-500">
                        <i class="fas fa-photo-video"></i> {{ $galleries }} Galeri
                    </span>
                    <span class="text-green-500">
                        <i class="fas fa-building"></i> {{ $facilities }} Fasilitas
                    </span>
                </div>
            </div>

            <!-- Facility Stats -->
            <div class="bg-white rounded-lg shadow-md p-6 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Fasilitas</p>
                        <h3 class="text-2xl font-bold text-gray-800">{{ $facilities }}</h3>
                    </div>
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <i class="fas fa-building text-yellow-500 text-xl"></i>
                    </div>
                </div>
                <div class="mt-4 text-sm">
                    <span class="text-yellow-500">
                        <i class="fas fa-percentage"></i>
                        {{ $totalAssets > 0 ? round(($facilities / $totalAssets) * 100) : 0 }}% dari total asset
                    </span>
                </div>
            </div>
        </div>

        <!-- Blog Categories Chart & Recent Blogs -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Blog Categories -->
            <div class="bg-white rounded-lg shadow-md p-6 lg:col-span-1">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Kategori Blog</h2>
                <div class="space-y-4">
                    @foreach($blogCategories as $category => $count)
                        @if($count > 0)
                            <div>
                                <div class="flex justify-between mb-1">
                                    <span class="text-sm font-medium text-gray-700">{{ $category }}</span>
                                    <span class="text-sm font-medium text-gray-700">{{ $count }}</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div class="bg-purple-600 h-2 rounded-full"
                                        style="width: {{ $totalBlogs > 0 ? ($count / $totalBlogs) * 100 : 0 }}%"></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>

            <!-- Recent Blogs -->
            <div class="bg-white rounded-lg shadow-md p-6 lg:col-span-2">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Blog Terbaru</h2>
                    <a href="{{ route('blogs.index') }}" class="text-sm text-purple-600 hover:text-purple-800">Lihat
                        Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Judul</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kategori</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($recentBlogs as $blog)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="flex items-center">
                                            @if($blog->picture)
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img src="{{ asset('storage/' . $blog->picture) }}"
                                                        class="h-10 w-10 rounded-md object-cover" alt="{{ $blog->title }}">
                                                </div>
                                            @endif
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ Str::limit($blog->title, 30) }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                            {{ $blog->category }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        @if($blog->status == 'PUBLISH')
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                Published
                                            </span>
                                        @else
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Draft
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                                        {{ $blog->created_at->format('d M Y') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-3 text-center text-gray-500">
                                        Tidak ada blog terbaru
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Recent Assets -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Asset Terbaru</h2>
                <a href="{{ route('dynamic-assets.index') }}" class="text-sm text-purple-600 hover:text-purple-800">Lihat
                    Semua</a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                @forelse($recentAssets as $asset)
                    <div class="bg-gray-50 rounded-lg p-3">
                        <img src="{{ asset('storage/' . $asset->image) }}" class="w-full h-32 object-cover rounded-md mb-2"
                            alt="{{ $asset->title }}">
                        <h3 class="text-sm font-medium text-gray-800 truncate">{{ $asset->title ?: 'Tanpa judul' }}</h3>
                        <div class="flex justify-between items-center mt-2">
                            <span
                                class="px-2 py-1 text-xs rounded-full {{ $asset->type == 'BANNER' ? 'bg-blue-100 text-blue-800' : ($asset->type == 'GALERY' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ $asset->type }}
                            </span>
                            <span class="text-xs text-gray-500">{{ $asset->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                @empty
                    <div class="col-span-5 text-center text-gray-500 py-4">
                        Tidak ada asset terbaru
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Aksi Cepat</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
                <a href="{{ route('blogs.create') }}"
                    class="flex items-center p-4 bg-purple-100 rounded-lg hover:bg-purple-200 transition-colors">
                    <div class="bg-purple-500 p-3 rounded-full mr-3">
                        <i class="fas fa-plus text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-medium text-purple-800">Buat Blog</h3>
                        <p class="text-xs text-purple-600">Tambah blog baru</p>
                    </div>
                </a>

                <a href="{{ route('dynamic-assets.create', ['type' => 'banner']) }}"
                    class="flex items-center p-4 bg-blue-100 rounded-lg hover:bg-blue-200 transition-colors">
                    <div class="bg-blue-500 p-3 rounded-full mr-3">
                        <i class="fas fa-image text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-medium text-blue-800">Upload Banner</h3>
                        <p class="text-xs text-blue-600">Tambah banner baru</p>
                    </div>
                </a>

                <a href="{{ route('dynamic-assets.create', ['type' => 'galery']) }}"
                    class="flex items-center p-4 bg-green-100 rounded-lg hover:bg-green-200 transition-colors">
                    <div class="bg-green-500 p-3 rounded-full mr-3">
                        <i class="fas fa-images text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-medium text-green-800">Upload Galeri</h3>
                        <p class="text-xs text-green-600">Tambah galeri baru</p>
                    </div>
                </a>

                <a href="{{ route('dynamic-assets.create', ['type' => 'facility']) }}"
                    class="flex items-center p-4 bg-yellow-100 rounded-lg hover:bg-yellow-200 transition-colors">
                    <div class="bg-yellow-500 p-3 rounded-full mr-3">
                        <i class="fas fa-building text-white"></i>
                    </div>
                    <div>
                        <h3 class="font-medium text-yellow-800">Tambah Fasilitas</h3>
                        <p class="text-xs text-yellow-600">Buat fasilitas baru</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection