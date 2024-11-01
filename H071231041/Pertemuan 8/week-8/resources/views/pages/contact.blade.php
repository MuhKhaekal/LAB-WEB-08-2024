@extends('layouts.master')

@section('title', 'Kontak - NexaBot')

@section('content')
    <div class="pt-24 pb-12">
        <!-- Hero Section -->
        <div class="container mx-auto px-4">
            <div class="text-center mb-12" data-aos="fade-up">
                <h1
                    class="p-5 text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                    Hubungi Kami
                </h1>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    Kami siap membantu Anda. Silakan hubungi kami melalui form di bawah ini atau melalui kontak yang
                    tersedia.
                </p>
            </div>

            <!-- Contact Section -->
            <div class="grid md:grid-cols-2 gap-12 max-w-6xl mx-auto">
                <!-- Contact Form -->
                <div class="bg-gray-800/50 p-8 rounded-2xl backdrop-blur-sm" data-aos="fade-right">
                    <form class="space-y-6">
                        <div>
                            <label class="block text-gray-400 mb-2">Nama Lengkap</label>
                            <input type="text"
                                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2">Email</label>
                            <input type="email"
                                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition">
                        </div>
                        <div>
                            <label class="block text-gray-400 mb-2">Pesan</label>
                            <textarea rows="4"
                                class="w-full px-4 py-3 rounded-lg bg-gray-700 border border-gray-600 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition"></textarea>
                        </div>
                        <button
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 px-6 py-3 rounded-lg font-medium transition duration-300">
                            Kirim Pesan
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="bg-gray-800/50 p-8 rounded-2xl backdrop-blur-sm" data-aos="fade-left">
                    <h3
                        class="text-2xl font-semibold mb-6 bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                        Informasi Kontak
                    </h3>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="text-blue-500">
                                <i class="fas fa-map-marker-alt text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1">Alamat</h4>
                                <p class="text-gray-400">Jl. Tech Valley No. 123<br>Silicon City, 12345</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-blue-500">
                                <i class="fas fa-envelope text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1">Email</h4>
                                <p class="text-gray-400">info@nexabot.com<br>support@nexabot.com</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="text-blue-500">
                                <i class="fas fa-phone text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-medium mb-1">Telepon</h4>
                                <p class="text-gray-400">+62 123 4567 890<br>+62 098 7654 321</p>
                            </div>
                        </div>
                        <!-- Social Media Links -->
                        <div class="pt-6 border-t border-gray-700">
                            <h4 class="font-medium mb-4">Ikuti Kami</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                    <i class="fab fa-facebook text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                    <i class="fab fa-twitter text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                    <i class="fab fa-instagram text-xl"></i>
                                </a>
                                <a href="#" class="text-gray-400 hover:text-blue-500 transition">
                                    <i class="fab fa-linkedin text-xl"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
