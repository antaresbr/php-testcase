<?php

namespace Antares\Tests\TestCase\Traits;

use Antares\Tests\TestCase\Models\Group;
use Antares\Tests\TestCase\Models\User;
use Antares\Tests\TestCase\Models\UserGroup;

trait SeedDatabaseTrait
{
    private $defaultUserCount = 30;
    private $defaultGroupCount = 5;
    private $defaultUserGroupCount = 10;

    private function seedUsers(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultUserCount; 
        return User::factory()->count($amount)->create();
    }

    private function seedAndTestUsers(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultUserCount; 
        $data = $this->seedUsers($amount);
        $this->assertInstanceOf(User::class, $data[rand(1, $amount) - 1]);
        $this->assertCount($amount, User::all());
        return $data;
    }

    private function seedGroups(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultGroupCount; 
        return Group::factory()->count($amount)->create();
    }

    private function seedAndTestGroups(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultGroupCount; 
        $data = $this->seedGroups($amount);
        $this->assertInstanceOf(Group::class, $data[rand(1, $amount) - 1]);
        $this->assertCount($amount, Group::all());
        return $data;
    }

    private function seedUserGroups(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultUserGroupCount; 
        return UserGroup::factory()->count($amount)->create();
    }

    private function seedAndTestUserGroups(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultUserGroupCount; 
        $data = $this->seedUserGroups($amount);
        $this->assertInstanceOf(UserGroup::class, $data[rand(1, $amount) - 1]);
        $this->assertCount($amount, UserGroup::all());
        return $data;
    }

    private function seedDatabase(
        int $users = 30,
        int $groups = 5,
        int $userGroups = 10,
    ): array {
        $data = [];

        $data['users'] = $this->seedUsers($users);
        $data['groups'] = $this->seedGroups($groups);
        $data['userGroups'] = $this->seedUserGroups($userGroups);
        
        return $data;
    }
}
