<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ShopEase') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">

<div class="min-h-screen flex">

    <!-- Left Side — Branding Panel -->
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-green-500 to-green-700 flex-col justify-center items-center text-white p-12">
        <div class="text-center">
            <!-- Logo/Icon -->
            <div class="text-8xl mb-6">🛒</div>
            <h1 class="text-4xl font-bold mb-4">ShopEase</h1>
            <p class="text-green-100 text-lg mb-8">
                Your one-stop online marketplace
            </p>
            <!-- Features list -->
            <div class="space-y-3 text-left">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">✅</span>
                    <span class="text-green-100">Buy and sell products easily</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-2xl">✅</span>
                    <span class="text-green-100">Secure and fast transactions</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-2xl">✅</span>
                    <span class="text-green-100">Manage your store anytime</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-2xl">✅</span>
                    <span class="text-green-100">Admin control and reporting</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side — Form Panel -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 py-12 bg-gray-50">

        <!-- Mobile Logo (shows only on small screens) -->
        <div class="lg:hidden text-center mb-8">
            <div class="text-5xl mb-2">🛒</div>
            <h1 class="text-2xl font-bold text-green-600">ShopEase</h1>
        </div>

        <!-- Form Card -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-lg px-8 py-8">

            <!-- App name top -->
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-gray-800">
                    Welcome to ShopEase
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Group 6 — Backend Development
                </p>
            </div>

            {{ $slot }}

        </div>

        <!-- Footer -->
        <p class="text-xs text-gray-400 mt-6">
            © 2026 ShopEase — Group 6 BSIT