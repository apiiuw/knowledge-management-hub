@extends('admin.layout.layout-admin')

@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-14">

      @if ($errors->any())
      <div id="error-alert" class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div>
   
      <script>
         // Remove the alert from the DOM after 3 seconds (3000 milliseconds)
         setTimeout(function() {
            const alert = document.getElementById('error-alert');
            if (alert) {
               alert.remove();
            }
         }, 3000);
      </script>
   @endif
   
      <h1 class="text-2xl text-black font-bold">EDIT BUKU</h1>

      <form action="{{ route('admin.buku.update', ['id' => $book->id]) }}" method="POST" enctype="multipart/form-data">
         @csrf

         <!-- Title input -->
         <div class="mt-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul Buku</label>
            <input type="text" id="title" name="title" class="mt-1 p-2 border rounded w-full text-black" required value="{{ $book->title ?? '' }}">
         </div>

         <!-- Type input -->
         <div class="mt-4">
            <label class="block text-sm font-medium text-gray-700">Tipe Buku</label>
            <div class="flex space-x-4 mt-1 text-black">
                <label>
                    <input type="radio" id="type_artikel" name="type" value="Artikel" class="mr-2" {{ $book->type === 'Artikel' ? 'checked' : '' }} required>
                    Artikel
                </label>
                <label>
                    <input type="radio" id="type_buku_elektronik" name="type" value="Buku Elektronik" class="mr-2" {{ $book->type === 'Buku Elektronik' ? 'checked' : '' }}>
                    Buku Elektronik
                </label>
                <label>
                    <input type="radio" id="type_studi_kasus" name="type" value="Studi Kasus" class="mr-2" {{ $book->type === 'Studi Kasus' ? 'checked' : '' }}>
                    Studi Kasus
                </label>
            </div>
         </div>    
         
         <div class="mt-4">
            <label for="softskill" class="block text-sm font-medium text-gray-700">Softskill</label>
            <select id="softskill" name="softskill" class="mt-1 p-2 border rounded w-full text-black" required>
                <option value="">Pilih Softskill...</option>
                <option value="Achievement Orientation" {{ $book->softskill == 'Achievement Orientation' ? 'selected' : '' }}>Achievement Orientation</option>
                <option value="Professionalisme" {{ $book->softskill == 'Professionalisme' ? 'selected' : '' }}>Professionalisme</option>
                <option value="Customer Service Orientation" {{ $book->softskill == 'Customer Service Orientation' ? 'selected' : '' }}>Customer Service Orientation</option>
                <option value="Continuous Learning" {{ $book->softskill == 'Continuous Learning' ? 'selected' : '' }}>Continuous Learning</option>
                <option value="Relationship Building" {{ $book->softskill == 'Relationship Building' ? 'selected' : '' }}>Relationship Building</option>
                <option value="Driving Change" {{ $book->softskill == 'Driving Change' ? 'selected' : '' }}>Driving Change</option>
                <option value="Problem Solving" {{ $book->softskill == 'Problem Solving' ? 'selected' : '' }}>Problem Solving</option>
                <option value="Business Acumen" {{ $book->softskill == 'Business Acumen' ? 'selected' : '' }}>Business Acumen</option>
                <option value="Digital Leadership" {{ $book->softskill == 'Digital Leadership' ? 'selected' : '' }}>Digital Leadership</option>
                <option value="Strategic Orientation" {{ $book->softskill == 'Strategic Orientation' ? 'selected' : '' }}>Strategic Orientation</option>
            </select>
        </div>        

         <!-- Release Year input -->
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
               value="{{ $book->release_year ?? '' }}"
            >
         </div>  

         <!-- Description input -->
         <div class="mt-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi Buku</label>
            <textarea id="description" name="description" class="mt-1 p-2 border rounded w-full text-black" rows="4" required>{{ $book->description ?? '' }}</textarea>
         </div>

         <!-- Keywords input -->
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
         
         <!-- Keywords Container -->
         <div id="keywords-container" class="flex flex-wrap mt-1 p-2 border rounded w-full gap-2">
             <!-- Tempat kata kunci yang ditambahkan -->
         </div>
         
         <!-- Hidden input for keywords -->
         <input type="hidden" id="keywords" name="keywords" value="{{ $book->keywords ?? '' }}" required>

         <script>
            // Initialize keywords array with keywords from database
            const keywords = {!! json_encode($book->keywords ? explode(',', $book->keywords) : []) !!};

            // Function to display initial keywords from the database
            function initializeKeywords() {
                keywords.forEach(keyword => addKeywordToContainer(keyword.trim()));
                updateKeywordsInput();
            }

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
                if (!keywords.includes(keywordText)) {
                    keywords.push(keywordText);
                    updateKeywordsInput();
                
                    const keywordsContainer = document.getElementById('keywords-container');
                    const keywordElement = document.createElement('span');
                    keywordElement.className = "bg-blue-500 text-white px-2 py-1 rounded flex items-center space-x-2 max-w-xs";
                    keywordElement.innerHTML = `
                        <span class="truncate">${keywordText}</span>
                        <button type="button" class="text-white hover:text-red-500" onclick="removeKeyword('${keywordText}', this)">x</button>
                    `;
                    keywordsContainer.appendChild(keywordElement);
                }
            }

            function removeKeyword(keywordText, button) {
                const index = keywords.indexOf(keywordText);
                if (index > -1) {
                    keywords.splice(index, 1);
                }
                updateKeywordsInput();
                button.parentElement.remove();
            }

            function updateKeywordsInput() {
                document.getElementById('keywords').value = keywords.join(', ');
            }

            document.addEventListener('DOMContentLoaded', initializeKeywords);
         </script>

         <!-- File input -->
         <div class="mt-4">
            <div class="relative">
               <input 
                  type="file" 
                  id="book_file" 
                  name="book_file" 
                  accept="application/pdf" 
                  class="mt-1 p-2 border rounded w-full text-black file:bg-blue-500 file:text-white file:py-2 file:px-4 file:rounded file:border-none file:cursor-pointer file:hover:bg-blue-700 opacity-0 absolute inset-0 z-10"
                  onchange="displayFileName()" 
               >
               <span id="file-name" class="placeholder bg-white text-black p-2 rounded w-full border border-gray-300 inline-block">
                  <i class="fa-solid fa-file-pdf mr-2"></i>{{ $book->pdf_file ?? 'Pilih file PDF...' }}
               </span>
            </div>
         </div>

         <!-- Submit button -->
         <div class="mt-6">
            <button type="submit" onclick="validateKeywords()" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
         </div>
      </form>
   </div>
</div>

@endsection
