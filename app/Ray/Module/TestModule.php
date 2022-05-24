<?php

declare(strict_types=1);

namespace App\Ray\Module;

use App\Domain\Now\FakeNow;
use App\Domain\Now\NowInterface;
use Ray\Di\AbstractModule;

class TestModule extends AbstractModule
{
    protected function configure()
    {
        $this->bind(NowInterface::class)->to(FakeNow::class);
    }
}
