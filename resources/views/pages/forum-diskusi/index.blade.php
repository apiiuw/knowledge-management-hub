@extends('layouts.main')
@section('container')

<div class="bg-white w-full min-h-screen pt-28 px-10">

  <div class="flex flex-col justify-center items-center">
    
    {{-- Head --}}
    <h1 class="font-bold text-2xl md:text-3xl text-blueJR font-jakartaSans mb-3">FORUM DISKUSI</h1>
    <h1 class="text-center font-semibold text-md md:text-xl text-white rounded-md font-jakartaSans mb-3 py-2 px-1 bg-blueJR">Forum Diskusi dirangkai agar pengguna dapat mengekspresikan dan menanyakan suatu hal tentang platform knowledgemanagementhub.com. Perkembangan platform sangat bergantung kepada pertanyaan dari pengguna yang menggunakan website knowledgemanagementhub.com.</h1>

    {{-- Search --}}
    <form method="GET" action="{{ route('forum-diskusi') }}" class="w-full mx-auto mb-3">
      <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Pencarian</label>
      <div class="relative">
          <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
              </svg>
          </div>
          <input type="search" name="search" id="search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blueJR focus:border-blueJR font-jakartaSans" placeholder="Temukan pertanyaan..." value="{{ request('search') }}" />
          <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blueJR hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 font-jakartaSans">Search</button>
      </div>
    </form>

  </div>

  @if (session('success'))
  <div id="success-alert" class="alert alert-success mb-2 p-4 bg-green-500 text-white rounded-lg relative opacity-100 transition-opacity duration-1000 ease-in-out">
      <span>{{ session('success') }}</span>
      <button id="close-alert" class="absolute top-0 right-0 p-2 text-xl font-bold text-white cursor-pointer">
          ×
      </button>
  </div>

  <script>
      // Close the alert when the X button is clicked
      document.getElementById('close-alert').addEventListener('click', function () {
          document.getElementById('success-alert').classList.add('opacity-0', 'pointer-events-none');
      });

      // Automatically close the alert after 5 seconds
      setTimeout(function () {
          document.getElementById('success-alert').classList.add('opacity-0', 'pointer-events-none');
      }, 5000);
  </script>
  @endif

  {{-- Hasil Diskusi --}}
  <div id="accordion-collapse" data-accordion="collapse" class="font-jakartaSans">
  {{-- Display Results --}}
  @if($discussions->isEmpty())
      <p class="text-center text-gray-500">Tidak ada hasil yang ditemukan untuk pencarian Anda.</p>
  @endif

  @foreach ($discussions as $index => $discussion)
      <h2 id="accordion-collapse-heading-{{ $discussion->id }}">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 {{ $index == 0 ? 'rounded-t-xl' : '' }} focus:ring-4 focus:ring-blueJR hover:bg-gray-100 gap-3" data-accordion-target="#accordion-collapse-body-{{ $discussion->id }}" aria-expanded="false" aria-controls="accordion-collapse-body-{{ $discussion->id }}">
              <span>{{ $discussion->question }}</span>
              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
              </svg>
          </button>
      </h2>
      <div id="accordion-collapse-body-{{ $discussion->id }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $discussion->id }}">
          <div class="p-5 border border-b-0 border-gray-200 bg-gray-300">
              <p class="mb-2 text-blueJR font-semibold">Admin: <span class="text-gray-500 font-normal">{{ $discussion->jawaban ?? 'Belum dijawab oleh admin.' }}</span></p>
          </div>
      </div>
  @endforeach
  </div>


    {{-- Button tanya admin --}}
    <div class="mt-10 flex flex-col justify-center items-center font-jakartaSans">
      <h1 class="text-xl text-gray-500 font-semibold mb-3">Belum menemukan jawaban?</h1>
      <h1 class="text-xl text-blueJR font-semibold mb-3"><span><i class="fa-solid fa-headset fa-lg mr-2"></i></span><a class="underline hover:text-blue-800" href="/tanya-admin">Klik di sini</a></h1>
    </div>

</div>


@endsection