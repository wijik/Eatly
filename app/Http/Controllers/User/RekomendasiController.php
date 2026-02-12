<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

use App\Models\Menu;
use App\Models\Rekomendasi;
use App\Models\PreferensiRasaUser;

class RekomendasiController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tanggalHariIni = now()->toDateString();

        $dataHariIni = Rekomendasi::where('id_user', $user->id_user)
            ->where('tanggal', $tanggalHariIni)
            ->with('menu')
            ->get();

        if ($dataHariIni->isNotEmpty()) {
            $rekomendasi = $dataHariIni->map(function ($item) {
                return [
                    'menu' => $item->menu,
                    'skor' => $item->skor
                ];
            });

            return view('user.rekomendasi', [
                'rekomendasi' => $rekomendasi
            ]);
        } else {
            $preferensiUser = PreferensiRasaUser::where('id_user', $user->id_user)
                ->get()
                ->keyBy('id_preferensi_rasa');

            $menus = Menu::where('is_today', 1)->get();

            $menusSkor = $menus->map(function ($menu) use ($preferensiUser) {
                $rasaSkor = $preferensiUser[$menu->id_preferensi_rasa]->nilai_konversi ?? 1;
                $beratBadan = Auth::user()->berat_badan;

                return [
                    'menu' => $menu,
                    'kalori' => $this->konversiSelisihKalori($menu->kalori, $beratBadan),
                    'protein' => $this->konversiProtein($menu->protein),
                    'lemak' => $this->konversiLemak($menu->lemak),
                    'preferensi_rasa' => $rasaSkor,
                ];
            });

            $maxKalori = $menusSkor->max('kalori');
            $maxProtein = $menusSkor->max('protein');
            $minLemak = $menusSkor->min('lemak');
            $maxRasa = 4;

            $bobot = [
                'kalori' => 0.25,
                'protein' => 0.30,
                'lemak' => 0.25,
                'preferensi_rasa' => 0.20,
            ];

            $rekomendasi = $menusSkor->map(function ($item) use ($bobot, $maxKalori, $maxProtein, $minLemak, $maxRasa) {
                $skor = (
                    ($item['kalori'] / $maxKalori) * $bobot['kalori']) +
                    (($item['protein'] / $maxProtein) * $bobot['protein']) +
                    (($minLemak / $item['lemak']) * $bobot['lemak']) +
                    (($item['preferensi_rasa'] / $maxRasa) * $bobot['preferensi_rasa']);

                return [
                    'menu' => $item['menu'],
                    'skor' => round($skor, 4)
                ];
            })->sortByDesc('skor')->take(3)->values();

            DB::beginTransaction();
            try {
                foreach ($rekomendasi as $item) {

                    do {
                        $id_rekomendasi = random_int(100000, 999999);
                    } while (Rekomendasi::where('id_rekomendasi', $id_rekomendasi)->exists());

                    Rekomendasi::updateOrCreate(
                        [
                            'id_rekomendasi' => $id_rekomendasi,
                            'id_user' => $user->id_user,
                            'id_menu' => $item['menu']->id_menu,
                            'tanggal' => now()->toDateString()
                        ],
                        [
                            'skor' => $item['skor']
                        ]
                    );
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                report($e);
                dd($e->getMessage());
            }

            return view('user.rekomendasi', [
                'rekomendasi' => $rekomendasi
            ]);
        }
    }

    private function konversiSelisihKalori($kaloriMenu, $beratBadan)
    {
        $kebutuhanKalori = $beratBadan * 30;
        $selisih = abs($kebutuhanKalori - $kaloriMenu);

        if ($selisih <= 50) return 4;
        if ($selisih <= 150) return 3;
        if ($selisih <= 300) return 2;
        return 1;
    }


    private function konversiKalori($kalori)
    {
        if ($kalori < 200) return 1;
        elseif ($kalori <= 400) return 2;
        elseif ($kalori <= 600) return 3;
        else return 4;
    }

    private function konversiProtein($protein)
    {
        if ($protein < 5) return 1;
        elseif ($protein <= 10) return 2;
        elseif ($protein <= 15) return 3;
        else return 4;
    }

    private function konversiLemak($lemak)
    {
        if ($lemak <= 10) return 4;
        elseif ($lemak <= 15) return 3;
        elseif ($lemak <= 20) return 2;
        else return 1;
    }
}
