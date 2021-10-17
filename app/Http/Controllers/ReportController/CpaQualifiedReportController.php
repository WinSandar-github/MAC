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
    public function cpaQualifiedList(Request $request)
    {
        $data = [
            'title' => 'လျှောက်ထားသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)',
            'list' => []
        ];

        return view('reporting.qualified_test.qualified_test_report', compact('data'));
    }
    
    public function cpaQualifiedExamEnRol(Request $request)
    {
        $data = [
            'title' => 'ဖြေဆိုခွင့်ရရှိသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)',
            'list' => []
        ];
        
        return view('reporting.qualified_test.qualified_test_report', compact('data'));
    }

    public function cpaQualifiedExamReg(Request $request)
    {
        $data = [
            'title' => 'ဖြေဆိုသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)',
            'list' => []
        ];

        return view('reporting.qualified_test.qualified_test_report', compact('data'));
    }

    public function cpaQualifiedPass(Request $request)
    {
        $data = [
            'title' => 'အောင်မြင်သူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)',
            'list' => []
        ];

        return view('reporting.qualified_test.qualified_test_report', compact('data'));
    }

    public function cpaQualifiedFail(Request $request)
    {
        $data = [
            'title' => 'ကျရှံးသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)',
            'list' => []
        ];

        return view('reporting.qualified_test.qualified_test_report', compact('data'));
    }
    
}
