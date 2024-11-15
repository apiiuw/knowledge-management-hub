@extends('admin.layout.layout-admin')

@section('container')
<div class="p-4 sm:ml-64">

    <!-- Toast Notification -->
    @if(request()->has('year') && request('year') !== '')
    <div class="toast toast-center fixed top-5 left-1/2 transform -translate-x-1/2 z-50">
        <div id="toastMessage" class="alert alert-success">
            <span>Tahun yang dipilih: {{ request('year') }}</span>
        </div>
    </div>
    @endif

    <!-- Grafik Statistik Pengunjung Tahunan -->
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-20 text-black">
        <h2 class="text-2xl font-bold mb-4">Statistik Pengunjung Tahunan</h2>
        @if (count($yearlyVisitors) > 0)
            <canvas id="yearlyVisitorChart" width="400" height="200"></canvas>
        @else
            <p class="text-center">Tidak ada data pengunjung tahunan.</p>
        @endif
    </div>

   <!-- Statistik Pengunjung Bulanan -->
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-8">
       <h2 class="text-2xl font-bold mb-4 text-black">Statistik Pengunjung Bulanan</h2>
       <!-- Filter Tahun untuk Statistik Bulanan -->
       <form method="GET" action="{{ route('admin.pages.dashboard') }}" class="mb-4">
           <label for="year" class="text-gray-700 mr-2">Pilih Tahun:</label>
           <select name="year" id="year" onchange="this.form.submit()" class="border rounded-lg p-2 text-black">
               @foreach ($years as $year)
                   <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
               @endforeach
           </select>
       </form>
       
       @if (count($monthlyVisitors) > 0)
           <canvas id="visitorChart"></canvas>
       @else
           <p class="text-center">Tidak ada data pengunjung untuk tahun ini.</p>
       @endif
   </div>

   <!-- Tabel Statistik Pengunjung per Buku -->
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-8 text-black">
       <h2 class="text-2xl font-bold mb-4">Statistik Pengunjung Buku</h2>
       <!-- Filter Tahun untuk Statistik Buku -->
       <form method="GET" action="{{ route('admin.pages.dashboard') }}" class="mb-4">
           <label for="year" class="text-gray-700 mr-2">Pilih Tahun:</label>
           <select name="year" id="year" onchange="this.form.submit()" class="border rounded-lg p-2 text-black">
               @foreach ($years as $year)
                   <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
               @endforeach
           </select>
       </form>
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
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
   // Grafik Statistik Pengunjung Tahunan (Bar Chart)
   const yearlyCtx = document.getElementById('yearlyVisitorChart').getContext('2d');
   const yearlyVisitorData = @json(array_values($yearlyVisitors));
   const yearlyVisitorLabels = @json(array_keys($yearlyVisitors));

   if (yearlyVisitorData.length > 0) {
       new Chart(yearlyCtx, {
           type: 'bar',
           data: {
               labels: yearlyVisitorLabels,
               datasets: [{
                   label: 'Jumlah Pengunjung Tahunan',
                   data: yearlyVisitorData,
                   backgroundColor: 'rgba(75, 192, 192, 0.2)',
                   borderColor: 'rgba(75, 192, 192, 1)',
                   borderWidth: 1
               }]
           },
           options: {
               responsive: true,
               scales: {
                   y: { beginAtZero: true },
                   x: {
                       ticks: {
                           autoSkip: false,
                           maxRotation: 45,
                           minRotation: 0
                       }
                   }
               }
           }
       });
   }

   // Grafik Statistik Pengunjung Bulanan (Line Chart)
   const ctx = document.getElementById('visitorChart').getContext('2d');
   const visitorData = @json($monthlyVisitors);
   const visitorLabels = @json($monthlyLabels);

   new Chart(ctx, {
       type: 'line',
       data: {
           labels: visitorLabels,
           datasets: [{
               label: 'Jumlah Pengunjung Bulanan',
               data: visitorData,
               fill: false,
               borderColor: 'rgba(54, 162, 235, 1)',
               tension: 0.1
           }]
       },
       options: {
           responsive: true,
           scales: {
               y: { beginAtZero: true }
           }
       }
   });

    // Tampilan Toast refresh pages
    document.addEventListener('DOMContentLoaded', function() {
        const toastMessage = document.getElementById('toastMessage');
        if (toastMessage) {
            setTimeout(function() {
                toastMessage.classList.add('hidden'); // Menyembunyikan toast setelah 3 detik
            }, 3000); // Toast hilang setelah 3 detik
        }
    });
</script>

@endsection
