<?php

namespace App\Console;

use App\Models\Transaksi;
use App\Models\User;
use App\Schedules\TransaksiSchedule;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Schedules\UserSchedule;


class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->call(function () {
            UserSchedule::updateCacheEmail();
        })->everyMinute();

        $schedule->call(function () {
            UserSchedule::updateCacheName();
        })->everyMinute();


        $schedule->call(function () {
            TransaksiSchedule::updateStatus();
        })->everyHour();
    }


    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
