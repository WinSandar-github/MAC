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

    public function getCheckServicePrivate()
    {
        $service = CurrentCheckService::where('type',1)->get();
        return response()->json([
            'data' => $service
        ],200);
    }

    public function getCheckServiceSelf()
    {
        $service = CurrentCheckService::where('type',2)->get();
        return response()->json([
            'data' => $service
        ],200);
    }
}
