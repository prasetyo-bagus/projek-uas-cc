@extends('layouts.guest')

@section('content')
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Hero Section -->
    <section class="py-16 md:py-20 bg-gradient-to-br from-purple-800 to-indigo-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-20">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none"
                class="absolute w-full h-full">
                <path fill="#fff"
                    d="M0,128L48,133.3C96,139,192,149,288,149.3C384,149,480,139,576,144C672,149,768,171,864,165.3C960,160,1056,128,1152,122.7C1248,117,1344,139,1392,149.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </div>
        <div class="container mx-auto px-6 text-center relative z-10">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-3 drop-shadow-lg font-montserrat">Paket Wisata Nusantara Edupark</h1>
            <p class="text-lg md:text-xl text-white/90 mb-0 max-w-3xl mx-auto font-poppins">Pengalaman wisata edukatif yang menyenangkan untuk semua usia</p>
        </div>
    </section>

    <!-- Packets Grid -->
    <section class="py-14 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3 font-montserrat">Pilihan Paket Wisata</h2>
                <p class="text-gray-600 max-w-3xl mx-auto text-base font-poppins">Kami menawarkan berbagai paket wisata edukatif yang dirancang
                    untuk berbagai kebutuhan dan preferensi pengunjung.</p>
            </div>

            <div id="packets-container">
                @if ($packets->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($packets as $packet)
                            <div class="bg-white rounded-xl shadow-md overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 font-poppins">
                                <div class="relative h-[200px] sm:h-[220px] overflow-hidden group">
                                    <div class="absolute inset-0 flex items-center justify-center bg-gray-100">
                                        <img src="{{ asset('storage/' . $packet->image) }}" loading="lazy"
                                            class="w-full h-full object-cover transition-transform duration-700 ease-in-out group-hover:scale-110"
                                            alt="{{ $packet->title }}">
                                    </div>

                                    <button onclick="document.getElementById('imageModal-{{ $packet->id }}').showModal()"
                                            class="absolute z-10 top-3 right-3 bg-white/80 hover:bg-white text-purple-700 p-2 rounded-full shadow-md backdrop-blur-sm">
                                        <i class="fas fa-expand"></i>
                                    </button>

                                    <div class="absolute inset-0 z-[1] bg-gradient-to-t from-purple-900/80 to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end">
                                        <div class="w-full flex justify-between items-center px-6 pb-4">
                                            <p class="text-white font-medium text-base">
                                                <i class="fas fa-camera mr-2"></i> {{ $packet->title }}
                                            </p>
                                        </div>
                                    </div>
                                    <dialog id="imageModal-{{ $packet->id }}"
                                            class="rounded-xl max-w-4xl sm:mx-auto backdrop:bg-black/70 p-0"
                                            onclick="handleOutsideClick(event, this)">
                                        <div class="relative bg-white rounded-xl shadow-xl overflow-hidden max-h-[90vh]">
                                            <button onclick="document.getElementById('imageModal-{{ $packet->id }}').close()"
                                                    class="absolute top-3 right-3 bg-black/60 text-white rounded-full p-2 hover:bg-black z-10">
                                                <i class="fas fa-times"></i>
                                            </button>
                                            <img src="{{ asset('storage/' . $packet->image) }}"
                                                alt="{{ $packet->title }}"
                                                class="w-full h-auto max-h-[90vh] object-contain">
                                        </div>
                                    </dialog>
                                </div>

                                <div class="p-4 border-b border-gray-200">
                                    <h4 class="text-lg sm:text-xl font-bold text-purple-800 flex items-center mb-1 font-montserrat">
                                        {{ $packet->title }}
                                    </h4>
                                    <p class="font-normal text-sm text-gray-500">{{ $packet->description }}</p>
                                </div>
                                <div class="p-4 space-y-4 overflow-y-auto flex-1">
                                    <div class="rich-content text-gray-700 leading-relaxed prose prose-sm max-w-none max-h-16 overflow-hidden relative">
                                        <!-- {!! $packet->detail !!} -->
                                        <div class="absolute bottom-0 left-0 w-full h-10 bg-gradient-to-t from-white to-transparent"></div>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <div class="flex items-center p-3 bg-purple-50 rounded-lg shadow-sm">
                                            <div class="bg-purple-600 text-white p-2 rounded-full mr-3">
                                                <i class="fas fa-calendar-week text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="text-xs text-gray-600">Harga Weekday</div>
                                                <div class="text-base font-bold text-purple-700">
                                                    {{ $packet->weekday_price ?: 'Hubungi kami' }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center p-3 bg-indigo-50 rounded-lg shadow-sm">
                                            <div class="bg-indigo-600 text-white p-2 rounded-full mr-3">
                                                <i class="fas fa-calendar-week text-sm"></i>
                                            </div>
                                            <div>
                                                <div class="text-xs text-gray-600">Harga Weekend</div>
                                                <div class="text-base font-bold text-indigo-700">
                                                    {{ $packet->weekend_price ?: 'Hubungi kami' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex flex-wrap gap-2 pt-1">
                                        <a href="{{ route('packets') }}#contact-packet"
                                                class="w-full bg-gradient-to-r from-purple-600 to-purple-800 hover:from-purple-700 hover:to-purple-900 text-white font-medium py-2 px-3 rounded-lg transition-all text-center inline-flex items-center justify-center shadow-md text-sm">
                                                <i class="fas fa-ticket-alt mr-2"></i> Pesan Sekarang
                                            </a>
                                        <button onclick="document.getElementById('detailModal-{{ $packet->id }}').showModal()"
                                            class="w-full bg-purple-100 hover:bg-purple-200 text-purple-700 font-medium py-2 px-3 rounded-lg transition-all shadow-sm text-sm">
                                            <i class="fas fa-info-circle mr-2"></i> Selengkapnya
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <dialog id="detailModal-{{ $packet->id }}"
                                    class="rounded-xl w-full max-w-3xl sm:mx-auto mx-2 my-6 sm:my-16 p-0 overflow-hidden backdrop:bg-black/70 font-poppins"
                                    onclick="handleOutsideClick(event, this)">
                                    <div class="bg-white rounded-xl shadow-xl overflow-hidden max-h-[90vh] flex flex-col">
                                        <!-- Header -->
                                        <div class="p-5 sm:p-6 border-b border-gray-200">
                                            <h4 class="text-xl sm:text-2xl font-bold text-purple-800 flex items-center mb-2 font-montserrat">
                                                {{ $packet->title }}
                                            </h4>
                                            <p class="text-gray-600 text-sm">{{ $packet->description }}</p>
                                        </div>

                                        <!-- Body -->
                                        <div class="p-5 sm:p-6 space-y-5 overflow-y-auto flex-1">
                                            <div class="rich-content text-gray-700 leading-relaxed prose prose-sm">
                                                {!! $packet->detail !!}
                                            </div>

                                            <!-- Harga -->
                                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                                <div class="flex items-center p-4 bg-purple-50 rounded-lg shadow-sm">
                                                    <div class="bg-purple-600 text-white p-2.5 rounded-full mr-3">
                                                        <i class="fas fa-calendar-week"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-xs text-gray-600">Harga Weekday</div>
                                                        <div class="text-lg font-bold text-purple-700">
                                                            {{ $packet->weekday_price ?: 'Hubungi kami' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex items-center p-4 bg-indigo-50 rounded-lg shadow-sm">
                                                    <div class="bg-indigo-600 text-white p-2.5 rounded-full mr-3">
                                                        <i class="fas fa-calendar-week"></i>
                                                    </div>
                                                    <div>
                                                        <div class="text-xs text-gray-600">Harga Weekend</div>
                                                        <div class="text-lg font-bold text-indigo-700">
                                                            {{ $packet->weekend_price ?: 'Hubungi kami' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Footer -->
                                        <div class="px-5 sm:px-6 py-4 bg-gray-50 flex flex-col sm:flex-row justify-end gap-2 border-t">
                                            <button onclick="document.getElementById('detailModal-{{ $packet->id }}').close()"
                                                class="bg-gray-200 hover:bg-gray-300 text-gray-700 py-2 px-4 rounded-lg transition w-full sm:w-auto text-sm">
                                                Tutup
                                            </button>
                                            <a href="{{ route('packets') }}#contact-packet"
                                                class="bg-gradient-to-r from-purple-600 to-purple-800 hover:from-purple-700 hover:to-purple-900 text-white py-2 px-4 rounded-lg transition font-medium w-full sm:w-auto text-center shadow-md text-sm">
                                                <i class="fas fa-ticket-alt mr-2"></i> Pesan Sekarang
                                            </a>
                                            <a href="https://wa.me/6281939114933?text=Halo%2C%20saya%20mau%20tanya"
                                                class="inline-flex items-center justify-center bg-green-500 hover:bg-green-600 text-white font-medium py-2 px-4 rounded-lg transition w-full sm:w-auto shadow-md text-sm"
                                                target="_blank" rel="noopener noreferrer">
                                                <i class="fab fa-whatsapp text-lg mr-2"></i> Whatsapp
                                            </a>
                                            <a href="https://www.traveloka.com/id-id/activities/indonesia/product/nusantara-edupark-madiun-5389237971312"
                                                class="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition w-full sm:w-auto shadow-md text-sm"
                                                target="_blank" rel="noopener noreferrer">
                                                <i class="fas fa-plane-departure text-lg mr-2"></i> Traveloka
                                            </a>
                                        </div>
                                    </div>
                                </dialog>
                        @endforeach
                    </div>
                    
                    <!-- Pagination -->
                    <div class="mt-12 flex justify-center" id="pagination-container">
                        <div class="pagination-wrapper rounded-lg overflow-hidden bg-white shadow-md">
                            {{ $packets->links() }}
                        </div>
                    </div>
                @else
                    <div class="text-center py-16">
                        <div class="inline-block p-6 rounded-xl bg-white shadow-lg">
                            <i class="fas fa-ticket-alt text-purple-400 text-4xl mb-4"></i>
                            <h3 class="text-xl font-medium text-gray-700 mb-2 font-montserrat">Belum Ada Paket Wisata</h3>
                            <p class="text-gray-500 text-base">Paket wisata akan segera ditambahkan. Silakan kunjungi kembali nanti.</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Call to Action -->
            <div id="contact-packet" class="mt-16 text-center py-12 px-6 bg-gradient-to-r from-purple-100 to-indigo-100 rounded-2xl shadow-inner">
                <h2 class="text-2xl font-bold text-purple-900 mb-3 font-montserrat">Butuh Paket Wisata?</h2>
                <p class="text-purple-700 mb-7 max-w-2xl mx-auto text-base font-poppins">Hubungi tim kami untuk mendiskusikan rencana kunjungan Anda.</p>
                <div class="flex flex-wrap justify-center gap-3">
                    <a href="https://wa.me/6281939114933?text=Halo%2C%20saya%20mau%20tanya"
                        class="inline-flex items-center bg-green-500 hover:bg-green-600 text-white font-medium py-2.5 px-6 rounded-full transition-all shadow-md text-sm">
                        <i class="fab fa-whatsapp text-lg mr-2"></i> Whatsapp
                    </a>
                    <a href="https://www.traveloka.com/id-id/activities/indonesia/product/nusantara-edupark-madiun-5389237971312"
                        class="inline-flex items-center bg-blue-500 hover:bg-blue-600 text-white font-medium py-2.5 px-6 rounded-full transition-all shadow-md text-sm">
                        <i class="fas fa-plane-departure text-lg mr-2"></i> Traveloka
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    /* Font family variables */
    :root {
        --font-poppins: 'Poppins', sans-serif;
        --font-montserrat: 'Montserrat', sans-serif;
    }
    
    /* Font classes */
    .font-poppins {
        font-family: var(--font-poppins);
    }
    
    .font-montserrat {
        font-family: var(--font-montserrat);
    }
    
    /* Custom styling for pagination */
    .pagination-wrapper nav {
        display: flex;
        justify-content: center;
    }
    
    /* Hide "Showing X to Y of Z results" text */
    .pagination-wrapper nav > div:first-child,
    .pagination-wrapper .flex.justify-between.flex-1,
    .pagination-wrapper p.text-sm.text-gray-700,
    .pagination-wrapper p {
        display: none !important;
    }
    
    .pagination-wrapper nav > div:last-child {
        display: flex;
        padding: 0.5rem;
        background: white;
        border-radius: 0.75rem;
    }
    
    .pagination-wrapper .relative.inline-flex.items-center {
        padding: 0.5rem 0.75rem;
        margin: 0 0.2rem;
        background: linear-gradient(to right, rgba(126, 34, 206, 0.05), rgba(79, 70, 229, 0.1));
        color: #6b21a8;
        font-weight: 600;
        border-radius: 0.5rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        min-width: 2.25rem;
        height: 2.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        border: 1px solid transparent;
        position: relative;
        overflow: hidden;
        font-family: var(--font-poppins);
    }
    
    /* Hover effect */
    .pagination-wrapper .relative.inline-flex.items-center:hover {
        background: linear-gradient(to right, rgba(126, 34, 206, 0.15), rgba(79, 70, 229, 0.25));
        transform: translateY(-1px);
        box-shadow: 0 2px 5px rgba(79, 70, 229, 0.2);
        border-color: rgba(126, 34, 206, 0.3);
        color: #4c1d95;
        z-index: 2;
    }
    
    /* Active/Current page effect */
    .pagination-wrapper .relative.inline-flex.items-center[aria-current="page"] {
        background: linear-gradient(135deg, #7e22ce, #6d28d9);
        color: white;
        box-shadow: 0 3px 8px -1px rgba(126, 34, 206, 0.4);
        transform: scale(1.05);
        z-index: 5;
        font-weight: 700;
    }
    
    /* Click effect - add this to active page with JS */
    .pagination-wrapper .relative.inline-flex.items-center.active-click {
        transform: scale(0.95);
        box-shadow: 0 1px 4px -1px rgba(126, 34, 206, 0.6);
        transition: all 0.15s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    /* After click ripple effect */
    .pagination-wrapper .relative.inline-flex.items-center::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 5px;
        height: 5px;
        background: rgba(255, 255, 255, 0.7);
        opacity: 0;
        border-radius: 100%;
        transform: scale(1) translate(-50%, -50%);
        transform-origin: 0 0;
    }
    
    .pagination-wrapper .relative.inline-flex.items-center.ripple::after {
        animation: ripple 0.6s ease-out;
    }
    
    @keyframes ripple {
        0% {
            transform: scale(0) translate(-50%, -50%);
            opacity: 1;
        }
        100% {
            transform: scale(20) translate(-50%, -50%);
            opacity: 0;
        }
    }
    
    .pagination-wrapper svg {
        width: 1rem;
        height: 1rem;
        stroke-width: 2;
    }
    
    /* Fix for the pagination container */
    #pagination-container {
        margin-top: 3rem;
    }
    
    .pagination-wrapper {
        position: relative;
        padding: 0.25rem;
        border-radius: 0.75rem;
        background: white;
        box-shadow: 0 8px 16px -4px rgba(0, 0, 0, 0.1), 
                    0 4px 8px -4px rgba(0, 0, 0, 0.05);
    }
    
    /* Cool glowing effect around the pagination */
    .pagination-wrapper::before {
        content: '';
        position: absolute;
        inset: -2px;
        background: linear-gradient(45deg, #7e22ce, #6d28d9, #4f46e5, #7e22ce);
        border-radius: 0.85rem;
        z-index: -1;
        animation: borderGlow 3s linear infinite;
        opacity: 0.4;
    }
    
    @keyframes borderGlow {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }
    
    /* Custom button styles for previous/next */
    .pagination-wrapper [rel="prev"],
    .pagination-wrapper [rel="next"] {
        background: linear-gradient(135deg, #7e22ce, #6d28d9);
        color: white;
        font-weight: bold;
        padding: 0.5rem 1rem;
        border-radius: 0.5rem;
        min-width: 3rem;
    }
    
    .pagination-wrapper [rel="prev"]:hover,
    .pagination-wrapper [rel="next"]:hover {
        box-shadow: 0 4px 10px rgba(126, 34, 206, 0.3);
        transform: translateY(-1px) scale(1.03);
    }
    
    /* Disabled state */
    .pagination-wrapper span.relative.inline-flex.items-center[aria-disabled="true"] {
        opacity: 0.5;
        cursor: not-allowed;
        background: rgba(156, 163, 175, 0.1);
        color: #9ca3af;
        transform: none;
        box-shadow: none;
    }
    
    /* Loading state for container */
    #packets-container.loading {
        position: relative;
    }
    
    #packets-container.loading::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50px;
        height: 50px;
        border-radius: 50%;
        border: 5px solid rgba(126, 34, 206, 0.1);
        border-top-color: #7e22ce;
        animation: spin 1s linear infinite;
        z-index: 10;
    }
    
    @keyframes spin {
        to { transform: translate(-50%, -50%) rotate(360deg); }
    }
    
    /* Custom styling for rich content in modals */
    .rich-content h1, .rich-content h2, .rich-content h3,
    .rich-content h4, .rich-content h5, .rich-content h6 {
        font-family: var(--font-montserrat);
    }
    
    .rich-content p, .rich-content li, .rich-content a {
        font-family: var(--font-poppins);
    }
</style>

<script>
    function handleOutsideClick(event, dialog) {
        if (event.target === dialog) {
            dialog.close();
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Setup AJAX Pagination
        setupAjaxPagination();
        
        // Add click effects to pagination buttons
        setupPaginationEffects();
        
        function setupPaginationEffects() {
            const paginationItems = document.querySelectorAll('.pagination-wrapper .relative.inline-flex.items-center');
            
            paginationItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    if (!this.hasAttribute('aria-current')) {
                        // Add click effect
                        this.classList.add('active-click');
                        
                        // Add ripple effect
                        this.classList.add('ripple');
                        
                        // Remove effects after animation completes
                        setTimeout(() => {
                            this.classList.remove('active-click');
                            this.classList.remove('ripple');
                        }, 600);
                    }
                });
                
                // For non-clickable items, prevent default click behavior
                if (item.hasAttribute('aria-disabled') && item.getAttribute('aria-disabled') === 'true') {
                    item.addEventListener('click', function(e) {
                        e.preventDefault();
                    });
                }
            });
        }
        
        function setupAjaxPagination() {
            // Target pagination container
            const paginationContainer = document.getElementById('pagination-container');
            
            if (paginationContainer) {
                paginationContainer.addEventListener('click', function(e) {
                    // Check if clicked element is a pagination link
                    const target = e.target.closest('a[href*="page="]');
                    
                    if (target) {
                        e.preventDefault();
                        const url = target.getAttribute('href');
                        
                        // Add loading animation
                        const packetsContainer = document.getElementById('packets-container');
                        packetsContainer.classList.add('opacity-50', 'pointer-events-none', 'loading');
                        
                        // Animate the clicked button
                        target.classList.add('scale-110', 'shadow-lg');
                        
                        // Fetch the page content
                        fetch(url, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            }
                        })
                        .then(response => response.text())
                        .then(html => {
                            // Create a temporary element to parse the HTML
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            
                            // Get the new packets content and pagination
                            const newPacketsContainer = doc.getElementById('packets-container');
                            
                            if (newPacketsContainer) {
                                // Fade out current content first
                                packetsContainer.style.opacity = '0';
                                
                                setTimeout(() => {
                                    // Update content
                                    packetsContainer.innerHTML = newPacketsContainer.innerHTML;
                                    
                                    // Setup pagination event listeners again
                                    setupAjaxPagination();
                                    
                                    // Setup pagination effects again
                                    setupPaginationEffects();
                                    
                                    // Update URL without page reload
                                    history.pushState({}, '', url);
                                    
                                    // Scroll to the top of the packets section with smooth animation
                                    document.querySelector('.py-14.bg-gradient-to-b').scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'start'
                                    });
                                    
                                    // Fade in new content
                                    setTimeout(() => {
                                        packetsContainer.style.opacity = '1';
                                        packetsContainer.style.transition = 'opacity 0.5s ease';
                                        packetsContainer.classList.remove('opacity-50', 'pointer-events-none', 'loading');
                                    }, 100);
                                }, 300);
                            } else {
                                packetsContainer.classList.remove('opacity-50', 'pointer-events-none', 'loading');
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching page:', error);
                            document.getElementById('packets-container').classList.remove('opacity-50', 'pointer-events-none', 'loading');
                        });
                    }
                });
            }
        }
    });
</script>