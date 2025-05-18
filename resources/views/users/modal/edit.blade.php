<div id="modal-{{ $user->id }}"
    class="fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl mx-auto relative">
        <button onclick="document.getElementById('modal-{{ $user->id }}').classList.add('hidden')"
            class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-2xl">&times;</button>

        <h1 class="text-xl font-bold mb-6 text-center">Edit User</h1>

        <!-- Step Indicator untuk Ganti Password -->
        <div id="password-steps-{{ $user->id }}" class="flex justify-center mb-6 hidden">
            <div class="flex items-center">
                <div id="password-step-1-{{ $user->id }}"
                    class="w-8 h-8 rounded-full bg-primary-600 text-white flex items-center justify-center font-semibold">
                    1</div>
                <div class="w-10 h-1 bg-gray-300" id="password-line-1-2-{{ $user->id }}"></div>
                <div id="password-step-2-{{ $user->id }}"
                    class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold">
                    2</div>
                <div class="w-10 h-1 bg-gray-300" id="password-line-2-3-{{ $user->id }}"></div>
                <div id="password-step-3-{{ $user->id }}"
                    class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold">
                    3</div>
            </div>
        </div>

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

            <!-- Langkah 1: Verifikasi Password Lama -->
            <div id="password-step1-{{ $user->id }}" class="hidden">
                <h2 class="text-lg font-semibold mb-4">Verifikasi Password Lama</h2>
                <p class="text-sm text-gray-600 mb-4">Masukkan password lama Anda untuk verifikasi keamanan.</p>

                <div class="mb-4">
                    <label class="block">Password Lama</label>
                    <div class="relative">
                        <input type="password" id="current-password-{{ $user->id }}"
                            class="w-full border p-2 rounded">
                        <button type="button"
                            onclick="togglePassword('current-password-{{ $user->id }}', 'toggle-current-{{ $user->id }}')"
                            class="absolute right-2 top-2 text-sm text-gray-600">
                            <i id="toggle-current-{{ $user->id }}" class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                    <p id="current-password-error-{{ $user->id }}" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" onclick="backToMainForm('{{ $user->id }}')"
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        Kembali
                    </button>
                    <button type="button" onclick="verifyCurrentPassword('{{ $user->id }}')"
                        class="bg-blue-600 text-white px-4 py-2 rounded">
                        Verifikasi
                    </button>
                </div>
            </div>

            <!-- Langkah 2: Verifikasi Email -->
            <div id="password-step2-{{ $user->id }}" class="hidden">
                <h2 class="text-lg font-semibold mb-4">Verifikasi Email</h2>
                <p class="text-sm text-gray-600 mb-4">Kami telah mengirimkan kode verifikasi ke email Anda. Masukkan
                    kode tersebut di bawah ini.</p>

                <div class="mb-4">
                    <button type="button" id="send-code-btn-{{ $user->id }}"
                        onclick="sendVerificationCodeForEdit('{{ $user->id }}', '{{ $user->name }}', '{{ $user->email }}')"
                        class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded">
                        Kirim Kode Verifikasi
                    </button>
                    <span id="sending-message-{{ $user->id }}" class="text-sm text-gray-500 ml-2 hidden">Mengirim
                        kode verifikasi...</span>
                </div>

                <div id="verification-sent-{{ $user->id }}" class="mt-4 text-green-600 text-sm hidden">
                    Kode verifikasi telah dikirim ke email Anda. Silakan cek kotak masuk atau folder spam Anda.
                </div>

                <div id="verification-error-{{ $user->id }}" class="mt-4 text-red-600 text-sm hidden">
                    Terjadi kesalahan saat mengirim kode verifikasi. Silakan coba lagi.
                </div>

                <div class="mb-6 mt-4">
                    <label class="block mb-2">Kode Verifikasi</label>
                    <div class="flex justify-center space-x-2 mb-4">
                        <input type="text" id="code-1-{{ $user->id }}" maxlength="1"
                            class="verification-code-input w-12 h-12 text-center text-xl border rounded-lg">
                        <input type="text" id="code-2-{{ $user->id }}" maxlength="1"
                            class="verification-code-input w-12 h-12 text-center text-xl border rounded-lg">
                        <input type="text" id="code-3-{{ $user->id }}" maxlength="1"
                            class="verification-code-input w-12 h-12 text-center text-xl border rounded-lg">
                        <input type="text" id="code-4-{{ $user->id }}" maxlength="1"
                            class="verification-code-input w-12 h-12 text-center text-xl border rounded-lg">
                        <input type="text" id="code-5-{{ $user->id }}" maxlength="1"
                            class="verification-code-input w-12 h-12 text-center text-xl border rounded-lg">
                        <input type="text" id="code-6-{{ $user->id }}" maxlength="1"
                            class="verification-code-input w-12 h-12 text-center text-xl border rounded-lg">
                    </div>
                    <input type="hidden" id="verification-id-{{ $user->id }}">
                    <input type="hidden" id="full-code-{{ $user->id }}">
                    <p id="verification-code-error-{{ $user->id }}" class="text-red-500 text-sm mt-1 hidden"></p>
                </div>

                <div class="flex justify-between mt-6">
                    <button type="button" onclick="prevPasswordStep('{{ $user->id }}', 2, 1)"
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        Kembali
                    </button>
                    <button type="button" id="verify-code-btn-{{ $user->id }}"
                        onclick="verifyCodeForEdit('{{ $user->id }}')"
                        class="bg-blue-600 text-white px-4 py-2 rounded">
                        Verifikasi Kode
                    </button>
                </div>
            </div>

            <!-- Langkah 3: Password Baru -->
            <div id="password-step3-{{ $user->id }}" class="hidden">
                <h2 class="text-lg font-semibold mb-4">Atur Password Baru</h2>
                <p class="text-sm text-gray-600 mb-4">Silakan masukkan password baru Anda.</p>

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

                <div class="flex justify-between mt-6">
                    <button type="button" onclick="prevPasswordStep('{{ $user->id }}', 3, 2)"
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        Kembali
                    </button>
                    <button type="button" onclick="submitPasswordChange('{{ $user->id }}')"
                        class="bg-green-600 text-white px-4 py-2 rounded">
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

        // Tampilkan step indicators dan form password step 1
        document.getElementById(`password-steps-${userId}`).classList.remove('hidden');
        document.getElementById(`password-step1-${userId}`).classList.remove('hidden');

        // Set step indicator active
        updatePasswordStepIndicators(userId, 1);
    }

    function backToMainForm(userId) {
        // Sembunyikan form password
        document.getElementById(`password-steps-${userId}`).classList.add('hidden');
        document.getElementById(`password-step1-${userId}`).classList.add('hidden');
        document.getElementById(`password-step2-${userId}`).classList.add('hidden');
        document.getElementById(`password-step3-${userId}`).classList.add('hidden');

        // Tampilkan form utama
        document.getElementById(`main-form-${userId}`).classList.remove('hidden');

        // Reset form input
        document.getElementById(`current-password-${userId}`).value = '';
        const codeInputs = document.querySelectorAll(`.verification-code-input`);
        codeInputs.forEach(input => {
            input.value = '';
        });
        document.getElementById(`password-${userId}`).value = '';
        document.getElementById(`password-confirmation-${userId}`).value = '';
    }

    function updatePasswordStepIndicators(userId, activeStep) {
        // Update step indicators
        for (let i = 1; i <= 3; i++) {
            const indicator = document.getElementById(`password-step-${i}-${userId}`);
            if (i <= activeStep) {
                indicator.classList.remove('bg-gray-300', 'text-gray-600');
                indicator.classList.add('bg-primary-600', 'text-white');
            } else {
                indicator.classList.remove('bg-primary-600', 'text-white');
                indicator.classList.add('bg-gray-300', 'text-gray-600');
            }
        }

        // Update connector lines
        for (let i = 1; i <= 2; i++) {
            const line = document.getElementById(`password-line-${i}-${i+1}-${userId}`);
            if (i < activeStep) {
                line.classList.remove('bg-gray-300');
                line.classList.add('bg-primary-600');
            } else {
                line.classList.remove('bg-primary-600');
                line.classList.add('bg-gray-300');
            }
        }
    }

    function verifyCurrentPassword(userId) {
        const currentPassword = document.getElementById(`current-password-${userId}`).value;

        if (!currentPassword) {
            document.getElementById(`current-password-error-${userId}`).textContent = 'Password tidak boleh kosong';
            document.getElementById(`current-password-error-${userId}`).classList.remove('hidden');
            return;
        }

        // Sembunyikan pesan error
        document.getElementById(`current-password-error-${userId}`).classList.add('hidden');

        // Tampilkan loading
        const verifyBtn = document.querySelector(`button[onclick="verifyCurrentPassword('${userId}')"]`);
        const originalText = verifyBtn.textContent;
        verifyBtn.textContent = "Memverifikasi...";
        verifyBtn.disabled = true;

        // Dapatkan CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        if (!csrfToken) {
            console.error('CSRF token tidak ditemukan');
            alert('Terjadi kesalahan: CSRF token tidak ditemukan');
            verifyBtn.textContent = originalText;
            verifyBtn.disabled = false;
            return;
        }

        // Kirim request verifikasi password
        fetch('/api/verify-current-password', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    user_id: userId,
                    password: currentPassword
                })
            })
            .then(response => response.json())
            .then(data => {
                verifyBtn.textContent = originalText;
                verifyBtn.disabled = false;

                if (data.success) {
                    // Password benar, lanjut ke langkah berikutnya
                    nextPasswordStep(userId, 1, 2);
                } else {
                    // Password salah, tampilkan pesan error
                    document.getElementById(`current-password-error-${userId}`).textContent = data.message ||
                        'Password tidak valid';
                    document.getElementById(`current-password-error-${userId}`).classList.remove('hidden');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                verifyBtn.textContent = originalText;
                verifyBtn.disabled = false;

                document.getElementById(`current-password-error-${userId}`).textContent =
                    'Terjadi kesalahan saat verifikasi password';
                document.getElementById(`current-password-error-${userId}`).classList.remove('hidden');
            });
    }

    function nextPasswordStep(userId, currentStep, nextStep) {
        // Sembunyikan step saat ini
        document.getElementById(`password-step${currentStep}-${userId}`).classList.add('hidden');
        // Tampilkan step berikutnya
        document.getElementById(`password-step${nextStep}-${userId}`).classList.remove('hidden');

        // Update indikator
        updatePasswordStepIndicators(userId, nextStep);
    }

    function prevPasswordStep(userId, currentStep, prevStep) {
        // Sembunyikan step saat ini
        document.getElementById(`password-step${currentStep}-${userId}`).classList.add('hidden');
        // Tampilkan step sebelumnya
        document.getElementById(`password-step${prevStep}-${userId}`).classList.remove('hidden');

        // Update indikator
        updatePasswordStepIndicators(userId, prevStep);
    }

    function sendVerificationCodeForEdit(userId, name, email) {
        // Tampilkan pesan loading
        document.getElementById(`sending-message-${userId}`).classList.remove('hidden');
        document.getElementById(`send-code-btn-${userId}`).disabled = true;

        // Sembunyikan pesan error sebelumnya jika ada
        document.getElementById(`verification-error-${userId}`).classList.add('hidden');

        // Dapatkan CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        if (!csrfToken) {
            console.error('CSRF token tidak ditemukan');
            alert('Terjadi kesalahan: CSRF token tidak ditemukan');
            document.getElementById(`sending-message-${userId}`).classList.add('hidden');
            document.getElementById(`send-code-btn-${userId}`).disabled = false;
            return;
        }

        // Kirim permintaan ke API
        fetch('/api/send-verification-code', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    email: email,
                    name: name
                })
            })
            .then(response => response.json())
            .then(data => {
                // Sembunyikan pesan loading
                document.getElementById(`sending-message-${userId}`).classList.add('hidden');

                if (data.success) {
                    // Tampilkan pesan sukses
                    document.getElementById(`verification-sent-${userId}`).classList.remove('hidden');
                    document.getElementById(`verification-id-${userId}`).value = data.verification_id;

                    // Setup focus pada input kode
                    setupVerificationCodeInputs(userId);
                } else {
                    // Tampilkan pesan error
                    document.getElementById(`verification-error-${userId}`).classList.remove('hidden');
                    document.getElementById(`verification-error-${userId}`).textContent = data.message ||
                        'Terjadi kesalahan saat mengirim kode verifikasi';
                    document.getElementById(`send-code-btn-${userId}`).disabled = false;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById(`sending-message-${userId}`).classList.add('hidden');
                document.getElementById(`verification-error-${userId}`).classList.remove('hidden');
                document.getElementById(`send-code-btn-${userId}`).disabled = false;
            });
    }

    function setupVerificationCodeInputs(userId) {
        // Setup auto focus untuk input kode verifikasi
        for (let i = 1; i <= 6; i++) {
            const input = document.getElementById(`code-${i}-${userId}`);

            input.addEventListener('input', function() {
                // Pindah ke input berikutnya ketika angka dimasukkan
                if (this.value.length === 1 && i < 6) {
                    document.getElementById(`code-${i+1}-${userId}`).focus();
                }
            });

            input.addEventListener('keydown', function(e) {
                // Pindah ke input sebelumnya ketika backspace ditekan
                if (e.key === 'Backspace' && this.value.length === 0 && i > 1) {
                    document.getElementById(`code-${i-1}-${userId}`).focus();
                }
            });
        }
    }

    function verifyCodeForEdit(userId) {
        // Kumpulkan kode verifikasi
        let verificationCode = '';
        let isComplete = true;

        for (let i = 1; i <= 6; i++) {
            const digit = document.getElementById(`code-${i}-${userId}`).value;
            if (!digit) {
                isComplete = false;
            }
            verificationCode += digit;
        }

        if (!isComplete) {
            document.getElementById(`verification-code-error-${userId}`).textContent =
                'Silakan masukkan kode verifikasi 6 digit';
            document.getElementById(`verification-code-error-${userId}`).classList.remove('hidden');
            return;
        }

        // Sembunyikan pesan error
        document.getElementById(`verification-code-error-${userId}`).classList.add('hidden');

        // Simpan kode lengkap
        document.getElementById(`full-code-${userId}`).value = verificationCode;

        // Dapatkan CSRF token dan verification ID
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        const verificationId = document.getElementById(`verification-id-${userId}`).value;

        // Verifikasi kode
        fetch('/api/verify-code', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    verification_id: verificationId,
                    code: verificationCode
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Lanjut ke langkah berikutnya (password baru)
                    nextPasswordStep(userId, 2, 3);
                } else {
                    document.getElementById(`verification-code-error-${userId}`).textContent = data.message ||
                        'Kode verifikasi tidak valid';
                    document.getElementById(`verification-code-error-${userId}`).classList.remove('hidden');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById(`verification-code-error-${userId}`).textContent =
                    'Terjadi kesalahan saat memverifikasi kode';
                document.getElementById(`verification-code-error-${userId}`).classList.remove('hidden');
            });
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
