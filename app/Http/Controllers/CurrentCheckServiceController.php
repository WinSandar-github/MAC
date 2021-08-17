<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CurrentCheckService;

class CurrentCheckServiceController extends Controller
{
    public function getCurrentCheckService()
    {
        $service = CurrentCheckService::get();
        return response()->json([
            'data' => $service
        ],200);
    }
}
