@extends('layout.side-nav')

@section('sidebar')

<section class="bg-gray-50 dark:bg-gray-900 min-h-screen lg:ms-64 p-4 sm:p-6">
    <div class="mx-auto max-w-screen-xl mt-14">
        <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-center p-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Data Profile Sekolah</h2>
                <a href="/profile/create" class="mt-3 md:mt-0">
                    <button class="flex items-center text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:focus:ring-blue-800">
                        <svg class="h-4 w-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 11-2 0H11V4a1 1 0 00-2 0v5H4a1 1 0 100 2h5v5a1 1 0 102 0v-5h5a1 1 0 000-2h-5V4a1 1 0 011-1z" clip-rule="evenodd"/>
                        </svg>
                        Tambah Data
                    </button>
                </a>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-300">
                        <tr>
                            <th class="px-4 py-3">No.</th>
                            <th class="px-4 py-3">Nama Sekolah</th>
                            <th class="px-4 py-3">Gambar</th>
                            <th class="px-4 py-3">Alamat</th>
                            <th class="px-4 py-3">Moto</th>
                            <th class="px-4 py-3">Visi Misi</th>
                            <th class="px-4 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($profiles as $index => $profile)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-3">{{ $profiles->firstItem() + $index }}</td>
                            <td class="px-4 py-3">{{ $profile->nama_sekolah }}</td>
                            <td class="px-4 py-3">
                                @if($profile->gambar_sekolah)
                                    <img src="{{ asset('storage/' . $profile->gambar_sekolah) }}" alt="Gambar Sekolah" class="w-16 h-16 object-cover rounded border">
                                @else
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $profile->alamat_sekolah }}</td>
                            <td class="px-4 py-3">{{ $profile->moto_sekolah }}</td>
                            <td class="px-4 py-3">{{ Str::limit($profile->visi_misi, 50) }}</td>
                            <td class="px-4 py-3 text-right">
                                <div class="relative inline-block">
                                    <button id="dropdown-button-{{ $index }}" data-dropdown-toggle="dropdown-{{ $index }}" class="text-gray-500 hover:text-gray-800 dark:text-gray-400 dark:hover:text-white focus:outline-none">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM18 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <!-- Dropdown menu -->
                                    <div id="dropdown-{{ $index }}" class="hidden absolute z-10 right-0 mt-2 w-40 bg-white dark:bg-gray-700 rounded-md shadow-md divide-y divide-gray-100 dark:divide-gray-600">
                                        <ul class="py-1 text-sm">
                                            <li><a href="#" 
                                                   class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white show-profile-btn"
                                                   data-nama="{{ $profile->nama_sekolah }}"
                                                   data-alamat="{{ $profile->alamat_sekolah }}"
                                                   data-moto="{{ $profile->moto_sekolah }}"
                                                   data-visi="{{ $profile->visi_misi }}"
                                                   data-gambar="{{ $profile->gambar_sekolah }}"
                                                   data-modal-target="showModal"
                                                   data-modal-toggle="showModal">
                                                    Show
                                                </a></li>
                                            <li>
                                                <a href="#"
                                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white edit-profile-btn"
                                                    data-id="{{ $profile->id }}"
                                                    data-nama="{{ $profile->nama_sekolah }}"
                                                    data-alamat="{{ $profile->alamat_sekolah }}"
                                                    data-moto="{{ $profile->moto_sekolah }}"
                                                    data-visi="{{ $profile->visi_misi }}"
                                                    data-gambar="{{ $profile->gambar_sekolah }}"
                                                    data-modal-target="editModal"
                                                    data-modal-toggle="editModal">
                                                    Edit
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="py-1">
                                            <form action="{{ route('profile.destroy', $profile->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500 dark:text-gray-400">Tidak ada data profil sekolah.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Modal (Flowbite) -->
            <div id="showModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                                Detail Profile
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="showModal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <div class="p-6 space-y-4">
                            <div class="flex justify-center">
                                <img id="modal-gambar" src="" alt="Gambar Sekolah" class="w-32 h-32 object-cover rounded mb-4 border">
                            </div>
                            <p><strong>Nama Sekolah:</strong> <span id="modal-nama"></span></p>
                            <p><strong>Alamat:</strong> <span id="modal-alamat"></span></p>
                            <p><strong>Moto:</strong> <span id="modal-moto"></span></p>
                            <p><strong>Visi Misi:</strong> <span id="modal-visi"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal Edit Profile Sekolah -->
            <div id="editModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                Edit Data Sekolah
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="editModal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <div class="p-6">
                            <form action="{{ route('profile.update', $profile->id) }}" id="editProfileForm" method="POST" enctype="multipart/form-data" onsubmit="return confirm('Yakin ingin mengupdate data?')">
                                @csrf
                                @method('PUT')
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <label for="edit_nama_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sekolah</label>
                                        <input type="text" name="nama_sekolah" id="edit_nama_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                                    </div>
                                    <div class="w-full">
                                        <label for="edit_alamat_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Sekolah</label>
                                        <input type="text" name="alamat_sekolah" id="edit_alamat_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                                    </div>
                                    <div class="w-full">
                                        <label for="edit_gambar_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Sekolah</label>
                                        <input type="file" name="gambar_sekolah" id="edit_gambar_sekolah" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600">
                                        <div class="mt-2">
                                            <img id="edit_preview_gambar" src="" alt="Preview Gambar" class="w-24 h-24 object-cover rounded border" style="display:none;">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="edit_moto_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Moto Sekolah</label>
                                        <input type="text" name="moto_sekolah" id="edit_moto_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="edit_visi_misi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visi & Misi</label>
                                        <textarea name="visi_misi" id="edit_visi_misi" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600" required></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="mt-8 text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="p-4 flex justify-between items-center">
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Menampilkan
                    <span class="font-medium text-gray-900 dark:text-white">
                        {{ $profiles->firstItem() }}-{{ $profiles->lastItem() }}
                    </span>
                    dari
                    <span class="font-medium text-gray-900 dark:text-white">
                        {{ $profiles->total() }}
                    </span> data
                </span>
                <div>
                    {{ $profiles->links() }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

{{-- filepath: c:\laragon\www\website-pesat\resources\views\profile\profile.blade.php --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.show-profile-btn').forEach(function(btn) {
            btn.addEventListener('click', function () {
                document.getElementById('modal-nama').textContent = this.dataset.nama;
                document.getElementById('modal-alamat').textContent = this.dataset.alamat;
                document.getElementById('modal-moto').textContent = this.dataset.moto;
                document.getElementById('modal-visi').textContent = this.dataset.visi;
                // Gambar
                let gambar = this.dataset.gambar;
                let imgTag = document.getElementById('modal-gambar');
                if(gambar){
                    imgTag.src = '/storage/' + gambar;
                    imgTag.style.display = 'block';
                } else {
                    imgTag.style.display = 'none';
                }
            });
        });

        document.querySelectorAll('.edit-profile-btn').forEach(function(btn) {
            btn.addEventListener('click', function () {
                document.getElementById('edit_nama_sekolah').value = this.dataset.nama;
                document.getElementById('edit_alamat_sekolah').value = this.dataset.alamat;
                document.getElementById('edit_moto_sekolah').value = this.dataset.moto;
                document.getElementById('edit_visi_misi').value = this.dataset.visi;
                // Preview gambar
                let gambar = this.dataset.gambar;
                let preview = document.getElementById('edit_preview_gambar');
                if(gambar){
                    preview.src = '/storage/' + gambar;
                    preview.style.display = 'block';
                } else {
                    preview.style.display = 'none';
                }
                // Set form action
                document.getElementById('editProfileForm').action = '/profile/' + this.dataset.id;
            });
        });
    });
</script>
