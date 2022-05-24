<?php

declare(strict_types=1);

namespace App\Ray\Module;

use App\Attribute\Loggable;
use App\Domain\Double\Dobule;
use App\Domain\Double\DoubleInterface;
use App\Domain\Now\Now;
use App\Domain\Now\NowInterface;
use App\Interceptor\LoggerInterceptor;
use App\Ray\DatabaseManagerProvider;
use Illuminate\Database\DatabaseManager;
use Ray\Di\AbstractModule;

final class Module extends AbstractModule
{
    protected function configure(): void
    {
        $this->bind(DoubleInterface::class)->to(Dobule::class);
        $this->bind(NowInterface::class)->to(Now::class);
        $this->bindInterceptor(
            $this->matcher->any(),
            $this->matcher->annotatedWith(Loggable::class),
            [LoggerInterceptor::class]
        );

        $this->bind(DatabaseManager::class)->toProvider(DatabaseManagerProvider::class);
    }
}
