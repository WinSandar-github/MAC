<?php

namespace App\Http\Controllers\ReportController;

use App\Batch;
use App\Course;
use App\Module;
use App\ExamRegister;
use App\ExamDepartment;
use App\StudentRegister;
use App\StudentCourseReg;
use Illuminate\Http\Request;
use App\ApprenticeAccountant;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ArticleReportController extends Controller
{
    public function articleList(Request $request)
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
            'title' => 'အလုပ်သင်ကြားပေးသူ(PAPP)ထံတွင် အလုပ်သင်ဆင်းနေသူစာရင်း',
            'intern' => $intern
        ];

        return view('reporting.article.article_mentor_intern', compact('data'));
    }
    
    public function articleDailyInOutList(Request $request)
    {
        $leave = DB::table('leave_requests as l')
                    ->join('student_infos as std', 'std.id', '=', 'l.student_info_id')
                    ->where('l.start_date', 'like', "%$request->date%")
                    ->orWhere('l.end_date', 'like', "%$request->date%")
                    ->select('std.name_mm', 'std.cpersonal_no', 'l.*')
                    ->get();

        $data = [
            'title' => 'စာရင်းကိုင်အလုပ်သင်များ၏ ခွင့်ခံစားမှုအခြေအနေ။',
            'leave' => $leave
        ];

        return view('reporting.article.article_leave_report', compact('data'));
    }

    public function articleInternPosList(Request $request)
    {

        $apprentic = ApprenticeAccountant::with('student_info')
                    ->get();

        $data = [
            'title' => 'စာရင်းကိုင်အလုပ်သင်ခန့်အပ်စာရင်း (Batch အလိုက်)',
            'apprentic' => $apprentic
        ];

        return view('reporting.article.article_pos_list', compact('data'));
    }

    public function articleInternshipList(Request $request)
    {

        $apprentic = ApprenticeAccountant::with('student_info')
                    ->whereNotNull('contract_end_date')
                    ->get();

        $data = [
            'title' => 'အလုပ်သင်ဆင်းသူများစာရင်း (Batch အလိုက်)',
            'apprentic' => $apprentic
        ];

        return view('reporting.article.article_job_accept', compact('data'));
    }
    
}
