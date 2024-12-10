<!-- resources/views/home.blade.php -->

@extends('layouts.app') <!-- Extend the app layout -->

@section('title', 'Ganap') <!-- Set the page title -->

@section('content')
    <section class="text-center mx-auto  mt-5">
        <div class=" border-b text-sm text-[6B6B6B]">
            <button class="tab-btn py-2 px-5 text-gray-700 hover:text-black focus:outline-none" id="tab1-btn">
            All
            </button>
            <button class="tab-btn py-2 px-5 text-gray-700 hover:text-black focus:outline-none" id="tab2-btn">
            Daily Life
            </button>
            <button class="tab-btn py-2 px-5 text-gray-700 hover:text-black focus:outline-none" id="tab3-btn">
            Thoughts
            </button>
            <button class="tab-btn py-2 px-5 text-gray-700 hover:text-black focus:outline-none" id="tab4-btn">
            Life Experiences
            </button>
            <button class="tab-btn py-2 px-5 text-gray-700 hover:text-black focus:outline-none" id="tab5-btn">
            Travel
            </button>
            <button class="tab-btn py-2 px-5 text-gray-700 hover:text-black focus:outline-none" id="tab6-btn">
            Creativity and Hobbies
            </button>
            <button class="tab-btn py-2 px-5 text-gray-700 hover:text-black focus:outline-none" id="tab7-btn">
            Inspiration and Motivation
            </button>
        </div>
</section>
        <!-- Tab Content -->
        <section class="text-center flex justify-center">
        <div class="tab-content mt-4 w-[940px] text-center ">
            
            <div class="tab-pane hidden" id="tab1-content">
            <div class="flex  border-b-2 border-gray-100  my-3 py-4">
                            <div class="w-[65%]  text-left ">
                                <!-- Heading -->
                                <a href="{{ route('viewPost') }}"class="text-2xl font-bold mt-2 cursor-pointer">The Power of Consistency in Building Habits</a>
                                <!-- Heading -->
                                <p class="text-[#6B6B6B] text-md mt-2">Small, consistent actions lead to big results over time.</p>
                                <!-- Date, Comment, like and share -->
                                <div class="flex items-center text-sm text-[#6B6B6B] mt-3 font-light">
                                    <p class="mr-2">December 25</p>
                                    <p class=" mx-2"><i class="fa-solid fa-heart"></i> 7.5k</p>
                                    <p class=" mx-2"><i class="fa-solid fa-comment "></i> 75</p>
                                    <p class=" mx-2">  <i class="fa-solid fa-share "></i> 215</p>
                                </div>
                                <a href="{route('viewPost')}}" class="mt-4 text-sm cursor-pointer">READ MORE <i class="fa-solid fa-arrow-right"></i></a>
                            </div>
                            <div class="w-[35%] flex justify-end">
                                <img src={{asset('assets/hobby.png')}} alt="img" width="180px" height="100px">
                            </div>
                            <hr>
                    </div>
                    <div class="flex  border-b-2 border-gray-100  my-3 py-4">
                            <div class="w-[65%]  text-left ">
                                <!-- Heading -->
                                <h1 class="text-2xl font-bold mt-2">The Art of Embracing Failure</h1>
                                <!-- Heading -->
                                <p class="text-[#6B6B6B] text-md mt-2">Failure isn't the end; it's the beginning of growth.</p>
                                <!-- Date, Comment, like and share -->
                                <div class="flex items-center text-sm text-[#6B6B6B] mt-3 font-light">
                                    <p class="mr-2">December 25</p>
                                    <p class=" mx-2"><i class="fa-solid fa-heart"></i> 7.5k</p>
                                    <p class=" mx-2"><i class="fa-solid fa-comment"></i> 75</p>
                                    <p class=" mx-2">  <i class="fa-solid fa-share "></i> 215</p>
                                  
                                </div>
                                <p class="mt-4 text-sm">READ MORE <i class="fa-solid fa-arrow-right"></i></p>

                            </div>
                            <div class="w-[35%] flex justify-end">
                                <img src={{asset('assets/hobby.png')}} alt="img" width="180px" height="100px">
                            </div>
                            <hr>
                    </div>
                    <div class="flex  border-b-2 border-gray-100  my-3 py-4">
                            <div class="w-[65%]  text-left ">
                                <!-- Heading -->
                                <h1 class="text-2xl font-bold mt-2">The Art of Embracing Failure</h1>
                                <!-- Heading -->
                                <p class="text-[#6B6B6B] text-md mt-2">Failure isn't the end; it's the beginning of growth.</p>
                                <!-- Date, Comment, like and share -->
                                <div class="flex items-center text-sm text-[#6B6B6B] mt-3 font-light">
                                    <p class="mr-2">December 25</p>
                                    <p class=" mx-2"><i class="fa-solid fa-heart"></i> 7.5k</p>
                                    <p class=" mx-2"><i class="fa-solid fa-comment"></i> 75</p>
                                    <p class=" mx-2">  <i class="fa-solid fa-share "></i> 215</p>
                                  
                                </div>
                                <p class="mt-4 text-sm">READ MORE <i class="fa-solid fa-arrow-right"></i></p>

                            </div>
                            <div class="w-[35%] flex justify-end">
                                <img src={{asset('assets/hobby.png')}} alt="img" width="180px" height="100px">
                            </div>
                            <hr>
                    </div>
            </div>
            <div class="tab-pane hidden" id="tab2-content">
            <p>This is the content for Tab 2.</p>
            </div>
            <div class="tab-pane hidden" id="tab2-content">
            <p>This is the content for Tab 2.</p>
            </div>

            <div class="tab-pane hidden" id="tab3-content">
            <p>This is the content for Tab 3.</p>
            </div>
            <div class="tab-pane hidden" id="tab4-content">
            <p>This is the content for Tab 4.</p>
            </div>
            <div class="tab-pane hidden" id="tab5-content">
            <p>This is the content for Tab 5.</p>
            </div>
            <div class="tab-pane hidden" id="tab6-content">
            <p>This is the content for Tab 6.</p>
            </div>
            <div class="tab-pane hidden" id="tab7-content">
            <p>This is the content for Tab 7.</p>
            </div>
        </div>
    </section>
    <script>
    // Get all the tab buttons and tab content elements
    const tabButtons = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-pane');

    tabButtons.forEach(button => {
      button.addEventListener('click', () => {
        const targetContentId = button.id.replace('btn', 'content'); // Matching tab content ID

        // Deactivate all buttons and hide all content
        tabButtons.forEach(btn => {
          btn.classList.remove('text-black', 'border-b-2', 'border-black');
          btn.classList.add('text-gray-700');
        });

        tabContents.forEach(content => {
          content.classList.add('hidden');
        });

        // Activate the clicked button and show the corresponding content
        button.classList.add('text-black', 'border-b-2', 'border-black');
        document.getElementById(targetContentId).classList.remove('hidden');
      });
    });

    // Optionally, activate the first tab by default
    document.getElementById('tab1-btn').click();
  </script>
@endsection
