@extends('layout.side-nav')

@section('sidebar')

<section class="bg-gray-50 dark:bg-gray-900 min-h-screen lg:ms-64 p-4 sm:p-6">
    <div class="mx-auto max-w-screen-xl mt-14">
        <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg overflow-hidden">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-center p-4">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Data Jurusan Sekolah</h2>
                <a href="/jurusan/create" class="mt-3 md:mt-0">
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
                            <th class="px-4 py-3">Nama Jurusan</th>
                            <th class="px-4 py-3">Gambar</th>
                            <th class="px-4 py-3">Singkatan Jurusan</th>
                            <th class="px-4 py-3 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jurusans as $index => $jurusan)
                        <tr class="border-b dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-4 py-3">{{ $jurusans->firstItem() + $index }}</td>
                            <td class="px-4 py-3">{{ $jurusan->nama_jurusan }}</td>
                            <td class="px-4 py-3">
                                @if($jurusan->gambar_jurusan)
                                    <img src="{{ asset('storage/' . $jurusan->gambar_jurusan) }}" alt="Gambar Jurusan" class="w-16 h-16 object-cover rounded border">
                                @else
                                    <span class="text-gray-400">Tidak ada gambar</span>
                                @endif
                            </td>
                            <td class="px-4 py-3">{{ $jurusan->singkatan_jurusan }}</td>
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
                                                   data-nama="{{ $jurusan->nama_jurusan }}"
                                                   data-singkatan="{{ $jurusan->singkatan_jurusan }}"
                                                   data-gambar="{{ $jurusan->gambar_jurusan }}"
                                                   data-modal-target="showModal"
                                                   data-modal-toggle="showModal">
                                                    Show
                                                </a></li>
                                            <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-white">Edit</a></li>
                                        </ul>
                                        <div class="py-1">
                                            <form action="{{ route('jurusan.destroy', $jurusan->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-gray-500 dark:text-gray-400">Tidak ada data Jurusan Sekolah sekolah.</td>
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
                                <img id="modal-gambar" src="" alt="Gambar Sekolah" class="w-40 h-40 object-cover rounded mb-4 border">
                            </div>
                            <p><strong class="text-gray-900 dark:text-gray-100">Nama Sekolah:</strong> <span class="text-gray-900 dark:text-gray-100" id="modal-nama"></span></p>
                            <p><strong class="text-gray-900 dark:text-gray-100">Singkatan:</strong> <span class="text-gray-900 dark:text-gray-100" id="modal-singkatan"></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="p-4 flex justify-between items-center">
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Menampilkan
                    <span class="font-medium text-gray-900 dark:text-white">
                        {{ $jurusans->firstItem() }}-{{ $jurusans->lastItem() }}
                    </span>
                    dari
                    <span class="font-medium text-gray-900 dark:text-white">
                        {{ $jurusans->total() }}
                    </span> data
                </span>
                <div>
                    {{ $jurusans->links() }}
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
                document.getElementById('modal-singkatan').textContent = this.dataset.singkatan;
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
    });
</script>
