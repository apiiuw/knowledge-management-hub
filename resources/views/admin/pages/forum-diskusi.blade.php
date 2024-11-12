@extends('admin.layout.layout-admin')
@section('container')

<div class="p-4 sm:ml-64 bg-white">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg mt-20">
        @if (session('success'))
        <div id="toast-container" class="fixed top-4 left-1/2 z-50 bg-green-500 text-white p-4 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>

        <script>
            // Menghilangkan toast setelah 5 detik
            setTimeout(() => {
                const toast = document.getElementById('toast');
                if (toast) toast.style.display = 'none';
            }, 3000);
        </script>
        @endif
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // Ambil pesan toast dari sessionStorage
                const toastMessage = sessionStorage.getItem('toastMessage');
                if (toastMessage) {
                    // Buat elemen toast
                    const toast = document.createElement('div');
                    toast.className = 'fixed top-4 right-4 z-50 bg-green-500 text-white p-4 rounded-lg shadow-lg';
                    toast.textContent = toastMessage;
                    document.body.appendChild(toast);
        
                    // Hapus pesan setelah ditampilkan
                    sessionStorage.removeItem('toastMessage');
        
                    // Sembunyikan toast setelah 3 detik
                    setTimeout(() => {
                        toast.style.display = 'none';
                    }, 3000);
                }
            });
        </script>        

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-base text-white uppercase bg-blueJR">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Pertanyaan</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3  flex justify-center">Proses</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($discussions as $discussion)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-4 flex justify-center">{{ $loop->iteration }}</td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $discussion->question }}</th>
                        <td class="px-6 py-4 flex justify-center">{{ $discussion->date }}</td>
                        <td class="px-6 py-4">
                            @if ($discussion->status === 'Belum Terjawab')
                                <span class="text-yellow-500 font-semibold">{{ $discussion->status }}</span>
                            @else
                                <span class="text-gray-900">{{ $discussion->status }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right flex gap-x-1">
                            @if ($discussion->status === 'Belum Terjawab')
                            <a href="#" onclick="openModal('{{ $discussion->question }}', '{{ $discussion->jawaban }}', {{ $discussion->id }})" class="font-medium bg-blueJR hover:bg-blue-600 px-3 py-2 rounded-md text-white">
                                Jawab Pertanyaan
                            </a>

                            <form action="{{ route('forum-diskusi.destroy', $discussion->id) }}" method="POST" onsubmit="return confirmDelete();">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-medium bg-red-500 hover:bg-red-600 px-3 py-2 rounded-md text-white">Hapus</button>
                            </form>
                            
                            <script>
                                function confirmDelete() {
                                    return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini? Tindakan ini tidak dapat dibatalkan.');
                                }
                            </script>
                            
                            <!-- Modal Dialog Lihat Jawaban -->
                            <dialog id="my_modal_3" class="modal">
                                <div class="modal-box text-left relative p-6 bg-white shadow-lg rounded-lg max-w-lg mx-auto">
                                    <!-- Close Button -->
                                    <form method="dialog">
                                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-500 hover:text-gray-700">✕</button>
                                    </form>
                            
                                    <!-- Modal Title -->
                                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Pertanyaan:</h3>
                                    <p id="question" class="text-lg text-gray-700 py-2 mb-6 border-b border-gray-300"></p>
                            
                                    <!-- Jawaban Section -->
                                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Jawaban:</h3>
                                    <p id="answer" class="text-lg text-gray-700 py-2 mb-6 border-b border-gray-300"></p>
                            
                                    <!-- Ubah Jawaban Section -->
                                    <div class="flex justify-center mt-4">
                                        <button id="editButton" class="font-medium bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-md text-white focus:outline-none">
                                            Ubah Jawaban
                                        </button>
                                    </div>
                            
                                    <!-- Form Edit Jawaban -->
                                    <form id="editForm" class="hidden mt-6">
                                        @csrf
                                        <textarea id="answerInput" class="w-full p-2 border border-gray-300 rounded-md mb-4"></textarea>
                                        <div class="flex justify-between">
                                            <button type="button" id="cancelButton" class="font-medium bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-md text-white focus:outline-none">
                                                Batal
                                            </button>
                                            <button type="submit" id="saveButton" class="font-medium bg-green-500 hover:bg-green-600 px-4 py-2 rounded-md text-white focus:outline-none">
                                                Simpan Jawaban
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </dialog>

                            <script>
                                // Fungsi untuk menangani perubahan jawaban
                                document.addEventListener('DOMContentLoaded', () => {
                                    const saveButton = document.getElementById('saveButton');
                                    const answerInput = document.getElementById('answerInput');
                                    const modal = document.getElementById('my_modal_3');
                            
                                    // Menyimpan jawaban yang telah diubah
                                    saveButton.addEventListener('click', function(event) {
                                        event.preventDefault();
                            
                                        const answer = answerInput.value.trim();
                                        const discussionId = document.getElementById('editForm').dataset.discussionId;
                            
                                        if (!answer) {
                                            // Contoh penggantian dengan pesan di UI
                                            console.log('Jawaban tidak boleh kosong!');
                                            return;
                                        }
                            
                                        // Kirim request untuk update jawaban dan status
                                        fetch(`/forum-diskusi/${discussionId}/update-jawaban-dan-status`, {
                                            method: 'PATCH',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                            },
                                            body: JSON.stringify({ jawaban: answer })
                                        })
                                        .then(response => response.json())
                                        .then(data => {
                                            if (data.success) {
                                                sessionStorage.setItem('toastMessage', 'Jawaban berhasil diperbarui dan status diubah menjadi Terjawab!');
                                                modal.close();
                                                location.reload(); // Reload halaman untuk melihat perubahan
                                            } else {
                                                console.log('Gagal menyimpan jawaban.');
                                            }
                                        })
                                        .catch(error => {
                                            console.error('Error:', error);
                                            console.log('Terjadi kesalahan saat menyimpan jawaban.');
                                        });
                                    });
                            
                                    // Menangani tombol edit jawaban
                                    const editButton = document.getElementById('editButton');
                                    const editForm = document.getElementById('editForm');
                                    const answer = document.getElementById('answer');
                                    const cancelButton = document.getElementById('cancelButton');
                            
                                    editButton.addEventListener('click', () => {
                                        answer.classList.add('hidden');
                                        editForm.classList.remove('hidden');
                                        editButton.classList.add('hidden');
                                        answerInput.value = answer.textContent; // Menampilkan jawaban lama pada textarea
                                    });
                            
                                    cancelButton.addEventListener('click', () => {
                                        answer.classList.remove('hidden');
                                        editForm.classList.add('hidden');
                                        editButton.classList.remove('hidden');
                                    });
                                });
                            </script>
                            
                            @else
                                <!-- Tombol untuk lihat jawaban dan update jawaban -->
                                <a href="#" onclick="openModal('{{ $discussion->question }}', '{{ $discussion->jawaban }}', {{ $discussion->id }})" class="font-medium bg-green-500 hover:bg-green-600 px-3 py-2 rounded-md text-white">Lihat Jawaban</a>
                                <form action="{{ route('forum-diskusi.destroy', $discussion->id) }}" method="POST" onsubmit="return confirmDelete();">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium bg-red-500 hover:bg-red-600 px-3 py-2 rounded-md text-white">Hapus</button>
                                </form>
                                <script>
                                    function confirmDelete() {
                                        return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini? Tindakan ini tidak dapat dibatalkan.');
                                    }
                                </script>
                                <!-- Modal Dialog lihat jawaban -->
                                <dialog id="my_modal_3" class="modal">
                                    <div class="modal-box text-left relative p-6 bg-white shadow-lg rounded-lg max-w-lg mx-auto">
                                        <!-- Close Button -->
                                        <form method="dialog">
                                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 text-gray-500 hover:text-gray-700">✕</button>
                                        </form>
                                
                                        <!-- Modal Title -->
                                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Pertanyaan:</h3>
                                        <p id="question" class="text-lg text-gray-700 py-2 mb-6 border-b border-gray-300"></p>
                                
                                        <!-- Jawaban Section -->
                                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Jawaban:</h3>
                                        <p id="answer" class="text-lg text-gray-700 py-2 mb-6 border-b border-gray-300"></p>                                                          
                                        <!-- Ubah Jawaban Section -->
                                        <div class="flex justify-center mt-4">
                                            <button id="editButton" class="font-medium bg-yellow-500 hover:bg-yellow-600 px-4 py-2 rounded-md text-white focus:outline-none">
                                                Ubah Jawaban
                                            </button>
                                        </div>

                                        <!-- Form Edit Jawaban -->
                                        <form id="editForm" class="hidden mt-6">
                                            @csrf
                                            <textarea id="answerInput" class="w-full p-2 border border-gray-300 rounded-md mb-4"></textarea>
                                            <div class="flex justify-between">
                                                <button type="button" id="cancelButton" class="font-medium bg-gray-500 hover:bg-gray-600 px-4 py-2 rounded-md text-white focus:outline-none">
                                                    Batal
                                                </button>
                                                <button type="submit" id="saveButton" class="font-medium bg-green-500 hover:bg-green-600 px-4 py-2 rounded-md text-white focus:outline-none">
                                                    Simpan Jawaban
                                                </button>
                                            </div>
                                        </form>                                    
                                    </div>
                                </dialog>
                 
                                {{-- Script Lihat dan Update Jawaban --}}
                                <script>
                                    document.addEventListener('DOMContentLoaded', () => {
                                        const saveButton = document.getElementById('saveButton');
                                        const answerInput = document.getElementById('answerInput');
                                        const modal = document.getElementById('my_modal_3');
                                
                                        saveButton.addEventListener('click', function(event) {
                                            event.preventDefault();
                                
                                            const answer = answerInput.value;
                                            const discussionId = document.getElementById('editForm').dataset.discussionId; // Ambil ID diskusi dari data-attribute
                                
                                            if (!answer.trim()) {
                                                console.log('Jawaban tidak boleh kosong!');
                                                return;
                                            }
                                
                                            // Kirim request untuk update jawaban
                                            fetch(`/forum-diskusi/${discussionId}/update-answer`, {
                                                method: 'PATCH',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                },
                                                body: JSON.stringify({ jawaban: answer })
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    sessionStorage.setItem('toastMessage', 'Jawaban berhasil diperbarui!');
                                                    modal.close();
                                                    location.reload(); // Reload halaman untuk melihat perubahan
                                                } else {
                                                    console.log('Gagal menyimpan jawaban.');
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                                console.log('Terjadi kesalahan saat menyimpan jawaban.');
                                            });
                                        });
                                    });
                                
                                    function openModal(question, answer, discussionId) {
                                        document.getElementById('question').textContent = question;
                                        document.getElementById('answer').textContent = answer;
                                
                                        // Set ID diskusi di form
                                        document.getElementById('editForm').dataset.discussionId = discussionId;
                                
                                        // Tampilkan modal
                                        document.getElementById('my_modal_3').showModal();
                                    }
                                
                                    document.addEventListener('DOMContentLoaded', () => {
                                        const editButton = document.getElementById('editButton');
                                        const editForm = document.getElementById('editForm');
                                        const answer = document.getElementById('answer');
                                        const answerInput = document.getElementById('answerInput');
                                        const cancelButton = document.getElementById('cancelButton');
                                        const saveButton = document.getElementById('saveButton');
                                
                                        editButton.addEventListener('click', () => {
                                            answerInput.value = answer.textContent;
                                            answer.classList.add('hidden');
                                            editForm.classList.remove('hidden');
                                            editButton.classList.add('hidden');
                                        });
                                
                                        cancelButton.addEventListener('click', () => {
                                            answer.classList.remove('hidden');
                                            editForm.classList.add('hidden');
                                            editButton.classList.remove('hidden');
                                        });
                                
                                        saveButton.addEventListener('click', function(event) {
                                            event.preventDefault();
                                
                                            const answer = answerInput.value;
                                            const discussionId = document.getElementById('editForm').dataset.discussionId;
                                
                                            if (!answer.trim()) {
                                                console.log('Jawaban tidak boleh kosong!');
                                                return;
                                            }
                                
                                            fetch(`/forum-diskusi/${discussionId}/update-answer`, {
                                                method: 'PATCH',
                                                headers: {
                                                    'Content-Type': 'application/json',
                                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                                                },
                                                body: JSON.stringify({ jawaban: answer })
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    sessionStorage.setItem('toastMessage', 'Jawaban berhasil diperbarui!');
                                                    location.reload(); // Reload halaman untuk menampilkan perubahan
                                                } else {
                                                    console.log('Gagal menyimpan jawaban.');
                                                }
                                            })
                                            .catch(error => {
                                                console.error('Error:', error);
                                                console.log('Terjadi kesalahan saat menyimpan jawaban.');
                                            });
                                        });
                                    });
                                </script>
                                
                            @endif
                        </td>
                    </tr>
                    @endforeach            
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection