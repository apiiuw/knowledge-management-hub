<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ isset($title) ? $title . 'Knowledge Management Hub' : 'Knowledge Management Hub' }}</title>
        <link rel="icon" href="{{ asset('assets/images/logo/Jasa Raharja Logo Utama.png') }}">

        {{-- CDN --}}
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
        <script src="https://kit.fontawesome.com/d7833bfda5.js" crossorigin="anonymous"></script>

        {{-- FONT --}}
        <link href="https://fonts.cdnfonts.com/css/neck-l-sans" rel="stylesheet">

        {{-- ICON --}}
        <script src="https://kit.fontawesome.com/d7833bfda5.js" crossorigin="anonymous"></script>

        {{-- TAILWIND CSS --}}
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
          tailwind.config = {
            theme: {
              extend: {
                colors: {
                    blueJR: '#277FC6',
                }
              }
            }
          }
        </script>

        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased flex justify-center items-center bg-white h-screen">
        <div class="h-96 flex items-center justify-center bg-white">
            <div class="relative">
                <div class="absolute -top-2 -left-2 -right-2 -bottom-2 rounded-lg bg-gradient-to-r from-blueJR via-white to-red-500 shadow-lg animate-pulse"></div>
                    <div id="form-container" class="bg-white p-16 rounded-lg shadow-2xl w-80 relative z-10 transform transition duration-500 ease-in-out">
                        <h2 id="form-title" class="text-center text-3xl font-bold mb-10 text-gray-800">Login</h2>
                        <form class="space-y-5">
                            <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Email" id="" name="" type="text">
                            <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Password" id="" name="" type="password">
                            <button class="w-full h-12 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sign in</button>
                            <a class="text-blue-500 hover:text-blue-800 text-sm" href="#">Forgot Password?</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>