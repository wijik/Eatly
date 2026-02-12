<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\PreferensiRasa;

class AdminMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:0']);
    }

    public function today(Request $request)
    {
        $query = Menu::with('preferensiRasa');
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama_menu', 'like', "%{$search}%");
        }
        $menus = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();

        return view('admin.menus.today', compact('menus'));
    }

    public function setToday(Request $request)
    {
        $request->validate([
            'id_menu' => 'required|array|min:1',
            'id_menu.*' => 'integer|exists:menus,id_menu',
        ]);

        Menu::where('is_today', true)->update([
            'is_today' => false,
            'is_today_set_at' => null,
        ]);

        $menuIds = $request->input('id_menu');

        Menu::whereIn('id_menu', $menuIds)->update([
            'is_today' => true,
            'is_today_set_at' => now(),
        ]);

        return back()->with('success', 'Menu hari ini berhasil diperbarui.');
    }

    public function index(Request $request)
    {
        $query = Menu::with('preferensiRasa');
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('nama_menu', 'like', "%{$search}%");
        }
        $menus = $query->orderBy('created_at', 'desc')->paginate(5)->withQueryString();

        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $preferensi_rasa = PreferensiRasa::all();
        return view('admin.menus.create', compact('preferensi_rasa'));
    }

    public function store(Request $request)
    {
        do {
            $id_menu = random_int(100000, 999999);
        } while (Menu::where('id_menu', $id_menu)->exists());

        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'kalori' => 'required|integer|min:0',
            'protein' => 'required|integer|min:0',
            'lemak' => 'required|integer|min:0',
            'id_preferensi_rasa' => 'required|exists:preferensi_rasa,id_preferensi_rasa',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('gambar');
        $data['id_menu'] = $id_menu;

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = 'menus/' . $filename;

            $file->move(public_path('menus'), $filename);

            $data['gambar'] = $path;
        }

        Menu::create($data);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan');
    }

    public function show(Menu $menu)
    {
        $menu->load('preferensiRasa');
        return view('admin.menus.show', compact('menu'));
    }

    public function edit(Menu $menu)
    {
        $preferensi_rasa = PreferensiRasa::all();
        return view('admin.menus.edit', compact('menu', 'preferensi_rasa'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama_menu' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
            'kalori' => 'required|integer|min:0',
            'protein' => 'required|integer|min:0',
            'lemak' => 'required|integer|min:0',
            'id_preferensi_rasa' => 'required|exists:preferensi_rasa,id_preferensi_rasa',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except('gambar');

        if ($request->hasFile('gambar')) {
            if ($menu->gambar && str_starts_with($menu->gambar, 'menus/') && file_exists(public_path($menu->gambar))) {
                unlink(public_path($menu->gambar));
            }

            $file = $request->file('gambar');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $path = 'menus/' . $filename;

            $file->move(public_path('menus'), $filename);

            $data['gambar'] = $path;
        }

        $menu->update($data);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil diperbarui');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->gambar && $menu->gambar !== 'menus/default-menu.png') {

            $filePath = public_path($menu->gambar);

            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }

        $menu->delete();

        return redirect()->route('menus.index')
            ->with('success', 'Menu berhasil dihapus');
    }
}
