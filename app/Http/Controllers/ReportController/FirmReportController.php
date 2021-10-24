<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FirmReportController extends Controller
{
    public function firmIndividual(Request $request)
    {
        $data = [
            'title' => 'အလုပ်သင်ကြားပေးနိုင်သည့် အများပြည်သူသို့ စာရင်းဝန်ဆောင်မှုပေးသူတစ်ဦးချင်း',
            'list' => []
        ];

        return view('reporting.firm_name.firm_report', compact('data'));
    }

    public function firmDailyAttendence(Request $request)
    {
        $data = [
            'title' => 'နေ့စဥ်ရုံးတက်ရုံးဆင်းမှတ်တမ်း၊ ခွင့်ပုံစံ',
            'list' => []
        ];

        return view('reporting.firm_name.firm_report', compact('data'));
    }
    public function firmRegistrationnYearlyCalendar(Request $request)
    {
        $data = [
            'title' => 'နေ့စဥ်ရုံးတက်ရုံးဆင်းမှတ်တမ်း၊ ခွင့်ပုံစံ',
            'list' => []
        ];

        return view('reporting.firm_name.firm_report', compact('data'));
    }
}
