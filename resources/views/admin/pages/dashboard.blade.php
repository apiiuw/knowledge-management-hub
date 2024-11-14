@extends('admin.layout.layout-admin')

@section('container')
<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-20">
       <h2 class="text-xl font-bold mb-4">Statistik Pengunjung Bulanan</h2>
       <canvas id="visitorChart"></canvas>
   </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   // Mengambil data pengunjung per bulan dari server
   const visitorData = @json(array_values($monthlyVisitors));  // Data pengunjung per bulan
   const visitorLabels = @json(array_keys($monthlyVisitors));  // Label bulan yang tersedia

   // Menyusun ulang data agar selalu ada 12 bulan
   const fullLabels = [];
   const fullData = [];

   // Loop untuk membuat array bulan dan data pengunjung per bulan
   for (let i = 0; i < 12; i++) {
       fullLabels.push(`Bulan ${i + 1}`);  // Menambahkan label untuk bulan
       fullData.push(visitorData[i] || 0);  // Ambil data pengunjung atau 0 jika tidak ada
   }

   // Membuat chart
   const ctx = document.getElementById('visitorChart').getContext('2d');
   new Chart(ctx, {
       type: 'line',
       data: {
           labels: fullLabels,  // Menampilkan semua bulan
           datasets: [{
               label: 'Jumlah Pengunjung',
               data: fullData,  // Menampilkan data pengunjung untuk semua bulan
               backgroundColor: 'rgba(54, 162, 235, 0.2)',
               borderColor: 'rgba(54, 162, 235, 1)',
               borderWidth: 1
           }]
       },
       options: {
           responsive: true,
           scales: {
               y: { beginAtZero: true }
           }
       }
   });
</script>
@endsection
