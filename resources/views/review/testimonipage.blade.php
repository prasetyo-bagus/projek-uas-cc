@extends('layouts.guest')

@section('content')
<div class="bg-gray-50 min-h-screen py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Testimonial Pengunjung</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Baca pengalaman pengunjung lain dan bagikan pengalaman Anda bersama Nusantara Edupark</p>
        </div>

        <!-- Form Testimonial -->
        <div class="max-w-4xl mx-auto mb-20">
            @include('review.formkomentar')
        </div>

        <!-- Daftar Testimonial -->
        <div class="max-w-7xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-8 flex items-center">
                <i class="fas fa-quote-left text-purple-500 mr-3"></i>
                Apa Kata Mereka?
            </h2>

            @if($testimonials->isEmpty())
            <div class="bg-white p-12 rounded-xl shadow-md text-center">
                <div class="flex flex-col items-center justify-center">
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                    </svg>
                    <p class="mt-4 text-lg text-gray-500">Belum ada testimonial dari pengunjung.</p>
                    <p class="mt-2 text-gray-500">Jadilah yang pertama memberikan testimonial!</p>
                </div>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($testimonials as $testimonial)
                <div class="bg-white p-6 rounded-xl shadow-md hover:shadow-lg transition-all">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400 flex">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= $testimonial->rating)
                                    <i class="fas fa-star"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="text-gray-600 ml-2">{{ $testimonial->rating }}.0</span>
                    </div>
                    
                    <p class="text-gray-600 mb-4">"{{ $testimonial->pesan }}"</p>
                    
                    <div class="flex items-center mt-6">
                        @if($testimonial->foto)
                            <img src="{{ asset('storage/' . $testimonial->foto) }}" alt="{{ $testimonial->nama }}" class="w-12 h-12 rounded-full object-cover">
                        @else
                            <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                                <span class="text-lg font-medium text-purple-600">{{ substr($testimonial->nama, 0, 1) }}</span>
                            </div>
                        @endif
                        <div class="ml-3">
                            <h4 class="font-semibold text-gray-800">{{ $testimonial->nama }}</h4>
                            <p class="text-gray-500 text-sm">{{ $testimonial->kota ?? 'Pengunjung' }}</p>
                        </div>
                        <div class="ml-auto text-xs text-gray-400">
                            {{ $testimonial->created_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-10">
                {{ $testimonials->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection 