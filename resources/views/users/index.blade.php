@extends('navbar.adminnavbar')

@section('content')
    @if (session('error'))
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

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
                        <td class=" py-3 px-4 border text-center">
                            <form action="{{ route('users.toggleStatus', $user) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin mengubah status user ini?');">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="text-xs px-2 py-1 rounded-full font-semibold {{ $user->status === 'AKTIF' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                    {{ ucwords(strtolower(str_replace('_', ' ', $user->status))) }}
                                </button>
                            </form>
                        </td>
                        <td class="py-3 px-4 border text-center">
                            <a href="{{ route('users.edit', $user) }}"
                                class="text-yellow-500 hover:text-yellow-600 px-2 text-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus user ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-600 px-2 text-sm">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 px-6 text-center text-gray-500">Tidak ada user tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection