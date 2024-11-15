@extends('layouts.main')
@section('container')

<div class="bg-white w-full h-full pt-28 px-10">
    <h1 class="text-2xl md:text-3xl font-bold font-jakartaSans text-blueJR flex justify-center mb-8">INFORMASI KONTAK</h1>
    
    <!-- Wrapper Informasi Perusahaan dan Peta Lokasi -->
    <div class="h-[calc(100vh-7rem)] flex flex-col md:flex-row justify-between items-start mb-8">
        
        <!-- Kontak Perusahaan -->
        <div class="w-full md:w-1/2 h-1/2 md:h-full mb-8 md:mb-0 text-blueJR font-jakartaSans flex flex-col justify-center">
            <h2 class="text-xl md:text-2xl font-semibold mb-4">Perusahaan</h2>
            <p><strong>Nama Perusahaan:</strong> PT. Jasa Raharja (Persero) Cabang DKI Jakarta</p>
            <p><strong>Nomor Telepon:</strong> (021) 21012904</p>
            <p><strong>Alamat:</strong> Jl. Jatinegara Timur No.107, RT.1/RW.2, Bali Mester, Kecamatan Jatinegara, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13310</p>
        </div>

        <!-- Peta Lokasi -->
        <div class="w-full md:w-1/2 h-1/2 md:h-full flex justify-center items-center">
            <iframe 
                class="rounded-3xl w-full h-full" 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.301843032989!2d106.86564547480322!3d-6.223873393764188!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f37853ab699f%3A0x178e1c4e01d774a9!2sPT%20Jasa%20Raharja%20Cabang%20DKI%20Jakarta!5e0!3m2!1sen!2sid!4v1730174443000!5m2!1sen!2sid" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>

@endsection
