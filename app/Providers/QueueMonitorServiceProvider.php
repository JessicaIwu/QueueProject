<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobProcessed;
use Illuminate\Queue\Events\JobProcessing;
use App\Events\JobQueued;
use App\Events\JobExecuted;

class QueueMonitorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Queue::before(function (JobProcessing $event) {
            if($event->job->getQueue() != 'monitor'){
                $job = array(
                    'name' => $event->job->resolveName(), 
                    'queue' => $event->job->getQueue(),
                    'connection' => $event->connectionName
                );

                broadcast(new JobQueued($job));
            }
        });

        Queue::after(function (JobProcessed $event) {
            if($event->job->getQueue() != 'monitor'){
                $job = array(
                    'name' => $event->job->resolveName(), 
                    'queue' => $event->job->getQueue(),
                    'connection' => $event->connectionName
                );

                broadcast(new JobExecuted($job));
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
