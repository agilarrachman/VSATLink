<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('app:check-midtrans-payment')
    ->everyMinute();
Schedule::command('app:cancel-expired-orders')
    ->everyMinute();
Schedule::command('app:generate-activation-document')
    ->everyMinute();
Schedule::command('app:auto-sign-activation-documents')
    ->everyMinute();
Schedule::command('app:auto-confirm-expedition-order')
    ->everyMinute();
