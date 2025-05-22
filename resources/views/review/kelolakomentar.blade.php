@extends('navbar.adminnavbar')

@section('content')
    <div class="bg-white shadow-lg rounded-xl w-full mx-auto">
        <div class=" shadow-lg rounded-lg overflow-hidden">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Kelola Testimonial</h1>
                    <p class="text-gray-600 mt-1">Mengelola testimonial dari pengunjung Nusantara Edupark</p>
                </div>
                <div class="relative group">
                    <button
                        class="bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded inline-flex items-center transition duration-150 ease-in-out">
                        <i class="fas fa-download mr-2"></i>
                        Download
                        <i class="fas fa-chevron-down ml-2"></i>
                    </button>
                    <div
                        class="absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg overflow-hidden z-20 hidden group-hover:block">
                        <div class="py-1">
                            <span
                                class="px-4 py-2 text-xs font-semibold text-gray-600 uppercase tracking-wider block bg-gray-100">CSV
                                Format</span>
                            <a href="{{ route('testimonials.export') }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Semua Testimonial</a>
                            <a href="{{ route('testimonials.export', ['status' => 'approved']) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Testimonial Disetujui</a>
                            <a href="{{ route('testimonials.export', ['status' => 'pending']) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Testimonial Pending</a>
                            <a href="{{ route('testimonials.export', ['status' => 'rejected']) }}"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Testimonial Ditolak</a>
                        </div>

                    </div>
                </div>
            </div>

            @if (session('success'))
                <div id="success-alert" class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 mx-6"
                    role="alert">
                    <p>{{ session('success') }}</p>
                </div>
                <script>
                    // Membuat alert hilang setelah 5 detik
                    setTimeout(function() {
                        const alert = document.getElementById('success-alert');
                        if (alert) {
                            alert.style.transition = 'opacity 1s';
                            alert.style.opacity = '0';
                            setTimeout(function() {
                                alert.style.display = 'none';
                            }, 1000);
                        }
                    }, 5000);
                </script>
            @endif

            @if ($testimonials->isEmpty())
                <div class="p-6 text-center">
                    <div class="flex flex-col items-center justify-center py-12">
                        <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                            </path>
                        </svg>
                        <p class="mt-4 text-lg text-gray-500">Belum ada testimonial dari pengunjung.</p>
                    </div>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Foto</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nama</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Pesan</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Rating</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($testimonials as $index => $testimonial)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $loop->iteration }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($testimonial->foto)
                                            <img src="{{ asset('storage/' . $testimonial->foto) }}"
                                                alt="{{ $testimonial->nama }}" class="h-10 w-10 rounded-full object-cover">
                                        @else
                                            <div
                                                class="h-10 w-10 rounded-full bg-gray-300 flex items-center justify-center">
                                                <span
                                                    class="text-lg font-medium text-gray-600">{{ substr($testimonial->nama, 0, 1) }}</span>
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $testimonial->nama }}</div>
                                        <div class="text-sm text-gray-500">{{ $testimonial->kota ?? 'Tidak disebutkan' }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 max-w-xs truncate">{{ $testimonial->pesan }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-yellow-500 flex">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $testimonial->rating)
                                                    <i class="fas fa-star"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $testimonial->status === 'approved'
                                    ? 'bg-green-100 text-green-800'
                                    : ($testimonial->status === 'rejected'
                                        ? 'bg-red-100 text-red-800'
                                        : 'bg-yellow-100 text-yellow-800') }}">
                                            {{ ucfirst($testimonial->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $testimonial->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                                        <div class="flex space-x-2">
                                            <!-- Tombol Setujui -->
                                            <form action="{{ route('testimonials.update.status', $testimonial) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="approved">
                                                <button type="submit"
                                                    class="text-green-600 hover:text-green-900 {{ $testimonial->status === 'approved' ? 'opacity-50 cursor-not-allowed' : '' }}"
                                                    {{ $testimonial->status === 'approved' ? 'disabled' : '' }}>
                                                    <i class="fas fa-check-circle"></i>
                                                </button>
                                            </form>

                                            <!-- Tombol Tolak -->
                                            <form action="{{ route('testimonials.update.status', $testimonial) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="status" value="rejected">
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900 {{ $testimonial->status === 'rejected' ? 'opacity-50 cursor-not-allowed' : '' }}"
                                                    {{ $testimonial->status === 'rejected' ? 'disabled' : '' }}>
                                                    <i class="fas fa-times-circle"></i>
                                                </button>
                                            </form>

                                                    <!-- Tombol Hapus (dengan modal) -->
                                                    <button type="button" class="text-gray-600 hover:text-gray-900"
                                                        onclick="openDeleteModal('{{ route('testimonials.destroy', $testimonial) }}')">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6 flex justify-center px-6 py-4">
                    {{ $testimonials->links() }}
                </div>
                @endif
            </div>
        </div>

    <!-- Modal Konfirmasi Hapus -->
    <div id="confirm-delete-modal"
        class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-opacity duration-300">
        <div id="modal-box"
            class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md mx-auto transform scale-95 opacity-0 transition-all duration-300">
            <!-- Header Icon -->
            <div class="text-center mb-4">
                <div class="w-16 h-16 mx-auto bg-purple-100 rounded-full flex items-center justify-center mb-3">
                    <i class="fa-solid fa-trash-alt text-purple-600"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Konfirmasi Hapus</h2>
            </div>

            <!-- Body -->
            <p class="text-center text-gray-600 mb-6">
                Apakah Anda yakin ingin menghapus testimonial ini?
                <br>
                <span class="text-sm text-gray-400">Tindakan ini tidak dapat dibatalkan.</span>
            </p>

            <!-- Footer Buttons -->
            <form id="confirm-delete-form" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex flex-col sm:flex-row justify-center sm:space-x-4 space-y-3 sm:space-y-0">
                    <button type="button" onclick="closeDeleteModal()"
                        class="w-full sm:w-1/2 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium transition">Batal</button>
                    <button type="submit"
                        class="w-full sm:w-1/2 bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg font-medium transition">Hapus</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openDeleteModal(action) {
            const modal = document.getElementById('confirm-delete-modal');
            const box = document.getElementById('modal-box');

            document.getElementById('confirm-delete-form').action = action;

            modal.classList.remove('hidden');
            setTimeout(() => {
                box.classList.remove('scale-95', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function closeDeleteModal() {
            const modal = document.getElementById('confirm-delete-modal');
            const box = document.getElementById('modal-box');

            box.classList.remove('scale-100', 'opacity-100');
            box.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }
    </script>
@endsection