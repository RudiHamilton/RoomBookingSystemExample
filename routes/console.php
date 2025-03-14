<?php

use App\Console\Commands\SoftDeleteOldBookings;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Console\ClosureCommand;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;



Artisan::command('inspire', function () {
    /** @var ClosureCommand $this */
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::call(function(){
        $command = app(SoftDeleteOldBookings::class);
        $command->handle();
        echo'Old bookings soft deleted successfully.';
})->daily();