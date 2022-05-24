<?php

declare(strict_types=1);

namespace App\Ray\Context;

use App\Ray\Module\Module;
use App\Ray\Module\TestModule;
use Doctrine\Common\Cache\CacheProvider;
use Ray\Compiler\AbstractInjectorContext;
use Ray\Di\AbstractModule;
use Ray\Di\NullCache;

class TestingContext extends AbstractInjectorContext
{
    public function __construct()
    {
        parent::__construct('');
    }

    public function getModule(): AbstractModule
    {
        $module = new Module();
        $module->override(new TestModule());

        return $module;
    }

    public function getCache(): CacheProvider
    {
        return new NullCache();
    }
}
