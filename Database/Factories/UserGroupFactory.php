<?php

namespace Antares\Tests\TestCase\Database\Factories;

use Antares\Tests\TestCase\Models\Group;
use Antares\Tests\TestCase\Models\User;
use Antares\Tests\TestCase\Models\UserGroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserGroupFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserGroup::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'group_id' => Group::all()->random()->id,
        ];
    }
}
