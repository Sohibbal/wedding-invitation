<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Home;

class HomeController extends Controller
{
    public function index(){
        $home = Home::where('user_id', Auth::id())->first();
        if (!$home) {
            $home = new Home([
                'user_id'=>'1',
                'judul'=>'Judul',
                'lokasi_tanggal'=>'Jl. Contoh Alamat, 1 Januari 2023',
                'deskripsi'=>'pernikahan ini adalah momen bahagia yang akan kami rayakan bersama keluarga dan teman-teman.',
                'ortu_pria'=>' Bapak Contoh Pria',
                'ortu_wanita'=>'ibu Contoh Wanita',
                'nama_lengkap_pria'=>'Contoh Pria',
                'nama_lengkap_wanita'=>'Contoh Wanita',
                'foto_pria'=>'jpg/default_pria.jpg',
                'foto_wanita'=>'jpg/default_wanita.jpg',
            ]);
        }
        return view('edit.home', compact('home'));
    }

    public function update(Request $request)
{
    $request->validate([
        'judul' => 'nullable|string',
        'lokasi_tanggal' => 'nullable|string',
        'deskripsi' => 'nullable|string',
        'ortu_pria' => 'nullable|string',
        'ortu_wanita' => 'nullable|string',
        'nama_lengkap_pria' => 'nullable|string',
        'nama_lengkap_wanita' => 'nullable|string',
        'foto_pria' => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
        'foto_wanita' => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
    ]);

    $home = Home::updateOrCreate(
        ['user_id' => Auth::id()],
        $request->only(
            'judul',
            'lokasi_tanggal',
            'deskripsi',
            'ortu_pria',
            'ortu_wanita',
            'nama_lengkap_pria',
            'nama_lengkap_wanita'
        )
    );

    // Cek dan simpan file foto pria
    if ($request->hasFile('foto_pria')) {
        $fotoPria = $request->file('foto_pria')->store('home', 'public');
        $home->foto_pria = $fotoPria;
    }

    // Cek dan simpan file foto wanita
    if ($request->hasFile('foto_wanita')) {
        $fotoWanita = $request->file('foto_wanita')->store('home', 'public');
        $home->foto_wanita = $fotoWanita;
    }

    $home->save();

    return redirect()->back()->with('success', 'Data home berhasil diperbarui!');
}

}
