<?php

declare(strict_types=1);

namespace App\Ray\Context;

use Doctrine\Common\Cache\CacheProvider;
use Ray\Compiler\AbstractInjectorContext;
use Ray\Di\AbstractModule;

class TestingContext extends AbstractInjectorContext
{
    public function __construct()
    {
        parent::__construct('');
    }

    public function getModule(): AbstractModule
    {
        // TODO: Implement getModule() method.
    }

    public function getCache(): CacheProvider
    {
        // TODO: Implement getCache() method.
    }
}
