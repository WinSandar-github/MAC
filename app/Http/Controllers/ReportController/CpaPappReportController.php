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

        //initial
        $fmonth_initial = 1;
        $tmonth_initial = 12;
        $fday_initial = 1;
        $tday_initial = 31; 
        $fdate_initial = strftime("%F", strtotime($year."-".$fmonth_initial."-".$fday_initial));
        $tdate_initial = strftime("%F", strtotime($year."-".$tmonth_initial."-".$tday_initial));
        //end initial

        //renewal
        $y = $year -1;
        $fmonth_renewal = 1;//
        $tmonth_renewal = 12;
        $fday_renewal = 11;//
        $tday_renewal = 31; //
        $fdate_renewal = strftime("%F", strtotime($y."-".$fmonth_renewal."-".$fday_renewal));
        $tdate_renewal = strftime("%F", strtotime($year."-".$tmonth_renewal."-".$tday_renewal));
        //end renewal
        
        // $initial = CPAFF::with('student_info')->whereBetween('reg_date', [$fdate_initial, $tdate_initial])->get();
        // // return $initial;
        // $renewal = CPAFF::with('student_info')->whereBetween('reg_date', [$fdate_renewal, $tdate_renewal])->get();
        // return $renewal;
        // $merged = $renewal->merge($initial);
        // $cpa = $merged->toarray();
        $merged = CPAFF::with('student_info')->whereBetween('reg_date', [$fdate_initial, $tdate_initial])
                                             ->whereBetween('reg_date', [$fdate_renewal, $tdate_renewal])
                                             ->get()->groupBy('student_info_id');
        // return $merged;
        $data = [
            'title' => 'CPA (Full-Fledged) တစ်ဦး၏သက်တမ်းတိုးမည့် ပြက္ခဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း',
            'fields' => [
                        'စဥ်','CPA(Full-Fledged) Reg No',
                        'အမည်', $first_yr_str,$second_yr_str,$third_yr_str,'total hours'
                    ],
            'cpa' => $merged
        ];
        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data','year'));
    }
    
    public function cpaPAYealyList(Request $request ,$year)
    {
        $first_yr = $year;
        $first_yr_str = "CPD {$first_yr}";

        $second_yr = $year - 1;
        $second_yr_str = "CPD {$second_yr}";
        
        $third_yr = $year - 2;
        $third_yr_str = "CPD {$third_yr}";

        //initial
        $fmonth_initial = 1;
        $tmonth_initial = 12;
        $fday_initial = 1;
        $tday_initial = 31; 
        $fdate_initial = strftime("%F", strtotime($year."-".$fmonth_initial."-".$fday_initial));
        $tdate_initial = strftime("%F", strtotime($year."-".$tmonth_initial."-".$tday_initial));
        //end initial

        //renewal
        $y = $year -1;
        $fmonth_renewal = 1;//
        $tmonth_renewal = 12;
        $fday_renewal = 11;//
        $tday_renewal = 31; //
        $fdate_renewal = strftime("%F", strtotime($y."-".$fmonth_renewal."-".$fday_renewal));
        $tdate_renewal = strftime("%F", strtotime($year."-".$tmonth_renewal."-".$tday_renewal));
        //end renewal
        
        // $initial = Papp::with('student_info')->whereBetween('reg_date', [$fdate_initial, $tdate_initial])->get();
        // // return $initial;
        // $renewal = Papp::with('student_info')->whereBetween('reg_date', [$fdate_renewal, $tdate_renewal])->get();
        // return $renewal;
        // $merged = $renewal->merge($initial);
        // $cpa = $merged->toarray();
        $papp = Papp::with('student_info')->whereBetween('reg_date', [$fdate_initial, $tdate_initial])
                                             ->whereBetween('reg_date', [$fdate_renewal, $tdate_renewal])
                                             ->get()->groupBy('student_id');

        // $papp = Papp::with('student_info')->get();

        $data = [
            'title' => 'PAPP တစ်ဦး၏သက်တမ်းတိုးမည့် ပြက္ခဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း',
            'fields' => [
                        'စဥ်','CPA (Full-Fledged) Reg No.','PAPP Reg No.',
                        'အမည်',$first_yr_str,$second_yr_str,$third_yr_str,'total hours'
                        ],
            'papp' => $papp,
        ];

        return view('reporting.cpa_ff_papp.papp_report', compact('data','year'));
    }

    public function cpaFFYearlyRegList(Request $request, $year)
    {
        if($request->date != ""){
            $cpaff = CPAFF::with('student_info')
                            // ->where('cpaff_reg_date', 'like', "%$request->date%")
                            ->where('reg_date', 'like', "%$request->date%")
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
                            ->where('reg_date', 'like', "%$request->date%")
                            ->get();
            // return $papp;
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
