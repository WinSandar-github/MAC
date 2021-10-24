<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mentor;
use App\ApprenticeAccountant;
use Illuminate\Support\Facades\DB;

class ArticleMentorReportController extends Controller
{
    public function articleMentorRegisteredIntern(Request $request)
    {
        $mentor = Mentor::get();

        $data = [
            'title' => 'မှတ်ပုံတင်ထားသော အလုပ်သင်ကြားပေးသူစာရင်း (လုပ်ငန်းအမျိုးအစားအလိုက် / status အလိုက်)',
            'mentor' => $mentor,
        ];

        return view('reporting.article.article_mentor_report', compact('data'));
    }

    public function articleMentorIntern(Request $request)
    {
        $intern = DB::table('apprentice_accountants as aa')
                    ->Join('mentors as m', 'm.papp_reg_no', 'aa.request_papp')
                    ->join('student_infos as std', 'std.id', 'aa.student_info_id')
                    ->join('student_course_regs as course', 'course.student_info_id', 'std.id')
                    ->join('batches as b', 'b.id', 'course.batch_id')
                    ->join('courses as c', 'c.id', 'b.course_id')
                    ->where('c.code', '=', 'cpa_1')
                    ->orWhere('c.code', '=', 'cpa_2')
                    ->select(
                        'aa.contract_start_date as intern_sdate', 'aa.contract_end_date as intern_edate', 'm.name_mm as mentor_name', 
                        'std.name_mm as std_name', 'std.cpersonal_no', 'course.*'
                        )
                    ->get();

        $data = [
            'title' => 'အလုပ်သင်ကြားပေးနေသူထံတွင် အလုပ်သင်ဆင်းနေသူစာရင်း (ကျောင်းသား status အလိုက်)',
            'intern' => $intern
        ];

        return view('reporting.article.article_mentor_intern', compact('data'));
    }
}
