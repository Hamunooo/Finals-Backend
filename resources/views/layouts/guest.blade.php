<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cartify</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased">

<div class="min-h-screen flex">

    <!-- Left Side — Branding Panel -->
    <div class="hidden lg:flex lg:w-1/2 flex-col justify-center items-center text-white p-12"
         style="background-color: #043044;">
        <div class="text-center">
            <!-- Your Canva Logo -->
           
            <h1 class="text-4xl font-bold mb-4" style="color: #33c432;">Cartify</h1>
            <p class="text-lg mb-8" style="color: #ffffff; opacity: 0.8;">
                Your one-stop online marketplace
            </p>
            <div class="space-y-3 text-left">
                <div class="flex items-center gap-3">
                    <span class="w-2 h-2 rounded-full" style="background:#33c432"></span>
                    <span style="color:#ffffff; opacity:0.9">Buy and sell products easily</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="w-2 h-2 rounded-full" style="background:#33c432"></span>
                    <span style="color:#ffffff; opacity:0.9">Secure and fast transactions</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="w-2 h-2 rounded-full" style="background:#33c432"></span>
                    <span style="color:#ffffff; opacity:0.9">Manage your store anytime</span>
                </div>
                <div class="flex items-center gap-3">
                    <span class="w-2 h-2 rounded-full" style="background:#33c432"></span>
                    <span style="color:#ffffff; opacity:0.9">Admin control and reporting</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Side — Form Panel -->
    <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-6 py-12"
         style="background-color: #ffffff;">

        <!-- Mobile Logo -->
        <div class="lg:hidden text-center mb-8">
            
                
            <h1 class="text-2xl font-bold" style="color:#043044;">Cartify</h1>
        </div>

        <!-- Form Card -->
        <div class="w-full max-w-md rounded-2xl shadow-lg px-8 py-8"
             style="background-color: #ffffff; border: 1px solid #e5e7eb;">
            <div class="text-center mb-6">
              
                    
                <h2 class="text-2xl font-bold" style="color:#043044;">
                    Welcome to Cartify
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Group 6 — Backend Development
                </p>
            </div>

            {{ $slot }}

        </div>

        <p class="text-xs text-gray-400 mt-6">
            © 2026 Cartify — Group 6 BSIT 3-3
        </p>
    </div>
</div>

</body>
</html>