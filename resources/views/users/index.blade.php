@extends('navbar.adminnavbar')

@section('content')

    @if (session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="bg-white shadow-lg rounded-xl p-8 w-full mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Kelola Akun Admin dan Super Admin</h2>
            </div>
            <button onclick="document.getElementById('create-user-modal').classList.remove('hidden')"
                class="bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 px-4 rounded-lg transition-colors flex items-center">
                + Tambah User
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                        <th class="py-3 px-4 border">No</th>
                        <th class="py-3 px-4 border">Nama</th>
                        <th class="py-3 px-4 border">Email</th>
                        <th class="py-3 px-4 border">Role</th>
                        <th class="py-3 px-4 border">Status</th>
                        <th class="py-3 px-4 border">Aksi</th>
                    </tr>
                </thead>

                <!-- Modal Create User -->
                @include('users.modal.create')

                <tbody>
                    @forelse ($users as $user)
                        <tr class="border hover:bg-gray-50">
                            <td class="py-3 px-4 border text-center">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4 border">{{ $user->name }}</td>
                            <td class="py-3 px-4 border">{{ $user->email }}</td>
                            <td class="py-3 px-4 border text-center">
                                <span
                                    class="px-2 py-1 rounded-full text-xs font-semibold {{ $user->role === 'SUPER_ADMIN' ? 'bg-blue-100 text-blue-700' : 'bg-purple-100 text-purple-700' }}">
                                    {{ ucwords(strtolower(str_replace('_', ' ', $user->role))) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 border text-center">
                                <span
                                    class="text-xs px-2 py-1 rounded-full font-semibold {{ $user->status === 'AKTIF' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ ucwords(strtolower(str_replace('_', ' ', $user->status))) }}
                                </span>
                            </td>
                            <td class="py-3 px-4 border text-center">
                                <button onclick="document.getElementById('modal-{{ $user->id }}').classList.remove('hidden')"
                                    class="text-yellow-500 hover:text-yellow-600 px-2 text-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Yakin ingin menghapus {{ $user->name }}?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        onclick="openDeleteModal('{{ route('users.destroy', $user) }}', '{{ $user->name }}')"
                                        class="text-red-500 hover:text-red-600 px-2 text-sm">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal untuk Edit User -->
                        @include('users.modal.edit', ['user' => $user])

                    @empty
                        <tr>
                            <td colspan="6" class="py-4 px-6 text-center text-gray-500">Tidak ada user tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Modal Konfirmasi Hapus -->
        <div id="confirm-delete-modal"
            class="fixed inset-0 bg-black bg-opacity-50 backdrop-blur-sm flex items-center justify-center z-50 hidden transition-opacity duration-300">
            <div id="modal-box"
                class="bg-white p-8 rounded-xl shadow-2xl w-full max-w-md mx-auto transform scale-95 opacity-0 transition-all duration-300">

                <!-- Header Icon -->
                <div class="text-center mb-4">
                    <div class="w-16 h-16 mx-auto bg-purple-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fa-solid fa-trash text-purple-600"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-800">Konfirmasi Hapus</h2>
                </div>

                <!-- Body -->
                <p class="text-center text-gray-600 mb-6">
                    Apakah Anda yakin ingin menghapus <span id="confirm-user-name"
                        class="font-semibold text-purple-700"></span>?
                    <br>
                    <span class="text-sm text-gray-400">Tindakan ini tidak dapat dibatalkan.</span>
                </p>

                <!-- Footer Buttons -->
                <form id="confirm-delete-form" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="flex flex-col sm:flex-row justify-center sm:space-x-4 space-y-3 sm:space-y-0">
                        <button type="button" onclick="closeDeleteModal()"
                            class="w-full sm:w-1/2 bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="w-full sm:w-1/2 bg-purple-600 hover:bg-purple-700 text-white py-2 px-4 rounded-lg font-medium transition">
                            Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openDeleteModal(action, userName) {
            const modal = document.getElementById('confirm-delete-modal');
            const box = document.getElementById('modal-box');

            document.getElementById('confirm-delete-form').action = action;
            document.getElementById('confirm-user-name').textContent = userName;

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