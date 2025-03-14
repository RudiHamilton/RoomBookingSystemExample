<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SoftDeleteOldBookings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'softdelete:oldbookings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Soft delete old bookings';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo 'soft deleting old bookings';
        Booking::where('date', '<', Carbon::now()->subDays(15))->delete();
        echo 'old bookings soft deleted';
    }
}
