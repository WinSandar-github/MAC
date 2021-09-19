<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function attendAppList()
    {
        return view('reporting.application_list');
    }
}    
