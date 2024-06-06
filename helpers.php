<?php

use Antares\Foundation\Arr;
use Antares\Tests\TestCase\AbstractTestCase;

if (!function_exists('ai_testcase_path')) {
    /**
     * Return the path of the resource relative to the package
     *
     * @param string $resource
     * @return string
     */
    function ai_testcase_path($resource = null)
    {
        if (!empty($resource) and substr($resource, 0, 1) != DIRECTORY_SEPARATOR) {
            $resource = DIRECTORY_SEPARATOR . $resource;
        }
        return __DIR__ . ($resource ?? '');
    }
}

if (!function_exists('ai_testcase_infos')) {
    /**
     * TestCase infos array.
     *
     * @param bool $force
     * @return array
     */
    function ai_testcase_infos($force = false)
    {
        $infos = ($force or !function_exists('ai_package_infos'))
            ? [
                "name" => "antaresbr/testcase",
                "version" => [
                    "major" => 9,
                    "release" => 9,
                    "minor" => 9,
                ]
            ]
            : ai_package_infos()
        ;
    }
}
