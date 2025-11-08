<?php

namespace App\Http\Controllers;

use App\Models\Pengantar;
use App\Models\Guests;
use App\Models\Cover;
use App\Models\Home;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon; // tambahkan di atas


class DashboardController extends Controller
{
    public function index()
    {
        $guests = Guests::where('user_id', Auth::id())->paginate(6);

        return view('guest.index', compact('guests'));
    }

    public function main()
    {
        $guests = Guests::where('user_id', Auth::id())->paginate(6);
        $totalGuests = Guests::where('user_id', Auth::id())->count();
        $totalHadir = Guests::where('user_id', Auth::id())->where('status', 'hadir')->count();
        $totalTidakHadir = Guests::where('user_id', Auth::id())->where('status', 'tidak hadir')->count();

        return view('main', compact('guests', 'totalGuests', 'totalHadir', 'totalTidakHadir'));
    }


    public function create()
    {
        return view('guest.add');
    }



    public function store(Request $request)
    {
        Guests::create([
            'nama' => $request->nama,
            'tanggal' => Carbon::now()->toDateString(),
            'whatsapp' => $request->whatsapp,
            'status' => $request->status,
            'user_id' => Auth::id(), // <== penting
        ]);

        return redirect('/dashboard/guest')->with('success', 'Tamu berhasil ditambah!');
    }

    public function destroy($id)
    {
        $guest = Guests::findOrFail($id);
        $guest->delete();

        return redirect('/dashboard/guest')->with('success', 'Tamu berhasil dihapus!');
    }
    public function edit($id)
    {
        $guest = Guests::findOrFail($id);
        return view('guest.edit', compact('guest'));
    }

    public function update(Request $request, $id)
    {
        $guest = Guests::findOrFail($id);
        $guest->update([
            'nama' => $request->nama,
            'status' => $request->status
        ]);

        return redirect('/dashboard/guest')->with('success', 'Data tamu berhasil diperbarui!');
    }
}
