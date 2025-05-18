<div id="create-user-modal" class="fixed inset-0 bg-black bg-opacity-40 backdrop-blur-sm flex items-center justify-center z-50 hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-xl mx-auto relative">
        <button onclick="closeCreateModal()"
            class="absolute top-2 right-2 text-gray-500 hover:text-red-600 text-2xl">&times;</button>

        <h1 class="text-xl font-bold mb-6 text-center">Tambah User Baru</h1>

        <!-- Step Indicator -->
        <div class="flex justify-center mb-6">
            <div class="flex items-center">
                <div id="step-1-indicator" class="w-8 h-8 rounded-full bg-primary-600 text-white flex items-center justify-center font-semibold">1</div>
                <div class="w-10 h-1 bg-gray-300" id="line-1-2"></div>
                <div id="step-2-indicator" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold">2</div>
                <div class="w-10 h-1 bg-gray-300" id="line-2-3"></div>
                <div id="step-3-indicator" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold">3</div>
                <div class="w-10 h-1 bg-gray-300" id="line-3-4"></div>
                <div id="step-4-indicator" class="w-8 h-8 rounded-full bg-gray-300 text-gray-600 flex items-center justify-center font-semibold">4</div>
            </div>
        </div>

        <form id="multi-step-form" action="{{ route('users.store') }}" method="POST">
            @csrf
            <!-- Step 1: Nama -->
            <div id="step-1" class="step-content">
                <div class="mb-4">
                    <label class="block">Nama</label>
                    <input type="text" name="name" id="user-name" value="{{ old('name') }}"
                        class="w-full border p-2 rounded @error('name') border-red-500 @enderror" required>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <input type="hidden" name="role" id="user-role" value="ADMIN">
                    <!-- Role akan otomatis ADMIN saat pengguna dibuat -->
                </div>

                <div class="mb-4">
                    <input type="hidden" name="status" id="user-status" value="AKTIF">
                    <!-- Status akan otomatis AKTIF saat pengguna dibuat -->
                </div>

                <div class="flex justify-end space-x-2">
                    <button type="button" onclick="nextStep(1, 2)" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Lanjut
                    </button>
                    <button type="button" onclick="closeCreateModal()"
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        Batal
                    </button>
                </div>
            </div>

            <!-- Step 2: Email & Kirim Kode Verifikasi -->
            <div id="step-2" class="step-content hidden">
                <div class="mb-4">
                    <label class="block">Email</label>
                    <input type="email" name="email" id="user-email" value="{{ old('email') }}"
                        class="w-full border p-2 rounded @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                    <p class="text-sm text-gray-500 mt-1">Kode verifikasi akan dikirimkan ke email ini.</p>
                </div>

                <div id="verification-request" class="flex items-center space-x-2 mt-4">
                    <button type="button" id="send-verification-btn" onclick="sendVerificationCode()" 
                        class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded">
                        Kirim Kode Verifikasi
                    </button>
                    <span id="verification-message" class="text-sm text-gray-500 hidden">Mengirim kode verifikasi...</span>
                </div>

                <div id="verification-sent-message" class="mt-4 text-green-600 text-sm hidden">
                    Kode verifikasi telah dikirim ke email Anda. Silakan cek kotak masuk atau folder spam Anda.
                </div>
                
                <div id="verification-error-message" class="mt-4 text-red-600 text-sm hidden">
                    Terjadi kesalahan saat mengirim kode verifikasi. Silakan coba lagi.
                </div>

                <div class="flex justify-between space-x-2 mt-6">
                    <button type="button" onclick="prevStep(2, 1)" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        Kembali
                    </button>
                    <button type="button" id="step2-next-btn" onclick="nextStep(2, 3)" class="bg-blue-600 text-white px-4 py-2 rounded" disabled>
                        Lanjut
                    </button>
                </div>
            </div>

            <!-- Step 3: Verifikasi Kode PIN -->
            <div id="step-3" class="step-content hidden">
                <div class="mb-4">
                    <label class="block mb-3">Masukkan Kode Verifikasi</label>
                    <p class="text-sm text-gray-600 mb-4">Kode verifikasi 6 digit telah dikirim ke email Anda. Masukkan kode tersebut di bawah ini.</p>
                    
                    <div class="flex justify-center space-x-2 mb-4">
                        <input type="text" id="code-1" maxlength="1" class="verification-code-input w-12 h-12 text-center text-xl font-bold border rounded-lg" required oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length === 1) document.getElementById('code-2').focus()">
                        <input type="text" id="code-2" maxlength="1" class="verification-code-input w-12 h-12 text-center text-xl font-bold border rounded-lg" required oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length === 1) document.getElementById('code-3').focus()">
                        <input type="text" id="code-3" maxlength="1" class="verification-code-input w-12 h-12 text-center text-xl font-bold border rounded-lg" required oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length === 1) document.getElementById('code-4').focus()">
                        <input type="text" id="code-4" maxlength="1" class="verification-code-input w-12 h-12 text-center text-xl font-bold border rounded-lg" required oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length === 1) document.getElementById('code-5').focus()">
                        <input type="text" id="code-5" maxlength="1" class="verification-code-input w-12 h-12 text-center text-xl font-bold border rounded-lg" required oninput="this.value=this.value.replace(/[^0-9]/g,''); if(this.value.length === 1) document.getElementById('code-6').focus()">
                        <input type="text" id="code-6" maxlength="1" class="verification-code-input w-12 h-12 text-center text-xl font-bold border rounded-lg" required oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                    </div>
                    <input type="hidden" name="full_verification_code" id="full-verification-code">
                    <input type="hidden" name="email_verification_id" id="email-verification-id">
                    <p id="verification-code-error" class="text-red-500 text-sm mt-1 hidden"></p>
                    
                    <div class="text-center">
                        <p class="text-sm text-gray-600 mb-2">Tidak menerima kode?</p>
                        <button type="button" onclick="resendVerificationCode()" class="text-primary-600 hover:text-primary-800 text-sm font-medium">
                            Kirim Ulang Kode
                        </button>
                        <div id="countdown-timer" class="text-sm text-gray-500 mt-1 hidden">
                            Kirim ulang tersedia dalam <span id="countdown">60</span> detik
                        </div>
                    </div>
                </div>

                <div class="flex justify-between space-x-2 mt-6">
                    <button type="button" onclick="prevStep(3, 2)" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        Kembali
                    </button>
                    <button type="button" id="verify-code-btn" onclick="verifyCode()" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Verifikasi Kode
                    </button>
                </div>
            </div>

            <!-- Step 4: Password dan Konfirmasi Password -->
            <div id="step-4" class="step-content hidden">
                <div class="mb-4">
                    <label class="block">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="create-password"
                            class="w-full border p-2 rounded @error('password') border-red-500 @enderror"
                            required>
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
                        <input type="password" name="password_confirmation" id="create-password-confirmation" class="w-full border p-2 rounded"
                            required>
                        <button type="button"
                            onclick="togglePassword('create-password-confirmation', 'toggle-icon-confirm')"
                            class="absolute right-2 top-2 text-sm text-gray-600">
                            <i id="toggle-icon-confirm" class="fa-regular fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="flex justify-between space-x-2 mt-6">
                    <button type="button" onclick="prevStep(4, 3)" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        Kembali
                    </button>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">
                        Simpan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Toggle Password Visibility
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

    // Close modal
    function closeCreateModal() {
        document.getElementById('create-user-modal').classList.add('hidden');
        resetForm();
    }

    // Multi-step form navigation
    function nextStep(currentStep, nextStep) {
        // Validation for each step
        if (currentStep === 1) {
            const name = document.getElementById('user-name').value;
            const role = document.getElementById('user-role').value;
            const status = document.getElementById('user-status').value;
            
            if (!name || !role || !status) {
                alert('Silakan lengkapi semua kolom pada langkah ini.');
                return;
            }
        } else if (currentStep === 2) {
            const email = document.getElementById('user-email').value;
            if (!email) {
                alert('Silakan masukkan email Anda.');
                return;
            }
            // Verifikasi email sudah harus dikirim sebelum lanjut
        }

        // Hide current step
        document.getElementById(`step-${currentStep}`).classList.add('hidden');
        // Show next step
        document.getElementById(`step-${nextStep}`).classList.remove('hidden');
        
        // Update indicators
        updateStepIndicators(nextStep);
    }

    function prevStep(currentStep, prevStep) {
        // Hide current step
        document.getElementById(`step-${currentStep}`).classList.add('hidden');
        // Show previous step
        document.getElementById(`step-${prevStep}`).classList.remove('hidden');
        
        // Update indicators
        updateStepIndicators(prevStep);
    }

    function updateStepIndicators(activeStep) {
        // Reset all indicators to inactive
        for (let i = 1; i <= 4; i++) {
            const indicator = document.getElementById(`step-${i}-indicator`);
            if (i <= activeStep) {
                indicator.classList.remove('bg-gray-300', 'text-gray-600');
                indicator.classList.add('bg-primary-600', 'text-white');
            } else {
                indicator.classList.remove('bg-primary-600', 'text-white');
                indicator.classList.add('bg-gray-300', 'text-gray-600');
            }
        }
        
        // Update connector lines
        for (let i = 1; i <= 3; i++) {
            const line = document.getElementById(`line-${i}-${i+1}`);
            if (i < activeStep) {
                line.classList.remove('bg-gray-300');
                line.classList.add('bg-primary-600');
            } else {
                line.classList.remove('bg-primary-600');
                line.classList.add('bg-gray-300');
            }
        }
    }

    // Send verification code
    function sendVerificationCode() {
        const email = document.getElementById('user-email').value;
        const name = document.getElementById('user-name').value;
        
        if (!email) {
            alert('Silakan masukkan email terlebih dahulu.');
            return;
        }
        
        // Sembunyikan pesan error sebelumnya jika ada
        document.getElementById('verification-error-message').classList.add('hidden');
        
        // Tampilkan pesan loading
        document.getElementById('verification-message').classList.remove('hidden');
        document.getElementById('send-verification-btn').disabled = true;
        
        // Dapatkan CSRF token dari meta tag
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
        
        if (!csrfToken) {
            console.error('CSRF token tidak ditemukan. Pastikan meta tag csrf-token ada di layout Anda.');
            alert('Terjadi kesalahan: CSRF token tidak ditemukan');
            document.getElementById('verification-message').classList.add('hidden');
            document.getElementById('send-verification-btn').disabled = false;
            return;
        }
        
        console.log('Mengirim permintaan ke API dengan data:', { email, name });
        
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
        .then(response => {
            console.log('Response status:', response.status);
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            
            // Sembunyikan pesan loading
            document.getElementById('verification-message').classList.add('hidden');
            
            if (data.success) {
                // Tampilkan pesan sukses
                document.getElementById('verification-sent-message').classList.remove('hidden');
                // Simpan ID verifikasi
                document.getElementById('email-verification-id').value = data.verification_id;
                // Aktifkan tombol next
                document.getElementById('step2-next-btn').disabled = false;
                
                // Mulai timer countdown
                startCountdownTimer();
            } else {
                // Tampilkan pesan error
                document.getElementById('verification-error-message').classList.remove('hidden');
                document.getElementById('verification-error-message').textContent = data.message || 'Terjadi kesalahan saat mengirim kode verifikasi. Silakan coba lagi.';
                document.getElementById('send-verification-btn').disabled = false;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            
            // Sembunyikan pesan loading
            document.getElementById('verification-message').classList.add('hidden');
            
            // Tampilkan pesan error
            document.getElementById('verification-error-message').classList.remove('hidden');
            document.getElementById('send-verification-btn').disabled = false;
        });
    }

    // Resend verification code
    function resendVerificationCode() {
        sendVerificationCode();
    }

    // Start countdown timer for resend button
    function startCountdownTimer() {
        let secondsLeft = 60;
        const countdownElement = document.getElementById('countdown');
        const countdownTimerElement = document.getElementById('countdown-timer');
        
        countdownTimerElement.classList.remove('hidden');
        countdownElement.textContent = secondsLeft;
        
        const countdownInterval = setInterval(() => {
            secondsLeft--;
            countdownElement.textContent = secondsLeft;
            
            if (secondsLeft <= 0) {
                clearInterval(countdownInterval);
                countdownTimerElement.classList.add('hidden');
            }
        }, 1000);
    }

    // Verify PIN code
    function verifyCode() {
        // Kumpulkan kode verifikasi
        let verificationCode = '';
        let isComplete = true;
        
        for (let i = 1; i <= 6; i++) {
            const digit = document.getElementById(`code-${i}`).value;
            if (!digit) {
                isComplete = false;
            }
            verificationCode += digit;
        }
        
        if (!isComplete) {
            document.getElementById('verification-code-error').textContent = 'Silakan masukkan kode verifikasi 6 digit';
            document.getElementById('verification-code-error').classList.remove('hidden');
            return;
        }
        
        // Sembunyikan pesan error
        document.getElementById('verification-code-error').classList.add('hidden');
        
        // Simpan kode lengkap
        document.getElementById('full-verification-code').value = verificationCode;
        
        // Verifikasi kode
        fetch('/api/verify-code', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                verification_id: document.getElementById('email-verification-id').value,
                code: verificationCode
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Move to next step if verification successful
                nextStep(3, 4);
            } else {
                document.getElementById('verification-code-error').textContent = data.message || 'Kode verifikasi tidak valid';
                document.getElementById('verification-code-error').classList.remove('hidden');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('verification-code-error').textContent = 'Terjadi kesalahan saat memverifikasi kode';
            document.getElementById('verification-code-error').classList.remove('hidden');
        });
    }

    // Auto-focus next input in verification code
    document.addEventListener('DOMContentLoaded', function() {
        setupVerificationCodeInputs();
        setupPasteSupport();
    });

    // Setup verification code inputs
    function setupVerificationCodeInputs() {
        // Setup auto focus untuk input kode verifikasi
        for (let i = 1; i <= 6; i++) {
            const input = document.getElementById(`code-${i}`);
            
            if (!input) continue;
            
            // Input akan otomatis berpindah ke input berikutnya melalui atribut oninput yang sudah ditambahkan
            
            // Tambahkan event listener untuk backspace dan tombol panah
            input.addEventListener('keydown', function(e) {
                // Jika tombol backspace ditekan dan input kosong, fokus ke input sebelumnya
                if (e.key === 'Backspace' && this.value.length === 0 && i > 1) {
                    document.getElementById(`code-${i-1}`).focus();
                }
                
                // Jika tombol panah kiri ditekan, fokus ke input sebelumnya
                if (e.key === 'ArrowLeft' && i > 1) {
                    e.preventDefault();
                    document.getElementById(`code-${i-1}`).focus();
                }
                
                // Jika tombol panah kanan ditekan, fokus ke input berikutnya
                if (e.key === 'ArrowRight' && i < 6) {
                    e.preventDefault();
                    document.getElementById(`code-${i+1}`).focus();
                }
            });
        }
    }

    // Tambahkan support untuk copy-paste kode
    function setupPasteSupport() {
        // Tambahkan event listener untuk paste pada input pertama
        const firstInput = document.getElementById('code-1');
        if (firstInput) {
            firstInput.addEventListener('paste', function(e) {
                e.preventDefault();
                
                // Ambil teks yang di-paste
                const pasteData = e.clipboardData.getData('text');
                
                // Filter hanya angka
                const filteredData = pasteData.replace(/[^0-9]/g, '');
                
                // Batasi hanya 6 digit pertama
                const digits = filteredData.slice(0, 6);
                
                // Masukkan ke dalam input satu per satu
                for (let i = 0; i < digits.length; i++) {
                    const input = document.getElementById(`code-${i+1}`);
                    if (input) {
                        input.value = digits[i];
                    }
                }
                
                // Fokus ke input terakhir yang diisi
                if (digits.length > 0 && digits.length < 6) {
                    const nextInput = document.getElementById(`code-${digits.length+1}`);
                    if (nextInput) {
                        nextInput.focus();
                    }
                } else if (digits.length === 6) {
                    document.getElementById('code-6').focus();
                }
            });
        }
    }

    // Reset form when modal is closed
    function resetForm() {
        document.getElementById('multi-step-form').reset();
        
        // Hide all steps except the first one
        for (let i = 2; i <= 4; i++) {
            document.getElementById(`step-${i}`).classList.add('hidden');
        }
        document.getElementById('step-1').classList.remove('hidden');
        
        // Reset step indicators
        updateStepIndicators(1);
        
        // Reset verification messages
        document.getElementById('verification-message').classList.add('hidden');
        document.getElementById('verification-sent-message').classList.add('hidden');
        document.getElementById('send-verification-btn').disabled = false;
        document.getElementById('step2-next-btn').disabled = true;
    }
</script>