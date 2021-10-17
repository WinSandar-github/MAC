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

class ArticleReportController extends Controller
{
    public function articleList(Request $request)
    {
        $data = [
            'title' => 'အလုပ်သင်ကြားပေးနိုင်သည့် အများပြည်သူသို့ စာရင်းဝန်ဆောင်မှု ပေးသူတစ်ဦးချင်းစာရင်း',
            'list' => []
        ];

        return view('reporting.article.article_report', compact('data'));
    }
    
    public function articleDailyInOutList(Request $request)
    {
        $data = [
            'title' => 'နေ့စဥ်ရုံးတက်ရုံးဆင်းမှတ်တမ်း၊ ခွင့်ပုံစံ',
            'list' => []
        ];

        return view('reporting.article.article_report', compact('data'));
    }

    public function articleInternPosList(Request $request)
    {
        $data = [
            'title' => 'စာရင်းကိုင်အလုပ်သင်ခန့်အပ်စာရင်း (Batch အလိုက်)',
            'list' => []
        ];

        return view('reporting.article.article_report', compact('data'));
    }

    public function articleInternshipList(Request $request)
    {
        $data = [
            'title' => 'အလုပ်သင်ဆင်းသူများစာရင်း (Batch အလိုက်)',
            'list' => []
        ];

        return view('reporting.article.article_report', compact('data'));
    }
    
}
