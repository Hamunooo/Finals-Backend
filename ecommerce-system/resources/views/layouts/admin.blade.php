<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin - Cartify')</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] { display: none; }
        :root {
            --admin-dark-bg: #0f3847;
            --admin-header: #163a42;
            --admin-card: #1a4d5c;
            --admin-green: #22c55e;
        }
        body {
            background-color: var(--admin-dark-bg);
            color: #ffffff;
        }
        .admin-header {
            background-color: var(--admin-header);
        }
        .admin-card {
            background-color: var(--admin-card);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .admin-btn-green {
            background-color: var(--admin-green);
            color: white;
            transition: all 0.3s ease;
        }
        .admin-btn-green:hover {
            background-color: #16a34a;
            transform: translateY(-2px);
        }
        .admin-btn-danger {
            background-color: #dc2626;
            color: white;
        }
        .admin-btn-danger:hover {
            background-color: #b91c1c;
        }
    </style>
</head>
<body class="antialiased">

<!-- Admin Header -->
<nav class="admin-header shadow-lg">
    <div class="container mx-auto px-4 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3z"></path>
            </svg>
            <span class="text-xl font-bold text-white">Cartify Admin</span>
        </div>
        <div class="flex items-center space-x-4">
            <span class="text-sm text-gray-300">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 text-sm font-semibold transition">
                    Logout
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- Main Container -->
<div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 admin-header shadow-xl">
        <div class="p-6 space-y-8">
            <div>
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Menu</h3>
                <nav class="space-y-3">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white hover:bg-green-500/10 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-green-500/20 text-green-400' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-4m0 0l7-4 7 4M5 8v10a1 1 0 001 1h12a1 1 0 001-1V8m-9 4v4m4-4v4"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:text-white hover:bg-green-500/10 transition-colors {{ request()->routeIs('admin.products.*') ? 'bg-green-500/20 text-green-400' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m0 0l8 4m-8-4v10l8 4m0-10l8 4m-8-4v10"></path>
                        </svg>
                        <span>Products</span>
                    </a>
                </nav>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        @if ($errors->any())
            <div class="admin-card rounded-lg p-4 mb-6 border-l-4 border-red-500">
                <h3 class="font-bold text-red-400 mb-2">Errors</h3>
                <ul class="text-sm text-gray-300 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="admin-card rounded-lg p-4 mb-6 border-l-4 border-green-500 bg-green-500/10">
                <p class="text-green-400 font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @yield('content')
    </main>
</div>

</body>
</html>
