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
            <p class="text-4xl font-bold mr-3">Ganap</p>
            <div class="relative px-3">
                <input 
                    type="text" 
                    class="px-11 border-none focus:outline-none bg-[#F9F9F9] rounded-3xl font-light text-[#6B6B6B] text-sm py-2" 
                    placeholder="Search">
                <i class="fa-solid fa-magnifying-glass absolute top-[30%] left-8 text-gray-400"></i>
            </div>
        </div>

        <ul class="flex font-light text-[#6B6B6B]">
            <li class="mx-2 hover:text-gray-800">
                <a href="/">About</a>
            </li>
            <li class="mx-2 hover:text-gray-800">
                <a href="/">Write</a>
            </li>
            <li class="mx-2 hover:text-gray-800">
                <a href="/">Signin</a>
            </li>
            <li class="mx-2 hover:text-gray-800">
                <a href="/">Get Started</a>
            </li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto pt-20"> <!-- Added padding to avoid overlap with fixed navbar -->
        @yield('content') <!-- Page-specific content will be injected here -->
    </div>

    <!--Footer -->
     <hr>
    <footer class="text-center py-4">
        <p>&copy; 2024 Your Company. All rights reserved.</p>
    </footer>
    
</body>
</html>
