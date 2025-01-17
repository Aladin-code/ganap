@extends('layouts.app')

@section('title', 'Ganap')

@section('content')

@include('search')


<!-- Navigation Section -->
<section class="text-center flex justify-center mt-5" id="all-content">
    <div class=" text-sm text-gray-500 border-b">
        <!-- Tabs for Categories -->
        <button class="tab-btn py-2 px-5 text-gray-700 hover:text-black focus:outline-none" id="tab0-btn" data-category-id="0">
            All
        </button>
        @foreach ($categories as $category)
        <button class="tab-btn py-2 px-5 text-gray-700 hover:text-black focus:outline-none" id="tab{{ $category->id }}-btn" data-category-id="{{ $category->id }}">
            {{ $category->name }}
        </button>
        @endforeach
    </div>
</section>

<!-- Tab Content Section -->
<section class="text-center flex justify-center px-4 sm:px-6 lg:px-8 " id="second-content">
    <div class="tab-content mt-4 w-full max-w-4xl">
        <!-- All Posts (Category ID 0) -->
        <div class="tab-pane hidden" id="tab0-content">
            @foreach($posts as $post)
            <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">

            @if(Auth::check())
                <input type="hidden" name="post_id" id="user_id" value="{{ auth()->user()->id }}">
            @endif
            <div class="flex flex-col sm:flex-row border-b-2 border-gray-100 my-4 py-6">
                <!-- Left Content -->
                <div class="sm:w-2/3 text-left space-y-4">
                    <!-- Post Title -->
                    <a href="{{ route('viewPost', $post->id) }}" class="text-3xl font-bold text-black capitalize hover:text-gray-700 transition-colors duration-300">
                        {{ $post->title }}
                    </a>

                    <!-- Post Excerpt -->
                    <p class="text-gray-700 text-base mt-2"> {!! html_entity_decode(preg_replace('/\s+/', ' ', strtok($post->content, '.')) . '.') !!}</p>

                    <!-- Post Meta (Date and Actions) -->
                    <div class="flex items-center text-gray-700 mt-3 font-light space-x-6 text-sm">
                        <p>{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y')}}</p>
                    </div>

                    <!-- Read More Link -->
                    <a href="{{ route('viewPost', $post->id) }}" class="mt-4 text-sm text-blue-500 hover:text-blue-700 cursor-pointer">
                        READ MORE <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Right Content (Image) -->
                <div class="sm:w-1/3 flex justify-center sm:justify-end mt-4 sm:mt-0">
                    <img src="{{ asset('assets/' . $post->featured_image) }}" alt="Featured Image" class="w-32 h-32 object-cover rounded-lg shadow-lg">
                </div>

                @if(Auth::check() && auth()->user()->role == 'admin')
                <!-- Edit and Delete Icons -->
                <div class="flex justify-end sm:mt-0 mt-4 ml-5 space-x-3 items-center">
                    <!-- Edit Icon with Tooltip -->
                    <div class="relative group inline-block">
                        <a href="{{ route('users.edit', ['user' => $post->id]) }}">
                            <i class="fa-solid fa-pen-to-square text-gray-600 hover:text-blue-600 cursor-pointer transition-colors duration-300"></i>
                        </a>
                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-3 hidden group-hover:flex flex-col items-center">
                            <div class="bg-gray-800 text-white text-xs px-3 py-1 rounded">
                                Edit
                            </div>
                            <div class="w-2 h-2 bg-gray-800 transform rotate-45 -mt-1"></div>
                        </div>
                    </div>

                    <!-- Trash Icon with Tooltip -->
                    <div class="relative group inline-block">
                        <form action="{{ route('users.destroy', [$post->id]) }}" method="POST" id="deleteForm">
                            @method('DELETE')
                            @csrf
                            <button type="button" id="deleteButton" class="cursor-pointer">
                                <i class="fa-solid fa-trash text-red-600 hover:text-red-800 transition-colors duration-300"></i>
                            </button>
                        </form>
                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-3 hidden group-hover:flex flex-col items-center">
                            <div class="bg-gray-800 text-white text-xs px-3 py-1 rounded">
                                Delete
                            </div>
                            <div class="w-2 h-2 bg-gray-800 transform rotate-45 -mt-1"></div>
                        </div>
                        
                    </div>
                   
                </div>
                @endif
            </div>
            @endforeach
        </div>

        <!-- Category Tabs -->
        @foreach ($categories as $category)
        <div class="tab-pane hidden" id="tab{{ $category->id }}-content">
            @foreach($posts as $post)
                @if($post->category_id == $category->id) <!-- Show posts matching the category -->
                <div class="flex flex-col sm:flex-row border-b-2 border-gray-100 my-4 py-6">
                    <!-- Left Content -->
                    <div class="sm:w-2/3 text-left space-y-4">
                        <!-- Post Title -->
                        <a href="{{ route('viewPost', $post->id) }}" class="text-3xl font-bold text-black capitalize hover:text-gray-800 transition-colors duration-300">
                            {{ $post->title }} 
                        </a>

                        <!-- Post Excerpt -->
                        <p class="text-gray-700 text-base mt-2">{!! html_entity_decode(preg_replace('/\s+/', ' ', strtok($post->content, '.')) . '.') !!}</p>

                        <!-- Post Meta (Date and Actions) -->
                        <div class="flex items-center text-gray-700 mt-3 font-light space-x-6 text-sm">
                            <p>{{ \Carbon\Carbon::parse($post->created_at)->format('F d, Y')}}</p>
                        </div>

                        <!-- Read More Link -->
                        <a href="{{ route('viewPost', $post->id) }}" class="mt-4 text-sm text-blue-500 hover:text-blue-700 cursor-pointer">
                            READ MORE <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Right Content (Image) -->
                    <div class="sm:w-1/3 flex justify-center sm:justify-end mt-4 sm:mt-0">
                        <img src="{{ asset('assets/' . $post->featured_image) }}" alt="Featured Image" class="w-32 h-32 object-cover rounded-lg shadow-lg">
                    </div>

                    <!-- Edit and Delete Icons -->
                    @if(Auth::check() && auth()->user()->role == 'admin')
                    <div class="flex justify-end sm:mt-0 mt-4 ml-5 space-x-3  items-center">
                        <!-- Edit Icon with Tooltip -->
                        <div class="relative group inline-block">
                            <a href="{{ route('users.edit', ['user' => $post->id]) }}">
                                <i class="fa-solid fa-pen-to-square text-gray-600 hover:text-blue-600 cursor-pointer transition-colors duration-300"></i>
                            </a>
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-3 hidden group-hover:flex flex-col items-center">
                                <div class="bg-gray-800 text-white text-xs px-3 py-1 rounded">
                                    Edit
                                </div>
                                <div class="w-2 h-2 bg-gray-800 transform rotate-45 -mt-1"></div>
                            </div>
                        </div>

                        <!-- Trash Icon with Tooltip -->
                        <div class="relative group inline-block">
                            <form action="{{ route('users.destroy', [$post->id]) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="cursor-pointer">
                                    <i class="fa-solid fa-trash text-red-600 hover:text-red-800 transition-colors duration-300"></i>
                                </button>
                            </form>
                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-3 hidden group-hover:flex flex-col items-center">
                                <div class="bg-gray-800 text-white text-xs px-3 py-1 rounded">
                                    Delete
                                </div>
                                <div class="w-2 h-2 bg-gray-800 transform rotate-45 -mt-1"></div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                @endif
                
            @endforeach
        </div>
        @endforeach
    </div>
</section>

<!-- JavaScript for Tab Functionality -->

 
<script>
    
const tabButtons = document.querySelectorAll('.tab-btn');
const tabContents = document.querySelectorAll('.tab-pane');

tabButtons.forEach(button => {
    button.addEventListener('click', () => {
        const categoryId = button.getAttribute('data-category-id');

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

        // Show content of the selected category
        document.getElementById('tab' + categoryId + '-content').classList.remove('hidden');
    });
});
// Optionally, activate the 'All' category by default
document.getElementById('tab0-btn').click(); // Assuming 'All' tab has data-category-id = 0


//search
$(document).ready(function() {
    $('#search').on('keyup', function() {
        let query = $(this).val();
        
       
        if (query.trim() === "") {
            $('#all-content').show();
            $('#second-content').show();
            $('#results').hide();
            $('#result-p').hide();
            return
            // $('#results').hide();
            // Stop the function from running further
        }

        $('#all-content').hide();
        $('#second-content').hide();
        $('#result-p').show();
        $('#results').show();
        $.ajax({
            url: "/search", // Your search route
            method: "GET", // Method is GET, as you're performing a search
            data: {
                query: query
            }, // Sending the search keyword
            success: function(data) {
                console.log('Returned data:', data); // Check what data looks like

                let results = '';

                // Check if data is an array and has results
                if (Array.isArray(data) && data.length > 0) {
                    // Loop through the results (posts)
                    data.forEach(post => {
                        const firstLine = post.content.split('.')[0];
                        const url = `/viewPost/${post.id}`;
                        const imgURL = `{{ asset('assets') }}/${post.featured_image}`;

                        results += `
                            <div class="w-[900px]">
                                <hr>
                                <div class="flex flex-row sm:flex-row border-b-2 border-gray-100 my-3 py-4">
                                    <!-- Left Content -->
                                    <div class="sm:w-2/3 text-left">
                                        <!-- Heading -->
                                        <a href="${url}" class="text-2xl font-bold mt-2 cursor-pointer ">${post.title}</a>
                                        <p class="text-gray-500 text-md mt-2">${firstLine}</p>
                                        <!-- Date, Comment, Like, and Share -->
                                        <div class="flex items-center text-sm text-gray-500 mt-3 font-light space-x-4">
                                            <p>December 25</p>
                                           
                                        </div>
                                        <a href="${url}" class="mt-4 text-sm text-blue-500 cursor-pointer">READ MORE <i class="fa-solid fa-arrow-right"></i></a>
                                    </div>
                                    <!-- Right Content (Image) -->
                                    <div class="sm:w-1/3 flex justify-center sm:justify-end mt-4 sm:mt-0">
                                        <img src="${imgURL}" alt="Featured Image" class="w-32 h-32 object-cover rounded-lg shadow-lg">
                                    </div>

                                    <!-- Edit and Delete Icons -->
                                     @if(Auth::check() && auth()->user()->role == 'admin')
                                    <div class="flex justify-end sm:mt-0 ml-5 mt-4 space-x-3 items-center">
                                        <!-- Edit Icon with Tooltip -->
                                        <div class="relative group inline-block">
                                            <a href="{{ route('users.edit', ['user' => $post->id]) }}">
                                                <i class="fa-solid fa-pen-to-square text-gray-600 hover:text-blue-600 cursor-pointer transition-colors duration-300"></i>
                                            </a>
                                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-3 hidden group-hover:flex flex-col items-center">
                                                <div class="bg-gray-800 text-white text-xs px-3 py-1 rounded">
                                                    Edit
                                                </div>
                                                <div class="w-2 h-2 bg-gray-800 transform rotate-45 -mt-1"></div>
                                            </div>
                                        </div>

                                        <!-- Trash Icon with Tooltip -->
                                        <div class="relative group inline-block">
                                            <form action="{{ route('users.destroy', [$post->id]) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="cursor-pointer">
                                                    <i class="fa-solid fa-trash text-red-600 hover:text-red-800 transition-colors duration-300"></i>
                                                </button>
                                            </form>
                                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-3 hidden group-hover:flex flex-col items-center">
                                                <div class="bg-gray-800 text-white text-xs px-3 py-1 rounded">
                                                    Delete
                                                </div>
                                                <div class="w-2 h-2 bg-gray-800 transform rotate-45 -mt-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        `;
                    });
                } else {
                    results = `No Results`;
                }

                // Update the results section
                $('#results').html(results);
            },
            error: function(err) {
                console.error('Error fetching search results:', err);
            }
        });
    });
});

document.getElementById('deleteButton').addEventListener('click', function (e) {
Swal.fire({
  title: "Are you sure?",
  showCancelButton: true,
  confirmButtonText: "Yes",
  customClass: {
        popup: 'max-h-[90vh] h-[200px] overflow-y-auto',
        confirmButton: 'bg-red-700 text-white px-4 py-2 rounded',
        cancelButton: 'bg-gray-300 text-black px-4 py-2 rounded'
    }
}).then((result) => {
  if (result.isConfirmed) {
    // If confirmed, submit the form
    document.getElementById('deleteForm').submit();
  } else if (result.isDenied) {
    Swal.fire("Changes are not saved", "", "info");
  }
});
});



</script>

@if(session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "Successful",
            text: "{{ session('success') }}",
        });
    </script>
@elseif(session('error'))
<script>
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "{{ session('error') }}",
        });
    </script>
@endif




@endsection