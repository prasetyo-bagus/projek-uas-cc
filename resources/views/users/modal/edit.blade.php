<div id="modal-{{ $user->id }}"
    class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl mx-auto relative">
        <button onclick="document.getElementById('modal-{{ $user->id }}').classList.add('hidden')"
            class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-2xl">&times;</button>

        <h1 class="text-xl font-bold mb-6 text-center">Edit User</h1>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block">Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full border p-2 rounded">
            </div>

            <div class="mb-4">
                <label class="block">Password Baru (opsional)</label>
                <div class="relative">
                    <input type="password" name="password"
                        class="w-full border p-2 rounded @error('password') border-red-500 @enderror"
                        id="password-{{ $user->id }}">
                    <button type="button"
                        onclick="togglePassword('password-{{ $user->id }}', 'toggle-icon-password-{{ $user->id }}')"
                        class="absolute right-2 top-2 text-sm text-gray-600">
                        <i id="toggle-icon-password-{{ $user->id }}" class="fa-regular fa-eye"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block">Konfirmasi Password</label>
                <div class="relative">
                    <input type="password" name="password_confirmation" class="w-full border p-2 rounded"
                        id="password-confirmation-{{ $user->id }}">
                    <button type="button"
                        onclick="togglePassword('password-confirmation-{{ $user->id }}', 'toggle-icon-confirm-{{ $user->id }}')"
                        class="absolute right-2 top-2 text-sm text-gray-600">
                        <i id="toggle-icon-confirm-{{ $user->id }}" class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>

            @if ($user->id === auth()->id())
                <div class="mb-4">
                    <label class="block">Role</label>
                    <input type="text" value="{{ ucwords(strtolower(str_replace('_', ' ', $user->role))) }}"
                        class="w-full border p-2 rounded bg-gray-100" disabled>
                    <p class="text-sm text-red-500 mt-1">Anda tidak dapat mengubah role Anda sendiri.</p>
                </div>

                <div class="mb-4">
                    <label class="block">Status</label>
                    <input type="text" value="{{ ucwords(strtolower(str_replace('_', ' ', $user->status))) }}"
                        class="w-full border p-2 rounded bg-gray-100" disabled>
                    <p class="text-sm text-red-500 mt-1">Anda tidak dapat mengubah status Anda sendiri.</p>
                </div>
            @else
                <div class="mb-4">
                    <label class="block">Role</label>
                    <select name="role" class="w-full border p-2 rounded">
                        <option value="ADMIN" {{ $user->role === 'ADMIN' ? 'selected' : '' }}>Admin</option>
                        <option value="SUPER_ADMIN" {{ $user->role === 'SUPER_ADMIN' ? 'selected' : '' }}>Super Admin</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="block">Status</label>
                    <select name="status" class="w-full border p-2 rounded">
                        <option value="AKTIF" {{ $user->status === 'AKTIF' ? 'selected' : '' }}>AKTIF</option>
                        <option value="TIDAK_AKTIF" {{ $user->status === 'TIDAK_AKTIF' ? 'selected' : '' }}>Tidak Aktif
                        </option>
                    </select>
                </div>
            @endif

            <div class="flex justify-end space-x-2">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                <button type="button" onclick="document.getElementById('modal-{{ $user->id }}').classList.add('hidden')"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Batal</button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(id, iconId = null) {
        const input = document.getElementById(id);
        const icon = iconId ? document.getElementById(iconId) : null;

        if (input) {
            input.type = input.type === 'password' ? 'text' : 'password';
        }

        if (icon) {
            icon.classList.toggle('fa-eye');
            icon.classList.toggle('fa-eye-slash');
        }
    }
</script>