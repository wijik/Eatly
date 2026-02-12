<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PreferensiRasa;

class PreferensiRasaController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->q;
        $rasa = PreferensiRasa::where('nama_rasa', 'like', "%$query%")->get(['id_preferensi_rasa', 'nama_rasa']);
        return response()->json($rasa);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_rasa' => 'required|string|max:255|unique:preferensi_rasa,nama_rasa'
        ]);

        $rasa = PreferensiRasa::create([
            'nama_rasa' => $request->nama_rasa
        ]);

        return response()->json($rasa);
    }
}
