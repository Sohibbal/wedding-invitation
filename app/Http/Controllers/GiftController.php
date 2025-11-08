<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GiftController extends Controller
{
    public function edit()
    {
        $gift = Gift::where('user_id', Auth::id())->first();
        return view('edit.gift', compact('gift'));
    }

    public function updateOrCreate(Request $request)
    {
        $request->validate([
            'qr_label' => 'nullable|string|max:255',
            'bank1_label' => 'nullable|string|max:255',
            'bank1_number' => 'nullable|string|max:255',
            'bank2_label' => 'nullable|string|max:255',
            'bank2_number' => 'nullable|string|max:255',
            'qris_image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $data = $request->only([
            'qr_label', 'bank1_label', 'bank1_number', 'bank2_label', 'bank2_number',
        ]);

        if ($request->hasFile('qris_image')) {
            $data['qris_image'] = $request->file('qris_image')->store('qris', 'public');
        }

        Gift::updateOrCreate(
            ['user_id' => Auth::id()],
            $data
        );

        return redirect()->back()->with('success', 'Data hadiah berhasil disimpan.');
    }
}

