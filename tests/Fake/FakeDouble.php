<?php

declare(strict_types=1);

namespace Tests\Fake;

use App\Domain\Double\DoubleInterface;

class FakeDouble implements DoubleInterface
{

    public function double(int $x): int
    {
        return $x;
    }
}
