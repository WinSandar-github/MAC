<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SchoolRegister;
use App\TeacherRegister;

class TeacherSchoolReportController extends Controller
{
    public function teacherSchoolLicense(Request $request, $type)
    {
        if($request->date != '' && $type != ''){

            switch ($type){
                case 'all':
                    $title = 'ကနဦးမှတ်ပုံတင်၊ သက်တမ်းတိုး၊ သက်တမ်းပြတ်တောက်နေသော ကိုယ်ပိုင်ကျောင်းစာရင်း (လုပ်ငန်းအမျိုးအစားအလိုက်)';
                    $school = SchoolRegister::whereYear('reg_date', '=', $request->date)->get();
                    break;
                case 'init':
                    $title = 'ကနဦးမှတ်ပုံတင်ထားသော ကိုယ်ပိုင်ကျောင်းစာရင်း';
                    $school = SchoolRegister::whereYear('reg_date', '=', $request->date)->where('approve_reject_status', '=', '1')->get();
                break;
                case 'renew':
                    $title = 'သက်တမ်းတိုးထားသော ကိုယ်ပိုင်ကျောင်းစာရင်း';
                    $school = SchoolRegister::whereYear('renew_date', '=', $request->date)->where('approve_reject_status', '=', '1')->get();
                    break;
                case 'reconnect':
                    $title = 'သက်တမ်းပြတ်တောက်နေသော ကိုယ်ပိုင်ကျောင်းစာရင်း';
                    $school = SchoolRegister::whereNotNull('request_for_temporary_stop')->where('approve_reject_status', '=', '1')->get();
                break;
            }

        }

        $data = [
            'title' => $title,
            'school' => $school
        ];

        return view('reporting.school_teacher.teacher_school_report', compact('data'));
    }

    public function teacherSchoolPrivate(Request $request)
    {
        return $teacher = TeacherRegister::with('school')->get();



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
