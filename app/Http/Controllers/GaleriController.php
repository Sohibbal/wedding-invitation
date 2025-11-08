<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\TemporaryUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $temporary = TemporaryUpload::where('user_id', Auth::id())->latest()->get();
        $galleries = Galeri::with('image')->where('user_id', Auth::id())->latest()->get();
        return view('galeri', compact('temporary', 'galleries'));
    }

    public function uploadToTemporary(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('file')->store('gallery_temp', 'public');

        $temp = TemporaryUpload::create([
            'user_id' => Auth::id(),
            'filename' => basename($path),
        ]);

        return response()->json([
            'message' => 'Upload berhasil.',
            'id' => $temp->id,
            'filename' => $temp->filename
        ]);
    }


    public function confirmGallery(Request $request)
    {
        $request->validate([
            'temporary_id' => 'required|exists:temporary_uploads,id',
            'caption' => 'nullable|string|max:255',
        ]);

        Galeri::create([
            'user_id' => Auth::id(),
            'temporary_upload_id' => $request->temporary_id,
            'caption' => $request->caption,
        ]);

        return redirect()->back()->with('success', 'Galeri berhasil disimpan.');
    }
    
    public function update(Request $request, $id)
    {
        $gallery = Galeri::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'caption' => 'nullable|string|max:255',
        ]);

        $gallery->caption = $request->caption;
        $gallery->save();

        return back()->with('success', 'Galeri diperbarui.');
    }


    public function destroyGallery($id)
    {
        $gallery = Galeri::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $gallery->delete();
        return back()->with('success', 'Galeri dihapus.');
    }

    public function destroyTemporary($id)
    {
        $temp = TemporaryUpload::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        Storage::disk('public')->delete('gallery_temp/' . $temp->filename);
        $temp->delete();
        return back()->with('success', 'Upload sementara dihapus.');
    }

    public function fetchTemporary()
{
    $temporary = TemporaryUpload::where('user_id', Auth::id())->latest()->get();

    $html = view('components.temporary', compact('temporary'))->render();

    return response()->json(['html' => $html]);
}


}