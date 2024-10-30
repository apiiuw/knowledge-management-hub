@extends('layouts.main')
@section('container')

<div class="bg-white w-full relative h-screen pt-7 lg:pt-16 font-jakartaSans">

    <div class="relative w-full">
        <!-- Carousel wrapper -->
        <div class="relative h-screen overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div>
                <img src="{{ asset('assets/images/pages/beranda/BerandaPresent1.png') }}" class="absolute z-10 block w-full h-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
    </div>

    <div class="bg-white absolute z-30 top-[40%] md:top-1/2 left-1/2 -translate-x-1/2 lg:-mt-12 flex flex-col justify-center items-center shadow-lg shadow-black/20 rounded-lg p-4 pt-3 pb-6 w-4/5">
        <p class="text-md lg:text-3xl font-jakartaSans font-bold text-black text-center mt-3">
            FORUM DISKUSI
        </p>
        <p class="text-sm lg:text-2xl font-jakartaSans font-semibold text-white bg-blueJR rounded-md px-3 py-2 mt-1">
            <i class="fa-solid fa-headset fa-lg mr-2"></i>Tanya Admin
        </p>
        <form class="w-full mt-3">
            <div class="w-full mb-4 border border-blueJR rounded-lg bg-gray-50">
                <div class="px-4 py-2 bg-white rounded-t-lg">
                    <label for="comment" class="sr-only">Forum Diskusi</label>
                    <textarea id="comment" rows="4" class="w-full px-0 text-sm text-gray-900 bg-white border-0 focus:ring-0" placeholder="Tuliskan pertanyaanmu..." required ></textarea>
                </div>
                <div class="flex items-center justify-between px-3 py-2 border-t">
                    <button type="submit" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blueJR rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                        Kirim pertanyaan
                    </button>
                    <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
                    </div>
                </div>
            </div>
        </form> 
    </div>

</div>

@endsection