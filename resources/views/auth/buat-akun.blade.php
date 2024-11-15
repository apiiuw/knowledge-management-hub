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
                <div class="absolute -top-2 -left-2 -right-2 -bottom-2 rounded-lg bg-gradient-to-r bg-blueJR shadow-lg animate-pulse"></div>
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div id="form-container" class="bg-white p-16 rounded-lg shadow-2xl w-80 md:w-full relative z-10 transform transition duration-500 ease-in-out">
                    <h2 id="form-title" class="text-center text-3xl font-bold mb-10 text-gray-800">Buat Akun</h2>
                    <form method="POST" action="{{ route('register.store') }}" class="space-y-3">
                        @csrf <!-- CSRF Protection -->

                        <div>
                            <label for="name">Nama
                                <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Nama Lengkap" name="name" type="text" required>
                            </label>
                        </div>
                        
                        <div>
                            <label for="email">Email
                                <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Email" name="email" type="email" required>
                            </label>
                        </div>

                        <div>
                            <label class="mt-3" for="password">Password
                                <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Password" name="password" type="password" required>
                            </label>
                        </div>
                        
                        <div>
                            <label class="mt-3" for="password_confirmation">Konfirmasi Password
                                <input class="w-full h-12 border border-gray-800 px-3 rounded-lg" placeholder="Konfirmasi Password" name="password_confirmation" type="password" required>
                            </label>
                        </div>
                        
                        <button type="submit" class="w-full h-12 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Daftar</button>
                    </form>
                    <!-- Tombol masuk dengan Google -->
                    <div class="mt-5 flex justify-center items-center">
                        <a href="{{ route('auth.google') }}" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-center">
                            Masuk dengan Google
                        </a>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-sm">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-800">Masuk di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
