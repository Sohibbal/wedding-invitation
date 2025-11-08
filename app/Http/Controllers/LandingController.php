<?php

namespace App\Http\Controllers;

use App\Models\Cover;
use App\Models\Pengantar;
use App\Models\Home;
use App\Models\Info;
use App\Models\Galeri;
use App\Models\Story;
use App\Models\Gift;
use App\Models\Guests;
use Vinkla\Hashids\Facades\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    public function index()
    {
        $cover = Cover::where('user_id', Auth::id())->first();
        $pengantar = Pengantar::where('user_id', Auth::id())->first();
        $home = Home::where('user_id', Auth::id())->first();
        $info = Info::where('user_id', Auth::id())->first();
        $galeri = Galeri::where('user_id', Auth::id())->orderBy('id')->get();
        $stories = Story::where('user_id', Auth::id())->latest()->get();
        $gift = Gift::where('user_id', Auth::id())->first();
        $user = Auth::user();
        $guest = Guests::where('user_id', Auth::id())->first();
        return view('landing.index', compact('cover', 'pengantar', 'home', 'info', 'galeri', 'stories', 'gift', 'user', 'guest'));
    }

    public function showInvitation($hashid, $nama_tamu)
    {
        $decoded = Hashids::decode($hashid);
        if (empty($decoded)) {
            abort(404, 'Undangan tidak ditemukan.');
        }

        $user_id = $decoded[0];

        // Decode nama tamu dari URL
        $nama_tamu = urldecode($nama_tamu);

        // Cari tamu berdasarkan nama dan user_id
        $guest = Guests::where('user_id', $user_id)
            ->where('nama', $nama_tamu)
            ->first();

        if (!$guest) {
            abort(404, 'Tamu tidak ditemukan.');
        }

        // Ambil data undangan lainnya
        $cover = Cover::where('user_id', $user_id)->first();
        $pengantar = Pengantar::where('user_id', $user_id)->first();
        $home = Home::where('user_id', $user_id)->first();
        $info = Info::where('user_id', $user_id)->first();
        $galeri = Galeri::where('user_id', $user_id)->orderBy('id')->get();
        $stories = Story::where('user_id', $user_id)->latest()->get();
        $gift = Gift::where('user_id', $user_id)->first();
        $user = \App\Models\User::find($user_id);

        return view('landing.index', compact(
            'cover',
            'pengantar',
            'home',
            'info',
            'galeri',
            'stories',
            'gift',
            'user',
            'guest'
        ));
    }

    public function update(Request $request, $id)
    {
        $guest = Guests::findOrFail($id);
        $guest->update([
            'nama' => $request->nama,
            'status' => $request->status
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Status berhasil dikirim!'
        ]);
    }
}
