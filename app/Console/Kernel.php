<?php

namespace App\Console;

use App\Models\Otp;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // delete expired otp
        $schedule->call(function () {
            Otp::where('updated_at', '<', Carbon::now()->subDay())->delete();
        })->weekly();

        //SEO SITEMAP
        $schedule->command('sitemap:generate')->weekly();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
