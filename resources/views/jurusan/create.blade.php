<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Sekolah</title>
    @vite('resources/css/app.css')
</head>
<body>
    <section class="bg-white dark:bg-gray-900 min-h-screen">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Masukkan Data Sekolah</h2>

            <form action="{{ route('jurusan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nama_jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" id="nama_jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh: Rekayasa Perangkat Lunak" required>
                        @error('nama_jurusan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="singkatan_jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Singkatan Jurusan</label>
                        <input type="text" name="singkatan_jurusan" id="singkatan_jurusan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh: RPL" required>
                        @error('singkatan_jurusan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="sm:col-span-2">
                        <label for="gambar_jurusan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar Jurusan</label>
                        <input type="file" name="gambar_jurusan" id="gambar_jurusan" accept="image/*" class="block w-full rounded-lg border-gray-300 dark:bg-gray-700 dark:border-gray-600 dark:text-white" required>
                        @error('gambar_jurusan')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="mt-8 text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">Simpan</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
