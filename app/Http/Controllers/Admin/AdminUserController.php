<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:0']);
    }

    public function index(Request $request)
    {
        $query = User::where('role', 1);

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('email', 'like', '%' . $request->search . '%');
            });
        }

        $users = $query->paginate(10)->withQueryString();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        do {
            $id_user = random_int(100000, 999999);
        } while (User::where('id_user', $id_user)->exists());

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:100|unique:users,email',
            'berat_badan' => 'nullable|numeric|min:1',
            'password' => 'required|string|min:6|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = new User();
        $user->id_user = $id_user;
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->berat_badan = $request->berat_badan;
        $user->password = Hash::make($request->password);
        $user->role = 1;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('users'), $filename);
            $user->foto = 'users/' . $filename;
        } else {
            $user->foto = 'users/default-user.png';
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan');
    }

    public function show(User $user)
    {
        if ($user->role != 1) abort(403);
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        if ($user->role != 1) abort(403);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if ($user->role != 1) abort(403);

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:100|unique:users,email,' . $user->id_user . ',id_user',
            'berat_badan' => 'nullable|numeric|min:1',
            'password' => 'nullable|string|min:6|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->berat_badan = $request->berat_badan;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            if ($user->foto && $user->foto !== 'users/default-user.png') {
                $oldPath = public_path('users/' . $user->foto);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('users'), $filename);
            $user->foto = 'users/' . $filename;
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui');
    }

    public function destroy(User $user)
    {
        if ($user->role != 1) abort(403);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
    }
}
