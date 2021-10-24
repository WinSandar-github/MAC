<?php

namespace App\Http\Controllers\ReportController;

use App\Course;
use App\Batch;
use App\CPAFF;
use App\ExamDepartment;
use App\Module;
use App\ExamRegister;
use App\StudentRegister;
use App\StudentCourseReg;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class CpaPappReportController extends Controller
{
    public function cpaFFYealyList(Request $request, $year)
    {
        $first_yr = $year;
        $first_yr_str = "CPA {$first_yr}";

        $second_yr = $year - 1;
        $second_yr_str = "CPA {$second_yr}";
        
        $third_yr = $year - 2;
        $third_yr_str = "CPA {$third_yr}";

        $cpa = CPAFF::with('student_info')->get();

        $data = [
            'title' => 'CPA (FF)တစ်ဦး၏သက်တမ်းတိုးမည့် ပြက္ဒဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း',
            'fields' => [
                        'စဥ်','CPA FF Reg No',
                        'အမည်', $first_yr_str,$second_yr_str,$third_yr_str,'total hours'
                    ],
            'cpa' => $cpa
        ];
        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }
    
    public function cpaPAYealyList(Request $request ,$year)
    {
        $first_yr = $year;
        $first_yr_str = "cpa {$first_yr}";

        $second_yr = $year - 1;
        $second_yr_str = "cpa {$second_yr}";
        
        $third_yr = $year - 2;
        $third_yr_str = "cpa {$third_yr}";

        $data = [
            'title' => 'CPA (FF)/ PA တစ်ဦး၏သက်တမ်းတိုးမည့် ပြက္ဒဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း',
            'fields' => [
                        'စဥ်','cpa ff / papp reg_no',
                        'အမည်',$first_yr_str,$second_yr_str,$third_yr_str,
                        'calender year','total hours'
                        ],
            'list' => []
        ];

        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }

    public function cpaFFYearlyRegList(Request $request, $year)
    {
        $data = [
            'title' => 'ပြက္ဒဒိန်နှစ်အလိုက် ( CPA FF) မှတ်ပုံတင်သူများစာရင်း',
            'fields' => [
                        'စဥ်','cpa ff / papp reg_no',
                        'အမည်','nrc number','address','phone','email'
                        ],
            'list' => []
        ];

        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }

    public function cpaPAPPYearlyRegList(Request $request, $year)
    {
        $data = [
            'title' => 'ပြက္ဒဒိန်နှစ်အလိုက် ( PAPP ) မှတ်ပုံတင်သူများစာရင်း',
            'fields' => [
                        'စဥ်','cpa ff / papp reg_no',
                        'အမည်','nrc number','address','phone','email'
                        ],
            'list' => []
        ];

        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }
    
}
