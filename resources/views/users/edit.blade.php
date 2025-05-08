@extends('navbar.adminnavbar')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold mb-6">Edit User</h2>

        @if (session('error'))
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                    class="w-full mt-1 p-2 border rounded">
            </div>

            <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                    class="w-full mt-1 p-2 border rounded">
            </div>

            <div>
                <label class="block text-gray-700">Role</label>
                <select name="role" required class="w-full mt-1 p-2 border rounded">
                    <option value="SUPER_ADMIN" {{ $user->role === 'SUPER_ADMIN' ? 'selected' : '' }}>Super Admin</option>
                    <option value="ADMIN" {{ $user->role === 'ADMIN' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700">Status</label>
                <select name="status" required class="w-full mt-1 p-2 border rounded">
                    <option value="AKTIF" {{ $user->status === 'AKTIF' ? 'selected' : '' }}>Aktif</option>
                    <option value="TIDAK_AKTIF" {{ $user->status === 'TIDAK_AKTIF' ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700">Password (opsional)</label>
                <input type="password" name="password" class="w-full mt-1 p-2 border rounded">
                <p class="text-xs text-gray-500">Biarkan kosong jika tidak ingin mengubah password.</p>
            </div>

            <div>
                <label class="block text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full mt-1 p-2 border rounded">
            </div>

            <div class="text-right">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">Update
                    User</button>
            </div>
        </form>
    </div>
@endsection