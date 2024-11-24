@extends('layouts.master')

@section('title', 'Grand Theft Auto Online')

@section('content')
    <div class="container mx-auto px-4">
        <div class="text-center mb-16" data-aos="fade-up">
            <h1 class="p-5 pt-7 text-4xl md:text-5xl font-bold mb-4 text-white drop-shadow-2xl">
                About
            </h1>
            <p class="text-gray-400 max-w-2xl mx-auto">
                Grand Theft Auto Online, more commonly known as GTA Online, is a story-driven online multiplayer
                action-adventure game developed by Rockstar North and published by Rockstar Games.
            </p>
        </div>

        <!-- About Section -->
        <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto mb-16">
            <div class="bg-gray-800/50 p-8 pb-24 rounded-2xl backdrop-blur-sm" data-aos="fade-right">
                <div class="text-blue-500 mb-4">
                    <i class="fas fa-eye text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-white drop-shadow-2xl">
                    Gameplay
                </h3>
                <p class="text-gray-400">
                    Players may travel around and interact with the map at will and can take part in many gameplay
                    activities, including assaults on local gangs, robbing armored trucks, and challenging other players to
                    Impromptu Races. Several of these open world activities are unique to the GTA Online, while others were
                    originally from GTA V. Players can also purchase property, vehicles, clothing, masks and weapons for
                    their character. Aside from the free roam aspect, GTA Online also includes several localized, more
                    traditional multiplayer game modes known as Jobs that are played in separate sessions independent from
                    the larger open world; players partaking in these jobs will not be visible to and cannot interact with
                    players occupying the open world, even if they inhabit the same location at the same time.
                </p>
            </div>
            <div class="bg-gray-800/50 p-8 pb-24 rounded-2xl backdrop-blur-sm" data-aos="fade-left">
                <div class="text-blue-500 mb-4">
                    <i class="fas fa-bullseye text-3xl"></i>
                </div>
                <h3 class="text-2xl font-semibold mb-4 text-white drop-shadow-2xl">
                    Trailer
                </h3>
                <iframe class="w-full h-full flex p-auto" src="https://www.youtube.com/embed/olEGtoYs_8A?si=H_aDhuYosYAwVQkl"
                    title="YouTube video player" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>

        <!-- Features Section -->
        <div class="max-w-6xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-center mb-12 text-white drop-shadow-2xl">
                Features
            </h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-800/50 p-6 rounded-xl backdrop-blur-sm text-center">
                    <div class="text-blue-500 mb-4">
                        <i class="fas fa-shield-alt text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-3">Open world</h4>
                    <p class="text-gray-400">
                        Players may travel around and interact with the map at will and can take part in many gameplay
                        activities.
                    </p>
                </div>
                <div class="bg-gray-800/50 p-6 rounded-xl backdrop-blur-sm text-center">
                    <div class="text-blue-500 mb-4">
                        <i class="fas fa-lightbulb text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-3">Heists & Missions</h4>
                    <p class="text-gray-400">
                        Participate in thrilling heists and missions, either solo or with friends, requiring strategic planning, teamwork, and skillful execution.
                    </p>
                </div>
                <div class="bg-gray-800/50 p-6 rounded-xl backdrop-blur-sm text-center">
                    <div class="text-blue-500 mb-4">
                        <i class="fas fa-users text-3xl"></i>
                    </div>
                    <h4 class="text-xl font-semibold mb-3">Online Multiplayer</h4>
                    <p class="text-gray-400">
                        Engage in competitive and cooperative multiplayer modes, such as races, deathmatches, and capture the flag, with up to 30 players.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
