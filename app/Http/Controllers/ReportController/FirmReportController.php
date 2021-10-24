<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccountancyFirmInformation;

class FirmReportController extends Controller
{
    public function firmIndividual(Request $request, $type)
    {
        if($request->date != '' && $type != null){

            $firm = AccountancyFirmInformation::with('firm_owner_audits')
                    ->where('organization_structure_id', '=', $type)
                    ->get();            
        }

        switch($type){
            case '1':
                $title = "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ - ( Audit Firm - Sole )";
                break;
            case '2':
                $title = "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ - ( Audit Firm - Partnership )";
            break;
            case '3':
                $title = "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ - ( Audit Firm - Company )";
            break;
        }

        $data = [
            'title' => $title,
            'firm' => $firm,
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
}
