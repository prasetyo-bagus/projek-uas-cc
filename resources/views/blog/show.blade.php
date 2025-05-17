@extends('layouts.guest')

@section('content')
    <div class="rich-content bg-white min-h-screen py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <article class="space-y-8">
                <header>
                    <h1 class="text-4xl font-extrabold text-gray-900">{{ $blog->title }}</h1>

                    {{-- Kategori --}}
                    <p class="mt-2 text-sm text-gray-600 italic">
                        Kategori: {{ ucfirst(str_replace('_', ' ', strtolower($blog->category))) }}
                    </p>

                    <p class="mt-1 text-sm text-gray-500">
                        Ditulis oleh <span class="font-medium text-gray-700">{{ $blog->user->name ?? 'Admin' }}</span>
                        • {{ $blog->created_at->translatedFormat('d F Y') }}
                    </p>
                </header>

                <div class="prose prose-lg max-w-none text-gray-800">
                    {!! str_replace('<img', '<img class="mx-auto block"', $blog->body) !!}
                </div>

                <div class="pt-6">
                    <a href="{{ route('blogs.index') }}"
                        class="inline-block text-blue-600 hover:text-blue-800 font-medium transition">
                        ← Kembali
                    </a>
                </div>
            </article>
        </div>
    </div>
@endsection