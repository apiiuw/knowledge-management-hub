<footer class="footer relative z-50 bg-blueJR text-neutral-content items-center p-4 rounded-t-3xl flex flex-col md:flex-row justify-between gap-y-2">
  <!-- Kiri: Logo dan Hak Cipta -->
  <aside class="flex items-center gap-2 md:mb-0">
      <img src="{{ asset('assets/images/logo/Jasa Raharja Logo Utama.png') }}" class="h-10 w-10" />
      <p class="text-white">
          Copyright © <span id="currentYear"></span> - All rights reserved
      </p>
      <script>
          document.getElementById('currentYear').textContent = new Date().getFullYear();
      </script>
  </aside>

  <!-- Tengah Bawah: Ikon Media Sosial -->
  <nav class="flex justify-center gap-x-4">
      <!-- Instagram -->
      <a href="https://www.instagram.com/jasaraharja_jakarta/" target="_blank">
          <i class="fa-brands fa-instagram fa-2xl text-white"></i>
      </a>
      <!-- Edge -->
      <a href="https://jasaraharja.co.id/" target="_blank">
          <i class="fa-brands fa-edge fa-2xl text-white"></i>
      </a>
      <!-- YouTube -->
      <a href="https://www.youtube.com/@OfficialJasaRaharja/" target="_blank">
          <i class="fa-brands fa-youtube fa-2xl text-white"></i>
      </a>
  </nav>
</footer>
