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

            <!-- Step 2: Email -->
            <div id="step-2" class="step-content hidden">
                <div class="mb-4">
                    <label class="block">Email</label>
                    <input type="email" name="email" id="user-email" value="{{ old('email') }}"
                        class="w-full border p-2 rounded @error('email') border-red-500 @enderror" required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="verification_code" id="random-verification-code">

                <div class="flex justify-between space-x-2 mt-6">
                    <button type="button" onclick="prevStep(2, 1)" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
                        Kembali
                    </button>
                    <button type="button" onclick="nextStep(2, 3)" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Lanjut
                    </button>
                </div>
            </div>

            <!-- Step 3: Password dan Konfirmasi Password -->
            <div id="step-3" class="step-content hidden">
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
                    <button type="button" onclick="prevStep(3, 2)" class="bg-gray-300 text-gray-800 px-4 py-2 rounded">
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
            
            // Generate kode random saat pindah ke step berikutnya
            if (nextStep === 3) {
                const randomCode = generateRandomCode();
                document.getElementById('random-verification-code').value = randomCode;
            }
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
        for (let i = 1; i <= 3; i++) {
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
        for (let i = 1; i <= 2; i++) {
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

    // Generate random code
    function generateRandomCode() {
        // Generate kode random 6 digit
        return Math.floor(100000 + Math.random() * 900000).toString();
    }

    // Reset form when modal is closed
    function resetForm() {
        document.getElementById('multi-step-form').reset();
        
        // Hide all steps except the first one
        for (let i = 2; i <= 3; i++) {
            document.getElementById(`step-${i}`).classList.add('hidden');
        }
        document.getElementById('step-1').classList.remove('hidden');
        
        // Reset step indicators
        updateStepIndicators(1);
    }
</script>