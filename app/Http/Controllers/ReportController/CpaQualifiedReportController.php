<?php

namespace App\Http\Controllers\ReportController;

use App\Course;
use App\Batch;
use App\ExamDepartment;
use App\Module;


use App\ExamRegister;
use App\Http\Controllers\Controller;
use App\StudentRegister;
use App\StudentCourseReg;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CpaQualifiedReportController extends Controller
{
    public function cpa_qualified_enrol(Request $request)
    {
        return view('reporting.qualified_test.qualified_test_report');
    }
    
    public function cpa_qualified_exam_enrol(Request $request)
    {
        return view('reporting.qualified_test.qualified_test_report');
    }

    public function cpa_qualified_exam_reg(Request $request)
    {
        return view('reporting.qualified_test.qualified_test_report');
    }

    public function cpa_qualified_pass(Request $request)
    {
        return view('reporting.qualified_test.qualified_test_report');
    }

    public function cpa_qualified_fail(Request $request)
    {
        return view('reporting.qualified_test.qualified_test_report');
    }
    
}
