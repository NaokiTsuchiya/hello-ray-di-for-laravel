<?php

declare(strict_types=1);

namespace App\Domain\Now;

use DateTime;

class Now implements NowInterface
{
    public function __construct()
    {
    }

    public function __toString(): string
    {
        return (new DateTime())->format(DateTime::ATOM);
    }
}
