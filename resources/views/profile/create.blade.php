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

            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nama_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" id="nama_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Contoh: SMK Pesat" required>
                    </div>

                    <div class="w-full">
                        <label for="alamat_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Sekolah</label>
                        <input type="text" name="alamat_sekolah" id="alamat_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Contoh: Jl. Merdeka No.123" required>
                    </div>

                    <div class="w-full">
                        <label for="gambar_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Masukkan Gambar Sekolah</label>
                        <input type="file" name="gambar_sekolah" id="gambar_sekolah" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 dark:text-gray-400 dark:bg-gray-700 dark:border-gray-600">
                    </div>

                    <div class="sm:col-span-2">
                        <label for="moto_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Moto Sekolah</label>
                        <input type="text" name="moto_sekolah" id="moto_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white" placeholder="Contoh: Disiplin, Tanggung Jawab, Profesional" required>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="visi_misi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visi & Misi</label>
                        <textarea name="visi_misi" id="visi_misi" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 dark:bg-gray-700 dark:text-white dark:border-gray-600" placeholder="Tuliskan visi dan misi sekolah di sini..." required></textarea>
                    </div>
                </div>

                <button type="submit" class="mt-8 text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700">Simpan</button>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
