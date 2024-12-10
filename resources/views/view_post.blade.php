@extends('layouts.app') <!-- Extend the app layout -->

@section('title', 'Ganap') <!-- Set the page title -->

@section('content')

    <section class="flex justify-center bg-white">
            <div class=" max-w-[700px] px-2 mt-7">
                 <h1 class="font-bold text-4xl">The Power of Consistency in Building Habits</h1>
                 <p class="text-[#6B6B6B] text-lg font-regular mt-2 mb-2 ">Small, consistent actions lead to big results over time.</p>
                 <hr>
                   <div class="flex justify-center mt-2  p-2">
                      <img src={{asset('assets/hobby.png')}} alt="img" >
                    </div>
                 <p class="p-2">
                  In a world where instant gratification is increasingly common, building habits the right way can be one of the most rewarding decisions you make. Consistency is the key to lasting change. Whether it's learning a new skill, working on your fitness, or improving your mental health, showing up every day—even if it's just for a few minutes—creates compounding results.<br><br>
                  Start with small, achievable goals. As you build momentum, you'll notice that what once felt like a struggle becomes a natural part of your routine. The magic of consistency lies in its ability to compound, turning little efforts into big accomplishments.<br><br>
                So, if you’ve been putting off that project, or struggling to maintain a new habit, remember: it's not about perfection. It's about showing up day after day, no matter how small the steps may seem.
                 </p>
                 <hr>
                 <div class="flex w-full items-center  p-2 text-xl mt-[20px]">
                    <p><i class="fa-regular fa-heart mr-3"></i></p>
                    <input type="text" class="bg-none flex flex-grow border border-black focus:outline-none  rounded-3xl py-2 mx-3 text-sm px-5" placeholder="Type your comment here">
                    <p><i class="fa-solid fa-share"></i></p>
                 </div>
                 <p class="px-2 text-sm">2 Likes</p>
                 <p class="px-2 text-sm my-1"><span class="font-semibold">Aladin Cacho:</span> Exactly</p>
                 <p class="px-2 text-sm my-1"><span class="font-semibold">Paola:</span> You nailed it!</p>
            </div>
    </section>
  
@endsection