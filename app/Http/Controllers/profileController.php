<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // FIXED: Correct import

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profiles = Profile::paginate(10); // Menampilkan 10 data per halaman
        return view('profile.profile', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'alamat_sekolah' => 'required|string',
            'moto_sekolah' => 'required|string',
            'visi_misi' => 'required|string',
            'gambar_sekolah' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Default filename
        $filename = null;

        if ($request->hasFile('gambar_sekolah')) {
            // Simpan file ke storage/app/public/gambar-sekolah dan ambil nama hash
            $filename = $request->file('gambar_sekolah')->store('gambar-sekolah', 'public'); // hasilnya: gambar-sekolah/abc123.png
        }

        Profile::create([
            'nama_sekolah' => $request->nama_sekolah,
            'alamat_sekolah' => $request->alamat_sekolah,
            'moto_sekolah' => $request->moto_sekolah,
            'visi_misi' => $request->visi_misi,
            'gambar_sekolah' => $filename, // Simpan nama file saja
        ]);

        return redirect()->route('profile.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $profile = Profile::findOrFail($id);
        return view('profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profile = Profile::findOrFail($id);

        $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'alamat_sekolah' => 'required|string',
            'moto_sekolah' => 'required|string',
            'visi_misi' => 'required|string',
            'gambar_sekolah' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle gambar baru
        if ($request->hasFile('gambar_sekolah')) {
            // Hapus gambar lama jika ada
            
            if ($profile->gambar_sekolah) {
                Storage::delete('public/' . $profile->gambar_sekolah);
            }
            $filename = $request->file('gambar_sekolah')->store('gambar-sekolah', 'public');
            $profile->gambar_sekolah = $filename;
        }

        $profile->nama_sekolah = $request->nama_sekolah;
        $profile->alamat_sekolah = $request->alamat_sekolah;
        $profile->moto_sekolah = $request->moto_sekolah;
        $profile->visi_misi = $request->visi_misi;
        $profile->save();

        return redirect()->route('profile.index')->with('success', 'Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $profile = Profile::findOrFail($id);

        // Hapus file gambar jika ada
        if ($profile->gambar_sekolah) {
            Storage::delete('public/' . $profile->gambar_sekolah); // Hapus file gambar dari storage
        }

        $profile->delete();

        return redirect()->route('profile.index')->with('success', 'Data berhasil dihapus!');
    }
}
