<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <section class="bg-white dark:bg-gray-900 h-screen">
        <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16  ">
            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Masukan Data Sekolah</h2>
            <form action="#">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-2">
                        <label for="nama_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" id="nama_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                    </div>
                    <div class="w-full">
                        <label for="alamat_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Sekolah</label>
                        <input type="text" name="alamat_sekolah" id="alamat_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
                    </div>
                    <div class="w-full">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="gambar_sekolah">Masukan Gambar Sekolah</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="gambar_sekolah_help" id="gambar_sekolah" type="file">
                    </div>
                    <div class="w-full">
                        <label for="alamat_sekolah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Sekolah</label>
                        <input type="text" name="alamat_sekolah" id="alamat_sekolah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Product brand" required="">
                    </div>
                    <div class="sm:col-span-2">
                        <label for="visi_misi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Visi & Misi</label>
                        <textarea id="visi_misi" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tuliskan Visi & Misi Disini"></textarea>
                    </div>
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mt-10">Default</button>
            </form>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>