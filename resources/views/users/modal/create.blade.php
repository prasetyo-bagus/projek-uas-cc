<div id="create-user-modal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl mx-auto relative">
        <button onclick="document.getElementById('create-user-modal').classList.add('hidden')"
            class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-2xl">&times;</button>

        <h1 class="text-xl font-bold mb-6 text-center">Tambah User Baru</h1>

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block">Nama</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="w-full border p-2 rounded @error('name') border-red-500 @enderror" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="w-full border p-2 rounded @error('email') border-red-500 @enderror" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block">Password</label>
                <div class="relative">
                    <input type="password" name="password"
                        class="w-full border p-2 rounded @error('password') border-red-500 @enderror"
                        id="create-password" required>
                    <button type="button" onclick="togglePassword('create-password', 'toggle-icon-password')"
                        class="absolute right-2 top-2 text-sm text-gray-600">
                        <i id="toggle-icon-password" class="fa-regular fa-eye"></i>
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
                        id="create-password-confirmation" required>
                    <button type="button"
                        onclick="togglePassword('create-password-confirmation', 'toggle-icon-confirm')"
                        class="absolute right-2 top-2 text-sm text-gray-600">
                        <i id="toggle-icon-confirm" class="fa-regular fa-eye"></i>
                    </button>
                </div>
            </div>

            <div class="mb-4">
                <label class="block">Role</label>
                <select name="role" class="w-full border p-2 rounded @error('role') border-red-500 @enderror" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="ADMIN" {{ old('role') == 'ADMIN' ? 'selected' : '' }}>Admin</option>
                    <option value="SUPER_ADMIN" {{ old('role') == 'SUPER_ADMIN' ? 'selected' : '' }}>Super Admin</option>
                </select>
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block">Status</label>
                <select name="status" class="w-full border p-2 rounded @error('status') border-red-500 @enderror"
                    required>
                    <option value="">-- Pilih Status --</option>
                    <option value="AKTIF" {{ old('status') == 'AKTIF' ? 'selected' : '' }}>AKTIF</option>
                    <option value="TIDAK_AKTIF" {{ old('status') == 'TIDAK_AKTIF' ? 'selected' : '' }}>Tidak Aktif
                    </option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Simpan
                </button>
                <button type="button" onclick="document.getElementById('create-user-modal').classList.add('hidden')"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                    Batal
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function togglePassword(inputId, iconId = null) {
        const input = document.getElementById(inputId);
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