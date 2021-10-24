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
use App\QualifiedTest;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CpaQualifiedReportController extends Controller
{
    public function cpaQualifiedList(Request $request)
    {
         
        $student = QualifiedTest::with('student_info')->where('approve_reject_status',0)->get();

        $data = [
            'title' => 'လျှောက်ထားသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)',
            'student' => $student
        ];
     
        return view('reporting.qualified_test.qualified_test_report', compact('data'));
    }
    
    public function cpaQualifiedExamEnRol(Request $request)
    {
        $student = QualifiedTest::with('student_info')
                    ->where('approve_reject_status', '=', 1)
                    ->get();

        $data = [
            'title' => 'ဖြေဆိုခွင့်ရရှိသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)',
            'student' => $student
        ];
        
        return view('reporting.qualified_test.qualified_test_report', compact('data'));
    }

    public function cpaQualifiedExamReg(Request $request)
    {
        $student = QualifiedTest::with('student_info')
                    ->where('approve_reject_status', '=', 1)
                    ->get();

        $data = [
            'title' => 'ဖြေဆိုခွင့်ရရှိသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)',
            'student' => $student
        ];

        return view('reporting.qualified_test.qualified_test_report', compact('data'));
    }

    public function cpaQualifiedPass(Request $request)
    {
        $student = QualifiedTest::with('student_info')
                    ->where('approve_reject_status', '=', 1)
                    ->get();

        $data = [
            'title' => 'ဖြေဆိုခွင့်ရရှိသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)',
            'student' => $student
        ];

        return view('reporting.qualified_test.qualified_test_report', compact('data'));
    }

    public function cpaQualifiedFail(Request $request)
    {
        $student = QualifiedTest::with('student_info')
                    ->where('approve_reject_status', '=', 1)
                    ->get();

        $data = [
            'title' => 'ဖြေဆိုခွင့်ရရှိသူများစာရင်း (စာမေးပွဲကျင်းပသည့် ခုနှစ်နှင့်လအလိုက်)',
            'student' => $student
        ];

        return view('reporting.qualified_test.qualified_test_report', compact('data'));
    }
    
}
