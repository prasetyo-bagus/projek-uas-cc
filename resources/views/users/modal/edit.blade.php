<div id="modal-{{ $user->id }}"
    class="fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl mx-auto relative">
        <button onclick="document.getElementById('modal-{{ $user->id }}').classList.add('hidden')"
            class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-2xl">&times;</button>

        <h1 class="text-xl font-bold mb-6 text-center">Edit User</h1>

        <form id="form-edit-user-{{ $user->id }}" action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Form Utama -->
            <div id="main-form-{{ $user->id }}">
                <div class="mb-4">
                    <label class="block">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}"
                        class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                        class="w-full border p-2 rounded">
                </div>

                <div class="mb-4">
                    <label class="block">Password</label>
                    <div class="flex items-center">
                        <button type="button" id="change-password-btn-{{ $user->id }}"
                            onclick="togglePasswordChange('{{ $user->id }}')"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Ganti Password
                        </button>
                        <span class="ml-2 text-gray-500 text-sm">Klik untuk mengganti password</span>
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
                            <option value="SUPER_ADMIN" {{ $user->role === 'SUPER_ADMIN' ? 'selected' : '' }}>Super
                                Admin</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block">Status</label>
                        <select name="status" class="w-full border p-2 rounded">
                            <option value="AKTIF" {{ $user->status === 'AKTIF' ? 'selected' : '' }}>AKTIF</option>
                            <option value="TIDAK_AKTIF" {{ $user->status === 'TIDAK_AKTIF' ? 'selected' : '' }}>Tidak
                                Aktif
                            </option>
                        </select>
                    </div>
                @endif

                <div class="flex justify-end space-x-2">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                    <button type="button"
                        onclick="document.getElementById('modal-{{ $user->id }}').classList.add('hidden')"
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded">Batal</button>
                </div>
            </div>

            <!-- Form Password Baru -->
            <div id="password-form-{{ $user->id }}" class="hidden">
                <h2 class="text-lg font-semibold mb-4">Atur Password Baru</h2>
                <p class="text-sm text-gray-600 mb-4">Silakan verifikasi kode dan masukkan password baru Anda.</p>
                
                <input type="hidden" name="random_code" id="random-code-{{ $user->id }}">

                <div class="mb-6 p-4 bg-gray-100 rounded-lg border border-gray-300">
                    <div class="mb-2">
                        <label class="block font-semibold">Kode Verifikasi:</label>
                        <div id="display-code-{{ $user->id }}" class="text-2xl font-bold text-center tracking-wider py-2"></div>
                    </div>
                    <p class="text-sm text-gray-600">Harap masukkan kode di atas untuk melanjutkan</p>
                </div>

                <div class="mb-4">
                    <label class="block">Masukkan Kode Verifikasi</label>
                    <input type="text" id="verification-input-{{ $user->id }}" class="w-full border p-2 rounded" maxlength="6">
                    <p id="code-error-{{ $user->id }}" class="text-red-500 text-sm mt-1 hidden">Kode verifikasi tidak valid</p>
                </div>

                <div id="password-fields-{{ $user->id }}" class="hidden">
                    <div class="mb-4">
                        <label class="block">Password Baru</label>
                        <div class="relative">
                            <input type="password" name="password" id="password-{{ $user->id }}"
                                class="w-full border p-2 rounded @error('password') border-red-500 @enderror">
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
                            <input type="password" name="password_confirmation"
                                id="password-confirmation-{{ $user->id }}" class="w-full border p-2 rounded">
                            <button type="button"
                                onclick="togglePassword('password-confirmation-{{ $user->id }}', 'toggle-icon-confirm-{{ $user->id }}')"
                                class="absolute right-2 top-2 text-sm text-gray-600">
                                <i id="toggle-icon-confirm-{{ $user->id }}" class="fa-regular fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" onclick="backToMainForm('{{ $user->id }}')"
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        Kembali
                    </button>
                    <button type="button" id="verify-code-btn-{{ $user->id }}" onclick="verifyCode('{{ $user->id }}')"
                        class="bg-blue-600 text-white px-4 py-2 rounded">
                        Verifikasi Kode
                    </button>
                    <button type="button" id="submit-btn-{{ $user->id }}" onclick="submitPasswordChange('{{ $user->id }}')"
                        class="bg-green-600 text-white px-4 py-2 rounded hidden">
                        Simpan Password Baru
                    </button>
                </div>
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

    function togglePasswordChange(userId) {
        // Sembunyikan form utama
        document.getElementById(`main-form-${userId}`).classList.add('hidden');

        // Tampilkan form password
        document.getElementById(`password-form-${userId}`).classList.remove('hidden');
        
        // Generate kode random
        const randomCode = generateRandomCode();
        document.getElementById(`random-code-${userId}`).value = randomCode;
        document.getElementById(`display-code-${userId}`).textContent = randomCode;

        // Reset state
        document.getElementById(`verify-code-btn-${userId}`).classList.remove('hidden');
        document.getElementById(`submit-btn-${userId}`).classList.add('hidden');
        document.getElementById(`password-fields-${userId}`).classList.add('hidden');
        document.getElementById(`code-error-${userId}`).classList.add('hidden');
        document.getElementById(`verification-input-${userId}`).value = '';
    }

    function backToMainForm(userId) {
        // Sembunyikan form password
        document.getElementById(`password-form-${userId}`).classList.add('hidden');

        // Tampilkan form utama
        document.getElementById(`main-form-${userId}`).classList.remove('hidden');

        // Reset form input
        document.getElementById(`password-${userId}`).value = '';
        document.getElementById(`password-confirmation-${userId}`).value = '';
        document.getElementById(`verification-input-${userId}`).value = '';
    }

    function generateRandomCode() {
        // Generate kode random 6 digit
        return Math.floor(100000 + Math.random() * 900000).toString();
    }

    function verifyCode(userId) {
        const expectedCode = document.getElementById(`random-code-${userId}`).value;
        const inputCode = document.getElementById(`verification-input-${userId}`).value;
        
        if (inputCode === expectedCode) {
            // Kode benar, tampilkan form password
            document.getElementById(`password-fields-${userId}`).classList.remove('hidden');
            document.getElementById(`verify-code-btn-${userId}`).classList.add('hidden');
            document.getElementById(`submit-btn-${userId}`).classList.remove('hidden');
            document.getElementById(`code-error-${userId}`).classList.add('hidden');
        } else {
            // Kode salah, tampilkan pesan error
            document.getElementById(`code-error-${userId}`).classList.remove('hidden');
        }
    }

    function submitPasswordChange(userId) {
        const password = document.getElementById(`password-${userId}`).value;
        const passwordConfirmation = document.getElementById(`password-confirmation-${userId}`).value;

        // Validasi password
        if (!password) {
            alert('Password tidak boleh kosong');
            return;
        }

        if (password !== passwordConfirmation) {
            alert('Konfirmasi password tidak cocok');
            return;
        }

        // Submit form
        document.getElementById(`form-edit-user-${userId}`).submit();
    }
</script>
