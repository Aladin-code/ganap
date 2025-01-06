<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Application')</title> <!-- Default title -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tiny.cloud/1/ethquv5y9l0wu8wbinl0g7odqfsxs4krnuhn3pyv8f1kl1cf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Vite (Recommended for Laravel 10+) -->
    @vite('resources/css/app.css')

    <!-- Global Styles -->
    <style>
        * {
            font-family: "Poppins", sans-serif;
            background-color: white; /* Changed "serif" to "sans-serif" as Poppins is a sans-serif font */
        }
    </style>
</head>
<body class="bg-[#F9F9F9]"> <!-- Added a default background color -->

    <!-- Navbar -->
    <nav class="flex justify-between items-center py-2 px-8 fixed w-full bg-white border-b-2 shadow-sm z-50">
        <div class="flex items-center h-full">
            <a href="/" class="text-4xl font-bold mr-3">Ganap</a>
            @if(request()->is('/'))
                <div class="relative px-3">
                    <input 
                        type="text" 
                        id="search"
                        class="px-11 border-none focus:outline-none bg-[#F9F9F9] rounded-3xl font-light text-[#6B6B6B] text-sm py-2" 
                        placeholder="Search"
                    >
                    <i class="fa-solid fa-magnifying-glass absolute top-[30%] left-8 text-gray-400"></i>
                </div>
            @endif
        </div>

        <ul class="flex font-light text-[#6B6B6B] items-center" >

        <li class="mx-2 hover:text-gray-800">
                <a href="/">Home</a>
            </li>
            <li class="mx-2 hover:text-gray-800">
                <a href="/about">About</a>
            </li>
        
            @if(auth::check() && Auth::user()->role== "admin")
                <li class="mx-2 hover:text-gray-800">
                     <a href="/newPost">Write</a>
                 </li>
            @endif
           
            @if(auth::check())
                <li class="mx-2 relative">
                    <img 
                        src={{asset('assets/user.png')}} 
                        alt="User Avatar" 
                        width="30px" 
                        height="30px" 
                        class="cursor-pointer" 
                        id="userIcon">
                    
                    <!-- Dropdown Menu -->
                    <div    
                        id="userDropdown" 
                        class="absolute right-0 mt-2 w-48 bg-white border rounded-md shadow-lg hidden z-50">
                        <div class="px-4 py-2 text-sm text-gray-700 border-b"> 
                            <!-- User Information -->
                            <p class="font-medium">{{Auth::user()->email}}</p>
                            <p class="text-xs text-gray-500"></p>
                        </div>
                        <div>
                    <!-- Logout Button -->
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                Sign out
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                        </form>
                    <!-- <a 
                        href="/" 
                        class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-100">
                        Sign out
                    </a> -->
                    </div>
                    </div>
                </li>
            @else
                <li class="mx-2 hover:text-gray-800">
                    <a href="{{ route('login') }}">Signin</a>
                </li>
                <li class="mx-2 hover:text-gray-800">
                    <a href="{{ route('register') }}">Get Started</a>
                </li>
                    
        </ul>
        @endif
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto pt-20"> <!-- Added padding to avoid overlap with fixed navbar -->
        @yield('content') <!-- Page-specific content will be injected here -->
    </div>

    <!--Footer -->
     <hr>
    <footer class="text-center py-4">
        <p>&copy; 2024 Ganap. All rights reserved.</p>
    </footer>
    
</body>
<script>
    const userIcon = document.getElementById('userIcon');
    const userDropdown = document.getElementById('userDropdown');

    userIcon.addEventListener('click', () => {
        // Toggle dropdown visibility
        userDropdown.classList.toggle('hidden');
    });

    // Close the dropdown if clicked outside
    document.addEventListener('click', (event) => {
        if (!userIcon.contains(event.target) && !userDropdown.contains(event.target)) {
            userDropdown.classList.add('hidden');
        }
    });

</script>

</html>