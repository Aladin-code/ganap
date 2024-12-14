@extends('layouts.app') <!-- Extend the app layout -->

@section('title', 'Ganap') <!-- Set the page title -->

@section('content')
<section class="text-center mx-auto flex justify-center py-2">
    <div class="w-[900px]">
        <p class="text-left font-bold text-gray-500 text-3xl mb-2">
            Results for <span class="text-gray-700">Travel Blog</span>
        </p>
        <hr>
        <div class="flex flex-row sm:flex-row border-b-2 border-gray-100 my-3 py-4">
                    <!-- Left Content -->
                    <div class="sm:w-2/3 text-left">
                        <!-- Heading -->
                        <a href="" class="text-2xl font-bold mt-2 cursor-pointer ">The Power of Consistency in Building Habits</a>
                        <p class="text-gray-500 text-md mt-2">Small, consistent actions lead to big results over time.</p>
                        <!-- Date, Comment, Like, and Share -->
                        <div class="flex items-center text-sm text-gray-500 mt-3 font-light space-x-4">
                            <p>December 25</p>
                            <p><i class="fa-solid fa-heart"></i> 7.5k</p>
                            <p><i class="fa-solid fa-comment"></i> 75</p>
                            <p><i class="fa-solid fa-share"></i> 215</p>
                        </div>
                        <a href="" class="mt-4 text-sm text-blue-500 cursor-pointer">READ MORE <i class="fa-solid fa-arrow-right"></i></a>
                    </div>
                    <!-- Right Content -->
                    <div class="sm:w-1/3 flex justify-center sm:justify-end">
                        <img src="{{ asset('assets/hobby.png') }}" alt="img" class="w-32 ">
                    </div>
                </div>
    </div>

</section>


@endsection