<section class="testimonial-section bg-gradient-to-r from-purple-900 to-purple-700 p-8 rounded-xl shadow-xl">
    <div class="container mx-auto">
        <h4 class="text-white text-2xl font-bold mb-6 flex items-center">
            <i class="fas fa-comment-dots mr-3 text-yellow-400 animate-pulse"></i>
            Beri Testimoni Anda
        </h4>

        {{-- @if (session('success'))
            <div class="bg-green-600 text-white px-5 py-4 mb-8 rounded-lg shadow-md flex items-center">
                <i class="fas fa-check-circle text-xl mr-3"></i>
                <div> --}}
        {{-- <p class="font-medium">{{ session('success') }}</p> --}}
        {{-- <p class="text-sm text-green-100 mt-1">Testimonial Anda akan ditampilkan setelah disetujui admin.</p> --}}
        {{-- </div>
            </div>
        @endif --}}

        <form id="testimoniForm" action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6" onsubmit="return validateForm()">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama" class="block text-white text-sm font-medium mb-2">Nama Anda <span
                            class="text-red-300">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-purple-300"></i>
                        </div>
                        <input type="text" name="nama" id="nama" placeholder="Masukkan nama lengkap" required
                            class="w-full pl-10 px-4 py-3 rounded-lg bg-white/10 text-white border border-white/30 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/50 focus:outline-none placeholder-white/50">
                    </div>
                    @error('nama')
                        <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="kota" class="block text-white text-sm font-medium mb-2">Kota Anda (Opsional)</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-purple-300"></i>
                        </div>
                        <input type="text" name="kota" id="kota" placeholder="Masukkan kota asal"
                            class="w-full pl-10 px-4 py-3 rounded-lg bg-white/10 text-white border border-white/30 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/50 focus:outline-none placeholder-white/50">
                    </div>
                    @error('kota')
                        <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="pesan" class="block text-white text-sm font-medium mb-2">Pesan Anda <span
                        class="text-red-300">*</span></label>
                <div class="relative">
                    <div class="absolute top-3 left-3 flex items-start pointer-events-none">
                        <i class="fas fa-quote-left text-purple-300"></i>
                    </div>
                    <textarea name="pesan" id="pesan" placeholder="Bagaimana pengalaman Anda di Nusantara Edupark?" rows="5"
                        required
                        class="w-full pl-10 px-4 py-3 rounded-lg bg-white/10 text-white border border-white/30 focus:border-yellow-400 focus:ring-2 focus:ring-yellow-400/50 focus:outline-none placeholder-white/50"></textarea>
                </div>
                @error('pesan')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-white text-sm font-medium mb-2">Rating <span
                        class="text-red-300">*</span></label>
                <div class="star-rating flex flex-row-reverse justify-end space-x-3 space-x-reverse text-3xl">
                    <input type="radio" id="star5" name="rating" value="5" class="hidden">
                    <label for="star5"
                        class="cursor-pointer text-gray-300 hover:text-yellow-400 transition-colors duration-200">★</label>

                    <input type="radio" id="star4" name="rating" value="4" class="hidden">
                    <label for="star4"
                        class="cursor-pointer text-gray-300 hover:text-yellow-400 transition-colors duration-200">★</label>

                    <input type="radio" id="star3" name="rating" value="3" class="hidden">
                    <label for="star3"
                        class="cursor-pointer text-gray-300 hover:text-yellow-400 transition-colors duration-200">★</label>

                    <input type="radio" id="star2" name="rating" value="2" class="hidden">
                    <label for="star2"
                        class="cursor-pointer text-gray-300 hover:text-yellow-400 transition-colors duration-200">★</label>

                    <input type="radio" id="star1" name="rating" value="1" class="hidden">
                    <label for="star1"
                        class="cursor-pointer text-gray-300 hover:text-yellow-400 transition-colors duration-200">★</label>
                </div>
                <div id="ratingError" class="hidden text-red-300 text-sm mt-1">Mohon pilih rating Anda</div>
                @error('rating')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="foto" class="block text-white text-sm font-medium mb-2">Foto Anda (Opsional)</label>
                <div class="mt-1 flex items-center">
                    <div id="photoPreview"
                        class="hidden w-16 h-16 rounded-full bg-white/10 flex items-center justify-center mr-4 overflow-hidden">
                        <img id="previewImage" src="#" class="w-full h-full object-cover">
                    </div>
                    <label for="foto"
                        class="cursor-pointer bg-white/10 hover:bg-white/20 py-2 px-4 border border-white/30 rounded-lg flex items-center transition-colors duration-200">
                        <i class="fas fa-camera mr-2 text-purple-300"></i>
                        <span class="text-white text-sm">Pilih Foto</span>
                        <input type="file" name="foto" id="foto" accept="image/*" class="hidden"
                            onchange="previewPhoto(this)">
                    </label>
                </div>
                <p class="text-white/70 text-xs mt-2">Format: JPG, PNG, JPEG. Maks: 2MB</p>
                @error('foto')
                    <p class="text-red-300 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="g-recaptcha" id="recaptcha" data-sitekey="{{ config('services.recaptcha.site') }}"></div>
            <div id="captchaError" class="hidden text-red-300 text-sm">Mohon centang captcha</div>

            <button type="submit"
                class="w-full md:w-auto bg-yellow-500 hover:bg-yellow-600 text-black font-semibold px-8 py-4 rounded-lg transition-all shadow hover:shadow-lg transform hover:-translate-y-1 flex items-center justify-center">
                <i class="fas fa-paper-plane mr-2"></i> Kirim Testimoni
            </button>
        </form>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const starContainer = document.querySelector('.star-rating');
        const stars = document.querySelectorAll('.star-rating label');

        stars.forEach((star) => {
            star.addEventListener('click', function() {
                // Mendapatkan semua label bintang sebelumnya (untuk sistem rating dari kanan ke kiri)
                let prevStars = [];
                let nextStar = this;
                while (nextStar) {
                    prevStars.push(nextStar);
                    nextStar = nextStar.nextElementSibling;
                    if (nextStar && nextStar.tagName !== 'LABEL') break;
                }

                // Reset semua bintang dulu
                stars.forEach(s => s.classList.remove('text-yellow-400'));

                // Mewarnai bintang yang dipilih dan semua sebelumnya
                prevStars.forEach(s => s.classList.add('text-yellow-400'));

                // Set nilai rating (angka bintang yang diklik)
                const clickedInput = document.getElementById(this.getAttribute('for'));
                if (clickedInput) {
                    clickedInput.checked = true;
                }

                // Sembunyikan pesan error jika ada
                document.getElementById('ratingError').classList.add('hidden');
            });
        });

        // Efek hover menggunakan event delegation
        starContainer.addEventListener('mouseover', function(e) {
            if (e.target.tagName === 'LABEL') {
                const hoverStar = e.target;

                // Mendapatkan semua bintang yang harus dihover
                let starsToHover = [];
                let currentStar = hoverStar;

                // Mengumpulkan bintang ini dan semua sebelumnya
                while (currentStar) {
                    if (currentStar.tagName === 'LABEL') {
                        starsToHover.push(currentStar);
                    }
                    currentStar = currentStar.nextElementSibling;
                }

                // Tambahkan kelas hover
                stars.forEach(star => {
                    if (starsToHover.includes(star)) {
                        star.classList.add('text-yellow-400');
                    } else if (!star.classList.contains('active')) {
                        star.classList.remove('text-yellow-400');
                    }
                });
            }
        });

        // Reset efek hover saat mouse keluar
        starContainer.addEventListener('mouseleave', function() {
            // Kembalikan status aktif berdasarkan rating yang dipilih
            stars.forEach(star => {
                const input = document.getElementById(star.getAttribute('for'));
                if (input && input.checked) {
                    // Tetap highlight bintang yang sudah dipilih dan sebelumnya
                    let activeStars = [];
                    let currentStar = star;
                    while (currentStar) {
                        if (currentStar.tagName === 'LABEL') {
                            activeStars.push(currentStar);
                        }
                        currentStar = currentStar.nextElementSibling;
                    }

                    stars.forEach(s => {
                        if (activeStars.includes(s)) {
                            s.classList.add('text-yellow-400');
                        } else {
                            s.classList.remove('text-yellow-400');
                        }
                    });
                    return;
                }
            });

            // Jika tidak ada rating yang dipilih, hapus semua highlight
            const checkedInput = document.querySelector('input[name="rating"]:checked');
            if (!checkedInput) {
                stars.forEach(s => s.classList.remove('text-yellow-400'));
            }
        });
    });

    function previewPhoto(input) {
        const preview = document.getElementById('photoPreview');
        const previewImg = document.getElementById('previewImage');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.classList.remove('hidden');
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function validateForm() {
        let isValid = true;

        // Validate rating
        const checkedRating = document.querySelector('input[name="rating"]:checked');
        const ratingError = document.getElementById('ratingError');

        if (!checkedRating) {
            ratingError.classList.remove('hidden');
            isValid = false;
        } else {
            ratingError.classList.add('hidden');
        }

        // Validate reCAPTCHA
        const recaptchaResponse = grecaptcha.getResponse();
        const captchaError = document.getElementById('captchaError');

        if (recaptchaResponse.length === 0) {
            captchaError.classList.remove('hidden');
            isValid = false;
        } else {
            captchaError.classList.add('hidden');
        }

        return isValid;
    }
</script>
