<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SchoolRegister;
use App\TeacherRegister;
use App\Subject;

class TeacherSchoolReportController extends Controller
{
    public function teacherSchoolLicense(Request $request, $type)
    {
        if($request->date != '' && $type != ''){

            switch ($type){
                case 'all':
                    $title = 'ကနဦးမှတ်ပုံတင်၊ သက်တမ်းတိုး၊ သက်တမ်းပြတ်တောက်နေသော ကိုယ်ပိုင်ကျောင်းစာရင်း (လုပ်ငန်းအမျိုးအစားအလိုက်)';
                    $school = SchoolRegister::whereYear('reg_date', '=', $request->date)
                              ->where('offline_user', '=', null)
                              ->get();
                    break;
                case 'init':
                    $title = 'ကနဦးမှတ်ပုံတင်ထားသော ကိုယ်ပိုင်ကျောင်းစာရင်း';
                    $school = SchoolRegister::whereYear('reg_date', '=', $request->date)->where('approve_reject_status', '=', '1')
                              ->where('offline_user', '=', null)
                              ->get();
                break;
                case 'renew':
                    $title = 'သက်တမ်းတိုးထားသော ကိုယ်ပိုင်ကျောင်းစာရင်း';
                    $school = SchoolRegister::whereYear('renew_date', '=', $request->date)->where('approve_reject_status', '=', '1')
                              ->where('offline_user', '=', null)
                              ->get();
                    break;
                case 'reconnect':
                    $title = 'သက်တမ်းပြတ်တောက်နေသော ကိုယ်ပိုင်ကျောင်းစာရင်း';
                    $school = SchoolRegister::whereNotNull('request_for_temporary_stop')->where('approve_reject_status', '=', '1')
                              ->where('offline_user', '=', null)
                              ->get();
                break;
                
            }

        }

        $data = [
            'title' => $title,
            'school' => $school
        ];

        return view('reporting.school_teacher.teacher_school_report', compact('data'));
    }

    public function teacherSchoolPrivate(Request $request, $type)
    {
        // 1 = private , 0 = individual
       // $teacher = TeacherRegister::with('school')->where('from_valid_date', 'like', "%$request->date%")->get();
      
        if($request->date != '' && $type != ''){

            switch ($type){
                case 'all':
                    $title = 'ကနဦးမှတ်ပုံတင်၊ သက်တမ်းတိုး၊ သက်တမ်းပြတ်၊ရပ်နားနေသော သင်တန်းဆရာများစာရင်း၊ private and individual';
                    $teacher =TeacherRegister::whereYear('reg_date', '=', $request->date)->with('school')
                              ->where('offline_user', '=', null)
                              ->get();
                    break;
                case 'init':
                    $title = 'ကနဦးမှတ်ပုံတင်ထားသော သင်တန်းဆရာများစာရင်း';
                    $teacher = TeacherRegister::whereYear('reg_date', '=', $request->date)->where('approve_reject_status', '=', '1')->where('initial_status', '=', '0')
                               ->where('offline_user', '=', null)
                               ->get();
                break;
                case 'renew':
                    $title = 'သက်တမ်းတိုးထားသော သင်တန်းဆရာများစာရင်း';
                    $teacher = TeacherRegister::whereYear('reg_date', '=', $request->date)->where('approve_reject_status', '=', '1')->where('initial_status', '=', '1')
                               ->where('offline_user', '=', null)
                               ->get();
                    break;
                case 'cessation':
                    $title = 'ရပ်နားသင်တန်းဆရာများစာရင်း';
                    $teacher = TeacherRegister::where('approve_reject_status', '=', '1')->where('initial_status', '=', '2')
                               ->where('offline_user', '=', null)
                               ->get();
                break;
                
            }

        }
        $teacher = $teacher->map(function($item){
            $subj_id = explode(',', $item->certificates);
            $subject = Subject::whereIn('id', $subj_id)->get(['subject_name']);
            $item->subject = $subject;
            return $item;
        });
        $data = [
            'title' => $title,
            'teacher' => $teacher,
        ];

        return view('reporting.school_teacher.teacher_report', compact('data'));
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
