<?php

namespace App\Http\Controllers\ReportController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AccountancyFirmInformation;

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
    public function firmRegistrationnYearlyCalendar(Request $request,$org_stur_id,$firm_type_id,$local_foreign = NULL)
    {
        // return gettype($org_stur_id).$firm_type_id.$local_foreign;
        
        $audit_firms = AccountancyFirmInformation::where('organization_structure_id',$org_stur_id)
                       ->where('audit_firm_type_id',$firm_type_id)
                       ->orWhere('local_foreign_type',$local_foreign)
                       ->whereYear('register_date', '=', $request->date)
                       ->with('firm_owner_audits')->get();
        if($firm_type_id == "1"){
            if($org_stur_id == "1"){
                $title = "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ ( Audit Firm ) ( Sole )";
            }else if($org_stur_id == "2"){
                $title = "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ ( Audit Firm ) ( Patnership )";
            }else{
                $title = "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ ( Audit Firm ) ( Company )";
            }
        }else{
            if($local_foreign == "1"){
                $title = $org_stur_id == "1" ? "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ ( Non-Audit Firm ) ( Local Sole )"
                                             : "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ ( Non-Audit Firm ) ( Local Partnership )";
            }else{
                $title = $org_stur_id == "1" ? "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ ( Non-Audit Firm ) ( Foreign Sole )"
                                             : "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ ( Non-Audit Firm ) ( Foreign Partnership )";

            }
        }
    //    return $audit_firms;
        $data = [
            'title' => $title,
            'list' => [],
            'audit_firms' => $audit_firms,
            'firm_type' => $firm_type_id,

        ];

        // return $data;

        return view('reporting.firm_name.firm_reg_yearly_calendar', compact('data'));
    }
    public function nonFirmRegistrationnYearlyCalendar(Request $request,$org_stur_id,$firm_type)
    {
        
        $audit_firms = AccountancyFirmInformation::where('organization_structure_id',$org_stur_id)
                       ->where('firm_type_id',$firm_type)
                       ->whereYear('register_date', '=', $request->date)
                       ->with('firm_owner_audits')->get();
    //    return $audit_firms;
        $data = [
            'title' => 'နေ့စဥ်ရုံးတက်ရုံးဆင်းမှတ်တမ်း၊ ခွင့်ပုံစံ',
            'list' => [],
            'audit_firms' => $audit_firms,
            'firm_type' => $firm_type,
        ];

        return view('reporting.firm_name.firm_reg_yearly_calendar', compact('data'));
    }

}
