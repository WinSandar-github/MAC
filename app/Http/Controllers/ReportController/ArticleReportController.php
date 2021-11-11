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
        // $intern = DB::table('apprentice_accountants as aa')
        //             ->Join('mentors as m', 'm.papp_reg_no', 'aa.request_papp')
        //             ->join('student_infos as std', 'std.id', 'aa.student_info_id')
        //             ->join('student_course_regs as course', 'course.student_info_id', 'std.id')
        //             ->join('education_histroys as education', 'education.student_info_id', 'std.id')
        //             ->join('current_check_services as service', 'service.id', 'm.current_check_service_id')
        //             ->join('batches as b', 'b.id', 'course.batch_id')
        //             ->join('courses as c', 'c.id', 'b.course_id')
        //             ->where('c.code', '=', 'cpa_1')
        //             ->orWhere('c.code', '=', 'cpa_2')
        //             ->select(
        //                 'aa.contract_start_date as intern_sdate', 'aa.contract_end_date as intern_edate', 'm.name_mm as mentor_name', 
        //                 'std.name_mm as std_name', 'std.cpersonal_no', 'std.phone', 'std.email',
        //                 'std.nrc_state_region','std.nrc_township','std.nrc_citizen','std.nrc_number',
        //                 'std.father_name_mm','education.degree_name','c.name as current_class', 'service.name as current_check_service_name',
        //                 'course.*','aa.*'
        //                 )
        //             ->get();
                   
        $intern = ApprenticeAccountant::with('student_info','mentor')->get();

        $data = [
            'title' => 'အလုပ်သင်ကြားပေးသူ(PAPP)ထံတွင် အလုပ်သင်ဆင်းနေသူစာရင်း',
            'intern' => $intern
        ];
        //return $data;
        return view('reporting.article.article_mentor_intern', compact('data'));
    }
    
    public function articleDailyInOutListFirm(Request $request)
    {
        $leave = DB::table('leave_requests as l')
                    ->join('student_infos as std', 'std.id', '=', 'l.student_info_id')
                    ->join('apprentice_accountants as aa', 'std.id', '=', 'aa.student_info_id')
                    ->join('mentors as m', 'aa.mentor_id', '=', 'm.id')
                    ->where('l.form_type', '<>' , 'gov' )
                    ->where('l.start_date', 'like', "%$request->date%")
                    //->orWhere('l.end_date', 'like', "%$request->date%")
                    ->select('std.name_mm', 'std.cpersonal_no', 'std.phone', 'std.email','m.name_mm as mentor_name','l.*')
                    ->get();

        $data = [
            'title' => 'Firm စာရင်းကိုင်အလုပ်သင်များ၏ ခွင့်ခံစားမှုအခြေအနေ',
            'leave' => $leave
        ];

        return view('reporting.article.article_leave_report_firm', compact('data'));
    }

    public function articleDailyInOutListGov(Request $request)
    {
        $leave = DB::table('leave_requests as l')
                    ->join('student_infos as std', 'std.id', '=', 'l.student_info_id')
                    ->where('l.form_type', '=', 'gov' )
                    ->where('l.start_date', 'like', "%$request->date%")
                    //->orWhere('l.end_date', 'like', "%$request->date%")
                    ->select('std.name_mm', 'std.cpersonal_no', 'std.phone', 'std.email','l.*')
                    ->get();

        $data = [
            'title' => 'အစိုးရစာရင်းကိုင်အလုပ်သင်များ၏ ခွင့်ခံစားမှုအခြေအနေ',
            'leave' => $leave
        ];

        return view('reporting.article.article_leave_report_gov', compact('data'));
    }

    public function articleInternPosList(Request $request)
    {

        $apprentic = ApprenticeAccountant::with('student_info')
                    ->get();

        $data = [
            'title' => 'အစိုးရစာရင်းကိုင်အလုပ်သင်ခန့်အပ်စာရင်း (Batch အလိုက်)',
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
            'title' => 'အစိုးရအလုပ်သင်ဆင်းသူများစာရင်း (Batch အလိုက်)',
            'apprentic' => $apprentic
        ];
       
        return view('reporting.article.article_job_accept', compact('data'));
    }
    
}
