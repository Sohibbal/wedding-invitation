<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cover;
use Illuminate\Http\Request;

class CoverController extends Controller
{

    public function index()
    {
        $cover = Cover::where('user_id', Auth::id())->first();
        if (!$cover) {
            $cover = new Cover([
                'nama_pria' => '',
                'nama_wanita' => '',
                'tanggal_acara' => now(),
            ]);
        }
        return view('edit.cover', compact('cover'));
    }

    public function edit()
    {
        $cover = Cover::where('user_id', Auth::id())->first();

        // Jika belum ada, buat data kosong agar bisa diedit
        if (!$cover) {
            $cover = new Cover([
                'nama_pria' => '',
                'nama_wanita' => '',
                'tanggal_acara' => now(),
            ]);
        }

        return view('edit-cover', compact('cover'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama_pria' => 'required|string',
            'nama_wanita' => 'required|string',
            'tanggal_acara' => 'required|date',
        ]);

        // Simpan atau update data utama dulu
        $cover = Cover::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'nama_pria' => $request->nama_pria,
                'nama_wanita' => $request->nama_wanita,
                'tanggal_acara' => $request->tanggal_acara,
            ]
        );

        // Simpan audio jika ada
        if ($request->hasFile('audio')) {
            $audio = $request->file('audio');
            $audioPath = $audio->store('audio', 'public');

            // Update audio_path di model yang sudah ada
            $cover->audio_path = $audioPath;
            $cover->save(); // simpan perubahan
        }

        return redirect()->back()->with('success', 'Cover berhasil disimpan.');
    }
}
