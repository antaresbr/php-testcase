<?php

namespace Antares\Tests\TestCase\Traits;

use Antares\Tests\TestCase\Models\Group;
use Antares\Tests\TestCase\Models\User;
use Antares\Tests\TestCase\Models\UserGroup;

trait SeedDatabaseTrait
{
    protected $defaultUserCount = 30;
    protected $defaultGroupCount = 5;
    protected $defaultUserGroupCount = 10;

    public $userModelClass;
    public $groupModelClass;
    public $userGroupModelClass;

    protected function getUserModelClass() {
        if (is_null($this->userModelClass)) {
            $this->userModelClass = User::class;
        }
        return $this->userModelClass;
    }

    protected function getGroupModelClass() {
        if (is_null($this->groupModelClass)) {
            $this->groupModelClass = Group::class;
        }
        return $this->groupModelClass;
    }

    protected function getUserGroupModelClass() {
        if (is_null($this->userGroupModelClass)) {
            $this->userGroupModelClass = UserGroup::class;
        }
        return $this->userGroupModelClass;
    }

    protected function seedUsers(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultUserCount; 
        return $this->getUserModelClass()::factory()->count($amount)->create();
    }

    protected function seedAndTestUsers(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultUserCount; 
        $data = $this->seedUsers($amount);
        $this->assertInstanceOf($this->getUserModelClass(), $data[rand(1, $amount) - 1]);
        $this->assertCount($amount, $this->getUserModelClass()::all());
        return $data;
    }

    protected function seedGroups(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultGroupCount; 
        return $this->getGroupModelClass()::factory()->count($amount)->create();
    }

    protected function seedAndTestGroups(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultGroupCount; 
        $data = $this->seedGroups($amount);
        $this->assertInstanceOf($this->getGroupModelClass(), $data[rand(1, $amount) - 1]);
        $this->assertCount($amount, $this->getGroupModelClass()::all());
        return $data;
    }

    protected function seedUserGroups(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultUserGroupCount; 
        return $this->getUserGroupModelClass()::factory()->count($amount)->create();
    }

    protected function seedAndTestUserGroups(?int $amount = null)
    {
        !is_null($amount) or $amount = $this->defaultUserGroupCount; 
        $data = $this->seedUserGroups($amount);
        $this->assertInstanceOf($this->getUserGroupModelClass(), $data[rand(1, $amount) - 1]);
        $this->assertCount($amount, $this->getUserGroupModelClass()::all());
        return $data;
    }

    protected function seedDatabase(
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
