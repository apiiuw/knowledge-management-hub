@extends('admin.layout.layout-admin')

@section('container')
<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-20">
       <h2 class="text-xl font-bold mb-4 text-black">Statistik Pengunjung Bulanan</h2>
       <canvas id="visitorChart"></canvas>
   </div>

   <!-- Tabel Statistik Pengunjung per Buku -->
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-8 text-black">
       <h2 class="text-2xl font-bold mb-4">Statistik Pengunjung per Buku</h2>
       <table class="min-w-full bg-white border border-gray-300">
           <thead>
               <tr>
                   <th class="py-2 px-4 border-b text-start">Judul Buku</th>
                   <th class="py-2 px-4 border-b text-center">Jumlah Pengunjung</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($bookVisitors as $bookVisitor)
                   <tr>
                       <td class="py-2 px-4 border-b">{{ $bookVisitor->book_title }}</td>
                       <td class="py-2 px-4 border-b text-center">{{ $bookVisitor->visitor_count }}</td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
   // Chart Statistik Pengunjung Bulanan
   const ctx = document.getElementById('visitorChart').getContext('2d');
   const visitorData = @json(array_values($monthlyVisitors));
   const visitorLabels = @json($monthlyLabels);

   new Chart(ctx, {
       type: 'line',
       data: {
           labels: visitorLabels,
           datasets: [{
               label: 'Jumlah Pengunjung',
               data: visitorData,
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
