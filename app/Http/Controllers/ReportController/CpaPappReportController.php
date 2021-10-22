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

class CpaPappReportController extends Controller
{
    public function cpaFFYealyList(Request $request)
    {
        $data = [
            'title' => 'CPA (FF)တစ်ဦး၏သက်တမ်းတိုးမည့် ပြက္ဒဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း',
            'fields' => ['စဥ်','cpa ff','အမည်','calender year','total hours'],
            'list' => []
        ];

        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }
    
    public function cpaPAYealyList(Request $request)
    {
        $data = [
            'title' => 'CPA (FF)/ PA တစ်ဦး၏သက်တမ်းတိုးမည့် ပြက္ဒဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း',
            'fields' => ['စဥ်','cpa ff / papp reg_no','အမည်','calender year','total hours'],
            'list' => []
        ];

        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }

    public function cpaFFYearlyRegList(Request $request)
    {
        $data = [
            'title' => 'ပြက္ဒဒိန်နှစ်အလိုက် ( CPA FF) မှတ်ပုံတင်သူများစာရင်း',
            'fields' => ['စဥ်','cpa ff / papp reg_no','အမည်','nrc number','address','phone','email'],
            'list' => []
        ];

        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }

    public function cpaPAPPYearlyRegList(Request $request)
    {
        $data = [
            'title' => 'ပြက္ဒဒိန်နှစ်အလိုက် ( PAPP ) မှတ်ပုံတင်သူများစာရင်း',
            'fields' => ['စဥ်','cpa ff','အမည်','calender year','total hours'],
            'list' => []
        ];

        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }
    
}
