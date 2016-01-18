<?php

namespace DraperStudio\Questionable;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'questionable';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations();
    }
}
