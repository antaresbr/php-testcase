<?php

namespace Antares\Tests\TestCase\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AliveController extends Controller
{
    /**
     * Handle alive request
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function alive(Request $request)
    {
        return response()->json([
            'package' => ai_package_infos(),
            'env' => app()->environmentFile(),
            'serverDateTime' => Carbon::now()->toString(),
        ]);
    }
}
