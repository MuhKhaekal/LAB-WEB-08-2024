@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <section class="hero-section">
        <div class="image1">
            <img src="{{ asset('css/images/h2.jpg') }}" alt="" width="auto" height="200" />
        </div>
        <div class="image2">
            <img src="{{ asset('css/images/h1.jpg') }}" alt="" width="300" height="200" />
        </div>
        <div class="container d-flex align-items-start justify-content-between fs-1 text-white flex-column">
            <div>
                <h1 class="text-start">Design Interior</h1>
                <p>Step into a world where the art of Interior Design is meticulously 
                    crafted to bring together timeless elegance and cutting-edge 
                    modern Innovation, Allowing you to transform your living spaces 
                    into the epitome of luxury and sophistication</p>
                <a><x-button url="/contact" label="Make a Project" /></a>
            </div>
            
            <!-- Statistik di sini -->
            <div class="stats-container">
                <div class="stat">
                    <h2 class="stats-number">400+</h2>
                    <p class="stats-description">Project Complete</p>
                </div>
                <div class="stat">
                    <h2 class="stats-number">600+</h2>
                    <p class="stats-description">Satisfied Clients</p>
                </div>
                <div class="stat">
                    <h2 class="stats-number">100+</h2>
                    <p class="stats-description">Unique Styles</p>
                </div>
            </div>
        </div>
    </section>
@endsection