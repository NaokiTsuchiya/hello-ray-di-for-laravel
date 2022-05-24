<?php

declare(strict_types=1);

namespace App\Domain\Now;

class FakeNow implements NowInterface
{
    public function __toString(): string
    {
        return '2022-05-24T00:00:00+00:00';
    }
}
