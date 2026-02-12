<?php 
// app/Console/Kernel.php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Console\Commands\ResetMenuToday; // <--- Tambahkan ini

class Kernel extends ConsoleKernel
{
    protected $commands = [
        ResetMenuToday::class, // <--- Tambahkan ini
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('reset:menu-today')->daily();
    }
}
?>