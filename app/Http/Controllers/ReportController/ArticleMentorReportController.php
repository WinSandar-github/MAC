<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mentor;

class ArticleMentorReportController extends Controller
{
    public function articleMentorRegisteredIntern(Request $request)
    {
        $mentor = Mentor::all();

        $data = [
            'title' => 'မှတ်ပုံတင်ထားသော အလုပ်သင်ကြားပေးသူစာရင်း (လုပ်ငန်းအမျိုးအစားအလိုက် / status အလိုက်)',
            'mentor' => $mentor,
        ];

        return view('reporting.article.article_mentor_report', compact('data'));
    }

    public function articleMentorIntern(Request $request)
    {
        $data = [
            'title' => 'အလုပ်သင်ကြားပေးနေသူထံတွင် အလုပ်သင်ဆင်းနေသူစာရင်း (ကျောင်းသား status အလိုက်)',
            'list' => []
        ];

        return view('reporting.article.article_mentor_report', compact('data'));
    }
}
