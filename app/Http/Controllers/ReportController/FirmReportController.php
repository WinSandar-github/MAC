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
                    ->where('audit_firm_type_id', '=', '1')
                    ->where('register_date', 'like', "%$request->date%")
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

    public function nonFirmIndividual(Request $request, $type)
    {
        if($request->date != '' && $type != null){

            if($type == '1' || $type == '2'){
                $firm = AccountancyFirmInformation::with('firm_owner_audits')
                        ->where('audit_firm_type_id', '=', '2')
                        ->where('register_date', 'like', "%$request->date%")
                        ->where('organization_structure_id', '=', $type)
                        ->get();
            }else{
                
                $local_foreign = $type == 3 ? '1' : '2' ;

                $firm = AccountancyFirmInformation::with('firm_owner_audits')
                        ->where('audit_firm_type_id', '=', '2')
                        ->where('register_date', 'like', "%$request->date%")
                        ->where('local_foreign_type', '=', $local_foreign)
                        ->get();
            }

        }

        switch($type){
            case '1':
                $title = "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ - ( Non Audit Firm - Sole )";
                break;
            case '2':
                $title = "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ - ( Non Audit Firm - Partnership )";
            break;
            case '3':
                $title = "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ - ( Non Audit Firm - Local Company )";
            break;
            case '4':
                $title = "ပြက္ခဒိန်နှစ်လိုက်မှတ်ပုံတင်လုပ်ငန်းများ - ( Non Audit Firm - Foreign Company )";
            break;
        }

        $data = [
            'title' => $title,
            'firm' => $firm,
        ];

        return view('reporting.firm_name.non_firm_report', compact('data'));
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
