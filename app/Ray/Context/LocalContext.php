<?php
declare(strict_types=1);

namespace App\Ray\Context;

use App\Ray\Module;
use Doctrine\Common\Cache\CacheProvider;
use Ray\Compiler\AbstractInjectorContext;
use Ray\Di\AbstractModule;
use Ray\Di\NullCache;

class LocalContext extends AbstractInjectorContext
{
    public function __construct()
    {
        parent::__construct('');
    }

    public function getModule(): AbstractModule
    {
        return new Module();
    }

    public function getCache(): CacheProvider
    {
        return new NullCache();
    }
}
