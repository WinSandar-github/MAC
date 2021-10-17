<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherSchoolReportController extends Controller
{
    public function teacherSchoolLicense(Request $request)
    {
        $data = [
            'title' => 'ကနဦးမှတ်ပုံတင်၊ သက်တမ်းတိုး၊ သက်တမ်းပြတ်တောက်နေသော ကိုယ်ပိုင်ကျောင်းစာရင်း (လုပ်ငန်းအမျိုးအစားအလိုက်)',
            'list' => []
        ];

        return view('reporting.school_teacher.teacher_school_report', compact('data'));
    }

    public function teacherSchoolPrivate(Request $request)
    {
        $data = [
            'title' => 'ကိုယ်ပိုင်သင်တန်းကျောင်းများတွင် သင်ကြားနေသောသင်တန်းဆရာများစာရင်း 
            ( အမျိုးအစားအလိုက် (Private/Individual)၊ ကျောင်းအလိုက်၊ ခုနှစ်အလိုက်၊ ဘာသာရပ်အလိုက်၊ သင်တန်းအမျိုးအစားအလိုက်',
            'list' => []
        ];

        return view('reporting.school_teacher.teacher_school_report', compact('data'));
    }

    public function teacherSchoolLicensePlate(Request $request)
    {
        $data = [
            'title' => 'Teacher / School အလိုက်မှတ်ပုံတင်ကတ်များ (ကနဦး / သက်တမ်းတိုး) ထုတ်ယူနိုင်ရေးဆောင်ရွက်ပေးရန်',
            'list' => []
        ];

        return view('reporting.school_teacher.teacher_school_report', compact('data'));
    }
}
