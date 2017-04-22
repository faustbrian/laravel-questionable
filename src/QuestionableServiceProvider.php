<?php



declare(strict_types=1);

namespace BrianFaust\Questionable;

use BrianFaust\ServiceProvider\ServiceProvider;

class QuestionableServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishMigrations();
    }

    public function getPackageName(): string
    {
        return 'questionable';
    }
}
