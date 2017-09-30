<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use App\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::before(function (JobProcessing $event) {
            $log = new Log();
            $log->connection_name = $event->connectionName;
            $log->job = 'SendEmail';
            $log->payload = 'empty(var)';
            $log->satus = 'before';
            $log->save();
        });

        Queue::after(function (JobProcessed $event) {
        $log = new Log();
            $log->connection_name = $event->connectionName;
            $log->job = 'SendEmail';
            $log->payload ='empty';
            $log->satus = 'after';
            $log->save();
        });
    }


    public function register()
    {
        //
    }
}
