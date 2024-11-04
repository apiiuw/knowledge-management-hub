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
        <!-- Tombol Kembali -->
        <div class="absolute top-4 left-4">
            <a href="/" class="flex items-center text-blueJR hover:text-blue-700 font-bold">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12H3m0 0L6 9m-3 3l3 3" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="h-96 flex items-center justify-center bg-white">
            <div class="relative">
                <div class="absolute -top-2 -left-2 -right-2 -bottom-2 rounded-lg bg-gradient-to-r from-blueJR via-white to-red-500 shadow-lg animate-pulse"></div>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div id="form-container" class="bg-white p-16 rounded-lg shadow-2xl w-80 md:w-full relative z-10 transform transition duration-500 ease-in-out">
                    <h2 id="form-title" class="text-center text-3xl font-bold mb-10 text-gray-800">Masuk</h2>
                    <form class="space-y-5">
                        <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Email" id="" name="" type="text">
                        <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Password" id="" name="" type="password">
                        <button class="w-full h-12 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Sign in</button>
                        <a class="text-blue-500 hover:text-blue-800 text-sm" href="#">Forgot Password?</a>
                    </form>
                    <!-- Tombol masuk dengan Google -->
                    <div class="mt-5">
                        <a href="{{ route('auth.google') }}" class="w-full h-12 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center">
                            Masuk dengan Google
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
