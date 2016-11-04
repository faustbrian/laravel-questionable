<?php

namespace BrianFaust\Tests\Questionable;

use GrahamCampbell\TestBench\AbstractPackageTestCase;

abstract class AbstractTestCase extends AbstractPackageTestCase
{
    protected function getServiceProviderClass($app)
    {
        return \BrianFaust\Questionable\ServiceProvider::class;
    }
}
