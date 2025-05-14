<!-- Footer -->
<footer class="bg-[rgb(33,15,55)] text-white pt-12 pb-6">
    <div class="container mx-auto px-4 md:px-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="mb-8 md:mb-0">
                <div class="flex items-center space-x-2 mb-4">
                    <i class="fas fa-leaf text-green-400 text-2xl"></i>
                    <span class="font-bold text-xl text-white">Nusantara Edupark</span>
                </div>
                <p class="text-gray-400 mb-4">Tempat wisata edukasi terbaik di bidang pertanian,
                    peternakan, dan perkebunan.</p>
                <div class="flex space-x-4">
                    <a href="https://www.facebook.com/p/Nusantara-Edupark-100070478678910/"
                        class="text-gray-400 hover:text-white transition-all">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/nusantaraedupark/"
                        class="text-gray-400 hover:text-white transition-all">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.youtube.com/@nusantaraedupark6539"
                        class="text-gray-400 hover:text-white transition-all">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="mb-8 md:mb-0">
                <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                <ul class="space-y-2">
                    <li><a href="{{ route('homepage') }}"
                            class="text-gray-400 hover:text-white transition-all">Beranda</a></li>
                    <li><a href="{{ route('services') }}"
                            class="text-gray-400 hover:text-white transition-all">Layanan</a></li>
                    <li><a href="{{ route('about-us') }}" class="text-gray-400 hover:text-white transition-all">Tentang
                            Kami</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="mb-8 md:mb-0">
                <h4 class="text-lg font-semibold mb-4">Kontak</h4>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <i class="fas fa-map-marker-alt text-green-400 mt-1 mr-3"></i>
                        <span class="text-gray-400">Jl. Raya Dungus, Kelurahan Munggut, Mojopurno, Kec. Wungu, Kabupaten
                            Madiun, Jawa Timur 63181</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-phone-alt text-green-400 mr-3"></i>
                        <span class="text-gray-400">081939114933</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope text-green-400 mr-3"></i>
                        <span class="text-gray-400">info@nusantaraedupark.id</span>
                    </li>
                </ul>
            </div>

            <!-- Operation Hours -->
            <div>
                <h4 class="text-lg font-semibold mb-4">Jam Operasional</h4>
                <ul class="space-y-2">
                    <li class="flex justify-between">
                        <span class="text-gray-400">Senin - Jumat</span>
                        <span class="text-gray-400">08:30 - 16:30</span>
                    </li>
                    <li class="flex justify-between">
                        <span class="text-gray-400">Sabtu - Minggu</span>
                        <span class="text-gray-400">08:30 - 17:00</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="border-t border-gray-700 mt-10 pt-6">
            <div class="flex flex-col sm:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 sm:mb-0">© 2025 Nusantara Edupark. Hak Cipta Dilindungi.</p>

            </div>
        </div>
    </div>
</footer>
