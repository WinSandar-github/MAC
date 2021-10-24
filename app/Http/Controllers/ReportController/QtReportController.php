<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QtReportController extends Controller
{
    public function currentQualifiedTestList()  
    {
         
        return view('reporting.current_qualifiedtest_list');
    }
}
