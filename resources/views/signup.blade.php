<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite('resources/css/app.css')
    <style>
        * {
            font-family: "Poppins", sans-serif;
        }
        .input-icon {
            position: absolute;
            bottom: 50%;
            transform: translateY(50%);
            left: 20px;
            color: #4B5563; /* Icon color */
        }
        .input-field {
            padding-left: 40px; /* Adjust padding to make space for the icon */
        }
    </style>
</head>
<body>
    <section class="flex justify-center h-screen items-center">
        <div class="w-[1100px] shadow-lg flex h-[500px] rounded-3xl border relative">
            <i class="fa-solid fa-arrow-left absolute top-4 left-5 text-xl"></i>
            <div class="flex flex-col items-center justify-center px-5 w-1/2">
                <h1 class="text-3xl font-light mb-4">Sign up to <span class="font-bold text-4xl">Ganap.</span></h1>
                <form action="{{ route('register') }}" method="POST" class="w-full px-10 mt-5">
                    <div>
                        <div class="relative mb-3">
                            <i class="fa-solid fa-envelope input-icon"></i>
                            <input type="email" class="block w-full border-2 border-black rounded-3xl input-field text-md py-3 bg-gray-50" placeholder="Email" name="">
                        </div>
                        <div class="relative mb-3">
                            <i class="fa-solid fa-lock input-icon"></i>
                            <input type="password" class="block w-full border-2 border-black rounded-3xl input-field text-md py-3 bg-gray-50" placeholder="Password" name="">
                        </div>
                        <div class="relative mb-3">
                            <i class="fa-solid fa-lock input-icon"></i>
                            <input type="password" class="block w-full border-2 border-black rounded-3xl input-field text-md py-3 bg-gray-50" placeholder="Confirm Password" name="">
                        </div>
                        <div class="flex justify-center">
                            <input type="submit" class="font-bold mt-2 cursor-pointer bg-black mx-auto text-white p-3 rounded-3xl px-12" value="SIGN UP">
                        </div>
                    </div>
                </form>
            </div>
            <div class="flex items-center justify-center w-1/2 bg-black flex-col rounded-r-xl">
                <h1 class="text-white text-3xl font-semibold mb-7">Get Started!</h1>
                <p class="text-white text-center mt-4 px-7 w-full mb-7">
                    Don't miss out on inspiring stories and valuable lessons! If you already have an account, please sign in now.
                </p>
                <div class="flex justify-center mt-8">
                    <input type="submit" class="cursor-pointer bg-white text-black p-2 rounded-xl px-9 font-bold" value="SIGN IN">
                </div>
            </div>
        </div>
    </section>
</body>
</html>
