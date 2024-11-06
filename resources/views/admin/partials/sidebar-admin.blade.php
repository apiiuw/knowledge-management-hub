<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
   <div class="bg-blueJR h-2"></div>
   <div class="px-3 py-3 lg:px-5 lg:pl-3">
   <div class="flex items-center justify-between">
    <div class="flex items-center justify-start rtl:justify-end">
      <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
          <span class="sr-only">Open sidebar</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
             <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
          </svg>
       </button>
      <a href="/admin-dashboard" class="flex ms-2 md:me-24">
         <img src="{{ asset('assets/images/logo/Jasa Raharja Utama dalam pelindungan, prima dalam pelayanan.png') }}" class="h-12" alt="Flowbite Logo" />
         <span class="hidden md:block self-center text-xl font-semibold sm:text-2xl whitespace-nowrap ml-2 text-black"><span class="text-red-500">E</span>du<span class="text-green-500">L</span>alu<span class="text-yellow-500">L</span>intas.com</span>
      </a>
    </div>
    <div class="flex items-center">
      <div class="flex items-center ms-3">
          <div>
              <button type="button" class="flex text-sm bg-white rounded-full focus:ring-4 focus:ring-gray-300" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                  <span class="sr-only">Open user menu</span>
                  <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_picture ?? 'default-avatar-url.jpg' }}" alt="user photo">
              </button>
          </div>
          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                  <p class="text-sm text-gray-900" role="none">
                      {{ Auth::user()->name ?? 'Guest' }}
                  </p>
                  <p class="text-sm font-medium text-gray-900 truncate" role="none">
                      {{ Auth::user()->email ?? 'No email available' }}
                  </p>
              </div>
              <ul class="py-1" role="none">
                  <li>
                      <form action="{{ route('logout') }}" method="POST" role="menuitem">
                          @csrf
                          <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-500 hover:bg-gray-100" >Sign out</button>
                      </form>
                  </li>
              </ul>
          </div>
      </div>
  </div>  
  </div>
    </div>
</nav>

<aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-24 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
 <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
    <ul class="space-y-2 font-medium">
      <li>
         <a href="/admin-dashboard" class="flex items-center p-2
             {{ $active === 'admin-dashboard' ? 'text-black bg-gray-200 rounded' : 'text-gray-500 hover:bg-gray-100' }}
             group">
             <svg class="w-5 h-5 transition duration-75
                 {{ $active === 'admin-dashboard' ? 'text-black' : 'text-gray-500' }}
                 group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                 <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                 <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
             </svg>
             <span class="ms-3 {{ $active === 'admin-dashboard' ? 'text-black' : 'text-gray-500' }}">Dashboard</span>
         </a>
      </li>     
      <li>
         <a href="/admin-buku" class="flex items-center p-2 
             {{ $active === 'admin-buku' ? 'text-black bg-gray-200 rounded' : 'text-gray-500 hover:bg-gray-100' }}
             group">
             <i class="fa-solid fa-book {{ $active === 'admin-buku' ? 'text-black' : 'text-gray-500' }}"></i>
             <span class="flex-1 ms-3 whitespace-nowrap {{ $active === 'admin-buku' ? 'text-black' : 'text-gray-500' }}">Buku</span>
         </a>
      </li>     
      <li>
         <a href="/admin-forum-diskusi" class="flex items-center p-2
            {{ $active === 'admin-forum-diskusi' ? 'text-black bg-gray-200 rounded' : 'text-gray-500 hover:bg-gray-100' }} 
             group">
         <i class="fa-solid fa-comments {{ $active === 'admin-forum-diskusi' ? 'text-black' : 'text-gray-500' }}"></i>
            <span class="flex-1 ms-3 whitespace-nowrap {{ $active === 'admin-forum-diskusi' ? 'text-black' : 'text-gray-500' }}">Forum Diskusi</span>
            <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full">3</span>
         </a>
      </li>
      <li>
        <a href="/admin-pengaturan-akun" class="flex items-center p-2 
            {{ $active === 'admin-pengaturan-akun' ? 'text-black bg-gray-200 rounded' : 'text-gray-500 hover:bg-gray-100' }}
            group">
            <i class="fa-solid fa-user-gear {{ $active === 'admin-pengaturan-akun' ? 'text-black' : 'text-gray-500' }}"></i>
            <span class="flex-1 ms-3 whitespace-nowrap {{ $active === 'admin-pengaturan-akun' ? 'text-black' : 'text-gray-500' }}">Pengaturan Akun</span>
        </a>
      </li>
    </ul>
 </div>
</aside>