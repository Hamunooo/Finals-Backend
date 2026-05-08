<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight" style="color: #043044;">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Welcome Card -->
            <div class="rounded-2xl shadow-sm p-6"
                 style="background-color: #043044;">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-2xl font-bold" style="color: #ffffff;">
                            Welcome back, {{ Auth::user()->name }}!
                        </h3>
                        <p class="mt-1 text-sm" style="color: #33c432;">
                            You are logged in as
                            <span class="font-semibold uppercase">{{ Auth::user()->role }}</span>
                        </p>
                    </div>
                    <img src="{{ asset('images/logo.png') }}"
                         alt="Cartify"
                         class="h-16 w-16 object-contain opacity-80">
                </div>
            </div>

            <!-- Quick Access Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                @if(Auth::user()->role === 'seller' || Auth::user()->role === 'admin')
                <!-- Products Card -->
                <a href="{{ route('products.index') }}"
                   class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition block">
                    <h4 class="font-semibold text-lg" style="color: #043044;">
                        Products
                    </h4>
                    <p class="text-sm text-gray-500 mt-1">
                        Manage your product listings
                    </p>
                    <div class="mt-4">
                        <span class="text-sm font-medium px-4 py-2 rounded-lg"
                              style="background-color: #33c432; color: #ffffff;">
                            Go to Products
                        </span>
                    </div>
                </a>
                @endif

                @if(Auth::user()->role === 'admin')
                <!-- Users Card -->
                <a href="{{ route('users.index') }}"
                   class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition block">
                    <h4 class="font-semibold text-lg" style="color: #043044;">
                        Users
                    </h4>
                    <p class="text-sm text-gray-500 mt-1">
                        Manage all user accounts
                    </p>
                    <div class="mt-4">
                        <span class="text-sm font-medium px-4 py-2 rounded-lg"
                              style="background-color: #33c432; color: #ffffff;">
                            Go to Users
                        </span>
                    </div>
                </a>
                @endif

                @if(Auth::user()->role === 'customer')
                <!-- Browse Card -->
                <a href="{{ route('products.index') }}"
                   class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition block">
                    <h4 class="font-semibold text-lg" style="color: #043044;">
                        Browse Products
                    </h4>
                    <p class="text-sm text-gray-500 mt-1">
                        Explore available products
                    </p>
                    <div class="mt-4">
                        <span class="text-sm font-medium px-4 py-2 rounded-lg"
                              style="background-color: #33c432; color: #ffffff;">
                            Shop Now
                        </span>
                    </div>
                </a>
                @endif

                <!-- Profile Card -->
                <a href="{{ route('profile') }}"
                   class="bg-white rounded-2xl shadow-sm p-6 hover:shadow-md transition block">
                    <h4 class="font-semibold text-lg" style="color: #043044;">
                        My Profile
                    </h4>
                    <p class="text-sm text-gray-500 mt-1">
                        View and edit your profile
                    </p>
                    <div class="mt-4">
                        <span class="text-sm font-medium px-4 py-2 rounded-lg"
                              style="background-color: #043044; color: #ffffff;">
                            View Profile
                        </span>
                    </div>
                </a>

            </div>

        </div>
    </div>
</x-app-layout>