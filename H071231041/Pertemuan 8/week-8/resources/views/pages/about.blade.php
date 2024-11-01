@extends('layouts.master')

@section('title', 'Tentang Kami - NexaBot')

@section('content')
    <div class="pt-24 pb-12">
        <!-- Hero Section -->
        <div class="container mx-auto px-4">
            <div class="text-center mb-16" data-aos="fade-up">
                <h1
                    class="p-5 text-4xl md:text-5xl font-bold mb-4 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                    Tentang NexaBot
                </h1>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Menghadirkan solusi AI inovatif untuk membantu bisnis Anda berkembang di era digital
                </p>
            </div>

            <!-- Vision Mission Section -->
            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto mb-16">
                <div class="bg-gray-800/50 p-8 rounded-2xl backdrop-blur-sm" data-aos="fade-right">
                    <div class="text-blue-500 mb-4">
                        <i class="fas fa-eye text-3xl"></i>
                    </div>
                    <h3
                        class="text-2xl font-semibold mb-4 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                        Visi Kami
                    </h3>
                    <p class="text-gray-400">
                        Menjadi pemimpin global dalam pengembangan solusi AI yang inovatif dan terpercaya,
                        mendorong transformasi digital yang positif bagi masyarakat dan bisnis di seluruh dunia.
                    </p>
                </div>
                <div class="bg-gray-800/50 p-8 rounded-2xl backdrop-blur-sm" data-aos="fade-left">
                    <div class="text-blue-500 mb-4">
                        <i class="fas fa-bullseye text-3xl"></i>
                    </div>
                    <h3
                        class="text-2xl font-semibold mb-4 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                        Misi Kami
                    </h3>
                    <p class="text-gray-400">
                        Mengembangkan dan menyediakan solusi AI yang mudah diakses, aman, dan efektif untuk
                        membantu organisasi meningkatkan produktivitas dan mencapai potensi maksimal mereka.
                    </p>
                </div>
            </div>

            <!-- Values Section -->
            <div class="max-w-6xl mx-auto mb-16" data-aos="fade-up">
                <h2
                    class="text-3xl font-bold text-center mb-12 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                    Nilai-Nilai Kami
                </h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-gray-800/50 p-6 rounded-xl backdrop-blur-sm text-center">
                        <div class="text-blue-500 mb-4">
                            <i class="fas fa-shield-alt text-3xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold mb-3">Keamanan</h4>
                        <p class="text-gray-400">
                            Memprioritaskan keamanan dan privasi data dalam setiap solusi yang kami kembangkan.
                        </p>
                    </div>
                    <div class="bg-gray-800/50 p-6 rounded-xl backdrop-blur-sm text-center">
                        <div class="text-blue-500 mb-4">
                            <i class="fas fa-lightbulb text-3xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold mb-3">Inovasi</h4>
                        <p class="text-gray-400">
                            Terus berinovasi dan mengembangkan teknologi AI terdepan untuk masa depan yang lebih baik.
                        </p>
                    </div>
                    <div class="bg-gray-800/50 p-6 rounded-xl backdrop-blur-sm text-center">
                        <div class="text-blue-500 mb-4">
                            <i class="fas fa-users text-3xl"></i>
                        </div>
                        <h4 class="text-xl font-semibold mb-3">Kolaborasi</h4>
                        <p class="text-gray-400">
                            Membangun kemitraan yang kuat dan berkelanjutan dengan klien dan mitra kami.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Team Section -->
            <div class="max-w-6xl mx-auto" data-aos="fade-up">
                <h2
                    class="text-3xl font-bold text-center mb-12 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                    Tim Kami
                </h2>
                <div class="grid md:grid-cols-4 gap-8">
                    <div class="bg-gray-800/50 p-6 rounded-xl backdrop-blur-sm text-center">
                        <img src="{{ asset('images/profile_picture.jpg') }}" alt="CEO"
                            class="rounded-full mx-auto mb-4">
                        <h4 class="text-xl font-semibold mb-2">John Doe</h4>
                        <p class="text-blue-500 mb-3">CEO & Founder</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    <div class="bg-gray-800/50 p-6 rounded-xl backdrop-blur-sm text-center">
                        <img src="{{ asset('images/profile_picture.jpg') }}" alt="CTO"
                            class="rounded-full mx-auto mb-4">
                        <h4 class="text-xl font-semibold mb-2">Jane Smith</h4>
                        <p class="text-blue-500 mb-3">CTO</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                    <div class="bg-gray-800/50 p-6 rounded-xl backdrop-blur-sm text-center">
                        <img src="{{ asset('images/profile_picture.jpg') }}" alt="Lead Developer"
                            class="rounded-full mx-auto mb-4">
                        <h4 class="text-xl font-semibold mb-2">Mike Johnson</h4>
                        <p class="text-blue-500 mb-3">Lead Developer</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                <i class="fab fa-github"></i>
                            </a>
                        </div>
                    </div>
                    <div class="bg-gray-800/50 p-6 rounded-xl backdrop-blur-sm text-center">
                        <img src="{{ asset('images/profile_picture.jpg') }}" alt="Product Manager"
                            class="rounded-full mx-auto mb-4">
                        <h4 class="text-xl font-semibold mb-2">Sarah Lee</h4>
                        <p class="text-blue-500 mb-3">Product Manager</p>
                        <div class="flex justify-center space-x-3">
                            <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                <i class="fab fa-linkedin"></i>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
