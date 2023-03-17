<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Ray\RayDiForLaravel\Application;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /** @var Application */
    protected $app;
}
