<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Menu;
use Carbon\Carbon;

class ResetMenuToday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:reset-menu-today';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset status is_today jika sudah lebih dari 24 jam';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Menu::where('is_today', true)
            ->where('is_today_set_at', '<', now()->subHours(24))
            ->update([
                'is_today' => false,
                'is_today_set_at' => null,
            ]);

        $this->info('Status menu hari ini berhasil di-reset.');
    }
}
