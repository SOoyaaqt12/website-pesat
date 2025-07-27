<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class jurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = Jurusan::paginate(10); // Menampilkan 10 data per halaman
        return view('jurusan.jurusan', compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:225',
            'singkatan_jurusan'=> 'required|string|max:50',
            'gambar_jurusan' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Default filename
        $filename = null;

        if ($request->hasFile('gambar_jurusan')) {
            $filename = $request->file('gambar_jurusan')->store('gambar-jurusan', 'public'); // hasilnya: gambar-jurusan/abc123.png     
        }

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'singkatan_jurusan' => $request->singkatan_jurusan,
            'gambar_jurusan' => $filename, // Simpan nama file saja
        ]);

        return redirect()->route('jurusan.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        // Hapus file gambar jika ada
        if ($jurusan->gambar_jurusan) {
            Storage::delete('public/' . $jurusan->gambar_jurusan);
        }

        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Data berhasil dihapus!');
    }
}
