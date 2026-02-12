<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\PreferensiRasa;
use App\Models\PreferensiRasaUser;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        $preferensiRasa = PreferensiRasa::all();

        return view('user.profile', compact('user', 'preferensiRasa'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'berat_badan' => 'nullable|numeric|min:1',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'preferensi_rasa' => 'nullable|array|max:3',
            'preferensi_rasa.*' => 'exists:preferensi_rasa,id_preferensi_rasa',
        ]);

        $user->nama = $request->nama;
        $user->berat_badan = $request->berat_badan;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = 'users/' . $filename;

            if ($user->foto && $user->foto !== 'users/default-user.png' && File::exists(public_path($user->foto))) {
                File::delete(public_path($user->foto));
            }

            $file->move(public_path('users'), $filename);
            $user->foto = $path;
        }

        $user->save();

        if ($request->has('preferensi_rasa')) {
            $user->preferensiRasa()->detach();
            foreach ($request->preferensi_rasa as $index => $idRasa) {
                do {
                    $id_preferensi_rasa_user = random_int(100000, 999999);
                } while (
                    DB::table('preferensi_rasa_user')->where('id_preferensi_rasa_user', $id_preferensi_rasa_user)->exists()
                );

                DB::table('preferensi_rasa_user')->insert([
                    'id_preferensi_rasa_user' => $id_preferensi_rasa_user,
                    'id_user' => $user->id_user,
                    'id_preferensi_rasa' => $idRasa,
                    'nilai_konversi' => 4 - $index,
                ]);
            }
        } else {
            $user->preferensiRasa()->detach();
        }

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
