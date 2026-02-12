<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Menu;
use App\Models\PreferensiRasa;
use App\Models\Rekomendasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:0']);
    }

    public function index()
    {
        $now = Carbon::now();
        $lastMonth = $now->copy()->subMonth();
        $yesterday = $now->copy()->subDay();

        $currentEmployees = User::whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->count();

        $lastEmployees = User::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->count();

        $employeeGrowth = ($lastEmployees == 0)
            ? ($currentEmployees > 0 ? 100 : 0)
            : (($currentEmployees - $lastEmployees) / $lastEmployees) * 100;
        $employeeGrowth = round($employeeGrowth, 2);

        $totalEmployees = User::where('role', 1)->count();

        $currentMenus = Menu::whereYear('created_at', $now->year)
            ->whereMonth('created_at', $now->month)
            ->count();

        $lastMenus = Menu::whereYear('created_at', $lastMonth->year)
            ->whereMonth('created_at', $lastMonth->month)
            ->count();

        $menuGrowth = ($lastMenus == 0)
            ? ($currentMenus > 0 ? 100 : 0)
            : (($currentMenus - $lastMenus) / $lastMenus) * 100;
        $menuGrowth = round($menuGrowth, 2);

        $totalMenus = Menu::count();

        $todaysRecommendations = Rekomendasi::whereDate('created_at', $now->toDateString())->count();
        $yesterdaysRecommendations = Rekomendasi::whereDate('created_at', $yesterday->toDateString())->count();

        $recommendationRate = ($yesterdaysRecommendations == 0)
            ? ($todaysRecommendations > 0 ? 100 : 0)
            : (($todaysRecommendations - $yesterdaysRecommendations) / $yesterdaysRecommendations) * 100;
        $recommendationRate = round($recommendationRate, 2);

        $popularTaste = PreferensiRasa::withCount('menus')->orderByDesc('menus_count')->first();
        $mostPopularTaste = $popularTaste->nama_rasa ?? '-';
        $popularTasteCount = $popularTaste->menus_count ?? 0;

        $admin = Auth::user();

        $menus = Menu::latest()->take(5)->get();

        $topMenus = DB::table('rekomendasis')
            ->select(
                'menus.id_menu',
                'menus.nama_menu',
                'menus.gambar',
                'menus.is_today',
                DB::raw('COUNT(rekomendasis.id_menu) as total_rekomendasi')
            )
            ->join('menus', 'menus.id_menu', '=', 'rekomendasis.id_menu')
            ->groupBy(
                'menus.id_menu',
                'menus.nama_menu',
                'menus.gambar',
                'menus.is_today'
            )
            ->orderByDesc('total_rekomendasi')
            ->limit(5)
            ->get();

        $preferensiRasa = DB::table('preferensi_rasa_user')
            ->join('preferensi_rasa', 'preferensi_rasa_user.id_preferensi_rasa', '=', 'preferensi_rasa.id_preferensi_rasa')
            ->select('preferensi_rasa.nama_rasa', DB::raw('COUNT(*) as total'))
            ->groupBy('preferensi_rasa.nama_rasa')
            ->get();

        $recentlyUpdatedMenus = Menu::orderBy('updated_at', 'desc')
            ->take(3)
            ->get();

        $totalPreferensi = DB::table('preferensi_rasa_user')->count();

        return view('admin.dashboard', compact(
            'employeeGrowth',
            'totalPreferensi',
            'preferensiRasa',
            'recentlyUpdatedMenus',
            'menus',
            'topMenus',
            'menuGrowth',
            'recommendationRate',
            'totalEmployees',
            'totalMenus',
            'todaysRecommendations',
            'mostPopularTaste',
            'popularTasteCount',
            'admin'
        ));
    }
}
