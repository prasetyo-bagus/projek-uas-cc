<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('layouts.app');

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $userRole = Auth::user()->role;

    switch ($userRole) {
        case 1:
            $this->redirectIntended(default: route('superadmin', absolute: false), navigate: true);
            break;
        case 2:
            $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
            break;
        default:
            return redirect('dashboard');
    }
};

?>

<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-indigo-100 via-purple-50 to-blue-100">
    <div class="max-w-md w-full p-8 bg-white rounded-2xl shadow-xl transform transition-all hover:scale-[1.01] duration-300">
        <!-- Header with Logo -->
        <div class="text-center">
            <div class="bg-indigo-600 w-16 h-16 rounded-full mx-auto flex items-center justify-center shadow-md">
                <i class="fas fa-user-shield text-3xl text-white"></i>
            </div>
            <h2 class="mt-4 text-3xl font-extrabold text-gray-900 tracking-tight">Admin</h2>
            <p class="mt-2 text-base text-indigo-600 font-semibold">Sign in to your account</p>
            <div class="h-0.5 w-12 bg-indigo-500 rounded-full mx-auto mt-3"></div>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4 mt-4" :status="session('status')" />

        <form wire:submit.prevent="login" class="mt-8 space-y-6">
            <!-- Email Address -->
            <div class="group">
                <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium text-gray-700" />
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <x-text-input wire:model="form.email" id="email"
                        class="pl-10 block w-full !text-black rounded-lg !bg-white border-gray-300 shadow-sm focus:!text-black active:!text-black focus:!bg-white active:!bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200"
                        type="email" name="email" required autofocus autocomplete="username" placeholder="nama@email.com" />
                </div>
                <x-input-error :messages="$errors->get('form.email')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium text-gray-700" />
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <x-text-input wire:model="form.password" id="password"
                        class="pl-10 block w-full !text-black rounded-lg !bg-white border-gray-300 shadow-sm focus:!text-black active:!text-black focus:!bg-white active:!bg-white focus:border-indigo-500 focus:ring-indigo-500 transition-all duration-200"
                        type="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
                </div>
                <x-input-error :messages="$errors->get('form.password')" class="mt-2 text-sm text-red-500" />
            </div>

            <!-- Remember Me -->
            {{-- <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input wire:model="form.remember" id="remember" type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" name="remember">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">
                        {{ __('Remember me') }}
                    </label>
                </div> --}}

            {{-- @if (Route::has('password.request'))
                    <div class="text-sm">
                        <a class="font-medium text-indigo-600 bg-white hover:text-indigo-500"
                            href="{{ route('password.request') }}" wire:navigate>
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>
                @endif
            </div> --}}

            <div class="pt-2">
                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-lg text-white bg-indigo-700  hover:from-indigo-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transform transition-all duration-200 hover:shadow-lg">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 text-indigo-200 group-hover:text-indigo-100" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                        </svg>
                    </span>
                    {{ __('Sign in') }}
                </button>
            </div>
            
            <div class="flex items-center justify-center mt-4">
                <div class="text-sm text-gray-500">
                    Nusantara Edupark Admin
                </div>
            </div>
        </form>
    </div>
</div>
