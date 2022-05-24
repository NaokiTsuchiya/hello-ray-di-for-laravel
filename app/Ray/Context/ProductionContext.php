<?php

declare(strict_types=1);

namespace App\Ray\Context;

use App\Ray\Module\Module;
use Doctrine\Common\Cache\CacheProvider;
use Ray\Compiler\AbstractInjectorContext;
use Ray\Compiler\DiCompileModule;
use Ray\Di\AbstractModule;
use Ray\RayDiForLaravel\LocalCacheProvider;

class ProductionContext extends AbstractInjectorContext
{
    public function __construct(string $tmpDir)
    {
        $dir = str_replace('\\', '_', $this::class);
        parent::__construct($tmpDir . '/storage/ray-di/' . $dir);
    }

    public function getModule(): AbstractModule
    {
        $module = new Module();
        $module->install(new DiCompileModule(true));

        return $module;
    }

    public function getCache(): CacheProvider
    {
        return LocalCacheProvider::create('', $this->tmpDir . '/injector');
    }
}
