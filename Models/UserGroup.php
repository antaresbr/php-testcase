<?php

namespace Antares\Tests\TestCase\Models;

use Antares\Tests\TestCase\Database\Factories\UserGroupFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return UserGroupFactory::new();
    }

    protected $guarded = [];
}
