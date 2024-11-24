@extends('layouts.master')

@section('title', 'Grand Theft Auto Online')

@section('content')
    <!-- Hero Section -->
    <section class="bg-no-repeat bg-cover bg-center pb-40 pt-32 flex px-5 bg-blue-500 bg-blend-multiply"
        style="background-image: url(https://preview.redd.it/why-did-they-change-the-colored-map-to-the-black-and-white-v0-ta2vj4x5q65c1.png?width=1280&format=png&auto=webp&s=5fd620e53c7fc9d5531d48eaad6e3a1744fac50b);">
        <div class="text-white align-items-center my-auto" data-aos="fade-right">
            <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6 font-houseScript drop-shadow-xl">Welcome to Los
                Santos</h1>
            <p class="text-lg">Experience the thrill of Grand Theft Auto Online. Play as your own character as
                you embark on a dynamic and ever-evolving online universe for up to 30 players, including all existing
                gameplay upgrades and content released since launch ready to enjoy solo or with friends across the city of Los Santos.
            </p>
            <div class="mt-5">
                <button
                    class="border border-[#ffa500] font-semibold px-8 py-3 rounded-full transition transform hover:scale-105 duration-300 bg-black/30 m-auto backdrop-blur-md">
                    Learn More
                </button>
            </div>
        </div>
        <div class="w-[190rem]" data-aos="fade-left">
            <img src="{{ asset('images/gtaonline-the-chop-shop-dlc-artwork.png') }}" alt="artwork" />
        </div>
    </section>
@endsection
