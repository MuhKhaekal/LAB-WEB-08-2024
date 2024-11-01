@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="pt-32 pb-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center p-8">
                <div class="md:w-1/2" data-aos="fade-right">
                    <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">Transformasi Bisnis Anda dengan
                        <span class="bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">Chatbot
                            AI</span>
                    </h1>
                    <p class="text-gray-300 text-lg mb-8">
                        Tingkatkan pelayanan customer service Anda 24/7 dengan chatbot AI
                        yang pintar, responsif, dan disesuaikan dengan kebutuhan bisnis
                        Anda.
                    </p>
                    <div class="flex space-x-4">
                        <button
                            class="bg-blue-600 hover:bg-blue-700 px-8 py-3 rounded-full transition transform hover:scale-105">
                            Mulai Sekarang
                        </button>
                        <button class="border border-blue-600 px-8 py-3 rounded-full transition transform hover:scale-105">
                            Pelajari Lebih Lanjut
                        </button>
                    </div>
                </div>
                <div class="md:w-1/2 mt-12 md:mt-0" data-aos="fade-left">
                    <img src="{{ asset('images/Poe-Chatbot-Logo.png') }}" alt="AI Chatbot Illustration"
                        class="rounded-lg shadow-2xl" />
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}

@endsection
