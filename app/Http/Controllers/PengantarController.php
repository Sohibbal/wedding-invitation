<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pengantar;

class PengantarController extends Controller
{
    public function index(){
        $pengantar = Pengantar::where('user_id', Auth::id())->first();
        if (!$pengantar) {
            $pengantar = new Pengantar([
                'teks1' => '',
                'teks2' => '',
                'ayat' => '',
                'isi_ayat' => '',
            ]);
        }
        return view('edit.pengantar', compact('pengantar'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'teks1' => 'nullable|string',
            'teks2' => 'nullable|string',
            'ayat' => 'nullable|string',
            'isi_ayat' => 'nullable|string',
        ]);

        $pengantar = Pengantar::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'teks1' => $request->teks1,
                'teks2' => $request->teks2,
                'ayat' => $request->ayat,
                'isi_ayat' => $request->isi_ayat,
            ]
        );

        return redirect()->back()->with('success', 'Pengantar berhasil diperbarui!');
    }
}