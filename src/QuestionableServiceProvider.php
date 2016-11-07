<?php

namespace BrianFaust\Questionable;

use BrianFaust\ServiceProvider\ServiceProvider;

class QuestionableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishMigrations();
    }

    public function getPackageName()
    {
        return 'questionable';
    }
}
