@extends('navbar.adminnavbar')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <h1 class="text-2xl font-bold text-gray-800">Kelola Testimonial</h1>
            <p class="text-gray-600 mt-1">Mengelola testimonial dari pengunjung Nusantara Edupark</p>
        </div>

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 mx-6" role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if($testimonials->isEmpty())
        <div class="p-6 text-center">
            <div class="flex flex-col items-center justify-center py-12">
                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                </svg>
                <p class="mt-4 text-lg text-gray-500">Belum ada testimonial dari pengunjung.</p>
            </div>
        </div>
        @else
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pesan</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rating</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($testimonials as $index => $testimonial)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $loop->iteration }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($testimonial->foto)
                            <img src="{{ asset('storage/' . $testimonial->foto) }}" alt="{{ $testimonial->nama }}" class="h-10 w-10 rounded-full object-cover">
                            @else
                            <div class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                <span class="text-lg font-medium text-gray-600">{{ substr($testimonial->nama, 0, 1) }}</span>
                            </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $testimonial->nama }}</div>
                            <div class="text-sm text-gray-500">{{ $testimonial->kota ?? 'Tidak disebutkan' }}</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 max-w-xs truncate">{{ $testimonial->pesan }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-yellow-500 flex">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $testimonial->rating)
                                        <i class="fas fa-star"></i>
                                    @else
                                        <i class="far fa-star"></i>
                                    @endif
                                @endfor
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $testimonial->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                   ($testimonial->status === 'rejected' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                {{ ucfirst($testimonial->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $testimonial->created_at->format('d M Y H:i') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <div class="flex space-x-2">
                                <!-- Tombol Setujui -->
                                <form action="{{ route('testimonials.update.status', $testimonial) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="approved">
                                    <button type="submit" class="text-green-600 hover:text-green-900 {{ $testimonial->status === 'approved' ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $testimonial->status === 'approved' ? 'disabled' : '' }}>
                                        <i class="fas fa-check-circle"></i>
                                    </button>
                                </form>

                                <!-- Tombol Tolak -->
                                <form action="{{ route('testimonials.update.status', $testimonial) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="text-red-600 hover:text-red-900 {{ $testimonial->status === 'rejected' ? 'opacity-50 cursor-not-allowed' : '' }}" {{ $testimonial->status === 'rejected' ? 'disabled' : '' }}>
                                        <i class="fas fa-times-circle"></i>
                                    </button>
                                </form>

                                <!-- Tombol Hapus -->
                                <form action="{{ route('testimonials.destroy', $testimonial) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-600 hover:text-gray-900">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4">
            {{ $testimonials->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
