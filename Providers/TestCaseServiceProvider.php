<?php

namespace Antares\Tests\TestCase\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

use function Orchestra\Testbench\laravel_migration_path;

class TestCaseServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFile(ai_testcase_path('config/testcase.php'), 'testcase');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrations();
        $this->loadRoutes();
    }

    protected function mergeConfigFile($file, $name)
    {
        if (is_file($file) and !Config::has($name)) {
            $this->mergeConfigFrom($file, $name);
        }
    }

    protected function loadMigrations()
    {
        $this->loadMigrationsFrom([
            laravel_migration_path(),
            ai_testcase_path('Database/migrations'),
        ]);
    }

    protected function loadRoutes()
    {
        $attributes = [
            'prefix' => config('testcase.route.prefix.api'),
            'namespace' => 'Antares\Tests\TestCase\Http\Controllers',
        ];
        Route::group($attributes, function () {
            $this->loadRoutesFrom(ai_testcase_path('routes/api.php'));
        });
    }
}
