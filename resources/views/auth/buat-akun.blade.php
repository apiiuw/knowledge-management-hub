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
        @if ($errors->any())
        <div id="error-alert" 
             class="fixed top-4 left-1/2 transform -translate-x-1/2 p-4 bg-red-500 text-white rounded-lg shadow-lg flex items-center justify-between w-11/12 md:w-1/2 lg:w-1/3 z-50">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button id="close-alert" class="ml-4 text-xl font-bold text-white hover:text-gray-200">
                ×
            </button>
        </div>
        <script>
            // Close the alert when the X button is clicked
            document.getElementById('close-alert').addEventListener('click', function () {
                document.getElementById('error-alert').classList.add('opacity-0', 'pointer-events-none');
            });
    
            // Automatically close the alert after 5 seconds
            setTimeout(function () {
                document.getElementById('error-alert').classList.add('opacity-0', 'pointer-events-none');
            }, 5000);
        </script>
        @endif
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
                            <label class="text-black" for="name">Nama
                                <input class="w-full h-12 text-black border border-gray-800 px-3 rounded-lg" placeholder="Nama Lengkap" name="name" type="text" required>
                            </label>
                        </div>
                        
                        <div>
                            <label class="text-black" for="email">Email</label>
                            <input 
                                class="w-full h-12 border text-black border-gray-800 px-3 rounded-lg" 
                                placeholder="Email" 
                                id="email" 
                                name="email" 
                                type="email" 
                                required>
                            <span id="email-feedback" class="text-red-500"></span>
                        </div>
                        
                        <script>
                            document.getElementById('email').addEventListener('input', function () {
                                const email = this.value;
                                const feedback = document.getElementById('email-feedback');
                        
                                // Cek jika email belum lengkap
                                if (!email.includes('@')) {
                                    feedback.textContent = '';
                                    return;
                                }
                        
                                // Kirim permintaan AJAX ke backend
                                fetch('/verify-email', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                    },
                                    body: JSON.stringify({ email })
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.valid) {
                                        feedback.textContent = ''; // Email valid
                                    } else {
                                        feedback.textContent = data.message; // Tampilkan pesan error
                                    }
                                })
                                .catch(err => {
                                    feedback.textContent = 'Terjadi kesalahan saat memverifikasi email.';
                                    console.error(err);
                                });
                            });
                        </script>                        

                        <div>
                            <label class="mt-3 text-black" for="password">Password
                                <input class="w-full h-12 border text-black border-gray-800 px-3 rounded-lg" placeholder="Password" name="password" type="password" required>
                            </label>
                        </div>
                        
                        <div>
                            <label class="mt-3 text-black" for="password_confirmation">Konfirmasi Password
                                <input class="w-full h-12 text-black border border-gray-800 px-3 rounded-lg" placeholder="Konfirmasi Password" name="password_confirmation" type="password" required>
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
