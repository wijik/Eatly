<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalMenu = \App\Models\Menu::count();

       $rekomendasiHariIni = Rekomendasi::where('id_user', $user->id_user)
            ->where('tanggal', now()->toDateString())
            ->with('menu') 
            ->get();

        $totalKalori = $rekomendasiHariIni->sum(fn($r) => $r->menu->kalori);

        $riwayat = \App\Models\Rekomendasi::with('menu')
            ->where('id_user', $user->id)
            ->orderByDesc('created_at')
            ->take(3)
            ->get();

        $menus = Menu::where('is_today', true)
            ->where('is_today_set_at', '>=', now()->subHours(24))
            ->get();

        $kebutuhanKalori = $user->berat_badan * 30;

        $skorTertinggi = \App\Models\Rekomendasi::where('id_user', $user->id_user)->max('skor');

        return view('user.dashboard', compact(
            'totalMenu',
            'rekomendasiHariIni',
            'totalKalori',
            'riwayat',
            'kebutuhanKalori',
            'skorTertinggi'
        ));
    }
}
