@extends('layouts.master')

@section('title', 'Grand Theft Auto Online')

@section('content')
    <section class="bg-no-repeat bg-cover py-16" style="background-image: url({{ asset('images/Rockstar_bg.png') }})">
        <div class="container mx-auto text-center mb-5" data-aos="fade-up">
            <h1 class="text-4xl md:text-5xl font-bold text-white font-houseScript">Contact Us</h1>
            <p class="text-white mt-5">Have any questions or concerns? Feel free to reach out to us!</p>
        </div>
        <div class="max-w-3xl border border-slate-200 rounded-xl mx-auto font-chalet1960 p-5 mb-10 shadow-2xl bg-black/30 m-auto backdrop-blur-md" data-aos="fade-up">
            <form action="">
                <label for="name">
                    <span class="block font-semibold text-white">Name</span>
                    <input type="text" placeholder="Entered Name" id="name"
                        class="mb-5 px-4 py-3 border shadow rounded w-full block bg-slate-700 text-gray-300 focus:outline-none focus:ring-1 focus:ring-[#ffa500] focus:border-[#ffa500] transition">
                </label>
                <label for="email">
                    <span class="block font-semibold text-white">Email</span>
                    <input type="email" placeholder="Entered Email" id="email"
                        class="px-4 py-3 border shadow rounded w-full block bg-slate-700 text-gray-300 focus:outline-none focus:ring-1 focus:ring-[#ffa500] focus:border-[#ffa500] invalid:text-red-600 invalid:focus:ring-red-600 invalid:focus:border-red-600 transition  peer">
                    <p class="mb-3 text-sm m-1 text-red-600 invisible peer-invalid:visible">Email not valid</p>
                </label>
                <label for="message">
                    <span class="block font-semibold text-white">Message</span>
                    <textarea name="message" id="message" cols="30" rows="10"
                        class="mb-6 px-4 py-2 border shadow rounded w-full block bg-slate-700 text-gray-300 focus:outline-none focus:ring-1 focus:ring-[#ffa500] focus:border-[#ffa500] transition"></textarea>
                </label>
                <button class="w-1/4 mx-auto block text-base bg-white px-6 py-3 rounded-full font-semibold drop-shadow-lg hover:bg-[#ffa500] active:bg-slate-300 transition duration-300">
                    SEND
                </button>
            </form>
        </div>
    </section>
@endsection
