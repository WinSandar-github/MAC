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
}
