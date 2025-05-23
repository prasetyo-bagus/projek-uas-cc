@extends('navbar.adminnavbar')

@section('content')
    @if (session('success'))
        <div id="success-alert"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
            role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        <script>
            // Membuat alert hilang setelah 5 detik
            setTimeout(function() {
                const alert = document.getElementById('success-alert');
                if (alert) {
                    alert.style.transition = 'opacity 1s';
                    alert.style.opacity = '0';
                    setTimeout(function() {
                        alert.style.display = 'none';
                    }, 1000);
                }
            }, 5000);
        </script>
    @endif

    <div class="max-w-4xl mx-auto" x-data="{ showEditModal: false, showPasswordModal: false }">
        <!-- Tampilan Profil Admin -->
        <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
            <div class="flex flex-col md:flex-row items-center md:items-start">
                <div class="mb-6 md:mb-0 md:mr-8">
                    <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-primary-400 shadow-lg mx-auto">
                        @if (auth()->user()->photo_path)
                            <img src="{{ asset('storage/' . auth()->user()->photo_path) }}" alt="Profile Photo"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <i class="fas fa-user text-gray-400 text-5xl"></i>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="flex-1 text-center md:text-left">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ auth()->user()->name }}</h1>
                    <p class="text-lg font-medium text-primary-600 mb-4">{{ auth()->user()->position ?? 'Administrator' }}</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-gray-500 mr-3"></i>
                            <span>{{ auth()->user()->email }}</span>
                        </div>
                        
                        @if(auth()->user()->phone)
                        <div class="flex items-center">
                            <i class="fas fa-phone text-gray-500 mr-3"></i>
                            <span>{{ auth()->user()->phone }}</span>
                        </div>
                        @endif
                        
                        @if(auth()->user()->birthdate)
                        <div class="flex items-center">
                            <i class="fas fa-calendar text-gray-500 mr-3"></i>
                            <span>{{ \Carbon\Carbon::parse(auth()->user()->birthdate)->format('d F Y') }}</span>
                        </div>
                        @endif
                        
                        @if(auth()->user()->gender)
                        <div class="flex items-center">
                            <i class="fas fa-user text-gray-500 mr-3"></i>
                            <span>{{ auth()->user()->gender == 'L' ? 'Laki-laki' : 'Perempuan' }}</span>
                        </div>
                        @endif
                    </div>
                    
                    @if(auth()->user()->address)
                    <div class="mt-4">
                        <div class="flex items-start">
                            <i class="fas fa-map-marker-alt text-gray-500 mr-3 mt-1"></i>
                            <span>{{ auth()->user()->address }}</span>
                        </div>
                    </div>
                    @endif
                    
                    @if(auth()->user()->bio)
                    <div class="mt-4 p-4 bg-gray-50 rounded-lg">
                        <h3 class="font-semibold mb-2">Biodata</h3>
                        <p class="text-gray-700">{{ auth()->user()->bio }}</p>
                    </div>
                    @endif

                    <div class="mt-6 flex flex-wrap gap-3 justify-center md:justify-start">
                        <button @click="showEditModal = true" class="bg-primary-600 hover:bg-primary-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-edit mr-2"></i> Edit Profil
                        </button>
                        <!-- <button @click="showPasswordModal = true" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-key mr-2"></i> Ubah Password
                        </button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit Profil -->
        <div x-show="showEditModal" class="fixed backdrop-blur-sm inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black opacity-50" @click="showEditModal = false"></div>
                
                <div class="relative bg-white rounded-lg shadow-xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
                    <div class="flex justify-between items-center p-6 border-b">
                        <h2 class="text-2xl font-bold text-gray-800">Edit Profil</h2>
                        <button @click="showEditModal = false" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    
                    <div class="p-6">
                        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-8 flex flex-col items-center">
                                <div class="relative group">
                                    <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-primary-400 shadow-lg">
                                        @if (auth()->user()->photo_path)
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

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                                        Nomor Telepon
                                    </label>
                                    <input type="text" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('phone') border-red-500 @enderror">
                                    @error('phone')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="birthdate">
                                        Tanggal Lahir
                                    </label>
                                    <input type="date" name="birthdate" id="birthdate" value="{{ old('birthdate', auth()->user()->birthdate ?? '') }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('birthdate') border-red-500 @enderror">
                                    @error('birthdate')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="gender">
                                        Jenis Kelamin
                                    </label>
                                    <select name="gender" id="gender" 
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('gender') border-red-500 @enderror">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L" {{ old('gender', auth()->user()->gender ?? '') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="P" {{ old('gender', auth()->user()->gender ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                    @error('gender')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2" for="position">
                                        Jabatan
                                    </label>
                                    <input type="text" name="position" id="position" value="{{ old('position', auth()->user()->position ?? '') }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('position') border-red-500 @enderror">
                                    @error('position')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="address">
                                    Alamat
                                </label>
                                <textarea name="address" id="address" rows="3"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address') border-red-500 @enderror">{{ old('address', auth()->user()->address ?? '') }}</textarea>
                                @error('address')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="bio">
                                    Biodata Singkat
                                </label>
                                <textarea name="bio" id="bio" rows="4"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('bio') border-red-500 @enderror">{{ old('bio', auth()->user()->bio ?? '') }}</textarea>
                                @error('bio')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex items-center justify-end gap-3">
                                <button @click.prevent="showEditModal = false" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Ubah Password -->
        <!-- <div x-show="showPasswordModal" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black opacity-50" @click="showPasswordModal = false"></div>
                
                <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full">
                    <div class="flex justify-between items-center p-6 border-b">
                        <h2 class="text-2xl font-bold text-gray-800">Ubah Password</h2>
                        <button @click="showPasswordModal = false" class="text-gray-500 hover:text-gray-700">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>
                    
                    <div class="p-6">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                                    Password Baru
                                </label>
                                <input type="password" name="password" id="password"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror">
                                @error('password')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2" for="password_confirmation">
                                    Konfirmasi Password Baru
                                </label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>
                            
                            <div class="flex items-center justify-end gap-3">
                                <button @click.prevent="showPasswordModal = false" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Batal
                                </button>
                                <button type="submit"
                                    class="bg-primary-600 hover:bg-primary-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Ubah Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <script>
        // Preview image before upload
        document.getElementById('photo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
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

        // Cek apakah ada error dan buka modal jika diperlukan
        @if($errors->any())
            document.addEventListener('DOMContentLoaded', function() {
                @if($errors->has('password') || $errors->has('password_confirmation'))
                    document.querySelector('body').__x.$data.showPasswordModal = true;
                @else
                    document.querySelector('body').__x.$data.showEditModal = true;
                @endif
            });
        @endif
    </script>
@endsection
