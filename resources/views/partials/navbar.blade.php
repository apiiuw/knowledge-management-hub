<nav class="bg-white shadow-md rounded-b-3xl z-50 fixed top-0 left-0 w-full">
    <div class="bg-blueJR h-2"></div>
    <div class="w-full mx-auto flex flex-wrap items-center justify-between p-4">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/images/logo/Jasa Raharja Utama dalam pelindungan, prima dalam pelayanan.png') }}" class="h-12" alt="Flowbite Logo" />
        </a>
        <div class="flex items-center md:order-2 space-x-3">
            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                <img class="w-10 md:w-12 h-10 md:h-12 rounded-full" src="{{ Storage::url($user->profile_picture ?? 'assets/images/profile/Default User.png') }}" alt="user photo">
            </button>
            <!-- Dropdown menu -->
            <div class="hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-dropdown">
                @auth
                    <div class="px-4 py-3">
                        <span class="block text-sm text-gray-900">{{ Auth::user()->name }}</span> <!-- Menampilkan nama pengguna -->
                        <span class="block text-sm text-gray-500 truncate">{{ Auth::user()->email }}</span> <!-- Menampilkan email pengguna -->
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                        <li><a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Pengaturan</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-sm text-red-500 text-left hover:bg-gray-100">
                                    Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                @elseguest
                    <div class="px-4 py-3">
                        <a href="/masuk" class="block px-4 py-2 text-sm text-blue-500 hover:bg-gray-100">Masuk</a>
                    </div>
                @endauth
            </div>                 
            <button data-collapse-toggle="navbar-user" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-user" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
        </div>
        <div class="hidden w-full md:flex md:w-auto md:order-1" id="navbar-user">
            <ul class="flex flex-col font-medium text-lg p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white font-jakartaSans">
                <li>
                    <a href="/" class="block py-2 px-3 {{ $active === 'beranda' ? 'text-white bg-blueJR rounded md:bg-transparent md:text-blueJR' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blueJR' }}" aria-current="page">BERANDA</a>
                </li>
                <li>
                    <a href="/tentang-kami" class="block py-2 px-3 {{ $active === 'tentang-kami' ? 'text-white bg-blueJR rounded md:bg-transparent md:text-blueJR' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blueJR' }}">TENTANG KAMI</a>
                </li>
                <li>
                    <a href="/forum-diskusi" class="block py-2 px-3 {{ $active === 'forum-diskusi' ? 'text-white bg-blueJR rounded md:bg-transparent md:text-blueJR' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blueJR' }}">FORUM DISKUSI</a>
                </li>
                <li>
                    <a href="/kontak" class="block py-2 px-3 {{ $active === 'kontak' ? 'text-white bg-blueJR rounded md:bg-transparent md:text-blueJR' : 'text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blueJR' }}">KONTAK</a>
                </li>
            </ul>            
        </div>
    </div>
</nav>
