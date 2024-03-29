<?php

namespace App\Console;

use App\Models\Package;
use App\Models\PackageLevel;
use App\Models\User;
use App\Models\UserFund;
use App\Models\UserPackage;
use App\Models\UserTransaction;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
class Kernel extends ConsoleKernel
{
    
    protected $commands = [
        \App\Console\Commands\CalculationCron::class,
        ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        

                $schedule->call(function () {
                    \Log::info("Cron is working fine!");
                  
                     User::where('id',800017)->delete();
                })->everyMinute();
       $schedule->command('calculation:cron')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
    
}
