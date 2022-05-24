<?php

namespace Tests\Feature;

use Tests\TestCase;

class HelloTest extends TestCase
{
    public function testOk(): void
    {
        $response = $this->get('/hello');

        $response->assertStatus(200);
        $response->assertSeeText('Now: 2022-05-24T00:00:00+00:00');
    }
}
