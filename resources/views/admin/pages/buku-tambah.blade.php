@extends('admin.layout.layout-admin')

@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">

      @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
               @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
               @endforeach
         </ul>
      </div>
      @endif


      <h1 class="text-2xl text-black font-bold">TAMBAH BUKU</h1>

      <form action="{{ route('admin.buku.store') }}" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="mt-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul Buku</label>
            <input type="text" id="title" name="title" class="mt-1 p-2 border rounded w-full text-black" required>
         </div>

         <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Tipe Buku</label>
            <div class="flex space-x-4 mt-1 text-black">
                <label>
                    <input type="radio" id="type_artikel" name="type" value="Artikel" class="mr-2" required>
                    Artikel
                </label>
                <label>
                    <input type="radio" id="type_buku_elektronik" name="type" value="Buku Elektronik" class="mr-2">
                    Buku Elektronik
                </label>
                <label>
                    <input type="radio" id="type_studi_kasus" name="type" value="Studi Kasus" class="mr-2">
                    Studi Kasus
                </label>
            </div>
        </div>        

        <div class="mt-4">
         <label for="release_year" class="block text-sm font-medium text-gray-700">Tahun Rilis</label>
         <input 
             type="number" 
             id="release_year" 
             name="release_year" 
             class="mt-1 p-2 border rounded w-full text-black" 
             required
             min="1900" 
             max="{{ date('Y') }}"
         >
        </div>  

        <div class="mt-4">
         <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Buku</label>
         <textarea id="description" name="description" class="mt-1 p-2 border rounded w-full text-black" rows="4" required></textarea>
     </div>
     
     <div class="mt-4">
      <label for="keywords" class="block text-sm font-medium text-gray-700">Kata Kunci</label>
      <div class="flex">
          <input 
              type="text" 
              id="keywords_input" 
              class="mt-2 p-2 border rounded w-full text-black" 
              placeholder="Tambahkan kata kunci lalu tekan Enter atau klik +" 
              onkeydown="addKeyword(event)"
          >
          <button 
              type="button" 
              onclick="addKeywordButton()" 
              class="ml-2 mt-2 px-6 py-2 bg-blue-500 text-white rounded hover:bg-blue-600"
          >+</button>
      </div>
  </div>
  
  <div id="keywords-container" class="flex flex-wrap mt-1 p-2 border rounded w-full gap-2">
      <!-- Tempat kata kunci yang ditambahkan -->
  </div>
  
  <!-- Hidden input untuk menyimpan kata kunci terpisah koma -->
  <input type="hidden" id="keywords" name="keywords" required>
  
  <script>
      // Array untuk menyimpan kata kunci
      const keywords = [];
  
      function addKeyword(event) {
          if (event.key === "Enter" && event.target.value.trim() !== "") {
              event.preventDefault();
              addKeywordToContainer(event.target.value.trim());
              event.target.value = "";
          }
      }
  
      function addKeywordButton() {
          const keywordInput = document.getElementById('keywords_input');
          const keywordText = keywordInput.value.trim();
          if (keywordText !== "") {
              addKeywordToContainer(keywordText);
              keywordInput.value = "";
          }
      }
  
      function addKeywordToContainer(keywordText) {
          // Tambahkan kata kunci ke array dan perbarui input tersembunyi
          keywords.push(keywordText);
          updateKeywordsInput();
  
          // Tampilkan kata kunci di layar
          const keywordsContainer = document.getElementById('keywords-container');
          const keywordElement = document.createElement('span');
          keywordElement.className = "bg-blue-500 text-white px-2 py-1 rounded flex items-center space-x-2 max-w-xs";
          keywordElement.innerHTML = `
              <span class="truncate">${keywordText}</span>
              <button type="button" class="text-white hover:text-red-500" onclick="removeKeyword('${keywordText}', this)">x</button>
          `;
          keywordsContainer.appendChild(keywordElement);
      }
  
      function removeKeyword(keywordText, button) {
          // Hapus kata kunci dari array dan perbarui input tersembunyi
          const index = keywords.indexOf(keywordText);
          if (index > -1) {
              keywords.splice(index, 1);
          }
          updateKeywordsInput();
  
          // Hapus elemen kata kunci dari tampilan
          button.parentElement.remove();
      }
  
      function updateKeywordsInput() {
          // Gabungkan array dengan koma dan simpan di input tersembunyi
          document.getElementById('keywords').value = keywords.join(', ');
      }
  </script>
  

         <div class="mt-4">
            <div class="relative">
               <input 
                   type="file" 
                   id="book_file" 
                   name="book_file" 
                   accept="application/pdf" 
                   class="mt-1 p-2 border rounded w-full text-black file:bg-blue-500 file:text-white file:py-2 file:px-4 file:rounded file:border-none file:cursor-pointer file:hover:bg-blue-700 opacity-0 absolute inset-0 z-10"
                   onchange="displayFileName()" 
                   required
               >
               <span id="file-name" class="placeholder bg-white text-black p-2 rounded w-full border border-gray-300 inline-block">
                   <i class="fa-solid fa-file-pdf mr-2"></i>Pilih file PDF...
               </span>
           </div>
           
           <script>
               function displayFileName() {
                   const fileInput = document.getElementById('book_file');
                   const fileNameDisplay = document.getElementById('file-name');
           
                   if (fileInput.files.length > 0) {
                       fileNameDisplay.textContent = fileInput.files[0].name;
                   }
               }
           </script>           
        </div>               

         <div class="mt-6">
            <button type="submit" onclick="validateKeywords()" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Tambah Buku</button>
         </div>
      </form>
   </div>
</div>

@endsection
