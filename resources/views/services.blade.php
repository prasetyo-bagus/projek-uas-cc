@extends('layouts.guest')

@section('content')
    <!-- Hero Section -->
    {{-- <section class="relative bg-purple-800 text-white py-32">
        <!-- Background Image dengan overlay -->
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ asset('storage/images/services/service-hero.jpg') }}');">
            <div class="absolute inset-0 bg-purple-900 opacity-75"></div>
        </div>

        <!-- Icon-icon dekoratif -->
        <div class="absolute inset-0 overflow-hidden opacity-10">
            <i class="fas fa-leaf absolute text-6xl" style="top: 15%; left: 10%;"></i>
            <i class="fas fa-seedling absolute text-5xl" style="top: 70%; right: 20%;"></i>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-5xl font-bold mb-6">Layanan Kami</h1>
                <p class="text-xl md:text-2xl text-gray-200">Berbagai layanan edukasi dan rekreasi untuk pengalaman wisata

                    berkesan</p>
            </div>
        </div>
        </div>
    </section> --}}

    <!-- Services Overview -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Pengalaman Wisata Edukatif</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Nusantara Edupark menawarkan berbagai layanan wisata edukatif
                    yang
                    dirancang untuk memberikan pengalaman belajar yang menyenangkan dan bermanfaat bagi pengunjung dari
                    segala usia.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <!-- Service 1 -->
                <div
                    class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group">
                    <div
                        class="bg-purple-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-purple-200 transition-all">
                        <i class="fas fa-seedling text-purple-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Edukasi Pertanian</h3>
                    <p class="text-gray-600 text-center mb-6">Program pembelajaran interaktif tentang pertanian modern dan
                        tradisional, termasuk teknik bertanam, berkebun, dan pemeliharaan tanaman.</p>
                    <a href="#agricultural"
                        class="text-purple-600 hover:text-purple-800 font-medium flex items-center justify-center">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 2 -->
                <div
                    class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group">
                    <div
                        class="bg-indigo-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-indigo-200 transition-all">
                        <i class="fas fa-horse text-indigo-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Peternakan Interaktif</h3>
                    <p class="text-gray-600 text-center mb-6">Pengalaman langsung berinteraksi dengan hewan ternak,
                        mempelajari cara perawatan, dan proses produksi hasil peternakan.</p>
                    <a href="#livestock"
                        class="text-indigo-600 hover:text-indigo-800 font-medium flex items-center justify-center">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <!-- Service 3 -->
                <div
                    class="bg-white p-6 rounded-xl shadow-md hover:shadow-xl transition-all transform hover:-translate-y-2 group">
                    <div
                        class="bg-violet-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6 group-hover:bg-violet-200 transition-all">
                        <i class="fas fa-tree text-violet-600 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-3 text-center">Wisata Perkebunan</h3>
                    <p class="text-gray-600 text-center mb-6">Wisata ke area perkebunan untuk mempelajari aneka tanaman,
                        proses panen, hingga pengolahan hasil perkebunan.</p>
                    <a href="#plantation"
                        class="text-violet-600 hover:text-violet-800 font-medium flex items-center justify-center">
                        Pelajari Lebih Lanjut <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Agricultural Education -->
    <section id="agricultural" class="py-16 bg-purple-50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 relative">
                        <span class="relative z-10">Edukasi Pertanian</span>
                        <div class="absolute -bottom-2 left-0 h-3 w-36 bg-purple-300 z-0"></div>
                    </h2>
                    <p class="text-gray-600 mb-6">
                        Program edukasi pertanian kami dirancang untuk memberikan pengetahuan dan keterampilan praktis dalam
                        bidang pertanian, mulai dari persiapan lahan, penanaman, perawatan, hingga panen.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="bg-purple-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Workshop Bertanam</h4>
                                <p class="text-gray-600 text-sm">Ikuti workshop cara menanam berbagai jenis sayuran dan
                                    tanaman pangan dengan metode modern dan organik.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-purple-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Area Praktek Pertanian</h4>
                                <p class="text-gray-600 text-sm">Area khusus untuk praktek langsung teknik bertanam dengan
                                    pendampingan dari ahli pertanian.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-purple-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Tur Pertanian</h4>
                                <p class="text-gray-600 text-sm">Kunjungan terpandu ke area pertanian untuk melihat berbagai
                                    teknik bertani modern dan tradisional.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-purple-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-purple-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Kelas Hidroponik dan Aquaponik</h4>
                                <p class="text-gray-600 text-sm">Pelajari teknologi bertani tanpa tanah dan kombinasi
                                    budidaya ikan dengan tanaman.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <img src="{{ asset('storage/layanan/peternakan.jpg') }}" alt="Edukasi Pertanian"
                        class="rounded-lg shadow-lg w-full h-auto object-cover h-96">
                </div>
            </div>
        </div>
    </section>

    <!-- Livestock Interaction -->
    <section id="livestock" class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="order-2 md:order-1">
                    <img src="{{ asset('storage/layanan/peternakan.jpg') }}" alt="Peternakan Interaktif"
                        class="rounded-lg shadow-lg w-full h-auto object-cover h-96">
                </div>
                <div class="order-1 md:order-2">
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 relative">
                        <span class="relative z-10">Peternakan Interaktif</span>
                        <div class="absolute -bottom-2 left-0 h-3 w-40 bg-indigo-300 z-0"></div>
                    </h2>
                    <p class="text-gray-600 mb-6">
                        Pengalaman langsung berinteraksi dengan hewan ternak dalam lingkungan yang aman dan terkontrol.
                        Pengunjung dapat mempelajari berbagai aspek peternakan secara interaktif dan seru.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="bg-indigo-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-indigo-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Memberi Makan Hewan</h4>
                                <p class="text-gray-600 text-sm">Kesempatan untuk memberi makan berbagai hewan ternak dengan
                                    panduan dari petugas.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-indigo-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-indigo-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Pemerahan Susu</h4>
                                <p class="text-gray-600 text-sm">Belajar dan praktek cara memerah susu sapi serta proses
                                    pengolahannya.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-indigo-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-indigo-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Animal Petting Zone</h4>
                                <p class="text-gray-600 text-sm">Area khusus untuk berinteraksi dengan hewan-hewan jinak
                                    seperti kelinci, kambing, dan domba.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-indigo-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-indigo-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Edukasi Peternakan</h4>
                                <p class="text-gray-600 text-sm">Sesi edukasi tentang berbagai aspek peternakan, termasuk
                                    pemeliharaan, breeding, dan kesehatan hewan.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Plantation Tours -->
    <section id="plantation" class="py-16 bg-violet-50">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 relative">
                        <span class="relative z-10">Wisata Perkebunan</span>
                        <div class="absolute -bottom-2 left-0 h-3 w-36 bg-violet-300 z-0"></div>
                    </h2>
                    <p class="text-gray-600 mb-6">
                        Jelajahi keindahan dan keanekaragaman tanaman di perkebunan kami. Pelajari siklus hidup tanaman,
                        teknik budidaya, dan manfaat berbagai jenis tanaman perkebunan.
                    </p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="bg-violet-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-violet-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Tur Kebun Buah</h4>
                                <p class="text-gray-600 text-sm">Kunjungan ke kebun buah untuk melihat berbagai jenis
                                    tanaman buah tropis dan cara pemeliharaannya.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-violet-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-violet-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Petik Buah Langsung</h4>
                                <p class="text-gray-600 text-sm">Pengalaman memetik buah langsung dari pohonnya saat musim
                                    panen (bergantung pada musim).</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-violet-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-violet-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Taman Herbal</h4>
                                <p class="text-gray-600 text-sm">Kunjungan ke taman tanaman obat untuk mempelajari berbagai
                                    jenis tanaman herbal dan manfaatnya.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-violet-100 rounded-full p-1 mt-1 mr-3">
                                <i class="fas fa-check text-violet-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-800">Workshop Pengolahan Hasil Perkebunan</h4>
                                <p class="text-gray-600 text-sm">Belajar cara mengolah hasil perkebunan menjadi produk
                                    bernilai tambah.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div>
                    <img src="{{ asset('storage/layanan/peternakan.jpg') }}" alt="Wisata Perkebunan"
                        class="rounded-lg shadow-lg w-full h-auto object-cover h-96">
                </div>
            </div>
        </div>
    </section>
@endsection