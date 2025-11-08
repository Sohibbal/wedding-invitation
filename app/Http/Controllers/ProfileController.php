<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        // Mendapatkan pengguna yang sedang login
        $user = User::find(Auth::id());

        if ($user) {
            $user->name = $request->name;
            $user->email = $request->email;
            
            // Menyimpan perubahan
            if ($user->save()) {
                return redirect('/dashboard')->with('success', 'Profil berhasil diperbarui!');
            } else {
                return redirect('/dashboard')->with('error', 'Gagal menyimpan perubahan profil.');
            }
        } else {
            return redirect('/dashboard')->with('error', 'Gagal memperbarui profil. User tidak ditemukan.');
        }
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
{
    $request->validate([
        'password' => ['required', 'current_password'],
    ]);

    $user = $request->user();

    Auth::logout();
    
    $user->delete();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Redirect ke halaman login dengan parameter query
    return redirect('/login?account_deleted=true');
}
}
