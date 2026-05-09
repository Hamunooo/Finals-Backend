@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <!-- Hero Section -->
    <div class="py-20 md:py-32 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
            About <span class="bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent">Cartify</span>
        </h1>
        <p class="text-xl text-slate-300 max-w-2xl mx-auto">
            Your premium destination for quality products and exceptional shopping experience
        </p>
    </div>

    <!-- About Content -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 py-16">
        <!-- Left Column -->
        <div>
            <h2 class="text-3xl font-bold text-white mb-4">Who We Are</h2>
            <p class="text-slate-300 mb-4 leading-relaxed">
                Cartify is a modern e-commerce platform dedicated to bringing you the finest collection of products 
                from around the world. We believe in making online shopping simple, secure, and enjoyable for everyone.
            </p>
            <p class="text-slate-300 mb-4 leading-relaxed">
                Founded with a vision to revolutionize the online shopping experience, we've grown into a trusted 
                platform serving thousands of customers with diverse product categories and exceptional service.
            </p>
            <p class="text-slate-300 leading-relaxed">
                Our commitment to quality, reliability, and customer satisfaction drives everything we do.
            </p>
        </div>

        <!-- Right Column - Image -->
        <div class="flex items-center justify-center">
            <div class="card-glass rounded-2xl p-8 w-full">
                <div class="bg-gradient-to-br from-purple-600 via-blue-600 to-cyan-600 rounded-xl p-12 text-center">
                    <svg class="w-24 h-24 mx-auto text-white mb-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 6H6.28l-.31-1.243A1 1 0 005 4H3a1 1 0 000 2h1.52l.26 1.043c1.374.572 2.366 1.922 2.465 3.457H5.357a1 1 0 00-.986.836l-.996 5.211a1 1 0 10.988 1.164l.995-5.211h12.021l.995 5.211a1 1 0 10.988-1.164l-.996-5.211A1 1 0 0015 11H4.118a2.015 2.015 0 01-.parsefloat.465-3.427zM5 13a2 2 0 100 4 2 2 0 000-4zm5 2a2 2 0 11 4 0 2 2 0 01-4 0z"></path>
                    </svg>
                    <p class="text-white font-semibold">Premium Shopping Experience</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-16">
        <h2 class="text-3xl font-bold text-white mb-12 text-center">Why Choose Cartify?</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="card-glass rounded-2xl p-8 text-center hover:translate-y-(-2) transition-transform duration-300">
                <div class="inline-block p-4 bg-gradient-secondary rounded-lg mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8.16 2.75a.75.75 0 00-1.32 0l-3.5 8.75H2a.75.75 0 000 1.5h3.386l-1.136 2.84a.75.75 0 101.4.56L5.386 13h4.228l-1.136 2.84a.75.75 0 101.4.56l1.136-2.84H14a.75.75 0 000-1.5h-3.386l1.136-2.84a.75.75 0 10-1.4-.56L12.614 11H8.386l1.136-2.84a.75.75 0 00-1.4-.56L7.386 11H4a.75.75 0 000 1.5h3.386l-1.136 2.84a.75.75 0 101.4.56l1.136-2.84H14a.75.75 0 000-1.5h-3.386l1.136-2.84a.75.75 0 10-1.4-.56L9.614 11H5.386l1.136-2.84a.75.75 0 00-1.4-.56L5.386 11H2a.75.75 0 000 1.5h3.386l-1.136 2.84a.75.75 0 101.4.56l1.136-2.84H14a.75.75 0 000-1.5H8.16zm.59 2.75l-.885 2.25H9.53L8.75 5.5z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Curated Selection</h3>
                <p class="text-slate-400">Carefully selected products from trusted brands and sellers</p>
            </div>

            <!-- Feature 2 -->
            <div class="card-glass rounded-2xl p-8 text-center hover:translate-y-(-2) transition-transform duration-300">
                <div class="inline-block p-4 bg-gradient-secondary rounded-lg mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 2a1 1 0 011 1v1h1V3a1 1 0 011-1h5a1 1 0 011 1v1h1V3a1 1 0 011 1v1h1a2 2 0 012 2v2h1a1 1 0 110 2h-1v6h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-1v1a1 1 0 11-2 0v-1h-5v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h1V3a1 1 0 011-1zm15 8H4v6h16V10z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Fast Delivery</h3>
                <p class="text-slate-400">Quick processing and nationwide shipping to your doorstep</p>
            </div>

            <!-- Feature 3 -->
            <div class="card-glass rounded-2xl p-8 text-center hover:translate-y-(-2) transition-transform duration-300">
                <div class="inline-block p-4 bg-gradient-secondary rounded-lg mb-4">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5 2a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 16V2z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">Secure Checkout</h3>
                <p class="text-slate-400">Protected payment systems for safe and secure transactions</p>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="py-16 grid grid-cols-1 md:grid-cols-4 gap-6">
        <div class="card-glass rounded-2xl p-8 text-center">
            <div class="text-4xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-2">10K+</div>
            <p class="text-slate-400">Happy Customers</p>
        </div>
        <div class="card-glass rounded-2xl p-8 text-center">
            <div class="text-4xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-2">5K+</div>
            <p class="text-slate-400">Products</p>
        </div>
        <div class="card-glass rounded-2xl p-8 text-center">
            <div class="text-4xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-2">50+</div>
            <p class="text-slate-400">Categories</p>
        </div>
        <div class="card-glass rounded-2xl p-8 text-center">
            <div class="text-4xl font-bold bg-gradient-to-r from-purple-400 to-pink-400 bg-clip-text text-transparent mb-2">24/7</div>
            <p class="text-slate-400">Support</p>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="py-16">
        <div class="card-glass rounded-2xl p-12 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Get in Touch</h2>
            <p class="text-slate-300 mb-8 max-w-2xl mx-auto">
                Have questions or feedback? We'd love to hear from you. Contact our support team anytime.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4">
                <a href="mailto:support@cartify.com" class="btn-glow px-8 py-3 rounded-lg bg-gradient-secondary text-white font-bold hover:shadow-lg transition-all duration-300 inline-block">
                    Email Us
                </a>
                <a href="#" class="px-8 py-3 rounded-lg bg-slate-800 text-slate-200 font-bold hover:bg-slate-700 transition-all duration-300 inline-block">
                    Contact Support
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
