<?php

declare(strict_types=1);

namespace Tests\Feature;
use App\Domain\Double\DoubleInterface;
use Ray\Di\AbstractModule;
use Ray\RayDiForLaravel\Testing\OverrideModule;
use Tests\Fake\FakeDouble;
use Tests\TestCase;

final class HelloTest extends TestCase
{
    use OverrideModule;

    public function testStatusOk(): void
    {
        $res = $this->get('/hello');

        $res->assertOk();
        $res->assertSeeText('Hello 1 * 2 = 2.');
    }

    public function testOverrideDouble(): void
    {
        $overrideModule = new class extends AbstractModule {
            protected function configure()
            {
                $this->bind(DoubleInterface::class)->to(FakeDouble::class);
            }
        };
        $this->overrideModule($overrideModule);

        $res = $this->get('/hello');

        $res->assertOk();
        $res->assertSeeText('Hello 1 * 2 = 1.');
    }

    public function testProductionContext(): void
    {
        putenv('APP_ENV=production');
        $this->app = $this->createApplication();
        $res = $this->get('/hello');
        $res->assertOk();
        $res->assertSeeText('Hello 1 * 2 = 2.');
        putenv('APP_ENV=testing');
    }
}
