<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Log;


class DeactivateInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:deactivate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deactivate Inactive User Accounts.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
      //optional. This will display a success log message or error in terminal if you run the scheduler command manually e.g., 'php artisan users:deactivate'. Or by running the automatic scheduler task e.g., 'php artisan schedule:work'.
      Log::info('users:deactivate command is now running');
      
      //here you can indicate seconds, minutes, hours, daily, etc.,
      //e.g., $inactiveThreshold = Carbon::now()->subDays(30);
      $inactiveThreshold = Carbon::now()->subMonth();
      
      //this will change inactivate users 'active' value to 0 if they have been inactive for 1 minute.
      User::where('active', 1)
      ->where('last_activity', '<', $inactiveThreshold)
      ->update([
        'active' => 0,
        ]);
     
     //display message in termminal.
      $this->info('Inactive users has been inactivated');
    }
}
