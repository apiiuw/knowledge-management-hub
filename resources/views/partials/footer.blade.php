<footer class="footer bg-blueJR text-neutral-content items-center p-4 rounded-t-3xl">
    <aside class="grid-flow-col items-center">
      <img src="{{ asset('assets/images/logo/Jasa Raharja Logo Utama.png') }}" class="h-10 w-10" />
      <p class="text-white">Copyright © <span id="currentYear"></span> - All rights reserved</p>
      <script>
        document.getElementById('currentYear').textContent = new Date().getFullYear();
      </script>
    </aside>
    <nav class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
      {{-- Instagram Jasa Raharja Cabang DKi Jakarta --}}
      <a href="https://www.instagram.com/jasaraharja_jakarta/" target="_blank">
        <i class="fa-brands fa-instagram fa-2xl text-white"></i>
      </a>
      <a href="https://jasaraharja.co.id/" target="_blank">
        <i class="fa-brands fa-edge fa-2xl text-white"></i>
      </a>
      <a href="https://www.youtube.com/@OfficialJasaRaharja/" target="_blank">
        <i class="fa-brands fa-youtube fa-2xl text-white"></i>
      </a>
    </nav>
  </footer>