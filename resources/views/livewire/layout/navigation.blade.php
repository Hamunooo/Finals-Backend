<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout();
    $this->redirect('/', navigate: true);
};

?>

<nav x-data="{ open: false }" style="background-color: #043044;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left side — Logo + Links -->
            <div class="flex items-center gap-8">
                <!-- Logo -->
                <a href="{{ route('dashboard') }}" wire:navigate class="flex items-center gap-2">
                    <img src="{{ asset('images/logo2.png') }}"
                        alt="Cartify"
                        class="h-10 w-auto object-contain">
                    <span class="text-xl font-bold" style="color: #33c432;">Cartify</span>
                </a>

                <!-- Nav Links -->
                <div class="hidden sm:flex items-center gap-6">
                    <a href="{{ route('dashboard') }}" wire:navigate
                       class="text-sm font-medium pb-1 border-b-2 transition"
                       style="color: #ffffff; border-color: {{ request()->routeIs('dashboard') ? '#33c432' : 'transparent' }}">
                        Dashboard
                    </a>
                    <a href="{{ route('products.index') }}" wire:navigate
                       class="text-sm font-medium pb-1 border-b-2 transition"
                       style="color: #ffffff; border-color: {{ request()->routeIs('products*') ? '#33c432' : 'transparent' }}">
                        Products
                    </a>
                    @if(auth()->user()->role === 'admin')
                    <a href="{{ route('users.index') }}" wire:navigate
                       class="text-sm font-medium pb-1 border-b-2 transition"
                       style="color: #ffffff; border-color: {{ request()->routeIs('users*') ? '#33c432' : 'transparent' }}">
                        Users
                    </a>
                    @endif
                </div>
            </div>

            <!-- Right side — User dropdown -->
            <div class="hidden sm:flex items-center gap-3">
                <!-- Role badge -->
                <span class="text-xs px-3 py-1 rounded-full font-medium"
                      style="background-color: #33c432; color: #ffffff;">
                    {{ ucfirst(auth()->user()->role) }}
                </span>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center gap-2 px-3 py-2 rounded-lg text-sm font-medium transition"
                                style="color: #ffffff;">
                            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}"
                                 x-text="name"
                                 x-on:profile-updated.window="name = $event.detail.name">
                            </div>
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="px-4 py-2 border-b border-gray-100">
                            <p class="text-xs text-gray-500">Logged in as</p>
                            <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                        </div>
                        <x-dropdown-link :href="route('profile')" wire:navigate>
                            Profile
                        </x-dropdown-link>
                        <button wire:click="logout" class="w-full text-start">
                            <x-dropdown-link>
                                Log Out
                            </x-dropdown-link>
                        </button>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Mobile Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md transition"
                        style="color: #ffffff;">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden"
         style="background-color: #043044; border-top: 1px solid #33c432;">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <a href="{{ route('dashboard') }}" wire:navigate
               class="block text-sm py-2" style="color: #ffffff;">
                Dashboard
            </a>
            <a href="{{ route('products.index') }}" wire:navigate
               class="block text-sm py-2" style="color: #ffffff;">
                Products
            </a>
            @if(auth()->user()->role === 'admin')
            <a href="{{ route('users.index') }}" wire:navigate
               class="block text-sm py-2" style="color: #ffffff;">
                Users
            </a>
            @endif
        </div>
        <div class="pt-4 pb-3 border-t" style="border-color: #33c432;">
            <div class="px-4 mb-2">
                <p class="text-sm font-medium" style="color: #ffffff;">{{ auth()->user()->name }}</p>
                <p class="text-xs" style="color: #33c432;">{{ ucfirst(auth()->user()->role) }}</p>
            </div>
            <div class="space-y-1 px-4">
                <a href="{{ route('profile') }}" wire:navigate
                   class="block text-sm py-2" style="color: #ffffff;">Profile</a>
                <button wire:click="logout" class="text-sm py-2 text-left w-full"
                        style="color: #ffffff;">Log Out</button>
            </div>
        </div>
    </div>
</nav>