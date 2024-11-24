@extends('layouts.master')

@section('title', 'About')

@section('content')
    <div class="heading">
        <h1>About Us</h1>
        {{-- <p>We believe that every space has the potential to narrate a unique story, reflecting the lives and personalities of those who inhabit it. Our team of passionate interior designers combines creativity with functionality, crafting tailored environments that not only meet your practical needs but also evoke emotion and inspiration. With a keen eye for detail and a commitment to quality, we transform ordinary spaces into extraordinary experiences, ensuring that every design decision enhances the essence of your home or office. Whether you're looking to revitalize a single room or undertake a complete renovation, we are dedicated to bringing your vision to life, creating inviting atmospheres that foster connection and comfort. Let's embark on this journey together and turn your dream space into a beautiful reality.</p> --}}
    </div>
    <div class="container">
        <section class="about">
            <div class="about-image">
                <img src="{{ asset('css/images/a1.jpg') }}" alt="">
            </div>
            <div class="about-content">
                <h2>Every Space Tells a Story</h2>
                <p>We believe that every space has the potential to narrate a unique story, reflecting the lives and personalities of those who inhabit it. Our team of passionate interior designers combines creativity with functionality, crafting tailored environments that not only meet your practical needs but also evoke emotion and inspiration. With a keen eye for detail and a commitment to quality, we transform ordinary spaces into extraordinary experiences, ensuring that every design decision enhances the essence of your home or office. Whether you're looking to revitalize a single room or undertake a complete renovation, we are dedicated to bringing your vision to life, creating inviting atmospheres that foster connection and comfort. Let's embark on this journey together and turn your dream space into a beautiful reality.</p>
                <a><x-button url="/contact" label="Contact Us" /></a>
            </div>
        </section>
    </div>
@endsection