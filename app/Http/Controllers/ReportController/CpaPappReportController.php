<?php

namespace App\Http\Controllers\ReportController;

use App\Papp;
use App\Batch;
use App\CPAFF;
use App\Module;
use App\Course;
use App\ExamRegister;
use App\ExamDepartment;
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
        $first_yr_str = "CPD {$first_yr}";

        $second_yr = $year - 1;
        $second_yr_str = "CPD {$second_yr}";
        
        $third_yr = $year - 2;
        $third_yr_str = "CPD {$third_yr}";

        $cpa = CPAFF::with('student_info')->get();

        $data = [
            'title' => 'CPA (Full-Fledged) တစ်ဦး၏သက်တမ်းတိုးမည့် ပြက္ခဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း',
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
        $first_yr_str = "CPD {$first_yr}";

        $second_yr = $year - 1;
        $second_yr_str = "CPD {$second_yr}";
        
        $third_yr = $year - 2;
        $third_yr_str = "CPD {$third_yr}";

        $papp = Papp::with('student_info')->get();

        $data = [
            'title' => 'PAPP တစ်ဦး၏သက်တမ်းတိုးမည့် ပြက္ခဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း',
            'fields' => [
                        'စဥ်','CPA (Full-Fledged) Reg No.','PAPP Reg No.',
                        'အမည်',$first_yr_str,$second_yr_str,$third_yr_str,'total hours'
                        ],
            'papp' => $papp,
        ];

        return view('reporting.cpa_ff_papp.papp_report', compact('data'));
    }

    public function cpaFFYearlyRegList(Request $request, $year)
    {
        if($request->date != ""){
            $cpaff = CPAFF::with('student_info')
                            ->where('cpaff_reg_date', 'like', "%$request->date%")
                            ->orWhere('reg_date', 'like', "%$request->date%")
                            ->get();
        }

        $data = [
            'title' => $request->date .' ပြက္ခဒိန်နှစ်အလိုက် CPA (Full-Fledged) မှတ်ပုံတင်သူများစာရင်း',
            'cpaff' => $cpaff,
        ];

        return view('reporting.cpa_ff_papp.cpaff_yearly_register', compact('data'));
    }

    public function cpaPAPPYearlyRegList(Request $request, $year)
    {
        if($request->date != ""){
            $papp = PAPP::with('student_info')
                            ->where('papp_date', 'like', "%$request->date%")
                            ->get();
        }

        $data = [
            'title' => $request->date .' ပြက္ခဒိန်နှစ်အလိုက် PAPP မှတ်ပုံတင်သူများစာရင်း',
            'fields' => [
                        'စဥ်','CPA (Full-Fledged) Reg No.','PAPP Reg No.',
                        'အမည်','nrc number','address','phone','email'
                        ],
            'papp' => $papp,
        ];

        return view('reporting.cpa_ff_papp.papp_yearly_register', compact('data'));
    }
    
}
