@extends('admin.layout.layout-admin')

@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-20 mx-auto w-full text-black">
      <h2 class="text-2xl font-bold">Pengaturan Akun</h2>
   
      @if(session('success'))
          <div class="bg-green-500 text-white p-2 mt-4 rounded text-center">
              {{ session('success') }}
          </div>
      @endif
   
      @if($errors->any())
          <div class="bg-red-500 text-white p-2 mt-4 rounded text-center">
              @foreach($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach
          </div>
      @endif
   
      <!-- Menampilkan data pengguna -->
      <div class="mt-6 text-center">
          <img src="{{ Storage::url($user->profile_picture ?? 'assets/images/profile/Default User.png') }}" alt="Profile Picture" class="w-32 h-32 rounded-full mx-auto">
          <p class="text-lg mt-2">{{ $user->name }}</p>
          <p class="text-sm text-gray-500">{{ $user->email }}</p>
      </div>
   
      <!-- Tombol untuk membuka modal Update Profil -->
      <div class="mt-6 text-center">
          <button class="px-4 py-2 bg-blue-600 text-white rounded-md" id="openUpdateProfileModal">Update Profil</button>
      </div>
   
      <!-- Tombol untuk membuka modal Ganti Password -->
      <div class="mt-4 text-center">
          <button class="px-4 py-2 bg-blue-600 text-white rounded-md" id="openChangePasswordModal">Ganti Password</button>
      </div>
   </div>
   
</div>

<!-- Modal Update Profil -->
<div id="updateProfileModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg w-96">
        <h3 class="text-xl text-black font-semibold mb-4">Update Profil</h3>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <div class="mt-4">
               <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
               <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                      class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" 
                      readonly>
           </div>           

            <div class="mt-4">
                <label for="profile_picture" class="block text-sm font-medium text-gray-700">Foto Profil</label>
                <input type="file" name="profile_picture" id="profile_picture" class="mt-1 block w-full text-sm text-gray-500">
            </div>

            <div class="mt-6">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Update Profil</button>
                <button type="button" id="closeUpdateProfileModal" class="px-4 py-2 bg-gray-600 text-white rounded-md ml-2">Tutup</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Ganti Password -->
<div id="changePasswordModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded-lg w-96">
        <h3 class="text-xl text-black font-semibold mb-4">Ganti Password</h3>
        <form method="POST" action="{{ route('profile.changePassword') }}">
            @csrf
            @method('PATCH')

            <div class="mb-4">
                <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
                <input type="password" id="new_password" name="new_password" class="mt-1 block w-full" required>
            </div>

            <div class="mb-4">
                <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
                <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="mt-1 block w-full" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Ganti Password</button>
            <button type="button" id="closeChangePasswordModal" class="px-4 py-2 bg-gray-600 text-white rounded-md ml-2">Tutup</button>
        </form>
    </div>
</div>

<script>
    // Mendapatkan elemen modal dan tombol
    const updateProfileModal = document.getElementById('updateProfileModal');
    const changePasswordModal = document.getElementById('changePasswordModal');
    const openUpdateProfileModal = document.getElementById('openUpdateProfileModal');
    const openChangePasswordModal = document.getElementById('openChangePasswordModal');
    const closeUpdateProfileModal = document.getElementById('closeUpdateProfileModal');
    const closeChangePasswordModal = document.getElementById('closeChangePasswordModal');

    // Membuka modal Update Profil
    openUpdateProfileModal.addEventListener('click', function() {
        updateProfileModal.classList.remove('hidden');
    });

    // Membuka modal Ganti Password
    openChangePasswordModal.addEventListener('click', function() {
        changePasswordModal.classList.remove('hidden');
    });

    // Menutup modal Update Profil
    closeUpdateProfileModal.addEventListener('click', function() {
        updateProfileModal.classList.add('hidden');
    });

    // Menutup modal Ganti Password
    closeChangePasswordModal.addEventListener('click', function() {
        changePasswordModal.classList.add('hidden');
    });
</script>

@endsection
