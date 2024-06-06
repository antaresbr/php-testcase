<?php

namespace Antares\Tests\TestCase;

use Antares\Foundation\Arr;
use Antares\Tests\TestCase\Providers\TestCaseServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class AbstractTestCase extends OrchestraTestCase
{
    /**
     * Get package providers.
     *
     * @param  \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        $providers = array_merge(parent::getPackageProviders($app) ?? [], [
            TestCaseServiceProvider::class,
        ]);
        return array_unique($providers);
    }

    /**
     * Log text
     *
     * @param string $text
     * @param string $title
     * @return void
     */
    protected function logText($text, $title = '')
    {
        if (strlen($title) > 0) {
            echo PHP_EOL . "--[ {$title} ]--" . PHP_EOL;
        }
        echo "{$text}" . PHP_EOL;
    }

    /**
     * Log object
     *
     * @param object $obj
     * @param string $title
     * @return void
     */
    protected function logObject($obj, $title = '')
    {
        !empty($title) or $title = get_class($obj);
        echo PHP_EOL . "--[ {$title} ]--" . PHP_EOL;
        echo print_r($obj, true) . PHP_EOL;
    }
}
