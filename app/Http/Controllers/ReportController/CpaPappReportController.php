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
    public function cpaPappYearlyList(Request $request)
    {
        $data = [
            'title' => 'CPA (FF)/ PA တစ်ဦး၏ သက်တမ်းတိုးမည့် ပြက္ဒဒိန်နှစ်အပါအ၀င် ကပ်လျက်ရှိသော ၂နှစ်၏ CPD နာရီမှတ်တမ်း',
            'list' => []
        ];

        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }
    
    public function cpaPappYearlyRegList(Request $request)
    {
        $data = [
            'title' => 'ပြက္ဒဒိန်နှစ် အလိုက် မှတ်ပုံတင်လုပ်ငန်းများစာရင်း',
            'list' => []
        ];

        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }

    public function cpaPappTakeOutRegList(Request $request)
    {
        $data = [
            'title' => 'မှတ်ပုံတင်ကတ်ပြားများကို စနစ်ဖြင့် ထုတ်ယူခြင်း',
            'list' => []
        ];

        return view('reporting.cpa_ff_papp.cpa_ff_papp_report', compact('data'));
    }
    
}
