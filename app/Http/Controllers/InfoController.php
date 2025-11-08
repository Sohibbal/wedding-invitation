<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Info;

class InfoController extends Controller
{

    public function index(){
        $info = Info::where('user_id', Auth::id())->first();
        return view('edit.info', compact('info'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'tanggal_akad'     => 'nullable|date',
            'jam_akad'         => 'nullable|string',
            'tanggal_resepsi'  => 'nullable|date',
            'jam_resepsi'      => 'nullable|string',
            'alamat'           => 'nullable|string',
            'google_maps' => 'nullable|string',
        ]);

        $info = Info::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'tanggal_akad'     => $request->tanggal_akad,
                'jam_akad'         => $request->jam_akad,
                'tanggal_resepsi'  => $request->tanggal_resepsi,
                'jam_resepsi'      => $request->jam_resepsi,
                'alamat'           => $request->alamat,
                'google_maps'      => $request->google_maps,
            ]
        );

        return redirect()->back()->with('success', 'Data info berhasil diperbarui!');
    }
}
