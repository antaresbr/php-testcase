<?php

namespace Antares\Tests\TestCase\Traits;

use Antares\Tests\TestCase\Models\Group;
use Antares\Tests\TestCase\Models\User;
use Antares\Tests\TestCase\Models\UserGroup;

trait AssertRefreshedDatabaseTrait
{
    private function assertRefreshedDatabase()
    {
        $this->assertCount(0, User::all());
        $this->assertCount(0, Group::all());
        $this->assertCount(0, UserGroup::all());
    }
}
