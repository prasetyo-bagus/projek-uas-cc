@extends('navbar.adminnavbar')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Profil</h2>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-8 flex flex-col items-center">
                    <div class="relative group">
                        <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-primary-400 shadow-lg">
                            @if(auth()->user()->photo_path)
                                <img src="{{ asset('storage/' . auth()->user()->photo_path) }}" alt="Profile Photo"
                                    class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <i class="fas fa-user text-gray-400 text-5xl"></i>
                                </div>
                            @endif
                        </div>
                        <div
                            class="absolute inset-0 bg-black bg-opacity-50 rounded-full flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <label for="photo" class="cursor-pointer">
                                <i class="fas fa-camera text-white text-2xl"></i>
                            </label>
                        </div>
                    </div>
                    <input type="file" name="photo" id="photo" class="hidden" accept="image/*">
                    <p class="text-xs text-gray-500 mt-2">Format: JPG, PNG. Maksimal 2MB</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        Nama
                    </label>
                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        Email
                    </label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit"
                        class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
        {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.delete-user-form />
            </div>
        </div> --}}
    </div>

    <script>
        // Preview image before upload
        document.getElementById('photo').addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.querySelector('.w-32.h-32 img');
                    if (img) {
                        img.src = e.target.result;
                    } else {
                        const div = document.querySelector('.w-32.h-32 div');
                        div.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
                    }
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection