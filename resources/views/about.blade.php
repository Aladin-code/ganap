@extends('layouts.app')

@section('title', 'Ganap')

@section('content')
@include('search')

<section class="w-full flex justify-center">
<main class="w-[1300px] mx-auto p-6 bg-white mt-10">
        <section class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Welcome to Ganap!</h1>
            <p class="mt-4 text-lg text-gray-600">Ganap is a personal blog where I share my thoughts, experiences, and stories about life, travel, and more. It's a space where I reflect on the journey of self-discovery, the beauty of different places, and the lessons life has taught me along the way.</p>
        </section>

        <section class="mb-12">
            <h2 class="text-3xl font-semibold text-gray-900">About Me</h2>
            <p class="mt-4 text-lg text-gray-600">Hi! I'm Aladin, the creator behind Ganap. I'm passionate about exploring new places, learning from the people I meet, and documenting my experiences. I started this blog to connect with others who share similar interests and to have a space where I can share my stories and ideas.</p>
            <p class="mt-4 text-lg text-gray-600">This blog covers a variety of topics such as travel, lifestyle, personal growth, and reflections on daily life. Whether it's a trip to a new country or a simple lesson I've learned from an everyday encounter, Ganap is where I express my thoughts and experiences.</p>
        </section>

        <section>
            <h2 class="text-3xl font-semibold text-gray-900 mb-4">Our Vision</h2>
            <p class="text-lg text-gray-600">At Ganap, we believe that every experience, no matter how small, adds something meaningful to our lives. The blog is a celebration of moments big and small, offering readers a place to reflect, learn, and grow. I hope this blog inspires you to take on your own journey and embrace life's moments.</p>
        </section>
    </main>
</section>

@endsection