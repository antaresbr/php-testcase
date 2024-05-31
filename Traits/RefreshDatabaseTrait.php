<?php

namespace Antares\Tests\TestCase\Traits;

use Illuminate\Foundation\Testing\RefreshDatabase;

trait RefreshDatabaseTrait
{
    use AssertRefreshedDatabaseTrait;
    use RefreshDatabase;
    use SeedDatabaseTrait;
}
