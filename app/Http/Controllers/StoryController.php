<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoryController extends Controller
{
        public function index()
    {
        $stories = Story::where('user_id', Auth::id())->latest()->get();
        return view('story', compact('stories'));
    }

    public function edit($id)
    {
        $story = Story::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('edit.story', compact('story'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $path = $request->file('image')?->store('stories', 'public');

        Story::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'content' => $request->content,
            'image' => $path,
        ]);

        return redirect()->back()->with('success', 'Story berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $story = Story::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($story->image);
            $path = $request->file('image')->store('stories', 'public');
            $story->image = $path;
        }

        $story->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $story->save();

        return redirect()->back()->with('success', 'Story diperbarui.');
    }

    public function destroy($id)
    {
        $story = Story::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        Storage::disk('public')->delete($story->image);
        $story->delete();
        return redirect()->back()->with('success', 'Story dihapus.');
    }

}
